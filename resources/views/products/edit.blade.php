@extends('layouts.adminnavbar')

@section('title', 'Edit Product')
@section('page-title', 'Edit Product')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', sans-serif;
        }
        .dropdown-arrow {
            transition: transform 0.2s ease;
        }
        .dropdown-arrow.open {
            transform: rotate(180deg);
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
                    <h1 class="text-white text-xl font-medium">Edit Product</h1>
                </div>
            </div>

            <!-- Form Card -->
            <div class="bg-white rounded-3xl p-8 shadow-xl">
                <h2 class="text-blue-600 text-2xl font-semibold mb-8 text-center">Edit Product</h2>
                
                <form id="productForm" onsubmit="handleSubmit(event)">
                    <!-- Product Image Field -->
                    <div class="mb-6">
                        <label class="block text-gray-700 font-medium mb-2">
                            Product Image
                        </label>
                        <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center bg-gray-50 hover:bg-gray-100 transition-colors cursor-pointer" 
                             onclick="document.getElementById('imageInput').click()"
                             ondragover="handleDragOver(event)"
                             ondrop="handleDrop(event)">
                            <div id="imagePreview" class="hidden">
                                <img id="previewImg" src="" alt="Preview" class="max-w-full max-h-32 mx-auto rounded-lg mb-2">
                                <p class="text-sm text-gray-500">Click to change image</p>
                            </div>
                            <div id="uploadPlaceholder">
                                <svg class="w-12 h-12 text-gray-400 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                </svg>
                                <p class="text-gray-500 mb-2">Drag or Upload Image here!</p>
                                <button type="button" class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-4 py-2 rounded-lg text-sm font-medium transition-colors">
                                    Upload File
                                </button>
                            </div>
                        </div>
                        <input type="file" id="imageInput" name="productImage" accept="image/*" class="hidden" onchange="handleImageUpload(event)">
                        <span class="error-message text-red-500 text-sm hidden block mt-1"></span>
                    </div>

                    <!-- Product Name Field -->
                    <div class="mb-6">
                        <label for="productName" class="block text-gray-700 font-medium mb-2">
                            Product Name
                        </label>
                        <input 
                            type="text" 
                            id="productName" 
                            name="productName" 
                            class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all duration-200 bg-gray-50"
                            placeholder="Enter Product Name"
                            required
                        >
                        <span class="error-message text-red-500 text-sm hidden block mt-1"></span>
                    </div>

                    <!-- Product Description Field -->
                    <div class="mb-6">
                        <label for="productDescription" class="block text-gray-700 font-medium mb-2">
                            Product Description
                        </label>
                        <textarea 
                            id="productDescription" 
                            name="productDescription" 
                            rows="4"
                            class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all duration-200 bg-gray-50 resize-none"
                            placeholder="Enter Product Description"
                            required
                        ></textarea>
                        <span class="error-message text-red-500 text-sm hidden block mt-1"></span>
                    </div>

                    <!-- Product Price Field -->
                    <div class="mb-6">
                        <label for="productPrice" class="block text-gray-700 font-medium mb-2">
                            Product Price ($)
                        </label>
                        <div class="relative">
                            <span class="absolute left-4 top-3 text-gray-500 text-lg">$</span>
                            <input 
                                type="number" 
                                id="productPrice" 
                                name="productPrice" 
                                step="0.01"
                                min="0"
                                class="w-full pl-8 pr-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all duration-200 bg-gray-50"
                                placeholder="Enter Product Price"
                                required
                            >
                        </div>
                        <span class="error-message text-red-500 text-sm hidden block mt-1"></span>
                    </div>

                    <!-- Category Field -->
                    <div class="mb-8">
                        <label for="category" class="block text-gray-700 font-medium mb-2">
                            Category
                        </label>
                        <div class="relative">
                            <button 
                                type="button" 
                                id="categoryDropdown"
                                onclick="toggleDropdown()"
                                class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all duration-200 bg-gray-50 text-left flex justify-between items-center"
                            >
                                <span id="selectedCategory" class="text-gray-400">All Categories</span>
                                <svg class="w-5 h-5 text-gray-400 dropdown-arrow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            
                            <div id="categoryOptions" class="absolute z-10 w-full mt-1 bg-white border border-gray-200 rounded-lg shadow-lg hidden max-h-60 overflow-y-auto">
                                <div class="category-option px-4 py-3 hover:bg-gray-100 cursor-pointer transition-colors" data-value="">
                                    All Categories
                                </div>
                                <div class="category-option px-4 py-3 hover:bg-gray-100 cursor-pointer transition-colors" data-value="electronics">
                                    Electronics
                                </div>
                                <div class="category-option px-4 py-3 hover:bg-gray-100 cursor-pointer transition-colors" data-value="clothing">
                                    Clothing & Fashion
                                </div>
                                <div class="category-option px-4 py-3 hover:bg-gray-100 cursor-pointer transition-colors" data-value="home">
                                    Home & Garden
                                </div>
                                <div class="category-option px-4 py-3 hover:bg-gray-100 cursor-pointer transition-colors" data-value="books">
                                    Books & Media
                                </div>
                                <div class="category-option px-4 py-3 hover:bg-gray-100 cursor-pointer transition-colors" data-value="sports">
                                    Sports & Outdoors
                                </div>
                                <div class="category-option px-4 py-3 hover:bg-gray-100 cursor-pointer transition-colors" data-value="toys">
                                    Toys & Games
                                </div>
                                <div class="category-option px-4 py-3 hover:bg-gray-100 cursor-pointer transition-colors" data-value="health">
                                    Health & Beauty
                                </div>
                                <div class="category-option px-4 py-3 hover:bg-gray-100 cursor-pointer transition-colors" data-value="automotive">
                                    Automotive
                                </div>
                            </div>
                        </div>
                        <input type="hidden" id="categoryValue" name="category" value="">
                        <span class="error-message text-red-500 text-sm hidden block mt-1"></span>
                    </div>

                    <!-- Action Buttons -->
                    <div class="space-y-3">
                        <button 
                            type="submit" 
                            id="createBtn"
                            class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-4 rounded-lg transition-all duration-200 transform hover:scale-[1.02] active:scale-[0.98] focus:ring-4 focus:ring-blue-300"
                        >
                            <span id="btnText">Edit Product</span>
                            <span id="btnLoader" class="hidden">
                                <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white inline" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                                Saving....
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
            <h3 class="text-lg font-medium text-gray-900 text-center mb-2">Edit Product Successfully!</h3>
            <p class="text-sm text-gray-500 text-center mb-6">The product has been Saved.</p>
            <div class="flex space-x-3">
                <button onclick="createAnother()" class="flex-1 bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-md transition-colors">
                    Create New Product
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
        // Product data storage
        let products = JSON.parse(localStorage.getItem('products') || '[]');
        let uploadedImage = null;

        // Dropdown functionality
        function toggleDropdown() {
            const dropdown = document.getElementById('categoryOptions');
            const arrow = document.querySelector('.dropdown-arrow');
            
            if (dropdown.classList.contains('hidden')) {
                dropdown.classList.remove('hidden');
                arrow.classList.add('open');
            } else {
                dropdown.classList.add('hidden');
                arrow.classList.remove('open');
            }
        }

        // Close dropdown when clicking outside
        document.addEventListener('click', function(event) {
            const dropdownButton = document.getElementById('categoryDropdown');
            const dropdown = document.getElementById('categoryOptions');
            
            if (!dropdownButton.contains(event.target) && !dropdown.contains(event.target)) {
                dropdown.classList.add('hidden');
                document.querySelector('.dropdown-arrow').classList.remove('open');
            }
        });

        // Category selection
        document.addEventListener('DOMContentLoaded', function() {
            const categoryOptions = document.querySelectorAll('.category-option');
            categoryOptions.forEach(option => {
                option.addEventListener('click', function() {
                    const value = this.dataset.value;
                    const text = this.textContent;
                    
                    document.getElementById('selectedCategory').textContent = text;
                    document.getElementById('selectedCategory').classList.remove('text-gray-400');
                    document.getElementById('selectedCategory').classList.add('text-gray-700');
                    document.getElementById('categoryValue').value = value;
                    
                    toggleDropdown();
                });
            });
        });

        // Image upload functions
        function handleImageUpload(event) {
            const file = event.target.files[0];
            if (file) {
                processImageFile(file);
            }
        }

        function handleDragOver(event) {
            event.preventDefault();
            event.currentTarget.classList.add('border-blue-400', 'bg-blue-50');
        }

        function handleDrop(event) {
            event.preventDefault();
            event.currentTarget.classList.remove('border-blue-400', 'bg-blue-50');
            
            const files = event.dataTransfer.files;
            if (files.length > 0) {
                const file = files[0];
                if (file.type.startsWith('image/')) {
                    processImageFile(file);
                } else {
                    showErrorModal('Please upload only image files.');
                }
            }
        }

        function processImageFile(file) {
            // Validate file size (max 5MB)
            if (file.size > 5 * 1024 * 1024) {
                showErrorModal('File size must be less than 5MB.');
                return;
            }

            // Validate file type
            if (!file.type.startsWith('image/')) {
                showErrorModal('Please upload only image files.');
                return;
            }

            const reader = new FileReader();
            reader.onload = function(e) {
                uploadedImage = {
                    name: file.name,
                    size: file.size,
                    type: file.type,
                    data: e.target.result
                };
                
                document.getElementById('previewImg').src = e.target.result;
                document.getElementById('imagePreview').classList.remove('hidden');
                document.getElementById('uploadPlaceholder').classList.add('hidden');
            };
            reader.readAsDataURL(file);
        }

        function goBack() {
            if (hasUnsavedChanges()) {
                if (confirm('Are you sure you want to go back? Any unsaved changes will be lost.')) {
                    clearForm();
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
            const form = document.getElementById('productForm');
            const formData = new FormData(form);
            
            for (let [key, value] of formData.entries()) {
                if (value.trim() !== '') {
                    return true;
                }
            }
            
            return uploadedImage !== null || document.getElementById('categoryValue').value !== '';
        }

        function clearForm() {
            document.getElementById('productForm').reset();
            document.getElementById('categoryValue').value = '';
            document.getElementById('selectedCategory').textContent = 'All Categories';
            document.getElementById('selectedCategory').classList.add('text-gray-400');
            document.getElementById('selectedCategory').classList.remove('text-gray-700');
            
            // Reset image upload
            uploadedImage = null;
            document.getElementById('imagePreview').classList.add('hidden');
            document.getElementById('uploadPlaceholder').classList.remove('hidden');
            document.getElementById('imageInput').value = '';
            
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

            // Product Name validation
            const productName = document.getElementById('productName');
            if (productName.value.trim().length < 2) {
                showError('productName', 'Product name must be at least 2 characters long');
                isValid = false;
            }

            // Product Description validation
            const productDescription = document.getElementById('productDescription');
            if (productDescription.value.trim().length < 10) {
                showError('productDescription', 'Product description must be at least 10 characters long');
                isValid = false;
            }

            // Product Price validation
            const productPrice = document.getElementById('productPrice');
            const price = parseFloat(productPrice.value);
            if (isNaN(price) || price <= 0) {
                showError('productPrice', 'Please enter a valid price greater than 0');
                isValid = false;
            }

            // Category validation
            const category = document.getElementById('categoryValue');
            if (!category.value) {
                showError('categoryDropdown', 'Please select a category');
                isValid = false;
            }

            return isValid;
        }

        function showError(fieldId, message) {
            const field = document.getElementById(fieldId);
            let errorSpan;
            
            if (fieldId === 'categoryDropdown') {
                errorSpan = field.parentElement.nextElementSibling;
                field.classList.add('border-red-300', 'bg-red-50');
            } else {
                errorSpan = field.nextElementSibling;
                field.classList.add('border-red-300', 'bg-red-50');
            }
            
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

            const inputs = document.querySelectorAll('input, textarea, button#categoryDropdown');
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
                    const productData = {
                        id: Date.now(),
                        name: formData.get('productName'),
                        description: formData.get('productDescription'),
                        price: parseFloat(formData.get('productPrice')),
                        category: formData.get('category'),
                        image: uploadedImage,
                        createdAt: new Date().toISOString()
                    };

                    // Save to local storage
                    products.push(productData);
                    localStorage.setItem('products', JSON.stringify(products));

                    hideLoader();
                    showSuccessModal();
                    
                    console.log('Product created:', productData);
                } catch (error) {
                    hideLoader();
                    showErrorModal('Failed to create product. Please try again.');
                    console.error('Error:', error);
                }
            }, 1500);
        }

        // Real-time validation and effects
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

            // Price formatting
            document.getElementById('productPrice').addEventListener('input', function() {
                // Ensure only positive numbers
                if (this.value < 0) {
                    this.value = 0;
                }
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