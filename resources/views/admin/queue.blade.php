<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Status - InvoicePro</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    animation: {
                        'fade-in': 'fadeIn 0.6s ease-in-out',
                        'slide-up': 'slideUp 0.4s ease-out',
                        'pulse-slow': 'pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                        'bounce-slow': 'bounce 2s infinite'
                    }
                }
            }
        }
    </script>
    <style>
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes slideUp {
            from { transform: translateY(15px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }
    </style>
</head>
<body>
    <div class="min-h-screen bg-gradient-to-br from-purple-600 via-purple-700 to-indigo-800">
        <!-- Header -->
        <div class="pt-8 pb-4 px-6">
            <div class="flex items-center">
                <div class="w-8 h-8 bg-white rounded-lg flex items-center justify-center mr-3">
                    <svg class="w-5 h-5 text-purple-600" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z"/>
                        <path fill-rule="evenodd" d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <span class="text-xl font-bold text-white">InvoicePro</span>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex items-center justify-center px-6 pb-12">
            <!-- Status Card -->
            <div class="w-full max-w-sm bg-white rounded-3xl shadow-2xl overflow-hidden animate-fade-in">
                
                <!-- Header Section -->
                <div class="bg-gray-50 px-6 py-6 text-center border-b border-gray-100">
                    <!-- InvoicePro Logo -->
                    <div class="flex items-center justify-center mb-4">
                        <div class="w-10 h-10 bg-purple-600 rounded-xl flex items-center justify-center mr-2">
                            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z"/>
                                <path fill-rule="evenodd" d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <span class="text-lg font-bold text-purple-600">InvoicePro</span>
                    </div>
                    
                    <h1 class="text-2xl font-bold text-gray-800 mb-2">Application Status</h1>
                    <p class="text-gray-600 text-sm">Your request is being processed</p>
                </div>

                <!-- Status Section -->
                <div class="p-6 space-y-6">
                    
                    <!-- Under Review Status -->
                    <div class="text-center animate-slide-up">
                        <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-yellow-600 animate-pulse-slow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <h2 class="text-xl font-bold text-gray-800 mb-2">Under Review</h2>
                        <p class="text-gray-600 text-sm leading-relaxed">
                            Your company registration is currently<br>
                            under review and will be processed<br>
                            within 24-48 hours.
                        </p>
                    </div>

                    <!-- Divider -->
                    <div class="flex items-center">
                        <div class="flex-1 border-t border-gray-200"></div>
                        <div class="px-3 text-gray-400 text-xs font-medium">NEXT</div>
                        <div class="flex-1 border-t border-gray-200"></div>
                    </div>

                    <!-- Pending Members Status -->
                    <div class="text-center opacity-60">
                        <div class="w-12 h-12 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-3">
                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"/>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-500 mb-1">IT: Pending Members</h3>
                        <p class="text-gray-500 text-xs">Wait for approval</p>
                    </div>

                </div>

                <!-- Footer Section -->
                <div class="bg-gray-50 px-6 py-4 border-t border-gray-100">
                    <p class="text-center text-gray-500 text-xs">
                        If approved we automatic Company Onboarding
                    </p>
                </div>

            </div>
        </div>

        <!-- Progress Indicator -->
        <div class="fixed bottom-8 left-1/2 transform -translate-x-1/2">
            <div class="bg-white bg-opacity-20 backdrop-blur-sm rounded-full px-6 py-2">
                <div class="flex items-center space-x-2">
                    <div class="w-2 h-2 bg-white rounded-full animate-bounce-slow"></div>
                    <div class="w-2 h-2 bg-white bg-opacity-60 rounded-full animate-bounce-slow" style="animation-delay: 0.2s;"></div>
                    <div class="w-2 h-2 bg-white bg-opacity-60 rounded-full animate-bounce-slow" style="animation-delay: 0.4s;"></div>
                    <span class="text-white text-sm font-medium ml-2">Processing</span>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Simulate status checking
            let checkCount = 0;
            const maxChecks = 10;
            
            function checkApplicationStatus() {
                checkCount++;
                console.log(`Status check ${checkCount}/${maxChecks}`);
                
                // Simulate different status updates
                if (checkCount === 5) {
                    // You could update the UI here for status changes
                    console.log('Status updated: Still under review...');
                } else if (checkCount >= maxChecks) {
                    // Simulate approval after several checks
                    updateToApprovedStatus();
                    return;
                }
                
                // Check again in 5 seconds (in production, this would be longer)
                setTimeout(checkApplicationStatus, 5000);
            }
            
            function updateToApprovedStatus() {
                // This would update the UI to show approved status
                const reviewSection = document.querySelector('.animate-slide-up');
                const icon = reviewSection.querySelector('svg');
                const title = reviewSection.querySelector('h2');
                const description = reviewSection.querySelector('p');
                
                // Update to approved status
                reviewSection.querySelector('.bg-yellow-100').className = 'w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4';
                icon.className = 'w-8 h-8 text-green-600';
                icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>';
                title.textContent = 'Approved!';
                description.innerHTML = 'Your company registration has been<br>approved! Redirecting to dashboard<br>in a few moments...';
                
                // Simulate redirect after 3 seconds
                setTimeout(() => {
                    alert('Registration approved! Redirecting to dashboard...');
                }, 3000);
            }
            
            // Start checking status
            setTimeout(checkApplicationStatus, 2000);
            
            // Add periodic visual feedback
            setInterval(() => {
                const clockIcon = document.querySelector('.animate-pulse-slow');
                if (clockIcon) {
                    clockIcon.classList.add('scale-110');
                    setTimeout(() => {
                        clockIcon.classList.remove('scale-110');
                    }, 200);
                }
            }, 3000);
        });
    </script>
</body>
</html>