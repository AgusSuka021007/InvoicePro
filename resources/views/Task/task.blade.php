@extends ('layouts.adminnavbar')

@section ('Title', 'Task')
@section ('pageTitle', 'Task')

@section ('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
    <!-- Main Container -->
    <div class="min-h-screen">
        <!-- Header Section with Purple Gradient -->
        <div class="bg-gradient-to-r from-indigo-500 to-purple-600 px-6 pt-12 pb-8">
            <!-- Top Bar -->
            <div class="flex justify-between items-center mb-8">
                <h1 class="text-white text-2xl font-bold">Task</h1>
                <div class="flex items-center space-x-4">
                    <!-- Search Bar -->
                    <div class="relative">
                        <input 
                            type="text" 
                            placeholder="Search..."
                            class="bg-white bg-opacity-20 backdrop-blur-sm border border-white border-opacity-30 rounded-full px-4 py-2 pr-10 text-white placeholder-white placeholder-opacity-70 focus:outline-none focus:ring-2 focus:ring-white focus:ring-opacity-50"
                        >
                        <svg class="w-5 h-5 text-white text-opacity-70 absolute right-3 top-1/2 transform -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <!-- Profile Icon -->
                    <div class="w-8 h-8 bg-orange-400 rounded-full flex items-center justify-center">
                        <span class="text-white font-semibold text-sm">👤</span>
                    </div>
                </div>
            </div>

            <!-- Task Stats Cards -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <!-- Total Tasks -->
                <div class="bg-white rounded-xl p-4 shadow-sm">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-gray-100 rounded-lg flex items-center justify-center">
                            <span class="text-xl">📋</span>
                        </div>
                        <div>
                            <p class="text-gray-500 text-sm">Total Tasks</p>
                            <p class="font-semibold text-gray-800">0</p>
                        </div>
                    </div>
                </div>

                <!-- Completed Tasks -->
                <div class="bg-white rounded-xl p-4 shadow-sm">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                            <span class="text-xl">✅</span>
                        </div>
                        <div>
                            <p class="text-gray-500 text-sm">Completed Tasks</p>
                            <p class="font-semibold text-gray-800">0</p>
                        </div>
                    </div>
                </div>

                <!-- Overdue Tasks -->
                <div class="bg-white rounded-xl p-4 shadow-sm">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-yellow-100 rounded-lg flex items-center justify-center">
                            <span class="text-xl">⚠️</span>
                        </div>
                        <div>
                            <p class="text-gray-500 text-sm">Overdue Tasks</p>
                            <p class="font-semibold text-gray-800">0</p>
                        </div>
                    </div>
                </div>

                <!-- Pending Tasks -->
                <div class="bg-white rounded-xl p-4 shadow-sm">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center">
                            <span class="text-xl">⏳</span>
                        </div>
                        <div>
                            <p class="text-gray-500 text-sm">Pending Tasks</p>
                            <p class="font-semibold text-gray-800">0</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Section -->
        <div class="px-6 py-6">
            <!-- Filter Section -->
            <div class="flex flex-wrap items-center gap-4 mb-8">
                <!-- Add New Task Button -->
                <a href="{{ route('task.create') }}" class="bg-gradient-to-r from-purple-500 to-indigo-600 text-white px-4 py-2 rounded-lg font-medium hover:from-purple-600 hover:to-indigo-700 transition-all duration-200 flex items-center space-x-2">
                    <span class="text-lg">+</span>
                    <span>Add New Task</span>
                </a>

                <!-- Priority Filter -->
                <div class="relative">
                    <select class="appearance-none bg-white border border-gray-200 rounded-lg px-4 py-2 pr-8 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                        <option>All Priority</option>
                        <option>High</option>
                        <option>Medium</option>
                        <option>Low</option>
                    </select>
                    <svg class="w-4 h-4 text-gray-400 absolute right-2 top-1/2 transform -translate-y-1/2 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </div>

                <!-- Status Filter -->
                <div class="relative">
                    <select class="appearance-none bg-white border border-gray-200 rounded-lg px-4 py-2 pr-8 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                        <option>All Status</option>
                        <option>Completed</option>
                        <option>Pending</option>
                        <option>Overdue</option>
                    </select>
                    <svg class="w-4 h-4 text-gray-400 absolute right-2 top-1/2 transform -translate-y-1/2 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </div>
            </div>

            <!-- Empty State -->
            <div class="flex flex-col items-center justify-center py-16">
                <div class="text-center">
                    <p class="text-purple-400 text-lg mb-6">There is no Task Available Create one</p>
                    <a href="{{ route('task.create') }}" class="bg-gradient-to-r from-purple-500 to-indigo-600 text-white px-6 py-3 rounded-xl font-medium hover:from-purple-600 hover:to-indigo-700 transition-all duration-200 transform hover:scale-105">
                        Create Your First Task
                    </a>
                </div>
            </div>
        </div>

        <!-- Bottom Purple Section -->
        <div class="fixed bottom-0 left-0 right-0 h-20 bg-gradient-to-r from-indigo-500 to-purple-600"></div>
    </div>
    
</body>
@endsection
</html>