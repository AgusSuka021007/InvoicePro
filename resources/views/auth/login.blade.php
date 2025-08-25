{{-- resources/views/auth/login.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - InvoicePro</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="min-h-screen bg-gradient-to-br from-purple-600 via-purple-700 to-indigo-800">
    <div class="min-h-screen flex items-center justify-center px-4 py-8 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <!-- Success/Error Messages -->
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg shadow-md">
                    <div class="flex items-center">
                        <i class="fas fa-check-circle mr-2"></i>
                        {{ session('success') }}
                    </div>
                </div>
            @endif

            @if (session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg shadow-md">
                    <div class="flex items-center">
                        <i class="fas fa-exclamation-circle mr-2"></i>
                        {{ session('error') }}
                    </div>
                </div>
            @endif

            <!-- Login Card -->
            <div class="bg-white/95 backdrop-blur-sm rounded-3xl shadow-2xl p-6 sm:p-8 lg:p-10 transition-all duration-300 hover:shadow-3xl">
                <!-- Logo and Brand -->
                <div class="text-center mb-8">
                    <div class="flex items-center justify-center mb-6">
                        <div class="bg-gradient-to-r from-purple-500 to-indigo-600 p-4 rounded-2xl shadow-lg transform hover:scale-110 transition-transform duration-300">
                            <i class="fas fa-file-invoice text-white text-3xl"></i>
                        </div>
                    </div>
                    <h1 class="text-3xl sm:text-4xl font-bold bg-gradient-to-r from-purple-600 to-indigo-600 bg-clip-text text-transparent mb-2">
                        InvoicePro
                    </h1>
                    <p class="text-gray-500 text-sm">Manage your invoices with ease</p>
                </div>

                <!-- Login Form -->
                <div>
                    <h2 class="text-2xl sm:text-3xl font-bold text-gray-900 text-center mb-2">Log In</h2>
                    <p class="text-gray-600 text-center mb-8">Welcome Back!</p>
                    
                    <form class="space-y-6" method="POST" action="{{ url('/login') }}">
                        @csrf
                        
                        <!-- Email Field -->
                        <div class="space-y-2">
                            <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                            <div class="relative">
                                <input 
                                    id="email" 
                                    name="email" 
                                    type="email" 
                                    autocomplete="email" 
                                    required 
                                    class="appearance-none rounded-xl block w-full px-4 py-4 pl-12 border border-gray-300 placeholder-gray-400 text-gray-900 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-300 hover:border-purple-300 @error('email') border-red-500 focus:ring-red-500 @enderror"
                                    placeholder="Enter your email"
                                    value="{{ old('email') }}"
                                >
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <i class="fas fa-envelope text-gray-400"></i>
                                </div>
                            </div>
                            @error('email')
                                <p class="text-red-500 text-sm flex items-center">
                                    <i class="fas fa-exclamation-circle mr-1"></i>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <!-- Password Field -->
                        <div class="space-y-2">
                            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                            <div class="relative">
                                <input 
                                    id="password" 
                                    name="password" 
                                    type="password" 
                                    autocomplete="current-password" 
                                    required 
                                    class="appearance-none rounded-xl block w-full px-4 py-4 pl-12 pr-12 border border-gray-300 placeholder-gray-400 text-gray-900 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-300 hover:border-purple-300 @error('password') border-red-500 focus:ring-red-500 @enderror"
                                    placeholder="Enter your password"
                                >
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <i class="fas fa-lock text-gray-400"></i>
                                </div>
                                <button type="button" onclick="togglePassword()" class="absolute inset-y-0 right-0 pr-4 flex items-center text-gray-400 hover:text-gray-600 transition-colors duration-200">
                                    <i id="password-icon" class="fas fa-eye-slash"></i>
                                </button>
                            </div>
                            @error('password')
                                <p class="text-red-500 text-sm flex items-center">
                                    <i class="fas fa-exclamation-circle mr-1"></i>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <!-- Remember Me & Forgot Password -->
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <input 
                                    id="remember" 
                                    name="remember" 
                                    type="checkbox" 
                                    class="h-4 w-4 text-purple-600 focus:ring-purple-500 border-gray-300 rounded transition-all duration-200"
                                >
                                <label for="remember" class="ml-2 block text-sm text-gray-900">
                                    Remember me
                                </label>
                            </div>

                            <div class="text-sm">
                                <a href="#" class="font-medium text-purple-600 hover:text-purple-500 transition-colors duration-200">
                                    Forgot Password?
                                </a>
                            </div>
                        </div>

                        <!-- Login Button -->
                        <div>
                            <button 
                                type="submit" 
                                class="group relative w-full flex justify-center py-4 px-4 border border-transparent text-sm sm:text-base font-medium rounded-xl text-white bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-700 hover:to-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 transition-all duration-300 transform hover:scale-105 hover:shadow-lg"
                            >
                                <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                                    <i class="fas fa-sign-in-alt text-purple-200 group-hover:text-white transition-colors duration-200"></i>
                                </span>
                                Log In
                            </button>
                        </div>

                        <!-- Sign Up Link -->
                        <div class="text-center">
                            <p class="text-sm text-gray-600">
                                Don't have an account? 
                                <a href="{{ route('register') }}" class="font-medium text-purple-600 hover:text-purple-500 transition-colors duration-200">
                                    Sign Up
                                </a>
                            </p>
                        </div>
                    </form>
                </div>

                <!-- Social Login (Optional) -->
                <div class="mt-8">
                    <div class="relative">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-gray-300"></div>
                        </div>
                        <div class="relative flex justify-center text-sm">
                            <span class="px-2 bg-white text-gray-500">Or continue with</span>
                        </div>
                    </div>

                    <div class="mt-6 grid grid-cols-2 gap-3">
                        <button class="w-full inline-flex justify-center py-3 px-4 border border-gray-300 rounded-xl shadow-sm bg-white text-sm font-medium text-gray-500 hover:bg-gray-50 hover:shadow-md transition-all duration-200 transform hover:scale-105">
                            <i class="fab fa-google text-red-500"></i>
                            <span class="ml-2 hidden sm:block">Google</span>
                        </button>
                        
                        <button class="w-full inline-flex justify-center py-3 px-4 border border-gray-300 rounded-xl shadow-sm bg-white text-sm font-medium text-gray-500 hover:bg-gray-50 hover:shadow-md transition-all duration-200 transform hover:scale-105">
                            <i class="fab fa-facebook-f text-blue-600"></i>
                            <span class="ml-2 hidden sm:block">Facebook</span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="text-center">
                <p class="text-sm text-purple-200">
                    © {{ date('Y') }} InvoicePro. All rights reserved.
                </p>
            </div>
        </div>
    </div>

    <script>
        // Toggle password visibility
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const passwordIcon = document.getElementById('password-icon');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                passwordIcon.classList.remove('fa-eye-slash');
                passwordIcon.classList.add('fa-eye');
            } else {
                passwordInput.type = 'password';
                passwordIcon.classList.remove('fa-eye');
                passwordIcon.classList.add('fa-eye-slash');
            }
        }

        // Auto-hide alerts after 5 seconds
        document.addEventListener('DOMContentLoaded', function() {
            const alerts = document.querySelectorAll('.bg-green-100, .bg-red-100');
            alerts.forEach(alert => {
                setTimeout(() => {
                    alert.style.transition = 'opacity 0.5s ease-in-out, transform 0.5s ease-in-out';
                    alert.style.opacity = '0';
                    alert.style.transform = 'translateY(-20px)';
                    setTimeout(() => alert.remove(), 500);
                }, 5000);
            });
        });

        // Form submission animation
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            const button = this.querySelector('button[type="submit"]');
            const originalText = button.innerHTML;
            
            button.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Logging in...';
            button.disabled = true;
            
            // Re-enable after 3 seconds if no redirect happens
            setTimeout(() => {
                if (button) {
                    button.innerHTML = originalText;
                    button.disabled = false;
                }
            }, 3000);
        });

        // Enhanced form validation
        const inputs = document.querySelectorAll('input[required]');
        inputs.forEach(input => {
            input.addEventListener('blur', function() {
                if (this.value.trim() === '') {
                    this.classList.add('border-red-300');
                    this.classList.remove('border-gray-300');
                } else {
                    this.classList.remove('border-red-300');
                    this.classList.add('border-gray-300');
                }
            });

            input.addEventListener('input', function() {
                if (this.value.trim() !== '') {
                    this.classList.remove('border-red-300');
                    this.classList.add('border-gray-300');
                }
            });
        });
    </script>
</body>
</html>