@extends('layouts.adminnavbar')

@section('title', 'Customers')
@section('page-title', 'Customers')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customers Page - Invoice System</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes bounceIn {
            0% {
                opacity: 0;
                transform: scale(0.3);
            }
            50% {
                opacity: 0.9;
                transform: scale(1.05);
            }
            80% {
                opacity: 1;
                transform: scale(0.9);
            }
            100% {
                opacity: 1;
                transform: scale(1);
            }
        }
        
        .slide-up {
            animation: slideUp 0.6s ease-out forwards;
        }
        
        .bounce-in {
            animation: bounceIn 0.8s ease-out forwards;
        }
        
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        
        .glass-effect {
            backdrop-filter: blur(16px);
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .hover-lift {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .hover-lift:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        
        .pulse-ring {
            animation: pulse-ring 1.25s cubic-bezier(0.215, 0.61, 0.355, 1) infinite;
        }
        
        @keyframes pulse-ring {
            0% {
                transform: scale(0.33);
            }
            80%, 100% {
                opacity: 0;
            }
        }
    </style>
</head>
<body class="min-h-screen gradient-bg">
    <div class="min-h-screen p-4">
        <!-- Header -->
        <div class="flex items-center justify-between mb-6">
            <div class="flex items-center space-x-4">
                <!-- Close Button -->
                <button onclick="goBack()" class="w-12 h-12 glass-effect rounded-full flex items-center justify-center text-white hover:bg-white hover:bg-opacity-20 transition-all duration-300 hover:scale-110 group">
                    <svg class="w-6 h-6 transition-transform duration-300 group-hover:rotate-90" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
                
                <!-- Title -->
                <h1 class="text-3xl font-bold text-white slide-up">Customers</h1>
            </div>
            
            <!-- Search and Notification -->
            <div class="flex items-center space-x-4">
                <div class="relative slide-up" style="animation-delay: 0.2s;">
                    <input type="text" id="searchInput" placeholder="Search products..." 
                           class="w-64 px-4 py-2 bg-white bg-opacity-90 rounded-full border-0 focus:ring-4 focus:ring-white focus:ring-opacity-30 transition-all duration-300 focus:bg-opacity-100 focus:shadow-lg">
                    <svg class="absolute right-3 top-2.5 w-5 h-5 text-gray-400 transition-all duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
                
                <!-- Notification Bell -->
                <div class="relative slide-up" style="animation-delay: 0.3s;">
                    <button onclick="showNotification()" class="relative p-3 text-white glass-effect rounded-full transition-all duration-300 hover:scale-110 group">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 2C7.79086 2 6 3.79086 6 6V8C6 9.10457 5.10457 10 4 10H3C2.44772 10 2 10.4477 2 11V12C2 12.5523 2.44772 13 3 13H17C17.5523 13 18 12.5523 18 12V11C18 10.4477 17.5523 10 17 10H16C14.8954 10 14 9.10457 14 8V6C14 3.79086 12.2091 2 10 2Z"></path>
                            <path d="M8 15C8 16.1046 8.89543 17 10 17C11.1046 17 12 16.1046 12 15H8Z"></path>
                        </svg>
                        <span class="absolute -top-1 -right-1 w-3 h-3 bg-red-500 rounded-full animate-ping"></span>
                        <span class="absolute -top-1 -right-1 w-3 h-3 bg-red-500 rounded-full"></span>
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <!-- Total Customers Card -->
            <div class="bg-white rounded-2xl p-6 shadow-xl hover-lift group slide-up">
                <div class="flex items-center space-x-4">
                    <div class="w-16 h-16 bg-gradient-to-r from-orange-400 to-orange-500 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300 shadow-lg">
                        <span class="text-3xl">📦</span>
                    </div>
                    <div>
                        <div class="text-4xl font-bold text-indigo-600 counter" data-count="156">0</div>
                        <div class="text-gray-600 font-semibold text-lg">Total Customers</div>
                    </div>
                </div>
                <div class="mt-4 flex items-center text-sm text-green-600">
                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.293 9.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 7.414V15a1 1 0 11-2 0V7.414L6.707 9.707a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                    </svg>
                    <span class="font-medium">+12% from last month</span>
                </div>
            </div>

                        <!-- Active Customers Card -->
            <div class="bg-white rounded-2xl p-6 shadow-xl hover-lift group slide-up">
                <div class="flex items-center space-x-4">
                    <div class="w-16 h-16 bg-gradient-to-r from-orange-400 to-orange-500 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300 shadow-lg">
                        <span class="text-3xl">📦</span>
                    </div>
                    <div>
                        <div class="text-4xl font-bold text-indigo-600 counter" data-count="156">0</div>
                        <div class="text-gray-600 font-semibold text-lg">Active Customers</div>
                    </div>
                </div>
                <div class="mt-4 flex items-center text-sm text-green-600">
                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.293 9.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 7.414V15a1 1 0 11-2 0V7.414L6.707 9.707a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                    </svg>
                    <span class="font-medium">+12% from last month</span>
                </div>
            </div>
            
            <!-- In Stock Products Card -->
            <div class="bg-white rounded-2xl p-6 shadow-xl hover-lift group slide-up" style="animation-delay: 0.1s;">
                <div class="flex items-center space-x-4">
                    <div class="w-16 h-16 bg-gradient-to-r from-green-400 to-green-500 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300 shadow-lg">
                        <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <div>
                        <div class="text-4xl font-bold text-indigo-600 counter" data-count="142">0</div>
                        <div class="text-gray-600 font-semibold text-lg">Avg. Customer Value</div>
                    </div>
                </div>
                <div class="mt-4 flex items-center text-sm text-green-600">
                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.293 9.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 7.414V15a1 1 0 11-2 0V7.414L6.707 9.707a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                    </svg>
                    <span class="font-medium">91% availability rate</span>
                </div>
            </div>
        </div>
        
        <!-- Main Content Area -->
        <div class="bg-white rounded-2xl shadow-2xl min-h-96 slide-up" style="animation-delay: 0.2s;">
            <!-- Top Section -->
            <div class="p-6 border-b border-gray-100">
                <div class="flex items-center justify-between">
                    <button onclick="openCustomerModal()" class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-xl font-semibold transition-all duration-300 hover:scale-105 shadow-lg hover:shadow-xl flex items-center space-x-2 group">
                        <span class="text-lg">📋</span>
                        <span>Add New Customer</span>
                        <svg class="w-4 h-4 transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </button>
                    
                    <!-- Filter Dropdown -->
                    <div class="relative">
                        <button onclick="toggleFilter()" class="flex items-center space-x-2 text-gray-600 hover:text-gray-800 px-4 py-2 rounded-lg hover:bg-gray-100 transition-all duration-200" id="filterButton">
                            <span>Filter</span>
                            <svg class="w-4 h-4 transition-transform duration-200" id="filterIcon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div id="filterDropdown" class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg border z-10 opacity-0 pointer-events-none transform scale-95 transition-all duration-200">
                            <div class="py-2">
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition-colors duration-150">All Products</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition-colors duration-150">In Stock</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition-colors duration-150">Low Stock</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition-colors duration-150">Out of Stock</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Products List or Empty State -->
            <div id="productsContainer" class="p-6">
                <!-- Empty State -->
                <div id="emptyState" class="flex flex-col items-center justify-center py-20 px-6">
                    <div class="w-32 h-32 bg-gradient-to-r from-indigo-400 to-purple-500 rounded-full flex items-center justify-center mb-8 bounce-in shadow-2xl">
                        <span class="text-6xl">📦</span>
                    </div>
                    <h3 class="text-2xl font-bold text-indigo-600 mb-4 slide-up" style="animation-delay: 0.3s;">There is no Customer Available Create one</h3>
                    <p class="text-gray-500 mb-8 text-center max-w-md slide-up" style="animation-delay: 0.4s;">Get started by creating your first Customer</p>
                    <button onclick="openProductModal()" class="bg-indigo-600 hover:bg-indigo-700 text-white px-8 py-4 rounded-xl font-semibold transition-all duration-300 hover:scale-105 shadow-lg hover:shadow-xl flex items-center space-x-3 group slide-up" style="animation-delay: 0.5s;">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        <span>Create Your First Customer</span>
                        <svg class="w-4 h-4 transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </button>
                </div>
                
                <!-- Products Table (Initially Hidden) -->
                <div id="productsTable" class="hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr class="border-b-2 border-gray-200">
                                    <th class="text-left py-4 px-6 font-bold text-gray-700 text-lg">Product Name</th>
                                    <th class="text-left py-4 px-6 font-bold text-gray-700 text-lg">SKU</th>
                                    <th class="text-left py-4 px-6 font-bold text-gray-700 text-lg">Price</th>
                                    <th class="text-left py-4 px-6 font-bold text-gray-700 text-lg">Stock</th>
                                    <th class="text-left py-4 px-6 font-bold text-gray-700 text-lg">Status</th>
                                    <th class="text-left py-4 px-6 font-bold text-gray-700 text-lg">Actions</th>
                                </tr>
                            </thead>
                            <tbody id="productsTableBody">
                                <!-- Products will be inserted here -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Add New Customer Modal -->
    <div id="customerModal" class="fixed inset-0 bg-black bg-opacity-60 z-50 flex items-center justify-center opacity-0 pointer-events-none transition-all duration-300">
        <div class="bg-white rounded-2xl p-8 max-w-md w-full mx-4 transform scale-95 transition-all duration-300 shadow-2xl">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-2xl font-bold text-gray-800 flex items-center space-x-2">
                    <span class="text-2xl">👤</span>
                    <span>Add New Customer</span>
                </h3>
                <button onclick="closeCustomerModal()" class="text-gray-400 hover:text-gray-600 transition-all duration-200 hover:scale-110">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            
            <form id="customerForm" class="space-y-4">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Full Name</label>
                    <input type="text" id="customerName" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-200">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Email Address</label>
                    <input type="email" id="customerEmail" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-200">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Phone Number</label>
                    <input type="tel" id="customerPhone" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-200">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Address</label>
                    <input type="tel" id="customerPhone" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-200">
                </div>
                <div class="flex justify-end space-x-3 pt-6">
                    <button type="button" onclick="closeCustomerModal()" class="px-6 py-2 text-gray-600 hover:text-gray-800 transition-colors duration-200 font-medium">Cancel</button>
                    <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white px-8 py-3 rounded-lg font-semibold transition-all duration-200 hover:scale-105 shadow-md hover:shadow-lg">Save Customer</button>
                </div>
            </form>
        </div>
    </div>
    
    <!-- Create Product Modal -->
    <div id="productModal" class="fixed inset-0 bg-black bg-opacity-60 z-50 flex items-center justify-center opacity-0 pointer-events-none transition-all duration-300">
        <div class="bg-white rounded-2xl p-8 max-w-md w-full mx-4 transform scale-95 transition-all duration-300 shadow-2xl">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-2xl font-bold text-gray-800 flex items-center space-x-2">
                    <span class="text-2xl">🛍️</span>
                    <span>Create New Product</span>
                </h3>
                <button onclick="closeProductModal()" class="text-gray-400 hover:text-gray-600 transition-all duration-200 hover:scale-110">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            
            <form id="productForm" class="space-y-4">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Product Name</label>
                    <input type="text" id="productName" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-200">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">SKU</label>
                    <input type="text" id="productSku" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-200">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Price (IDR)</label>
                    <input type="number" id="productPrice" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-200">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Stock Quantity</label>
                    <input type="number" id="productStock" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-200">
                </div>
                <div class="flex justify-end space-x-3 pt-6">
                    <button type="button" onclick="closeProductModal()" class="px-6 py-2 text-gray-600 hover:text-gray-800 transition-colors duration-200 font-medium">Cancel</button>
                    <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white px-8 py-3 rounded-lg font-semibold transition-all duration-200 hover:scale-105 shadow-md hover:shadow-lg">Create Product</button>
                </div>
            </form>
        </div>
    </div>
    
    <!-- Toast Notification -->
    <div id="toast" class="fixed top-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg transform translate-x-full transition-all duration-300 z-50">
        <div class="flex items-center space-x-2">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
            </svg>
            <span id="toastMessage">Success!</span>
        </div>
    </div>

    <script>
        // Sample products data
        let products = [];
        let customers = [];
        
        // Counter Animation
        function animateCounter(element) {
            const target = parseInt(element.getAttribute('data-count'));
            let current = 0;
            const increment = target / 60;
            const timer = setInterval(() => {
                current += increment;
                if (current >= target) {
                    current = target;
                    clearInterval(timer);
                }
                element.textContent = Math.floor(current);
            }, 30);
        }
        
        // Initialize counters
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(() => {
                const counters = document.querySelectorAll('.counter');
                counters.forEach(counter => {
                    animateCounter(counter);
                });
            }, 800);
        });
        
        // Modal Functions
        function openCustomerModal() {
            const modal = document.getElementById('customerModal');
            modal.classList.remove('opacity-0', 'pointer-events-none');
            setTimeout(() => {
                modal.querySelector('div').classList.remove('scale-95');
                modal.querySelector('div').classList.add('scale-100');
            }, 10);
        }
        
        function closeCustomerModal() {
            const modal = document.getElementById('customerModal');
            modal.querySelector('div').classList.remove('scale-100');
            modal.querySelector('div').classList.add('scale-95');
            setTimeout(() => {
                modal.classList.add('opacity-0', 'pointer-events-none');
            }, 200);
        }
        
        function openProductModal() {
            const modal = document.getElementById('productModal');
            modal.classList.remove('opacity-0', 'pointer-events-none');
            setTimeout(() => {
                modal.querySelector('div').classList.remove('scale-95');
                modal.querySelector('div').classList.add('scale-100');
            }, 10);
        }
        
        function closeProductModal() {
            const modal = document.getElementById('productModal');
            modal.querySelector('div').classList.remove('scale-100');
            modal.querySelector('div').classList.add('scale-95');
            setTimeout(() => {
                modal.classList.add('opacity-0', 'pointer-events-none');
            }, 200);
        }
        
        // Filter dropdown
        function toggleFilter() {
            const dropdown = document.getElementById('filterDropdown');
            const icon = document.getElementById('filterIcon');
            
            if (dropdown.classList.contains('opacity-0')) {
                dropdown.classList.remove('opacity-0', 'pointer-events-none', 'scale-95');
                dropdown.classList.add('opacity-100', 'pointer-events-auto', 'scale-100');
                icon.style.transform = 'rotate(180deg)';
            } else {
                dropdown.classList.add('opacity-0', 'pointer-events-none', 'scale-95');
                dropdown.classList.remove('opacity-100', 'pointer-events-auto', 'scale-100');
                icon.style.transform = 'rotate(0deg)';
            }
        }
        
        // Close dropdowns when clicking outside
        document.addEventListener('click', function(e) {
            const filterButton = document.getElementById('filterButton');
            const filterDropdown = document.getElementById('filterDropdown');
            
            if (!filterButton.contains(e.target) && !filterDropdown.contains(e.target)) {
                filterDropdown.classList.add('opacity-0', 'pointer-events-none', 'scale-95');
                filterDropdown.classList.remove('opacity-100', 'pointer-events-auto', 'scale-100');
                document.getElementById('filterIcon').style.transform = 'rotate(0deg)';
            }
        });
        
        // Form submissions
        document.getElementById('customerForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const name = document.getElementById('customerName').value;
            const email = document.getElementById('customerEmail').value;
            const phone = document.getElementById('customerPhone').value;
            
            customers.push({
                id: customers.length + 1,
                name: name,
                email: email,
                phone: phone,
                createdAt: new Date()
            });
            
            showToast('Customer added successfully! 👤', 'success');
            closeCustomerModal();
            
            // Reset form
            this.reset();
        });
        
        document.getElementById('productForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const name = document.getElementById('productName').value;
            const sku = document.getElementById('productSku').value;
            const price = parseFloat(document.getElementById('productPrice').value);
            const stock = parseInt(document.getElementById('productStock').value);
            
            products.push({
                id: products.length + 1,
                name: name,
                sku: sku,
                price: price,
                stock: stock,
                createdAt: new Date()
            });
            
            showToast('Product created successfully! 🛍️', 'success');
            closeProductModal();
            
            // Update UI
            renderProducts();
            updateStats();
            
            // Reset form
            this.reset();
        });
        
        // Render products
        function renderProducts() {
            const emptyState = document.getElementById('emptyState');
            const productsTable = document.getElementById('productsTable');
            const tableBody = document.getElementById('productsTableBody');
            
            if (products.length === 0) {
                emptyState.style.display = 'flex';
                productsTable.style.display = 'none';
            } else {
                emptyState.style.display = 'none';
                productsTable.style.display = 'block';
                
                tableBody.innerHTML = products.map(product => `
                    <tr class="border-b border-gray-100 hover:bg-gray-50 transition-all duration-200">
                        <td class="py-4 px-6 font-medium">${product.name}</td>
                        <td class="py-4 px-6 text-gray-600">${product.sku}</td>
                        <td class="py-4 px-6 font-semibold text-green-600">Rp ${product.price.toLocaleString('id-ID')}</td>
                        <td class="py-4 px-6">${product.stock}</td>
                        <td class="py-4 px-6">
                            <span class="px-3 py-1 rounded-full text-xs font-medium ${
                                product.stock > 10 ? 'bg-green-100 text-green-800' : 
                                product.stock > 0 ? 'bg-yellow-100 text-yellow-800' : 
                                'bg-red-100 text-red-800'
                            }">
                                ${product.stock > 10 ? '✅ In Stock' : product.stock > 0 ? '⚠️ Low Stock' : '❌ Out of Stock'}
                            </span>
                        </td>
                        <td class="py-4 px-6">
                            <div class="flex space-x-2">
                                <button onclick="editProduct(${product.id})" class="text-blue-600 hover:text-blue-800 transition-colors duration-150 font-medium">✏️ Edit</button>
                                <button onclick="deleteProduct(${product.id})" class="text-red-600 hover:text-red-800 transition-colors duration-150 font-medium">🗑️ Delete</button>
                            </div>
                        </td>
                    </tr>
                `).join('');
            }
        }
        
        // Update stats
        function updateStats() {
            const totalProductsEl = document.querySelector('[data-count="156"]');
            const inStockProductsEl = document.querySelector('[data-count="142"]');
            
            const totalProducts = products.length;
            const inStockProducts = products.filter(p => p.stock > 0).length;
            
            totalProductsEl.setAttribute('data-count', totalProducts);
            inStockProductsEl.setAttribute('data-count', inStockProducts);
            
            animateCounter(totalProductsEl);
            animateCounter(inStockProductsEl);
        }
        
        // Edit product
        function editProduct(id) {
            const product = products.find(p => p.id === id);
            if (product) {
                document.getElementById('productName').value = product.name;
                document.getElementById('productSku').value = product.sku;
                document.getElementById('productPrice').value = product.price;
                document.getElementById('productStock').value = product.stock;
                
                openProductModal();
                
                // Change form submission behavior for editing
                const form = document.getElementById('productForm');
                form.onsubmit = function(e) {
                    e.preventDefault();
                    
                    product.name = document.getElementById('productName').value;
                    product.sku = document.getElementById('productSku').value;
                    product.price = parseFloat(document.getElementById('productPrice').value);
                    product.stock = parseInt(document.getElementById('productStock').value);
                    
                    showToast('Product updated successfully! ✨', 'success');
                    closeProductModal();
                    renderProducts();
                    updateStats();
                    
                    // Reset form behavior
                    form.onsubmit = null;
                    form.reset();
                };
            }
        }
        
        // Delete product
        function deleteProduct(id) {
            if (confirm('Are you sure you want to delete this product? 🤔')) {
                products = products.filter(p => p.id !== id);
                showToast('Product deleted successfully! 🗑️', 'error');
                renderProducts();
                updateStats();
            }
        }
        
        // Toast notification
        function showToast(message, type = 'success') {
            const toast = document.getElementById('toast');
            const toastMessage = document.getElementById('toastMessage');
            
            toastMessage.textContent = message;
            
            // Set color based on type
            toast.className = `fixed top-4 right-4 px-6 py-3 rounded-lg shadow-lg transform transition-all duration-300 z-50 ${
                type === 'success' ? 'bg-green-500 text-white' : 
                type === 'error' ? 'bg-red-500 text-white' : 
                'bg-blue-500 text-white'
            }`;
            
            // Show toast
            toast.classList.remove('translate-x-full');
            
            // Hide toast after 3 seconds
            setTimeout(() => {
                toast.classList.add('translate-x-full');
            }, 3000);
        }
        
        // Search functionality
        document.getElementById('searchInput').addEventListener('input', function(e) {
            const query = e.target.value.toLowerCase();
            const filteredProducts = products.filter(product => 
                product.name.toLowerCase().includes(query) || 
                product.sku.toLowerCase().includes(query)
            );
            
            if (query === '') {
                renderProducts();
            } else {
                renderFilteredProducts(filteredProducts);
            }
        });
        
        function renderFilteredProducts(filteredProducts) {
            const emptyState = document.getElementById('emptyState');
            const productsTable = document.getElementById('productsTable');
            const tableBody = document.getElementById('productsTableBody');
            
            if (filteredProducts.length === 0) {
                emptyState.innerHTML = `
                    <div class="flex flex-col items-center justify-center py-20 px-6">
                        <div class="w-32 h-32 bg-gradient-to-r from-gray-400 to-gray-500 rounded-full flex items-center justify-center mb-8 shadow-2xl">
                            <span class="text-6xl">🔍</span>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-600 mb-4">No products found</h3>
                        <p class="text-gray-500 text-center max-w-md">Try adjusting your search terms or add new products.</p>
                    </div>
                `;
                emptyState.style.display = 'flex';
                productsTable.style.display = 'none';
            } else {
                emptyState.style.display = 'none';
                productsTable.style.display = 'block';
                
                tableBody.innerHTML = filteredProducts.map(product => `
                    <tr class="border-b border-gray-100 hover:bg-gray-50 transition-all duration-200">
                        <td class="py-4 px-6 font-medium">${product.name}</td>
                        <td class="py-4 px-6 text-gray-600">${product.sku}</td>
                        <td class="py-4 px-6 font-semibold text-green-600">Rp ${product.price.toLocaleString('id-ID')}</td>
                        <td class="py-4 px-6">${product.stock}</td>
                        <td class="py-4 px-6">
                            <span class="px-3 py-1 rounded-full text-xs font-medium ${
                                product.stock > 10 ? 'bg-green-100 text-green-800' : 
                                product.stock > 0 ? 'bg-yellow-100 text-yellow-800' : 
                                'bg-red-100 text-red-800'
                            }">
                                ${product.stock > 10 ? '✅ In Stock' : product.stock > 0 ? '⚠️ Low Stock' : '❌ Out of Stock'}
                            </span>
                        </td>
                        <td class="py-4 px-6">
                            <div class="flex space-x-2">
                                <button onclick="editProduct(${product.id})" class="text-blue-600 hover:text-blue-800 transition-colors duration-150 font-medium">✏️ Edit</button>
                                <button onclick="deleteProduct(${product.id})" class="text-red-600 hover:text-red-800 transition-colors duration-150 font-medium">🗑️ Delete</button>
                            </div>
                        </td>
                    </tr>
                `).join('');
            }
        }
        
        // Notification function
        function showNotification() {
            showToast('You have 3 new notifications! 🔔', 'info');
        }
        
        // Go back function
        function goBack() {
            if (window.history.length > 1) {
                window.history.back();
            } else {
                showToast('Welcome to Product Management! 👋', 'info');
            }
        }
        
        // Close modals with Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeCustomerModal();
                closeProductModal();
            }
        });
        
        // Add some sample data for demonstration
        function loadSampleData() {
            const sampleProducts = [
                {
                    id: 1,
                    name: 'MacBook Pro 14"',
                    sku: 'MBP-14-001',
                    price: 32000000,
                    stock: 15,
                    createdAt: new Date()
                },
                {
                    id: 2,
                    name: 'iPhone 15 Pro',
                    sku: 'IP15P-001',
                    price: 19000000,
                    stock: 8,
                    createdAt: new Date()
                },
                {
                    id: 3,
                    name: 'iPad Air',
                    sku: 'IPA-001',
                    price: 9000000,
                    stock: 0,
                    createdAt: new Date()
                }
            ];
            
            const sampleCustomers = [
                {
                    id: 1,
                    name: 'John Doe',
                    email: 'john.doe@example.com',
                    phone: '+62 812 3456 7890',
                    createdAt: new Date()
                },
                {
                    id: 2,
                    name: 'Jane Smith',
                    email: 'jane.smith@example.com',
                    phone: '+62 813 7890 1234',
                    createdAt: new Date()
                }
            ];
            
            // Uncomment these lines to load sample data
            // products = sampleProducts;
            // customers = sampleCustomers;
            // renderProducts();
            // updateStats();
        }
        
        // Initialize the application
        document.addEventListener('DOMContentLoaded', function() {
            loadSampleData();
            
            // Add welcome message
            setTimeout(() => {
                showToast('Welcome to Product Management System! 🎉', 'success');
            }, 1500);
        });
        
        // Add floating action button for quick actions
        const floatingButton = document.createElement('div');
        floatingButton.className = 'fixed bottom-6 right-6 z-40';
        floatingButton.innerHTML = `
            <div class="relative group">
                <button onclick="toggleQuickActions()" id="fabButton" class="w-14 h-14 bg-indigo-600 hover:bg-indigo-700 text-white rounded-full shadow-lg hover:shadow-xl transition-all duration-300 hover:scale-110 flex items-center justify-center group">
                    <svg class="w-6 h-6 transition-transform duration-300" id="fabIcon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                </button>
                
                <div id="quickActions" class="absolute bottom-16 right-0 space-y-2 opacity-0 pointer-events-none transition-all duration-300 transform scale-75">
                    <button onclick="openProductModal(); toggleQuickActions();" class="flex items-center space-x-2 bg-white text-gray-700 px-4 py-2 rounded-lg shadow-lg hover:shadow-xl transition-all duration-200 hover:scale-105 whitespace-nowrap">
                        <span class="text-lg">🛍️</span>
                        <span class="font-medium">Add Product</span>
                    </button>
                    <button onclick="openCustomerModal(); toggleQuickActions();" class="flex items-center space-x-2 bg-white text-gray-700 px-4 py-2 rounded-lg shadow-lg hover:shadow-xl transition-all duration-200 hover:scale-105 whitespace-nowrap">
                        <span class="text-lg">👤</span>
                        <span class="font-medium">Add Customer</span>
                    </button>
                </div>
            </div>
        `;
        document.body.appendChild(floatingButton);
        
        function toggleQuickActions() {
            const quickActions = document.getElementById('quickActions');
            const fabIcon = document.getElementById('fabIcon');
            
            if (quickActions.classList.contains('opacity-0')) {
                quickActions.classList.remove('opacity-0', 'pointer-events-none', 'scale-75');
                quickActions.classList.add('opacity-100', 'pointer-events-auto', 'scale-100');
                fabIcon.style.transform = 'rotate(45deg)';
            } else {
                quickActions.classList.add('opacity-0', 'pointer-events-none', 'scale-75');
                quickActions.classList.remove('opacity-100', 'pointer-events-auto', 'scale-100');
                fabIcon.style.transform = 'rotate(0deg)';
            }
        }
        
        // Close quick actions when clicking outside
        document.addEventListener('click', function(e) {
            const fabButton = document.getElementById('fabButton');
            const quickActions = document.getElementById('quickActions');
            
            if (fabButton && !fabButton.contains(e.target) && !quickActions.contains(e.target)) {
                quickActions.classList.add('opacity-0', 'pointer-events-none', 'scale-75');
                quickActions.classList.remove('opacity-100', 'pointer-events-auto', 'scale-100');
                document.getElementById('fabIcon').style.transform = 'rotate(0deg)';
            }
        });
    </script>
</body>
@endsection
</html>