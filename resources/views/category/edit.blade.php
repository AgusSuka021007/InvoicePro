@extends ('layouts.adminnavbar')

@section ('Title', 'Edit Category')
@section ('pageTitle', 'Edit Category')

@section ('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Category</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="min-h-screen bg-gradient-to-br from-indigo-500 via-purple-500 to-purple-600 flex items-center justify-center p-4">
        <div class="w-full max-w-md">
            <!-- Modal Card -->
            <div class="bg-white rounded-2xl shadow-xl p-6 space-y-6">
                <!-- Header -->
                <div class="text-center">
                    <div class="flex items-center justify-center mb-4">
                        <svg class="w-5 h-5 text-gray-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        <span class="text-gray-600 font-medium">Back to Category</span>
                    </div>
                    <h2 class="text-xl font-semibold text-gray-800">Edit Category</h2>
                </div>

                <!-- Form -->
                <form class="space-y-4">
                    <!-- Category Name Field -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                            Category Name
                        </label>
                        <input 
                            type="text" 
                            id="name" 
                            name="name" 
                            placeholder="e.g. Category Name"
                            class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent outline-none transition-all duration-200"
                        >
                    </div>

                    <!-- Category Description Field -->
                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                            Category Description
                        </label>
                        <textarea 
                            id="description" 
                            name="description" 
                            rows="4" 
                            placeholder="e.g. Category description..."
                            class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent outline-none transition-all duration-200 resize-none"
                        ></textarea>
                    </div>

                    <!-- Action Buttons -->
                    <div class="space-y-3 pt-4">
                        <!-- Create Product Button -->
                        <button 
                            type="submit" 
                            class="w-full bg-gradient-to-r from-purple-500 to-indigo-600 text-white font-semibold py-3 px-6 rounded-xl hover:from-purple-600 hover:to-indigo-700 focus:ring-4 focus:ring-purple-300 transition-all duration-200 transform hover:scale-[1.02] active:scale-[0.98]"
                        >
                            Save Changes
                        </button>
                        
                        <!-- Cancel Button -->
                        <button 
                            type="button" 
                            class="w-full bg-gray-100 text-gray-700 font-medium py-3 px-6 rounded-xl hover:bg-gray-200 focus:ring-4 focus:ring-gray-300 transition-all duration-200"
                        >
                            Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
@endsection
</html>