@extends('layouts.adminnavbar')

@section('title', 'Create Customer')
@section('page-title', 'Create Customner')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Customer</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', sans-serif;
        }
    </style>
</head>
<body class="min-h-screen" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
    <div class="min-h-screen flex items-center justify-center p-4">
        <div class="w-full max-w-md">
            <!-- Header -->
            <div class="mb-8">
                <div class="flex items-center mb-4">
                    <button onclick="goBack()" class="text-white hover:text-gray-200 transition-colors mr-3">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                    </button>
                    <h1 class="text-white text-xl font-medium">Create a New Customer</h1>
                </div>
            </div>

            <!-- Form Card -->
            <div class="bg-white rounded-3xl p-8 shadow-xl">
                <h2 class="text-blue-600 text-2xl font-semibold mb-8 text-center">Add New Customer</h2>
                
                <form id="customerForm" onsubmit="handleSubmit(event)">
                    <!-- Full Name Field -->
                    <div class="mb-6">
                        <label for="fullName" class="block text-gray-700 font-medium mb-2">
                            Full Name
                        </label>
                        <input 
                            type="text" 
                            id="fullName" 
                            name="fullName" 
                            class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all duration-200 bg-gray-50"
                            placeholder="Enter Customer Name"
                            required
                        >
                        <span class="error-message text-red-500 text-sm hidden"></span>
                    </div>

                    <!-- Email Address Field -->
                    <div class="mb-6">
                        <label for="email" class="block text-gray-700 font-medium mb-2">
                            Email Address
                        </label>
                        <input 
                            type="email" 
                            id="email" 
                            name="email" 
                            class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all duration-200 bg-gray-50"
                            placeholder="Enter Customer Address"
                            required
                        >
                        <span class="error-message text-red-500 text-sm hidden"></span>
                    </div>

                    <!-- Phone Number Field -->
                    <div class="mb-6">
                        <label for="phone" class="block text-gray-700 font-medium mb-2">
                            Phone Number
                        </label>
                        <input 
                            type="tel" 
                            id="phone" 
                            name="phone" 
                            class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all duration-200 bg-gray-50"
                            placeholder="Enter Customer Phone Number"
                            required
                        >
                        <span class="error-message text-red-500 text-sm hidden"></span>
                    </div>

                    <!-- Address Field -->
                    <div class="mb-8">
                        <label for="address" class="block text-gray-700 font-medium mb-2">
                            Address
                        </label>
                        <textarea 
                            id="address" 
                            name="address" 
                            rows="3"
                            class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all duration-200 bg-gray-50 resize-none"
                            placeholder="Enter Customer Address"
                            required
                        ></textarea>
                        <span class="error-message text-red-500 text-sm hidden"></span>
                    </div>

                    <!-- Action Buttons -->
                    <div class="space-y-3">
                        <button 
                            type="submit" 
                            id="createBtn"
                            class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-4 rounded-lg transition-all duration-200 transform hover:scale-[1.02] active:scale-[0.98] focus:ring-4 focus:ring-blue-300"
                        >
                            <span id="btnText">Create Customer</span>
                            <span id="btnLoader" class="hidden">
                                <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white inline" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                                Creating...
                            </span>
                        </button>
                        
                        <button 
                            type="button" 
                            onclick="cancelForm()"
                            class="w-full bg-gray-300 hover:bg-gray-400 text-gray-700 font-semibold py-3 px-4 rounded-lg transition-all duration-200 transform hover:scale-[1.02] active:scale-[0.98]"
                        >
                            Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Success Modal -->
    <div id="successModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
        <div class="bg-white rounded-lg p-6 m-4 max-w-md w-full transform transition-all duration-300 scale-95">
            <div class="flex items-center justify-center w-12 h-12 mx-auto bg-green-100 rounded-full mb-4">
                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
            </div>
            <h3 class="text-lg font-medium text-gray-900 text-center mb-2">Customer Created Successfully!</h3>
            <p class="text-sm text-gray-500 text-center mb-6">The customer information has been saved successfully.</p>
            <div class="flex space-x-3">
                <button onclick="createAnother()" class="flex-1 bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-md transition-colors">
                    Create Another
                </button>
                <button onclick="closeSuccessModal()" class="flex-1 bg-gray-300 hover:bg-gray-400 text-gray-700 font-medium py-2 px-4 rounded-md transition-colors">
                    Done
                </button>
            </div>
        </div>
    </div>

    <!-- Error Modal -->
    <div id="errorModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
        <div class="bg-white rounded-lg p-6 m-4 max-w-md w-full transform transition-all duration-300 scale-95">
            <div class="flex items-center justify-center w-12 h-12 mx-auto bg-red-100 rounded-full mb-4">
                <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </div>
            <h3 class="text-lg font-medium text-gray-900 text-center mb-2">Error!</h3>
            <p id="errorMessage" class="text-sm text-gray-500 text-center mb-6"></p>
            <button onclick="closeErrorModal()" class="w-full bg-red-600 hover:bg-red-700 text-white font-medium py-2 px-4 rounded-md transition-colors">
                OK
            </button>
        </div>
    </div>

    <script>
        // Customer data storage (in real app, this would be sent to backend)
        let customers = JSON.parse(localStorage.getItem('customers') || '[]');

        function goBack() {
            if (hasUnsavedChanges()) {
                if (confirm('Are you sure you want to go back? Any unsaved changes will be lost.')) {
                    clearForm();
                    // In real app, navigate to previous page or customer list
                    window.history.back();
                }
            } else {
                window.history.back();
            }
        }

        function cancelForm() {
            if (hasUnsavedChanges()) {
                if (confirm('Are you sure you want to cancel? All entered data will be lost.')) {
                    clearForm();
                    goBack();
                }
            } else {
                goBack();
            }
        }

        function hasUnsavedChanges() {
            const form = document.getElementById('customerForm');
            const formData = new FormData(form);
            for (let [key, value] of formData.entries()) {
                if (value.trim() !== '') {
                    return true;
                }
            }
            return false;
        }

        function clearForm() {
            document.getElementById('customerForm').reset();
            clearErrors();
        }

        function showLoader() {
            document.getElementById('btnText').classList.add('hidden');
            document.getElementById('btnLoader').classList.remove('hidden');
            document.getElementById('createBtn').disabled = true;
        }

        function hideLoader() {
            document.getElementById('btnText').classList.remove('hidden');
            document.getElementById('btnLoader').classList.add('hidden');
            document.getElementById('createBtn').disabled = false;
        }

        function showSuccessModal() {
            const modal = document.getElementById('successModal');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            modal.querySelector('.transform').classList.remove('scale-95');
            modal.querySelector('.transform').classList.add('scale-100');
        }

        function closeSuccessModal() {
            const modal = document.getElementById('successModal');
            modal.querySelector('.transform').classList.add('scale-95');
            modal.querySelector('.transform').classList.remove('scale-100');
            setTimeout(() => {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
            }, 300);
        }

        function showErrorModal(message) {
            document.getElementById('errorMessage').textContent = message;
            const modal = document.getElementById('errorModal');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            modal.querySelector('.transform').classList.remove('scale-95');
            modal.querySelector('.transform').classList.add('scale-100');
        }

        function closeErrorModal() {
            const modal = document.getElementById('errorModal');
            modal.querySelector('.transform').classList.add('scale-95');
            modal.querySelector('.transform').classList.remove('scale-100');
            setTimeout(() => {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
            }, 300);
        }

        function createAnother() {
            closeSuccessModal();
            clearForm();
        }

        function validateForm() {
            let isValid = true;
            clearErrors();

            // Full Name validation
            const fullName = document.getElementById('fullName');
            if (fullName.value.trim().length < 2) {
                showError('fullName', 'Full name must be at least 2 characters long');
                isValid = false;
            }

            // Email validation
            const email = document.getElementById('email');
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email.value)) {
                showError('email', 'Please enter a valid email address');
                isValid = false;
            }

            // Check if email already exists
            if (customers.some(customer => customer.email === email.value)) {
                showError('email', 'This email address is already registered');
                isValid = false;
            }

            // Phone validation
            const phone = document.getElementById('phone');
            const phoneRegex = /^[\d\+\-\(\)\s]{10,}$/;
            if (!phoneRegex.test(phone.value)) {
                showError('phone', 'Please enter a valid phone number (at least 10 digits)');
                isValid = false;
            }

            // Address validation
            const address = document.getElementById('address');
            if (address.value.trim().length < 10) {
                showError('address', 'Address must be at least 10 characters long');
                isValid = false;
            }

            return isValid;
        }

        function showError(fieldId, message) {
            const field = document.getElementById(fieldId);
            const errorSpan = field.nextElementSibling;
            
            field.classList.add('border-red-300', 'bg-red-50');
            field.classList.remove('border-gray-200', 'bg-gray-50');
            
            errorSpan.textContent = message;
            errorSpan.classList.remove('hidden');
        }

        function clearErrors() {
            const errorMessages = document.querySelectorAll('.error-message');
            errorMessages.forEach(error => {
                error.classList.add('hidden');
                error.textContent = '';
            });

            const inputs = document.querySelectorAll('input, textarea');
            inputs.forEach(input => {
                input.classList.remove('border-red-300', 'bg-red-50');
                input.classList.add('border-gray-200', 'bg-gray-50');
            });
        }

        function handleSubmit(event) {
            event.preventDefault();
            
            if (!validateForm()) {
                return;
            }

            showLoader();

            // Simulate API call
            setTimeout(() => {
                try {
                    const formData = new FormData(event.target);
                    const customerData = {
                        id: Date.now(),
                        fullName: formData.get('fullName'),
                        email: formData.get('email'),
                        phone: formData.get('phone'),
                        address: formData.get('address'),
                        createdAt: new Date().toISOString()
                    };

                    // Save to local storage (in real app, send to backend)
                    customers.push(customerData);
                    localStorage.setItem('customers', JSON.stringify(customers));

                    hideLoader();
                    showSuccessModal();
                    
                    console.log('Customer created:', customerData);
                } catch (error) {
                    hideLoader();
                    showErrorModal('Failed to create customer. Please try again.');
                    console.error('Error:', error);
                }
            }, 1500);
        }

        // Real-time validation
        document.addEventListener('DOMContentLoaded', function() {
            const inputs = document.querySelectorAll('input, textarea');
            
            inputs.forEach(input => {
                // Clear errors on input
                input.addEventListener('input', function() {
                    if (this.classList.contains('border-red-300')) {
                        this.classList.remove('border-red-300', 'bg-red-50');
                        this.classList.add('border-gray-200', 'bg-gray-50');
                        this.nextElementSibling.classList.add('hidden');
                    }
                });

                // Add focus effects
                input.addEventListener('focus', function() {
                    this.classList.add('ring-2', 'ring-blue-500', 'border-blue-500');
                });

                input.addEventListener('blur', function() {
                    this.classList.remove('ring-2', 'ring-blue-500', 'border-blue-500');
                });
            });

            // Phone number formatting
            document.getElementById('phone').addEventListener('input', function() {
                // Allow only numbers, +, -, (, ), and spaces
                this.value = this.value.replace(/[^\d\+\-\(\)\s]/g, '');
            });
        });

        // Prevent accidental page refresh
        window.addEventListener('beforeunload', function(e) {
            if (hasUnsavedChanges()) {
                e.preventDefault();
                e.returnValue = '';
            }
        });
    </script>
</body>
@endsection
</html>