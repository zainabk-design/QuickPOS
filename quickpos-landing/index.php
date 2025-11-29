<!-- Navbar -->
        <nav id="navbar" class="fixed top-0 w-full z-50 transition-all duration-300">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-16">
                    <div class="flex items-center gap-4">
                        <div class="text-2xl font-bold gradient-text">⚡ QuickPOS</div>
                    </div>

                    <div id="nav-links" class="hidden md:flex items-center space-x-6">
                        <a href="#features" class="nav-link">Features</a>
                        <a href="#pricing" class="nav-link">Pricing</a>
                        <a href="#contact" class="nav-link">Contact</a>
                        <a href="#" class="btn-primary">Sign Up</a>
                    </div>

                    <button id="menu-toggle" class="md:hidden text-gray-700" aria-label="Toggle menu">
                        <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Mobile menu (hidden by default) -->
            <div id="mobile-menu" class="hidden md:hidden px-4 pb-4">
                <a href="#features" class="block nav-link mobile">Features</a>
                <a href="#pricing" class="block nav-link mobile">Pricing</a>
                <a href="#contact" class="block nav-link mobile">Contact</a>
                <a href="#" class="btn-primary block mobile mt-2">Sign Up</a>
            </div>

            <script>
                (function () {
                    var toggle = document.getElementById('menu-toggle');
                    var mobileMenu = document.getElementById('mobile-menu');
                    toggle && toggle.addEventListener('click', function () {
                        if (mobileMenu.classList.contains('hidden')) {
                            mobileMenu.classList.remove('hidden');
                        } else {
                            mobileMenu.classList.add('hidden');
                        }
                    });

                    // Close mobile menu on resize to desktop
                    window.addEventListener('resize', function () {
                        if (window.innerWidth >= 768 && !mobileMenu.classList.contains('hidden')) {
                            mobileMenu.classList.add('hidden');
                        }
                    });
                })();
            </script>
        </nav>