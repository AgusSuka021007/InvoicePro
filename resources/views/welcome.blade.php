<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel + Tailwind</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gradient-to-br from-blue-50 to-indigo-100 min-h-screen">
    <div class="container mx-auto px-4 py-16">
        <div class="max-w-2xl mx-auto text-center">
            <h1 class="text-5xl font-bold text-gray-800 mb-6">
                InvoicePro
            </h1>
            <p class="text-xl text-gray-600 mb-8">
                Laravel + Tailwind CSS Setup Berhasil! 🎉
            </p>
            <div class="bg-white rounded-xl shadow-lg p-8">
                <h2 class="text-2xl font-semibold text-gray-700 mb-4">
                    Ready to Build!
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <button class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-3 px-6 rounded-lg transition duration-200">
                        Get Started
                    </button>
                    <button class="bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold py-3 px-6 rounded-lg transition duration-200">
                        Learn More
                    </button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>