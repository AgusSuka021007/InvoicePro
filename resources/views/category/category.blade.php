@extends ('layouts.adminnavbar')

@section ('Title', 'Category')
@section ('pageTitle', 'Category')

@section ('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Category</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    @section ('content')
<div class="min-h-screen bg-gradient-to-br from-purple-500 to-purple-600 p-6">
    <!-- Statistics Cards Row -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <!-- Total Categories Card -->
        <div class="bg-white rounded-2xl shadow-lg p-6">
            <div class="flex items-center">
                <div class="w-12 h-12 bg-orange-100 rounded-xl flex items-center justify-center mr-4">
                    <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                    </svg>
                </div>
                <div>
                    <div class="text-3xl font-bold text-purple-600 mb-1">4</div>
                    <div class="text-gray-600 font-medium text-sm">Total Categories</div>
                    <div class="text-green-500 text-xs font-medium flex items-center mt-1">
                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
                        </svg>
                        +12% from last month
                    </div>
                </div>
            </div>
        </div>

        <!-- Active Categories Card -->
        <div class="bg-white rounded-2xl shadow-lg p-6">
            <div class="flex items-center">
                <div class="w-12 h-12 bg-orange-100 rounded-xl flex items-center justify-center mr-4">
                    <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div>
                    <div class="text-3xl font-bold text-purple-600 mb-1">4</div>
                    <div class="text-gray-600 font-medium text-sm">Active Categories</div>
                    <div class="text-green-500 text-xs font-medium flex items-center mt-1">
                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
                        </svg>
                        +12% from last month
                    </div>
                </div>
            </div>
        </div>

        <!-- Category Usage Rate Card -->
        <div class="bg-white rounded-2xl shadow-lg p-6">
            <div class="flex items-center">
                <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center mr-4">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
                <div>
                    <div class="text-3xl font-bold text-purple-600 mb-1">98</div>
                    <div class="text-gray-600 font-medium text-sm">Usage Rate (%)</div>
                    <div class="text-green-500 text-xs font-medium flex items-center mt-1">
                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
                        </svg>
                        91% availability rate
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content Container -->
    <div class="bg-white rounded-3xl shadow-xl min-h-96 p-8">
        <!-- Header Section with Add Button and Filter -->
        <div class="flex justify-between items-center mb-8">
            <a href="{{ route('category.create') }}" class="bg-purple-600 hover:bg-purple-700 text-white px-6 py-3 rounded-xl font-medium shadow-lg hover:shadow-xl transition-all duration-200 transform hover:scale-105 flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                Add New Category
                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </a>
            
            <button class="text-gray-500 hover:text-gray-700 px-4 py-2 rounded-lg border border-gray-200 hover:border-gray-300 transition-colors duration-200 flex items-center">
                Filter
                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </button>
        </div>

        <!-- Empty State -->
        <div class="flex flex-col items-center justify-center py-16">
            <!-- 3D Box Icon with Purple Circle Background -->
            <div class="w-32 h-32 bg-gradient-to-br from-purple-400 to-purple-500 rounded-full flex items-center justify-center mb-8 shadow-lg">
                <svg class="w-16 h-16 text-white" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2L2 7V17L12 22L22 17V7L12 2M12 4.15L18.09 7L12 9.85L5.91 7L12 4.15M4 8.83L11 12.17V19.85L4 16.5V8.83M13 19.85V12.17L20 8.83V16.5L13 19.85Z"/>
                </svg>
            </div>
            
            <h3 class="text-xl text-purple-600 font-semibold mb-3">
                There is no Category Available Create one
            </h3>
            
            <p class="text-gray-500 mb-8 text-center max-w-md">
                Get started by creating your first Category
            </p>
            
            <button class="bg-purple-600 hover:bg-purple-700 text-white px-8 py-4 rounded-xl font-medium shadow-lg hover:shadow-xl transition-all duration-200 transform hover:scale-105 flex items-center">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                Create Your First Category
                <svg class="w-4 h-4 ml-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </button>
        </div>
    </div>

    <!-- Floating Action Button -->
    <div class="fixed bottom-8 right-8">
        <button class="bg-purple-600 hover:bg-purple-700 text-white w-14 h-14 rounded-full shadow-lg hover:shadow-xl transition-all duration-200 transform hover:scale-110 flex items-center justify-center">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
            </svg>
        </button>
    </div>
</div>
@endsection
</body>
</html>