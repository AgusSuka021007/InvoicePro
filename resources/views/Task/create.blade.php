@extends ('layouts.adminnavbar')

@section ('Title', 'Create Task')
@section ('pageTitle', 'Create Task')

@section ('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Task</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="min-h-screen bg-gradient-to-br from-indigo-500 via-purple-500 to-purple-600 flex items-center justify-center p-4">
        <!-- Top Bar -->
        <div class="absolute top-4 left-0 right-0 flex justify-between items-center px-6">
            <div class="flex items-center">
                <!-- Back Button -->
                <svg class="w-5 h-5 text-white mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                <span class="text-white font-medium">Create a New Task</span>
            </div>
            <div class="flex items-center space-x-4">
                <!-- Search Bar -->
                <div class="relative">
                    <input 
                        type="text" 
                        class="bg-white bg-opacity-20 backdrop-blur-sm border border-white border-opacity-30 rounded-full px-4 py-2 text-white placeholder-white placeholder-opacity-70 focus:outline-none focus:ring-2 focus:ring-white focus:ring-opacity-50 w-48"
                    >
                    <svg class="w-4 h-4 text-white text-opacity-70 absolute left-3 top-1/2 transform -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
                <!-- Profile Icon -->
                <div class="w-8 h-8 bg-orange-400 rounded-full flex items-center justify-center">
                    <span class="text-white font-semibold text-sm">👤</span>
                </div>
            </div>
        </div>

        <!-- Main Form Container -->
        <div class="w-full max-w-md mt-16">
            <!-- Modal Card -->
            <div class="bg-white rounded-2xl shadow-xl p-6 space-y-5">
                <!-- Header -->
                <div>
                    <h2 class="text-xl font-semibold text-gray-800 mb-6">Add New Task</h2>
                </div>

                <!-- Form -->
                <form class="space-y-4">
                    <!-- Task Title -->
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                            Task Title
                        </label>
                        <input 
                            type="text" 
                            id="title" 
                            name="title" 
                            class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent outline-none transition-all duration-200"
                        >
                    </div>

                    <!-- Task Description -->
                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                            Task Description
                        </label>
                        <textarea 
                            id="description" 
                            name="description" 
                            rows="3" 
                            placeholder="e.g. Task description..."
                            class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent outline-none transition-all duration-200 resize-none"
                        ></textarea>
                    </div>

                    <!-- Select Priority -->
                    <div>
                        <label for="priority" class="block text-sm font-medium text-gray-700 mb-2">
                            Select Priority
                        </label>
                        <div class="relative">
                            <select 
                                id="priority" 
                                name="priority" 
                                class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent outline-none transition-all duration-200 appearance-none bg-white"
                            >
                                <option value="">Select priority...</option>
                                <option value="high">High</option>
                                <option value="medium">Medium</option>
                                <option value="low">Low</option>
                            </select>
                            <svg class="w-4 h-4 text-gray-400 absolute right-3 top-1/2 transform -translate-y-1/2 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                    </div>

                    <!-- Select Status -->
                    <div>
                        <label for="status" class="block text-sm font-medium text-gray-700 mb-2">
                            Select Status
                        </label>
                        <div class="relative">
                            <select 
                                id="status" 
                                name="status" 
                                class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent outline-none transition-all duration-200 appearance-none bg-white"
                            >
                                <option value="">Select status...</option>
                                <option value="pending">Pending</option>
                                <option value="in-progress">In Progress</option>
                                <option value="completed">Completed</option>
                            </select>
                            <svg class="w-4 h-4 text-gray-400 absolute right-3 top-1/2 transform -translate-y-1/2 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                    </div>

                    <!-- Date Fields Row -->
                    <div class="grid grid-cols-2 gap-4">
                        <!-- Date Start -->
                        <div>
                            <label for="date_start" class="block text-sm font-medium text-gray-700 mb-2">
                                Date Start
                            </label>
                            <input 
                                type="date" 
                                id="date_start" 
                                name="date_start" 
                                class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent outline-none transition-all duration-200"
                            >
                        </div>

                        <!-- Deadline -->
                        <div>
                            <label for="deadline" class="block text-sm font-medium text-gray-700 mb-2">
                                Deadline
                            </label>
                            <input 
                                type="date" 
                                id="deadline" 
                                name="deadline" 
                                class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent outline-none transition-all duration-200"
                            >
                        </div>
                    </div>

                    <!-- Progress -->
                    <div>
                        <label for="progress" class="block text-sm font-medium text-gray-700 mb-2">
                            Progress (%)
                        </label>
                        <input 
                            type="number" 
                            id="progress" 
                            name="progress" 
                            min="0" 
                            max="100" 
                            placeholder="0"
                            class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent outline-none transition-all duration-200"
                        >
                    </div>

                    <!-- Action Buttons -->
                    <div class="space-y-3 pt-4">
                        <!-- Create Product Button -->
                        <button 
                            type="submit" 
                            class="w-full bg-gradient-to-r from-purple-500 to-indigo-600 text-white font-semibold py-3 px-6 rounded-lg hover:from-purple-600 hover:to-indigo-700 focus:ring-4 focus:ring-purple-300 transition-all duration-200 transform hover:scale-[1.02] active:scale-[0.98]"
                        >
                            Create Task
                        </button>
                        
                        <!-- Cancel Button -->
                        <a href="{{ route('task') }}"
                            type="button" 
                            class="w-full bg-gray-100 text-gray-700 font-medium py-3 px-6 rounded-lg hover:bg-gray-200 focus:ring-4 focus:ring-gray-300 transition-all duration-200"
                        >
                            Cancel
                    </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
@endsection
</html>