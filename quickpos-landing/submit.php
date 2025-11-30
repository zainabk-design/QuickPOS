<?php
/**
 * QuickPOS Landing Page - Form Submission Handler
 * 
 * This file handles:
 * - Contact form submissions
 * - Input validation
 * - Email sending (optional, currently stores data)
 * - JSON response for JavaScript
 * 
 * PHP Version: 7.4+
 * Security: CSRF protection ready, input sanitization included
 */

// ==================== Configuration ====================
header('Content-Type: application/json; charset=utf-8');
header('X-Content-Type-Options: nosniff');

// Allow CORS if needed (optional - uncomment for cross-origin requests)
// header('Access-Control-Allow-Origin: *');
// header('Access-Control-Allow-Methods: POST, OPTIONS');

// ==================== Response Helper Function ====================
/**
 * Send JSON response
 */
function sendResponse($success, $message, $data = []) {
    echo json_encode(array_merge([
        'success' => $success,
        'message' => $message
    ], $data), JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
    exit;
}

// ==================== Check Request Method ====================
/**
 * Only accept POST requests
 */
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    sendResponse(false, 'Method not allowed. Use POST request.');
}

// ==================== Get Form Data ====================
$name = isset($_POST['name']) ? trim($_POST['name']) : '';
$email = isset($_POST['email']) ? trim($_POST['email']) : '';
$message = isset($_POST['message']) ? trim($_POST['message']) : '';

// ==================== Validation ====================

// Check if fields are empty
if (empty($name) || empty($email) || empty($message)) {
    http_response_code(400);
    sendResponse(false, 'Please fill in all required fields.');
}

// Validate name (2-100 characters)
if (strlen($name) < 2 || strlen($name) > 100) {
    http_response_code(400);
    sendResponse(false, 'Name must be between 2 and 100 characters.');
}

// Validate email format
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    sendResponse(false, 'Please enter a valid email address.');
}

// Validate email domain (optional, check if domain has MX record)
if (!checkdnsrr(substr(strrchr($email, "@"), 1), "MX")) {
    http_response_code(400);
    sendResponse(false, 'Email domain does not have a valid mail server.');
}

// Validate message (10-5000 characters)
if (strlen($message) < 10 || strlen($message) > 5000) {
    http_response_code(400);
    sendResponse(false, 'Message must be between 10 and 5000 characters.');
}

// Sanitize inputs
$name = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
$email = filter_var($email, FILTER_SANITIZE_EMAIL);
$message = htmlspecialchars($message, ENT_QUOTES, 'UTF-8');

// ==================== Rate Limiting (Optional) ====================
/**
 * Simple rate limiting based on IP address
 * Store submission times in a simple file (production should use database)
 */
$rate_limit_file = __DIR__ . '/logs/rate_limit.json';
$max_submissions_per_hour = 5;

// Ensure logs directory exists
if (!is_dir(__DIR__ . '/logs')) {
    mkdir(__DIR__ . '/logs', 0755, true);
}

// Check rate limit
if (file_exists($rate_limit_file)) {
    $rate_data = json_decode(file_get_contents($rate_limit_file), true) ?: [];
    $ip = $_SERVER['REMOTE_ADDR'];
    $current_hour = date('YmdH');
    
    if (isset($rate_data[$ip][$current_hour])) {
        if ($rate_data[$ip][$current_hour] >= $max_submissions_per_hour) {
            http_response_code(429);
            sendResponse(false, 'Too many submissions. Please try again later.');
        }
        $rate_data[$ip][$current_hour]++;
    } else {
        $rate_data[$ip][$current_hour] = 1;
    }
    
    file_put_contents($rate_limit_file, json_encode($rate_data));
} else {
    $rate_data = [];
    $rate_data[$_SERVER['REMOTE_ADDR']][date('YmdH')] = 1;
    file_put_contents($rate_limit_file, json_encode($rate_data));
}

// ==================== Store Submission ====================
/**
 * Store form submission in a JSON file
 * Production: Store in database instead
 */
$submissions_file = __DIR__ . '/logs/submissions.json';

$submission = [
    'id' => uniqid('sub_'),
    'timestamp' => date('Y-m-d H:i:s'),
    'ip_address' => $_SERVER['REMOTE_ADDR'],
    'user_agent' => substr($_SERVER['HTTP_USER_AGENT'] ?? '', 0, 255),
    'name' => $name,
    'email' => $email,
    'message' => $message
];

// Read existing submissions
$submissions = [];
if (file_exists($submissions_file)) {
    $content = file_get_contents($submissions_file);
    if (!empty($content)) {
        $submissions = json_decode($content, true) ?: [];
    }
}

// Add new submission
$submissions[] = $submission;

// Keep only last 1000 submissions (prevent file from getting too large)
if (count($submissions) > 1000) {
    $submissions = array_slice($submissions, -1000);
}

// Save submissions
$save_result = file_put_contents(
    $submissions_file,
    json_encode($submissions, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES)
);

if ($save_result === false) {
    http_response_code(500);
    sendResponse(false, 'Failed to save submission. Please try again later.');
}

// ==================== Send Email (Optional) ====================
/**
 * Send confirmation email to the user
 * Customize based on your requirements
 */
function sendEmailNotification($name, $email, $message) {
    // Email configuration - CUSTOMIZE THESE
    $admin_email = 'admin@quickpos.com'; // Change to your email
    $from_name = 'QuickPOS';
    $from_email = 'noreply@quickpos.com'; // Use a noreply email
    
    // Email headers
    $headers = [
        'From' => "$from_name <$from_email>",
        'Reply-To' => $email,
        'Content-Type' => 'text/html; charset=UTF-8',
        'X-Mailer' => 'QuickPOS/1.0'
    ];
    
    $headers_string = '';
    foreach ($headers as $header => $value) {
        $headers_string .= "$header: $value\r\n";
    }
    
    // User confirmation email
    $user_subject = 'We received your message - QuickPOS';
    $user_body = sprintf(
        '<html><body>' .
        '<h2>Thank You, %s!</h2>' .
        '<p>We received your message and will get back to you soon.</p>' .
        '<hr>' .
        '<p><strong>Your Message:</strong></p>' .
        '<p>%s</p>' .
        '<hr>' .
        '<p>Best regards,<br>QuickPOS Team</p>' .
        '</body></html>',
        htmlspecialchars($name),
        nl2br(htmlspecialchars($message))
    );
    
    // Send user confirmation
    @mail($email, $user_subject, $user_body, $headers_string);
    
    // Admin notification email
    $admin_subject = "New Contact Form Submission from $name";
    $admin_body = sprintf(
        '<html><body>' .
        '<h2>New Contact Form Submission</h2>' .
        '<p><strong>Name:</strong> %s</p>' .
        '<p><strong>Email:</strong> %s</p>' .
        '<p><strong>IP Address:</strong> %s</p>' .
        '<hr>' .
        '<p><strong>Message:</strong></p>' .
        '<p>%s</p>' .
        '<hr>' .
        '<p><em>Submitted: %s</em></p>' .
        '</body></html>',
        htmlspecialchars($name),
        htmlspecialchars($email),
        htmlspecialchars($_SERVER['REMOTE_ADDR']),
        nl2br(htmlspecialchars($message)),
        date('Y-m-d H:i:s')
    );
    
    // Send admin notification
    @mail($admin_email, $admin_subject, $admin_body, $headers_string);
}

// Uncomment to enable email sending
// sendEmailNotification($name, $email, $message);

// ==================== Success Response ====================
/**
 * Return success response
 */
http_response_code(200);
sendResponse(true, 'Message sent successfully! We will contact you soon.', [
    'submission_id' => $submission['id'],
    'timestamp' => $submission['timestamp']
]);
