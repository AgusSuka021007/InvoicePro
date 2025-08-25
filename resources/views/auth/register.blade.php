{{-- resources/views/auth/register.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - InvoicePro</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="min-h-screen bg-gradient-to-br from-purple-600 via-purple-700 to-indigo-800">
    <div class="min-h-screen flex items-center justify-center px-4 py-8 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <!-- Success/Error Messages -->
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg shadow-md animate-pulse">
                    <div class="flex items-center">
                        <i class="fas fa-check-circle mr-2"></i>
                        {{ session('success') }}
                    </div>
                </div>
            @endif

            @if (session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg shadow-md animate-pulse">
                    <div class="flex items-center">
                        <i class="fas fa-exclamation-circle mr-2"></i>
                        {{ session('error') }}
                    </div>
                </div>
            @endif

            <!-- Register Card -->
            <div class="bg-white/95 backdrop-blur-sm rounded-3xl shadow-2xl p-6 sm:p-8 lg:p-10 transition-all duration-300 hover:shadow-3xl">
                <!-- Logo and Brand -->
                <div class="text-center mb-8">
                    <div class="flex items-center justify-center mb-6">
                        <div class="bg-gradient-to-r from-indigo-500 to-purple-600 p-4 rounded-2xl shadow-lg transform hover:scale-110 transition-transform duration-300">
                            <i class="fas fa-file-invoice text-white text-3xl"></i>
                        </div>
                    </div>
                    <h1 class="text-3xl sm:text-4xl font-bold bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent mb-2">
                        InvoicePro
                    </h1>
                    <p class="text-gray-500 text-sm">Start managing your invoices today</p>
                </div>

                <!-- Register Form -->
                <div>
                    <h2 class="text-2xl sm:text-3xl font-bold text-gray-900 text-center mb-2">Sign Up</h2>
                    <p class="text-gray-600 text-center mb-8">Create your account to get started</p>
                    
                    <form class="space-y-6" method="POST" action="{{ url('/register') }}" id="registerForm">
                        @csrf
                        
                        <!-- Username Field -->
                        <div class="space-y-2">
                            <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                            <div class="relative">
                                <input 
                                    id="username" 
                                    name="username" 
                                    type="text" 
                                    autocomplete="username" 
                                    required 
                                    class="appearance-none rounded-xl block w-full px-4 py-4 pl-12 border border-gray-300 placeholder-gray-400 text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-300 hover:border-indigo-300 @error('username') border-red-500 focus:ring-red-500 @enderror"
                                    placeholder="Enter your username"
                                    value="{{ old('username') }}"
                                    minlength="3"
                                    maxlength="20"
                                >
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <i class="fas fa-user text-gray-400"></i>
                                </div>
                                <div class="absolute inset-y-0 right-0 pr-4 flex items-center" id="username-status">
                                    <!-- Dynamic status icon will appear here -->
                                </div>
                            </div>
                            @error('username')
                                <p class="text-red-500 text-sm flex items-center">
                                    <i class="fas fa-exclamation-circle mr-1"></i>
                                    {{ $message }}
                                </p>
                            @enderror
                            <p class="text-gray-400 text-xs">3-20 characters, letters and numbers only</p>
                        </div>

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
                                    class="appearance-none rounded-xl block w-full px-4 py-4 pl-12 border border-gray-300 placeholder-gray-400 text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-300 hover:border-indigo-300 @error('email') border-red-500 focus:ring-red-500 @enderror"
                                    placeholder="Enter your email"
                                    value="{{ old('email') }}"
                                >
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <i class="fas fa-envelope text-gray-400"></i>
                                </div>
                                <div class="absolute inset-y-0 right-0 pr-4 flex items-center" id="email-status">
                                    <!-- Dynamic status icon will appear here -->
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
                                    autocomplete="new-password" 
                                    required 
                                    class="appearance-none rounded-xl block w-full px-4 py-4 pl-12 pr-12 border border-gray-300 placeholder-gray-400 text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-300 hover:border-indigo-300 @error('password') border-red-500 focus:ring-red-500 @enderror"
                                    placeholder="Create a password"
                                    minlength="8"
                                >
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <i class="fas fa-lock text-gray-400"></i>
                                </div>
                                <button type="button" onclick="togglePassword('password', 'password-icon')" class="absolute inset-y-0 right-0 pr-4 flex items-center text-gray-400 hover:text-gray-600 transition-colors duration-200">
                                    <i id="password-icon" class="fas fa-eye-slash"></i>
                                </button>
                            </div>
                            @error('password')
                                <p class="text-red-500 text-sm flex items-center">
                                    <i class="fas fa-exclamation-circle mr-1"></i>
                                    {{ $message }}
                                </p>
                            @enderror
                            
                            <!-- Password Strength Indicator -->
                            <div class="space-y-2">
                                <div class="flex space-x-1">
                                    <div id="strength-1" class="h-2 w-full bg-gray-200 rounded-full transition-colors duration-300"></div>
                                    <div id="strength-2" class="h-2 w-full bg-gray-200 rounded-full transition-colors duration-300"></div>
                                    <div id="strength-3" class="h-2 w-full bg-gray-200 rounded-full transition-colors duration-300"></div>
                                    <div id="strength-4" class="h-2 w-full bg-gray-200 rounded-full transition-colors duration-300"></div>
                                </div>
                                <p id="password-strength-text" class="text-xs text-gray-400">Password strength: <span id="strength-level">None</span></p>
                            </div>
                            <p class="text-gray-400 text-xs">Minimum 8 characters with letters, numbers and symbols</p>
                        </div>

                        <!-- Confirm Password Field -->
                        <div class="space-y-2">
                            <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                            <div class="relative">
                                <input 
                                    id="password_confirmation" 
                                    name="password_confirmation" 
                                    type="password" 
                                    autocomplete="new-password" 
                                    required 
                                    class="appearance-none rounded-xl block w-full px-4 py-4 pl-12 pr-12 border border-gray-300 placeholder-gray-400 text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-300 hover:border-indigo-300"
                                    placeholder="Confirm your password"
                                    minlength="8"
                                >
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <i class="fas fa-lock text-gray-400"></i>
                                </div>
                                <button type="button" onclick="togglePassword('password_confirmation', 'confirm-password-icon')" class="absolute inset-y-0 right-0 pr-4 flex items-center text-gray-400 hover:text-gray-600 transition-colors duration-200">
                                    <i id="confirm-password-icon" class="fas fa-eye-slash"></i>
                                </button>
                            </div>
                            <div id="password-match-status" class="hidden">
                                <!-- Password match indicator -->
                            </div>
                        </div>

                        <!-- Terms and Conditions -->
                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input 
                                    id="terms" 
                                    name="terms" 
                                    type="checkbox" 
                                    required
                                    class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded transition-all duration-200"
                                >
                            </div>
                            <div class="ml-3 text-sm">
                                <label for="terms" class="text-gray-700">
                                    I agree to the 
                                    <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500 transition-colors duration-200">Terms and Conditions</a>
                                    and 
                                    <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500 transition-colors duration-200">Privacy Policy</a>
                                </label>
                            </div>
                        </div>

                        <!-- Register Button -->
                        <div>
                            <button 
                                type="submit" 
                                class="group relative w-full flex justify-center py-4 px-4 border border-transparent text-sm sm:text-base font-medium rounded-xl text-white bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all duration-300 transform hover:scale-105 hover:shadow-lg disabled:opacity-50 disabled:cursor-not-allowed"
                                id="submit-btn"
                            >
                                <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                                    <i class="fas fa-user-plus text-indigo-200 group-hover:text-white transition-colors duration-200"></i>
                                </span>
                                Create Account
                            </button>
                        </div>

                        <!-- Login Link -->
                        <div class="text-center">
                            <p class="text-sm text-gray-600">
                                Already have an account? 
                                <a href="{{ route('login') }}" class="font-medium text-indigo-600 hover:text-indigo-500 transition-colors duration-200">
                                    Log In
                                </a>
                            </p>
                        </div>
                    </form>
                </div>

                <!-- Social Register (Optional) -->
                <div class="mt-8">
                    <div class="relative">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-gray-300"></div>
                        </div>
                        <div class="relative flex justify-center text-sm">
                            <span class="px-2 bg-white text-gray-500">Or sign up with</span>
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
                <p class="text-sm text-indigo-200">
                    © {{ date('Y') }} InvoicePro. All rights reserved.
                </p>
            </div>
        </div>
    </div>

    <script>
        // Toggle password visibility
        function togglePassword(inputId, iconId) {
            const passwordInput = document.getElementById(inputId);
            const passwordIcon = document.getElementById(iconId);
            
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

        // Password strength checker
        function checkPasswordStrength(password) {
            let strength = 0;
            const checks = [
                password.length >= 8,
                /[a-z]/.test(password),
                /[A-Z]/.test(password),
                /[0-9]/.test(password),
                /[^A-Za-z0-9]/.test(password)
            ];

            strength = checks.filter(check => check).length;

            const strengthLevels = ['None', 'Weak', 'Fair', 'Good', 'Strong'];
            const strengthColors = ['bg-gray-200', 'bg-red-400', 'bg-orange-400', 'bg-yellow-400', 'bg-green-400'];

            // Update strength bars
            for (let i = 1; i <= 4; i++) {
                const bar = document.getElementById(`strength-${i}`);
                if (i <= strength - 1) {
                    bar.className = `h-2 w-full ${strengthColors[strength]} rounded-full transition-colors duration-300`;
                } else {
                    bar.className = 'h-2 w-full bg-gray-200 rounded-full transition-colors duration-300';
                }
            }

            // Update strength text
            document.getElementById('strength-level').textContent = strengthLevels[strength];
            
            return strength;
        }

        // Password match checker
        function checkPasswordMatch() {
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('password_confirmation').value;
            const statusDiv = document.getElementById('password-match-status');

            if (confirmPassword.length > 0) {
                statusDiv.classList.remove('hidden');
                if (password === confirmPassword) {
                    statusDiv.innerHTML = '<p class="text-green-500 text-sm flex items-center"><i class="fas fa-check-circle mr-1"></i>Passwords match</p>';
                } else {
                    statusDiv.innerHTML = '<p class="text-red-500 text-sm flex items-center"><i class="fas fa-times-circle mr-1"></i>Passwords do not match</p>';
                }
            } else {
                statusDiv.classList.add('hidden');
            }
        }

        // Real-time validation
        document.addEventListener('DOMContentLoaded', function() {
            const passwordInput = document.getElementById('password');
            const confirmPasswordInput = document.getElementById('password_confirmation');
            const usernameInput = document.getElementById('username');
            const emailInput = document.getElementById('email');

            passwordInput.addEventListener('input', function() {
                checkPasswordStrength(this.value);
            });

            confirmPasswordInput.addEventListener('input', checkPasswordMatch);
            passwordInput.addEventListener('input', checkPasswordMatch);

            // Username validation
            usernameInput.addEventListener('input', function() {
                const username = this.value;
                const statusDiv = document.getElementById('username-status');
                const isValid = /^[a-zA-Z0-9]{3,20}$/.test(username);

                if (username.length > 0) {
                    if (isValid) {
                        statusDiv.innerHTML = '<i class="fas fa-check-circle text-green-500"></i>';
                    } else {
                        statusDiv.innerHTML = '<i class="fas fa-times-circle text-red-500"></i>';
                    }
                } else {
                    statusDiv.innerHTML = '';
                }
            });

            // Email validation
            emailInput.addEventListener('input', function() {
                const email = this.value;
                const statusDiv = document.getElementById('email-status');
                const isValid = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);

                if (email.length > 0) {
                    if (isValid) {
                        statusDiv.innerHTML = '<i class="fas fa-check-circle text-green-500"></i>';
                    } else {
                        statusDiv.innerHTML = '<i class="fas fa-times-circle text-red-500"></i>';
                    }
                } else {
                    statusDiv.innerHTML = '';
                }
            });
        });

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
        document.getElementById('registerForm').addEventListener('submit', function(e) {
            const button = document.getElementById('submit-btn');
            const originalText = button.innerHTML;
            
            button.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Creating Account...';
            button.disabled = true;
            
            // Re-enable after 3 seconds if no redirect happens
            setTimeout(() => {
                if (button) {
                    button.innerHTML = originalText;
                    button.disabled = false;
                }
            }, 3000);
        });
    </script>
</body>
</html>