<?php
/**
 * QuickPOS Landing Page
 * Converted from React to PHP
 * 
 * PHP Version: 7.4+
 * Author: Senior Developer
 * Date: 2025
 */

// Set UTF-8 encoding and error handling
header('Content-Type: text/html; charset=utf-8');
header('X-UA-Compatible: IE=edge');

// Pricing plans data
$pricing_plans = [
    'monthly' => [
        [
            'name' => 'Basic',
            'price' => 29,
            'highlight' => false,
            'features' => ['1 Location', '100 Products', 'Basic Analytics', 'Email Support']
        ],
        [
            'name' => 'Pro',
            'price' => 79,
            'highlight' => true,
            'features' => ['5 Locations', 'Unlimited Products', 'Advanced Analytics', 'Priority Support', 'API Access', 'Custom Reports']
        ],
        [
            'name' => 'Enterprise',
            'price' => 199,
            'highlight' => false,
            'features' => ['Unlimited Locations', 'Unlimited Products', 'Advanced Analytics', '24/7 Support', 'API Access', 'Custom Reports', 'Dedicated Manager']
        ]
    ],
    'yearly' => [
        [
            'name' => 'Basic',
            'price' => 290,
            'highlight' => false,
            'features' => ['1 Location', '100 Products', 'Basic Analytics', 'Email Support']
        ],
        [
            'name' => 'Pro',
            'price' => 790,
            'highlight' => true,
            'features' => ['5 Locations', 'Unlimited Products', 'Advanced Analytics', 'Priority Support', 'API Access', 'Custom Reports']
        ],
        [
            'name' => 'Enterprise',
            'price' => 1990,
            'highlight' => false,
            'features' => ['Unlimited Locations', 'Unlimited Products', 'Advanced Analytics', '24/7 Support', 'API Access', 'Custom Reports', 'Dedicated Manager']
        ]
    ]
];

// Features data
$features = [
    [
        'icon' => 'shopping-cart',
        'title' => 'Inventory Management',
        'desc' => 'Track stock levels in real-time with automated alerts'
    ],
    [
        'icon' => 'bar-chart',
        'title' => 'Real-Time Analytics',
        'desc' => 'Visualize sales data with powerful dashboards'
    ],
    [
        'icon' => 'receipt',
        'title' => 'Smart Billing',
        'desc' => 'Generate professional receipts instantly'
    ],
    [
        'icon' => 'smartphone',
        'title' => 'Multi-Device Support',
        'desc' => 'Access from any device, anywhere'
    ]
];

// Social links
$social_links = ['Twitter', 'Facebook', 'LinkedIn', 'Instagram'];

// Testimonials data
$testimonials = [
    [
        'name' => 'Sarah Johnson',
        'role' => 'Owner, Urban Coffee Shop',
        'image' => 'SJ',
        'text' => 'QuickPOS transformed how I manage my business. The intuitive dashboard saves me hours every week!'
    ],
    [
        'name' => 'Mike Chen',
        'role' => 'Manager, Fashion Retail Store',
        'image' => 'MC',
        'text' => 'The inventory tracking is incredible. I never run out of stock and customer satisfaction increased by 40%.'
    ],
    [
        'name' => 'Emma Davis',
        'role' => 'CEO, Restaurant Group',
        'image' => 'ED',
        'text' => 'Managing 5 locations was a nightmare before QuickPOS. Now it\'s seamless and efficient!'
    ]
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="QuickPOS - The Smartest POS System For Modern Businesses">
    <meta name="theme-color" content="#4C41FF">
    <title>QuickPOS - Modern POS System</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="min-h-screen bg-white overflow-hidden">
        <!-- Navbar -->
        <nav id="navbar" class="fixed top-0 w-full z-50 transition-all duration-300">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-16">
                    <div class="text-2xl font-bold gradient-text">⚡ QuickPOS</div>
                    <div id="nav-links" class="hidden md:flex space-x-8">
                        <a href="#features" class="text-gray-700 hover:text-purple-600 transition">Features</a>
                        <a href="#pricing" class="text-gray-700 hover:text-purple-600 transition">Pricing</a>
                        <a href="#contact" class="text-gray-700 hover:text-purple-600 transition">Contact</a>
                    </div>
                    <button id="menu-toggle" class="md:hidden text-gray-700">
                        <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </nav>

        <!-- Hero Section -->
        <section id="hero" class="relative min-h-screen flex items-center pt-16 overflow-hidden">
            <!-- Floating Background Shapes -->
            <div class="floating-shape w-96 h-96 bg-purple-400 top-20 left-10 animate-float-slow"></div>
            <div class="floating-shape w-64 h-64 bg-blue-400 bottom-20 right-10 animate-float"></div>
            <div class="floating-shape w-80 h-80 bg-purple-300 top-1/2 right-1/4 animate-float-slow" style="animation-delay: 2s;"></div>

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 w-full">
                <div class="grid md:grid-cols-2 gap-12 items-center">
                    <!-- Left Content -->
                    <div class="animate-fadeUp">
                        <h1 class="text-5xl md:text-6xl font-bold mb-6 leading-tight">
                            The Smartest <span class="gradient-text">POS System</span> For Modern Businesses
                        </h1>
                        <p class="text-xl text-gray-600 mb-8">
                            Manage sales, inventory, analytics & billing — all in one powerful dashboard.
                        </p>
                        <div class="flex flex-col sm:flex-row gap-4">
                            <button class="btn-primary text-white px-8 py-4 rounded-full font-semibold flex items-center justify-center gap-2">
                                Get Started Free
                                <svg class="w-5 h-5 rotate-[-90deg]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                                </svg>
                            </button>
                            <button class="border-2 border-purple-600 text-purple-600 px-8 py-4 rounded-full font-semibold flex items-center justify-center gap-2 hover:bg-purple-50 transition">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <polygon points="5 3 19 12 5 21 5 3"></polygon>
                                </svg>
                                Watch Demo
                            </button>
                        </div>
                    </div>

                    <!-- Right Visuals - Dashboard Illustration -->
                    <div class="relative animate-fadeUp" style="animation-delay: 0.2s;">
                        <img src="../pictures/336e07d478ca0387aa50b3f74d943202.jpg" alt="POS Dashboard" class="w-full h-auto rounded-3xl shadow-2xl object-cover" loading="lazy" />
                        <div class="glass-card p-8 rounded-3xl animate-float mt-6 hidden lg:block">
                            <div class="space-y-4">
                                <!-- Card 1: Total Sales -->
                                <div class="flex items-center gap-4 p-4 bg-white rounded-xl shadow-lg">
                                    <div class="w-12 h-12 rounded-full bg-gradient-to-br from-purple-500 to-blue-500 flex items-center justify-center">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="text-sm text-gray-500">Total Sales</div>
                                        <div class="text-2xl font-bold gradient-text">$24,589</div>
                                    </div>
                                </div>
                                
                                <!-- Card 2: Products Sold -->
                                <div class="flex items-center gap-4 p-4 bg-white rounded-xl shadow-lg animate-float" style="animation-delay: 1s;">
                                    <div class="w-12 h-12 rounded-full bg-gradient-to-br from-blue-500 to-purple-500 flex items-center justify-center">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="text-sm text-gray-500">Products Sold</div>
                                        <div class="text-2xl font-bold gradient-text">1,247</div>
                                    </div>
                                </div>
                                
                                <!-- Card 3: New Orders -->
                                <div class="flex items-center gap-4 p-4 bg-white rounded-xl shadow-lg animate-float" style="animation-delay: 2s;">
                                    <div class="w-12 h-12 rounded-full bg-gradient-to-br from-purple-500 to-pink-500 flex items-center justify-center">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="text-sm text-gray-500">New Orders</div>
                                        <div class="text-2xl font-bold gradient-text">+156</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Features Section -->
        <section id="features" class="py-20 section-animate">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-4xl md:text-5xl font-bold mb-4">
                        Powerful <span class="gradient-text">Features</span>
                    </h2>
                    <p class="text-xl text-gray-600">Everything you need to run your business efficiently</p>
                </div>

                <!-- Features Illustration -->
                <div class="mb-12">
                    <img src="../pictures/cbef9214c58feb03b64b2830b5aef3d2.jpg" alt="Features" class="w-full max-w-4xl mx-auto h-auto rounded-2xl shadow-xl object-cover" loading="lazy" />
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                    <?php foreach ($features as $idx => $feature): ?>
                    <div class="neumorphic p-8 rounded-3xl card-hover" style="animation-delay: <?php echo $idx * 0.1; ?>s;">
                        <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-purple-500 to-blue-500 flex items-center justify-center mb-6 animate-pulse-glow">
                            <?php if ($feature['icon'] === 'shopping-cart'): ?>
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                            <?php elseif ($feature['icon'] === 'bar-chart'): ?>
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                </svg>
                            <?php elseif ($feature['icon'] === 'receipt'): ?>
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            <?php elseif ($feature['icon'] === 'smartphone'): ?>
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                                </svg>
                            <?php endif; ?>
                        </div>
                        <h3 class="text-xl font-bold mb-3"><?php echo htmlspecialchars($feature['title']); ?></h3>
                        <p class="text-gray-600"><?php echo htmlspecialchars($feature['desc']); ?></p>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <!-- Pricing Section -->
        <section id="pricing" class="py-20 bg-gray-50 section-animate">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Payment Illustration -->
                <div class="mb-16">
                    <img src="../pictures/a08ea6736391e439d41e797577d0ca1d.jpg" alt="Payment Processing" class="w-full max-w-2xl mx-auto h-auto rounded-2xl shadow-xl object-cover" loading="lazy" />
                </div>

                <div class="text-center mb-12">
                    <h2 class="text-4xl md:text-5xl font-bold mb-4">
                        Simple <span class="gradient-text">Pricing</span>
                    </h2>
                    <p class="text-xl text-gray-600 mb-8">Choose the perfect plan for your business</p>
                    
                    <!-- Pricing Toggle -->
                    <div class="inline-flex items-center gap-4 bg-white p-2 rounded-full shadow-lg">
                        <button id="pricing-monthly" class="pricing-toggle px-6 py-2 rounded-full font-semibold transition active"
                            data-period="monthly">
                            Monthly
                        </button>
                        <button id="pricing-yearly" class="pricing-toggle px-6 py-2 rounded-full font-semibold transition"
                            data-period="yearly">
                            Yearly
                        </button>
                    </div>
                </div>

                <div id="pricing-cards" class="grid md:grid-cols-3 gap-8">
                    <!-- Pricing cards will be rendered by JavaScript -->
                </div>
            </div>
        </section>

        <!-- Testimonials Section -->
        <section id="testimonials" class="py-20 bg-gradient-to-br from-purple-50 to-blue-50 section-animate">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-4xl md:text-5xl font-bold mb-4">
                        Trusted by <span class="gradient-text">Businesses</span>
                    </h2>
                    <p class="text-xl text-gray-600">See what our customers have to say</p>
                </div>

                <div class="grid md:grid-cols-3 gap-8">
                    <?php foreach ($testimonials as $idx => $testimonial): ?>
                    <div class="testimonial-card glass-card p-8 rounded-3xl card-hover" style="animation-delay: <?php echo $idx * 0.1; ?>s;">
                        <div class="flex items-start gap-4 mb-6">
                            <div class="w-14 h-14 rounded-full bg-gradient-to-br from-purple-500 to-blue-500 flex items-center justify-center text-white font-bold text-lg flex-shrink-0">
                                <?php echo htmlspecialchars($testimonial['image']); ?>
                            </div>
                            <div class="flex-1">
                                <h3 class="text-lg font-bold text-gray-900"><?php echo htmlspecialchars($testimonial['name']); ?></h3>
                                <p class="text-sm text-gray-600"><?php echo htmlspecialchars($testimonial['role']); ?></p>
                            </div>
                        </div>
                        <p class="text-gray-700 leading-relaxed">"<?php echo htmlspecialchars($testimonial['text']); ?>"</p>
                        <div class="flex gap-1 mt-4">
                            <?php for ($i = 0; $i < 5; $i++): ?>
                            <svg class="w-5 h-5 text-yellow-400 fill-current" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                            <?php endfor; ?>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <!-- Contact Section -->
        <section id="contact" class="py-20 section-animate">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid md:grid-cols-2 gap-12 items-center">
                    <!-- Website Building Illustration -->
                    <div class="order-2 md:order-1">
                        <img src="../pictures/3e453a9e2a6255a20c1610a84ad0939b.jpg" alt="Website Building" class="w-full h-auto rounded-2xl shadow-xl object-cover" loading="lazy" />
                    </div>

                    <!-- Contact Form -->
                    <div class="order-1 md:order-2">
                        <div class="text-center mb-12 md:text-left">
                            <h2 class="text-4xl md:text-5xl font-bold mb-4">
                                Get In <span class="gradient-text">Touch</span>
                            </h2>
                            <p class="text-xl text-gray-600">We'd love to hear from you</p>
                        </div>

                        <div id="contact-form" class="glass-card p-8 rounded-3xl">
                    <form id="form-contact" method="POST">
                        <div class="space-y-6">
                            <div>
                                <input
                                    type="text"
                                    id="form-name"
                                    name="name"
                                    placeholder="Your Name"
                                    class="w-full px-6 py-4 rounded-xl border-2 border-gray-200 focus:border-purple-500 outline-none transition"
                                    required
                                />
                            </div>
                            <div>
                                <input
                                    type="email"
                                    id="form-email"
                                    name="email"
                                    placeholder="Your Email"
                                    class="w-full px-6 py-4 rounded-xl border-2 border-gray-200 focus:border-purple-500 outline-none transition"
                                    required
                                />
                            </div>
                            <div>
                                <textarea
                                    id="form-message"
                                    name="message"
                                    placeholder="Your Message"
                                    rows="5"
                                    class="w-full px-6 py-4 rounded-xl border-2 border-gray-200 focus:border-purple-500 outline-none transition resize-none"
                                    required
                                ></textarea>
                            </div>
                            
                            <div id="form-status" style="display: none;"></div>
                            
                            <button type="submit" class="btn-primary w-full text-white py-4 rounded-xl font-semibold">
                                Send Message
                            </button>
                        </div>
                    </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="gradient-bg text-white py-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center">
                    <div class="text-3xl font-bold mb-4 animate-pulse-glow">⚡ QuickPOS</div>
                    <div class="flex justify-center gap-6 mb-6">
                        <?php foreach ($social_links as $social): ?>
                        <a href="#" class="hover:scale-110 transition">
                            <?php echo htmlspecialchars($social); ?>
                        </a>
                        <?php endforeach; ?>
                    </div>
                    <p class="text-white/80">© 2025 QuickPOS — All Rights Reserved</p>
                </div>
            </div>
        </footer>
    </div>

    <!-- Embedded Pricing Data for JavaScript -->
    <script>
        const pricingData = {
            monthly: <?php echo json_encode($pricing_plans['monthly']); ?>,
            yearly: <?php echo json_encode($pricing_plans['yearly']); ?>
        };
    </script>

    <script src="script.js"></script>
</body>
</html>
