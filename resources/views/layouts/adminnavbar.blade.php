<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'InvoicePro')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        /* Custom styles for navigation */
        .nav-link {
            display: flex;
            align-items: center;
            padding: 0.75rem 1rem;
            background-color: #e5e7eb;
            color: #374151;
            border-radius: 0.5rem;
            transition: all 0.2s ease;
            text-decoration: none;
            margin-bottom: 0.5rem;
        }
        
        .nav-link:hover {
            background-color: #d1d5db;
            transform: translateX(2px);
        }
        
        .nav-link.active {
            background: linear-gradient(to right, #8b5cf6, #7c3aed);
            color: white;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        .nav-link.active:hover {
            background: linear-gradient(to right, #7c3aed, #6d28d9);
            transform: translateX(2px);
        }

        /* Mobile menu button */
        .mobile-menu-btn {
            display: none;
            position: fixed;
            top: 1rem;
            left: 1rem;
            z-index: 20;
            background: linear-gradient(to right, #8b5cf6, #7c3aed);
            color: white;
            border: none;
            border-radius: 0.375rem;
            padding: 0.5rem;
            cursor: pointer;
        }

        /* Overlay for mobile */
        .mobile-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 15;
        }

        /* Responsive design */
        @media (max-width: 1024px) {
            .sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s ease;
                z-index: 16;
            }
            
            .sidebar.open {
                transform: translateX(0);
                box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
            }
            
            .mobile-menu-btn {
                display: block;
            }
            
            .mobile-overlay.open {
                display: block;
            }
            
            main {
                margin-left: 0 !important;
            }
        }

        @media (min-width: 1025px) {
            .sidebar {
                transform: translateX(0) !important;
            }
            
            .mobile-menu-btn {
                display: none;
            }
            
            .mobile-overlay {
                display: none !important;
            }
        }
    </style>
</head>
<body class="bg-gradient-to-br from-purple-600 via-purple-700 to-indigo-800 min-h-screen">
    <!-- Mobile Menu Button -->
    <button class="mobile-menu-btn" id="mobileMenuButton">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
        </svg>
    </button>

    <!-- Mobile Overlay -->
    <div class="mobile-overlay" id="mobileOverlay"></div>

    <!-- Main Container with proper layout -->
    <div class="flex min-h-screen">
        <!-- Fixed Sidebar -->
        <div class="sidebar fixed left-0 top-0 h-screen w-64 bg-white backdrop-blur-md p-5 z-10 overflow-y-auto shadow-lg">
            <!-- Logo -->
            <div class="flex items-center mb-6">
                <div class="w-8 h-8 bg-indigo-600 rounded-lg flex items-center justify-center mr-3">
                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"/>
                    </svg>
                </div>
                <span class="text-black font-semibold text-lg">InvoicePro</span>
            </div>

            <!-- Navigation -->
            <nav class="space-y-2">
                <a href="#" class="flex items-center px-4 py-3 text-white bg-gradient-to-br from-purple-600 via-purple-700 to-indigo-800 rounded-lg transition-colors">
                    <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"/>
                    </svg>
                    Dashboard
                </a>
                
                <a href="#" class="flex items-center px-4 py-3 bg-gray-200 text-black/80 hover:text-white/80 hover:bg-gradient-to-br from-purple-600 via-purple-700 to-indigo-800 rounded-lg transition-colors">
                    <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/>
                        <path fill-rule="evenodd" d="M4 5a2 2 0 012-2v1a1 1 0 102 0V3h8v1a1 1 0 102 0V3a2 2 0 012 2v6a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 112 0v1h3a1 1 0 110 2H9.5a1 1 0 01-1-1V9z"/>
                    </svg>
                    Invoices
                </a>
                
                <a href="{{ route('customerdb') }}" class="flex items-center px-4 py-3 bg-gray-200 text-black/80 hover:text-white/80 hover:bg-gradient-to-br from-purple-600 via-purple-700 to-indigo-800 rounded-lg transition-colors">
                    <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"/>
                    </svg>
                    Customer
                </a>
                
                <a href="index" class="flex items-center px-4 py-3 bg-gray-200 text-black/80 hover:text-white/80 hover:bg-gradient-to-br from-purple-600 via-purple-700 to-indigo-800 rounded-lg transition-colors">
                    <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6z"/>
                    </svg>
                    Products
                </a>
                
                <a href="{{ route('category') }}" class="flex items-center px-4 py-3 bg-gray-200 text-black/80 hover:text-white/80 hover:bg-gradient-to-br from-purple-600 via-purple-700 to-indigo-800 rounded-lg transition-colors">
                    <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z"/>
                    </svg>
                    Category
                </a>
                
                <a href="{{ route('task')}}" class="flex items-center px-4 py-3 bg-gray-200 text-black/80 hover:text-white/80 hover:bg-gradient-to-br from-purple-600 via-purple-700 to-indigo-800 rounded-lg transition-colors">
                    <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/>
                        <path fill-rule="evenodd" d="M4 5a2 2 0 012-2v1a1 1 0 102 0V3h8v1a1 1 0 102 0V3a2 2 0 012 2v6a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm8 8a1 1 0 01-1-1V8a1 1 0 10-2 0v4a3 3 0 003 3h2a1 1 0 100-2h-2z"/>
                    </svg>
                    Task
                </a>
                
                
                <a href="#" class="flex items-center px-4 py-3 bg-gray-200 text-black/80 hover:text-white/80 hover:bg-gradient-to-br from-purple-600 via-purple-700 to-indigo-800 rounded-lg transition-colors mt-8">
                    <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z"/>
                    </svg>
                    Settings
                </a>
            </nav>
        </div>

        <!-- Main Content Area with proper margin -->
        <main class="flex-1 ml-64 min-h-screen">
            <!-- Header Section -->
            <header class="bg-white/10 backdrop-blur-sm shadow-sm">
                <div class="px-6 py-4">
                    <div class="flex items-center justify-between">
                        <h1 class="text-2xl font-bold text-white">@yield('page-title', 'Dashboard')</h1>
                        <div class="flex items-center space-x-4">
                            @yield('header-actions')
                        </div>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <div class="p-6">
                <!-- Flash Messages -->
                <div id="flash-message" class="mb-4 hidden bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
                    <span class="block sm:inline" id="flash-text"></span>
                </div>

                <!-- Main Content -->
                @yield('content')
            </div>
        </main>
    </div>

    <!-- JavaScript for navigation and mobile menu -->
    <script>
        // Mobile menu functionality
        const mobileMenuButton = document.getElementById('mobileMenuButton');
        const mobileOverlay = document.getElementById('mobileOverlay');
        const sidebar = document.querySelector('.sidebar');

        function toggleMobileMenu() {
            sidebar.classList.toggle('open');
            mobileOverlay.classList.toggle('open');
            document.body.style.overflow = sidebar.classList.contains('open') ? 'hidden' : '';
        }

        mobileMenuButton.addEventListener('click', toggleMobileMenu);
        mobileOverlay.addEventListener('click', toggleMobileMenu);

        // Close menu when clicking on nav links in mobile view
        document.querySelectorAll('.sidebar a').forEach(link => {
            link.addEventListener('click', () => {
                if (window.innerWidth < 1025) {
                    toggleMobileMenu();
                }
            });
        });

        // Set active navigation based on current URL
        function setActiveNavigation() {
            const currentPath = window.location.pathname;
            const navLinks = document.querySelectorAll('.nav-link');
            
            // Remove active class from all links
            navLinks.forEach(link => {
                link.classList.remove('active');
            });
            
            // Add active class to current page
            navLinks.forEach(link => {
                const href = link.getAttribute('href');
                if (href === currentPath || (currentPath === '/' && href === '/dashboard')) {
                    link.classList.add('active');
                }
            });
            
            // Special case for owner page
            if (currentPath === '/owner') {
                const dashboardLink = document.querySelector('[data-page="dashboard"]');
                if (dashboardLink) {
                    dashboardLink.classList.add('active');
                }
            }
        }

        // Handle navigation clicks
        function handleNavigation(event, url) {
            event.preventDefault();
            
            // Remove active from all nav links
            document.querySelectorAll('.nav-link').forEach(link => {
                link.classList.remove('active');
            });
            
            // Add active to clicked link
            event.currentTarget.classList.add('active');
            
            // Navigate to the page
            window.location.href = url;
        }

        // Handle logout
        function handleLogout() {
            if (confirm('Are you sure you want to logout?')) {
                // Add your logout logic here
                alert('Logout functionality - redirect to login page');
                // window.location.href = '/login';
            }
        }

        // Initialize navigation on page load
        document.addEventListener('DOMContentLoaded', function() {
            setActiveNavigation();
            
            // Add click handlers to navigation links
            document.querySelectorAll('.nav-link').forEach(link => {
                link.addEventListener('click', function(event) {
                    const href = this.getAttribute('href');
                    handleNavigation(event, href);
                });
            });
        });

        // Show flash message (for testing)
        function showFlashMessage(message, type = 'success') {
            const flashDiv = document.getElementById('flash-message');
            const flashText = document.getElementById('flash-text');
            
            flashText.textContent = message;
            flashDiv.className = `mb-4 border px-4 py-3 rounded relative ${
                type === 'success' ? 'bg-green-100 border-green-400 text-green-700' :
                type === 'error' ? 'bg-red-100 border-red-400 text-red-700' :
                'bg-blue-100 border-blue-400 text-blue-700'
            }`;
            flashDiv.classList.remove('hidden');
            
            // Auto hide after 5 seconds
            setTimeout(() => {
                flashDiv.classList.add('hidden');
            }, 5000);
        }

        // Handle window resize
        window.addEventListener('resize', function() {
            if (window.innerWidth > 1024) {
                sidebar.classList.remove('open');
                mobileOverlay.classList.remove('open');
                document.body.style.overflow = '';
            }
        });
    </script>
</body>
</html>