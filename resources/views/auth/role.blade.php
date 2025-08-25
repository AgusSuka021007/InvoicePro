<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choose Your Role - InvoicePro</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    animation: {
                        'fade-in': 'fadeIn 0.5s ease-in-out',
                        'slide-up': 'slideUp 0.3s ease-out'
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
        <div class="w-full max-w-4xl bg-white rounded-3xl shadow-2xl p-8 animate-fade-in">
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

                <h1 class="text-4xl font-bold text-gray-800 mb-4">Choose Your Role</h1>
                <p class="text-gray-600 text-lg">
                    Select the option that best describes your relationship with the<br>
                    company you'll be managing invoices for.
                </p>
            </div>

            <!-- Role Selection -->
            <div class="flex flex-col lg:flex-row gap-8 mb-8">
                <!-- Company Owner -->
                <div class="flex-1">
                    <div class="role-card bg-gray-50 rounded-2xl p-6 cursor-pointer transition-all duration-300 hover:shadow-lg border-2 border-transparent" data-role="owner">
                        <div class="text-center mb-6">
                            <!-- Owner Icon -->
                            <div class="w-16 h-16 bg-purple-600 rounded-2xl flex items-center justify-center mx-auto mb-4">
                                <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z" clip-rule="evenodd"/>
                                    <path d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z"/>
                                </svg>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-800 mb-2">Company Owner</h3>
                            <p class="text-purple-600 font-medium text-sm uppercase tracking-wide mb-4">I OWN THIS BUSINESS</p>
                            <p class="text-gray-600 text-sm mb-6">
                                You are the owner or founder of this company<br>
                                and have full control over all business<br>
                                operations.
                            </p>
                        </div>

                        <!-- Features List -->
                        <div class="space-y-3">
                            <div class="flex items-center text-sm text-gray-700">
                                <div class="w-5 h-5 bg-green-500 rounded-full flex items-center justify-center mr-3 flex-shrink-0">
                                    <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                <span>Full administrative access</span>
                            </div>
                            <div class="flex items-center text-sm text-gray-700">
                                <div class="w-5 h-5 bg-green-500 rounded-full flex items-center justify-center mr-3 flex-shrink-0">
                                    <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                <span>Company profile management</span>
                            </div>
                            <div class="flex items-center text-sm text-gray-700">
                                <div class="w-5 h-5 bg-green-500 rounded-full flex items-center justify-center mr-3 flex-shrink-0">
                                    <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                <span>User & permission control</span>
                            </div>
                            <div class="flex items-center text-sm text-gray-700">
                                <div class="w-5 h-5 bg-green-500 rounded-full flex items-center justify-center mr-3 flex-shrink-0">
                                    <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                <span>Billing & subscription management</span>
                            </div>
                            <div class="flex items-center text-sm text-gray-700">
                                <div class="w-5 h-5 bg-green-500 rounded-full flex items-center justify-center mr-3 flex-shrink-0">
                                    <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                <span>Financial reports & analytics</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Company Admin -->
                <div class="flex-1">
                    <div class="role-card bg-gray-50 rounded-2xl p-6 cursor-pointer transition-all duration-300 hover:shadow-lg border-2 border-transparent" data-role="admin">
                        <div class="text-center mb-6">
                            <!-- Admin Icon -->
                            <div class="w-16 h-16 bg-purple-600 rounded-2xl flex items-center justify-center mx-auto mb-4">
                                <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-800 mb-2">Company Admin</h3>
                            <p class="text-purple-600 font-medium text-sm uppercase tracking-wide mb-4">I WORK FOR THIS COMPANY</p>
                            <p class="text-gray-600 text-sm mb-6">
                                You are an employee or admin who<br>
                                manages invoicing and financial operations<br>
                                for the company.
                            </p>
                        </div>

                        <!-- Features List -->
                        <div class="space-y-3">
                            <div class="flex items-center text-sm text-gray-700">
                                <div class="w-5 h-5 bg-green-500 rounded-full flex items-center justify-center mr-3 flex-shrink-0">
                                    <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                <span>Invoice creation & management</span>
                            </div>
                            <div class="flex items-center text-sm text-gray-700">
                                <div class="w-5 h-5 bg-green-500 rounded-full flex items-center justify-center mr-3 flex-shrink-0">
                                    <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                <span>Client management</span>
                            </div>
                            <div class="flex items-center text-sm text-gray-700">
                                <div class="w-5 h-5 bg-green-500 rounded-full flex items-center justify-center mr-3 flex-shrink-0">
                                    <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                <span>Payment tracking</span>
                            </div>
                            <div class="flex items-center text-sm text-gray-700">
                                <div class="w-5 h-5 bg-green-500 rounded-full flex items-center justify-center mr-3 flex-shrink-0">
                                    <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                <span>Basic Reporting</span>
                            </div>
                            <div class="flex items-center text-sm text-gray-700">
                                <div class="w-5 h-5 bg-green-500 rounded-full flex items-center justify-center mr-3 flex-shrink-0">
                                    <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                <span>Team collaboration</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Selection Notification -->
            <div id="selection-notice" class="hidden mb-6">
                <div class="bg-yellow-100 border-l-4 border-yellow-400 p-4 rounded-r-lg animate-slide-up">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-yellow-800">
                                <span class="font-medium" id="selected-role-text"></span> This will determine your access level and available features.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Help Text -->
            <div class="text-center mb-8">
                <p class="text-gray-600 text-sm">
                    <span class="font-medium">Not sure which to choose?</span> If you own the business, choose Owner. If you're an employee handling invoices, choose Admin. You can always adjust permissions later.
                </p>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('register') }}"
                    type="button" 
                    class="bg-gray-200 text-gray-700 px-8 py-3 rounded-lg font-medium hover:bg-gray-300 transition-colors flex items-center justify-center"
                    onclick="goBack()"
                >
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                    </svg>
                    Back to Register
                </a>
                <button 
                    type="button" 
                    id="continue-btn"
                    class="bg-purple-600 text-white px-8 py-3 rounded-lg font-medium hover:bg-purple-700 transition-colors disabled:bg-gray-400 disabled:cursor-not-allowed flex items-center justify-center"
                    disabled
                    onclick="continueStep()"
                >
                    Continue Step
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <script>
        let selectedRole = null;

        document.addEventListener('DOMContentLoaded', function() {
            const roleCards = document.querySelectorAll('.role-card');
            const continueBtn = document.getElementById('continue-btn');
            const selectionNotice = document.getElementById('selection-notice');
            const selectedRoleText = document.getElementById('selected-role-text');

            roleCards.forEach(card => {
                card.addEventListener('click', function() {
                    // Remove selection from all cards
                    roleCards.forEach(c => {
                        c.classList.remove('border-purple-500', 'bg-purple-50');
                        c.classList.add('border-transparent', 'bg-gray-50');
                    });

                    // Add selection to clicked card
                    this.classList.remove('border-transparent', 'bg-gray-50');
                    this.classList.add('border-purple-500', 'bg-purple-50');

                    // Update selected role
                    selectedRole = this.dataset.role;
                    
                    // Show selection notice
                    const roleTitle = selectedRole === 'owner' ? 'Company Owner' : 'Company Admin';
                    selectedRoleText.textContent = `You've selected ${roleTitle}.`;
                    selectionNotice.classList.remove('hidden');

                    // Enable continue button
                    continueBtn.disabled = false;
                    continueBtn.classList.remove('disabled:bg-gray-400', 'disabled:cursor-not-allowed');
                });

                // Add hover effect
                card.addEventListener('mouseenter', function() {
                    if (!this.classList.contains('border-purple-500')) {
                        this.classList.add('shadow-md', 'transform', 'scale-105');
                    }
                });

                card.addEventListener('mouseleave', function() {
                    if (!this.classList.contains('border-purple-500')) {
                        this.classList.remove('shadow-md', 'transform', 'scale-105');
                    }
                });
            });
        });

        function goBack() {
            // In a real application, this would navigate back to the registration page
            console.log('Going back to registration...');
            alert('Going back to registration page...');
        }

        function continueStep() {
            if (!selectedRole) {
                alert('Please select a role first.');
                return;
            }

            // In a real application, this would submit the role selection and continue to the next step
            console.log('Selected role:', selectedRole);
            alert(`Role selected: ${selectedRole === 'owner' ? 'Company Owner' : 'Company Admin'}. Proceeding to next step...`);
        }
    </script>
</body>
</html>