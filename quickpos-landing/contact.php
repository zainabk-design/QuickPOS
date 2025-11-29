<?php
// Contact form validation and submission handling
session_start();

$errors = [];
$success = false;
$form_data = [
    'name' => '',
    'email' => '',
    'phone' => '',
    'message' => ''
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize and validate input
    $form_data['name'] = trim($_POST['name'] ?? '');
    $form_data['email'] = trim($_POST['email'] ?? '');
    $form_data['phone'] = trim($_POST['phone'] ?? '');
    $form_data['message'] = trim($_POST['message'] ?? '');

    // Validation logic
    if (empty($form_data['name'])) {
        $errors[] = 'Name is required';
    } elseif (strlen($form_data['name']) < 2) {
        $errors[] = 'Name must be at least 2 characters long';
    }

    if (empty($form_data['email'])) {
        $errors[] = 'Email is required';
    } elseif (!filter_var($form_data['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Email format is invalid';
    }

    if (!empty($form_data['phone'])) {
        // Remove non-numeric characters for validation
        $phone_digits = preg_replace('/[^0-9]/', '', $form_data['phone']);
        if (strlen($phone_digits) < 10) {
            $errors[] = 'Phone number must contain at least 10 digits';
        }
    }

    if (empty($form_data['message'])) {
        $errors[] = 'Message is required';
    } elseif (strlen($form_data['message']) < 10) {
        $errors[] = 'Message must be at least 10 characters long';
    } elseif (strlen($form_data['message']) > 1000) {
        $errors[] = 'Message cannot exceed 1000 characters';
    }

    // If no errors, process the form
    if (empty($errors)) {
        // Email headers
        $to = 'contact@quickpos.local'; // Replace with your email
        $subject = 'New Contact Form Submission from ' . htmlspecialchars($form_data['name']);
        $headers = "From: " . htmlspecialchars($form_data['email']) . "\r\n";
        $headers .= "Reply-To: " . htmlspecialchars($form_data['email']) . "\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

        // Email body
        $email_body = "Name: " . htmlspecialchars($form_data['name']) . "\r\n";
        $email_body .= "Email: " . htmlspecialchars($form_data['email']) . "\r\n";
        $email_body .= "Phone: " . htmlspecialchars($form_data['phone']) . "\r\n\r\n";
        $email_body .= "Message:\r\n" . htmlspecialchars($form_data['message']) . "\r\n";

        // Send email (commented out for local testing; enable in production)
        // mail($to, $subject, $email_body, $headers);

        // Set success flag and redirect
        $_SESSION['contact_success'] = true;
        header('Location: thank-you.html');
        exit;
    }
}

// Get success message if redirected from thank-you
$show_success = isset($_SESSION['contact_success']);
if ($show_success) {
    unset($_SESSION['contact_success']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - QuickPOS</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        .contact-section {
            min-height: 100vh;
            padding: 60px 20px;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        }
        .contact-container {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
        }
        .contact-container h1 {
            font-size: 32px;
            font-weight: bold;
            margin-bottom: 30px;
            color: #111827;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #374151;
        }
        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-size: 14px;
            font-family: inherit;
            transition: border-color 0.15s ease;
        }
        .form-group input:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #7c3aed;
            box-shadow: 0 0 0 3px rgba(124, 58, 237, 0.1);
        }
        .form-group textarea {
            resize: vertical;
            min-height: 120px;
        }
        .btn-submit {
            width: 100%;
            padding: 14px;
            background: linear-gradient(90deg, #7c3aed, #5b21b6);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: opacity 0.2s ease;
        }
        .btn-submit:hover {
            opacity: 0.95;
        }
        .btn-submit:active {
            opacity: 0.85;
        }
        .error-message {
            padding: 12px 16px;
            background-color: #fee2e2;
            border: 1px solid #fca5a5;
            border-radius: 8px;
            color: #991b1b;
            margin-bottom: 20px;
            font-size: 14px;
        }
        .error-message ul {
            margin: 8px 0 0 20px;
            padding: 0;
        }
        .error-message li {
            margin: 4px 0;
        }
        .success-message {
            padding: 12px 16px;
            background-color: #dcfce7;
            border: 1px solid #86efac;
            border-radius: 8px;
            color: #166534;
            margin-bottom: 20px;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <section class="contact-section">
        <div class="contact-container">
            <h1>Get in Touch</h1>
            <p style="color: #6b7280; margin-bottom: 30px;">We'd love to hear from you. Send us a message and we'll respond as soon as possible.</p>

            <?php if (!empty($errors)): ?>
                <div class="error-message">
                    <strong>Please fix the following errors:</strong>
                    <ul>
                        <?php foreach ($errors as $error): ?>
                            <li><?php echo htmlspecialchars($error); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form method="POST" action="">
                <div class="form-group">
                    <label for="name">Full Name *</label>
                    <input 
                        type="text" 
                        id="name" 
                        name="name" 
                        value="<?php echo htmlspecialchars($form_data['name']); ?>"
                        required
                        minlength="2"
                        maxlength="100"
                    >
                </div>

                <div class="form-group">
                    <label for="email">Email Address *</label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email" 
                        value="<?php echo htmlspecialchars($form_data['email']); ?>"
                        required
                        maxlength="255"
                    >
                </div>

                <div class="form-group">
                    <label for="phone">Phone Number (Optional)</label>
                    <input 
                        type="tel" 
                        id="phone" 
                        name="phone" 
                        value="<?php echo htmlspecialchars($form_data['phone']); ?>"
                        placeholder="(555) 123-4567"
                        maxlength="20"
                    >
                </div>

                <div class="form-group">
                    <label for="message">Message *</label>
                    <textarea 
                        id="message" 
                        name="message" 
                        required
                        minlength="10"
                        maxlength="1000"
                    ><?php echo htmlspecialchars($form_data['message']); ?></textarea>
                    <small style="color: #9ca3af; margin-top: 4px; display: block;">
                        Min 10 characters, Max 1000 characters
                    </small>
                </div>

                <button type="submit" class="btn-submit">Send Message</button>
            </form>
        </div>
    </section>
</body>
</html>
