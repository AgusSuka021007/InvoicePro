<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enter Company Code - InvoicePro</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    animation: {
                        'fade-in': 'fadeIn 0.5s ease-in-out',
                        'slide-up': 'slideUp 0.3s ease-out',
                        'pulse-slow': 'pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite'
                    }
                }
            }
        }
    </script>
    <style>
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes slideUp {
            from { transform: translateY(10px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }
    </style>
</head>
<body>
    <div class="min-h-screen bg-gradient-to-br from-purple-600 via-purple-700 to-indigo-800 flex items-center justify-center p-4">
        <!-- Main Card -->
        <div class="w-full max-w-md bg-white rounded-3xl shadow-2xl p-8 animate-fade-in">
            <!-- Header -->
            <div class="text-center mb-8">
                <!-- Logo -->
                <div class="flex items-center justify-center mb-6">
                    <div class="w-12 h-12 bg-purple-600 rounded-xl flex items-center justify-center mr-3">
                        <svg class="w-7 h-7 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z"/>
                            <path fill-rule="evenodd" d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <span class="text-2xl font-bold text-purple-600">InvoicePro</span>
                </div>

                <h1 class="text-3xl font-bold text-gray-800 mb-4">Enter Company Code</h1>
                <p class="text-gray-600 text-sm leading-relaxed">
                    Please enter company code provided by your<br>
                    company admin to join your organization.
                </p>
            </div>

            <!-- Company Code Form -->
            <form id="companyCodeForm" class="mb-6">
                <div class="mb-6">
                    <label for="companyCode" class="block text-sm font-medium text-gray-700 mb-3">
                        Company Code
                    </label>
                    <input 
                        type="text" 
                        id="companyCode" 
                        name="companyCode" 
                        placeholder="Enter your company code"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent outline-none transition-all text-center text-lg font-mono tracking-wider"
                        maxlength="20"
                        autocomplete="off"
                        required
                    >
                </div>

                <!-- Validation Message -->
                <div id="validation-message" class="hidden mb-4">
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg text-sm">
                        <div class="flex items-center">
                            <svg class="w-4 h-4 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                            </svg>
                            <span id="error-text">Please enter a valid company code.</span>
                        </div>
                    </div>
                </div>

                <!-- Success Message -->
                <div id="success-message" class="hidden mb-4">
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg text-sm animate-slide-up">
                        <div class="flex items-center">
                            <svg class="w-4 h-4 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span>Company code verified! Joining organization...</span>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex flex-col sm:flex-row gap-3 mb-6">
                    <button 
                        type="button" 
                        class="flex-1 bg-gray-200 text-gray-700 px-6 py-3 rounded-lg font-medium hover:bg-gray-300 transition-colors flex items-center justify-center"
                        onclick="goBackToLogin()"
                    >
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                        </svg>
                        Back to Login
                    </button>
                    <button 
                        type="submit" 
                        id="joinBtn"
                        class="flex-1 bg-purple-600 text-white px-6 py-3 rounded-lg font-medium hover:bg-purple-700 transition-colors flex items-center justify-center disabled:bg-gray-400 disabled:cursor-not-allowed"
                    >
                        <span id="join-text">Join Company</span>
                        <svg id="join-arrow" class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                        <!-- Loading Spinner -->
                        <svg id="loading-spinner" class="hidden w-4 h-4 ml-2 animate-spin" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                    </button>
                </div>
            </form>

            <!-- Help Section -->
            <div class="text-center">
                <div class="bg-gray-50 rounded-lg p-4">
                    <p class="text-gray-600 text-sm mb-2 font-medium">Don't have a company code?</p>
                    <button 
                        type="button"
                        class="text-purple-600 hover:text-purple-700 text-sm font-medium transition-colors"
                        onclick="createCompany()"
                    >
                        Create a new company account →
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('companyCodeForm');
            const codeInput = document.getElementById('companyCode');
            const joinBtn = document.getElementById('joinBtn');
            const joinText = document.getElementById('join-text');
            const joinArrow = document.getElementById('join-arrow');
            const loadingSpinner = document.getElementById('loading-spinner');
            const validationMessage = document.getElementById('validation-message');
            const successMessage = document.getElementById('success-message');
            const errorText = document.getElementById('error-text');

            // Format input as user types
            codeInput.addEventListener('input', function(e) {
                // Convert to uppercase and remove spaces
                let value = e.target.value.toUpperCase().replace(/\s/g, '');
                
                // Add spaces every 4 characters for better readability
                if (value.length > 4) {
                    value = value.match(/.{1,4}/g).join(' ');
                }
                
                e.target.value = value;
                
                // Hide previous messages
                hideMessages();
            });

            // Form submission
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                
                const companyCode = codeInput.value.replace(/\s/g, ''); // Remove spaces for validation
                
                if (!companyCode) {
                    showError('Please enter a company code.');
                    return;
                }

                if (companyCode.length < 4) {
                    showError('Company code must be at least 4 characters long.');
                    return;
                }

                // Show loading state
                setLoadingState(true);
                hideMessages();

                // Simulate API call
                setTimeout(() => {
                    // Simulate validation
                    if (companyCode === 'DEMO1234' || companyCode === 'TEST5678') {
                        // Success
                        showSuccess();
                        setTimeout(() => {
                            alert('Successfully joined the company! Redirecting to dashboard...');
                        }, 1500);
                    } else {
                        // Error
                        setLoadingState(false);
                        showError('Invalid company code. Please check with your administrator.');
                    }
                }, 2000);
            });

            function setLoadingState(loading) {
                joinBtn.disabled = loading;
                if (loading) {
                    joinText.textContent = 'Verifying...';
                    joinArrow.classList.add('hidden');
                    loadingSpinner.classList.remove('hidden');
                    joinBtn.classList.add('cursor-not-allowed');
                } else {
                    joinText.textContent = 'Join Company';
                    joinArrow.classList.remove('hidden');
                    loadingSpinner.classList.add('hidden');
                    joinBtn.classList.remove('cursor-not-allowed');
                }
            }

            function showError(message) {
                errorText.textContent = message;
                validationMessage.classList.remove('hidden');
                successMessage.classList.add('hidden');
                codeInput.classList.add('border-red-500', 'focus:ring-red-500');
                codeInput.classList.remove('border-gray-300', 'focus:ring-purple-500');
            }

            function showSuccess() {
                validationMessage.classList.add('hidden');
                successMessage.classList.remove('hidden');
                codeInput.classList.remove('border-red-500', 'focus:ring-red-500');
                codeInput.classList.add('border-green-500', 'focus:ring-green-500');
                setLoadingState(false);
                joinText.textContent = 'Joined Successfully';
                joinArrow.classList.add('hidden');
            }

            function hideMessages() {
                validationMessage.classList.add('hidden');
                successMessage.classList.add('hidden');
                codeInput.classList.remove('border-red-500', 'focus:ring-red-500', 'border-green-500', 'focus:ring-green-500');
                codeInput.classList.add('border-gray-300', 'focus:ring-purple-500');
            }
        });

        function goBackToLogin() {
            console.log('Going back to login...');
            alert('Navigating back to login page...');
        }

        function createCompany() {
            console.log('Creating new company...');
            alert('Redirecting to company creation page...');
        }
    </script>
</body>
</html>