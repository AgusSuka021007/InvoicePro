<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InvoicePro - Application Status</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-gradient-to-br from-purple-600 via-purple-500 to-blue-500">
    <!-- Header -->
    <div class="p-6">
        <div class="flex items-center space-x-3">
            <div class="w-10 h-10 bg-white rounded-lg flex items-center justify-center">
                <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
            </div>
            <h1 class="text-2xl font-bold text-white">InvoicePro</h1>
        </div>
    </div>

    <!-- Main Content -->
    <div class="flex items-center justify-center px-6 py-12">
        <div class="w-full max-w-md">
            <!-- Status Card -->
            <div class="bg-white rounded-2xl shadow-xl p-8">
                <!-- Logo -->
                <div class="flex justify-center mb-6">
                    <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center">
                        <svg class="w-7 h-7 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                </div>
                
                <div class="text-center mb-6">
                    <span class="text-purple-600 text-sm font-medium">InvoicePro</span>
                </div>

                <!-- Title -->
                <h2 class="text-2xl font-bold text-gray-900 text-center mb-2">Application Status</h2>
                
                <!-- Subtitle -->
                <p class="text-gray-500 text-center text-sm mb-8">
                    We are currently processing your request to join
                </p>

                <!-- Status Box -->
                <div class="bg-red-50 border border-red-200 rounded-xl p-6 mb-8">
                    <!-- Status Icon -->
                    <div class="flex justify-center mb-4">
                        <div class="w-12 h-12 bg-red-500 rounded-full flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </div>
                    </div>

                    <!-- Status Text -->
                    <div class="text-center">
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Rejected</h3>
                        <p class="text-gray-600 text-sm mb-6">
                            Your request to join this company is being<br>
                            rejected by the administrator
                        </p>

                        <!-- Company Info -->
                        <div class="bg-white bg-opacity-50 rounded-lg p-4">
                            <div class="text-gray-900 font-medium">PT. Teknologi Nusantara</div>
                            <div class="text-gray-500 text-xs mt-1">Code: TEKNUSARA</div>
                        </div>
                    </div>
                </div>

                <!-- Back Link -->
                <div class="text-center">
                    <a href="{{ route('company.registration') }}" class="inline-flex items-center text-purple-600 hover:text-purple-700 text-sm font-medium transition-colors duration-200">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Registration to another Company Dashboard
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>