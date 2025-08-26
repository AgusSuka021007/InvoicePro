@extends('layouts.ownernavbar')

@section('title', 'Owner Dashboard')
@section('page-title', 'Owner Dashboard')

@section('content')

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Owner Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#6366f1',
                        secondary: '#8b5cf6',
                    }
                }
            }
        }
    </script>

    <style>
        .sidebar-gradient {
            background: linear-gradient(180deg, #667eea 0%, #764ba2 100%);
        }
        .main-gradient {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .card-shadow {
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        .card-hover {
            transition: all 0.3s ease;
        }
        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px -10px rgba(0, 0, 0, 0.15);
        }
        .menu-item {
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        .menu-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.1), transparent);
            transition: left 0.5s;
        }
        .menu-item:hover::before {
            left: 100%;
        }
        .menu-item:hover {
            background: rgba(255, 255, 255, 0.15);
            transform: translateX(5px);
        }
        .menu-item.active {
            background: rgba(255, 255, 255, 0.2);
            border-left: 4px solid white;
        }
        .pulse-animation {
            animation: pulse 2s infinite;
        }
        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.5; }
        }
        .bounce-in {
            animation: bounceIn 0.6s ease-out;
        }
        @keyframes bounceIn {
            0% { transform: scale(0.3); opacity: 0; }
            50% { transform: scale(1.05); }
            70% { transform: scale(0.9); }
            100% { transform: scale(1); opacity: 1; }
        }
        .slide-in {
            animation: slideIn 0.5s ease-out;
        }
        @keyframes slideIn {
            from { transform: translateY(30px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }
        .fade-in {
            animation: fadeIn 0.8s ease-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        .button-hover {
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        .button-hover::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
        }
        .button-hover:hover::before {
            width: 300px;
            height: 300px;
        }
        .button-hover:hover {
            transform: translateY(-2px);
        }
        .dropdown-enter {
            animation: dropdownEnter 0.3s ease-out;
        }
        @keyframes dropdownEnter {
            from { transform: translateY(-10px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }
        .stat-counter {
            animation: countUp 1.5s ease-out;
        }
        @keyframes countUp {
            from { transform: scale(0.5); opacity: 0; }
            to { transform: scale(1); opacity: 1; }
        }
        .loading-shimmer {
            background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
            background-size: 200% 100%;
            animation: shimmer 1.5s infinite;
        }
        @keyframes shimmer {
            0% { background-position: -200% 0; }
            100% { background-position: 200% 0; }
        }
        .notification-badge {
            animation: bounceNotification 0.6s ease-in-out infinite alternate;
        }
        @keyframes bounceNotification {
            0% { transform: scale(1); }
            100% { transform: scale(1.2); }
        }
    </style>

</head>
<div class="container">
<body class="bg-gradient-to-br from-purple-600 via-purple-700 to-indigo-800 min-h-screen">
    {{-- Main Container --}}
    <div class="flex min-h-screen">

        {{-- Main Content --}}
        <div class="flex-1 p-6">
            {{-- Header --}}
            <div class="flex justify-between items-center mb-6">
                <div class="relative">
                    <input type="text" placeholder="Search..." class="w-80 px-4 py-2 rounded-full bg-white/90 text-gray-700 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-white">
                    <svg class="w-5 h-5 absolute right-3 top-2.5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"/>
                    </svg>
                </div>
                
                <div class="relative">
                    <div class="w-10 h-10 bg-orange-500 rounded-full flex items-center justify-center cursor-pointer">
                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z"/>
                        </svg>
                    </div>
                    <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">3</span>
                </div>
            </div>

            {{-- Welcome Banner --}}
            <div class="bg-white/90 backdrop-blur-sm rounded-2xl p-6 mb-6">
                <h1 class="text-2xl font-bold text-gray-800 mb-2">Selamat Datang Kembali, Owner! 👋</h1>
                <p class="text-gray-600 mb-4">Berikut adalah overview bisnis komprehensif untuk membantu Anda membuat keputusan strategis dan laporan keuangan</p>
                <div class="flex space-x-4">
                    <button class="bg-indigo-600 text-white px-6 py-2 rounded-lg hover:bg-indigo-700 transition-colors">
                        Generate Report
                    </button>
                    <button class="border border-gray-300 text-gray-700 px-6 py-2 rounded-lg hover:bg-gray-50 transition-colors">
                        📊 Export Data
                    </button>
                </div>
            </div>

            <!-- Stats Cards Row 1 -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                    <!-- Total Revenue -->
                    <div class="bg-white rounded-xl p-6 card-shadow card-hover stat-counter" style="animation-delay: 0.1s">
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center">
                                <i class="fas fa-dollar-sign text-green-600 text-xl"></i>
                            </div>
                        </div>
                        <div>
                            <h3 class="text-3xl font-bold text-gray-800 mb-1" id="totalRevenue">Rp 487,000,000</h3>
                            <p class="text-gray-500 text-sm mb-2">Total Revenue (YTD)</p>
                            <div class="flex items-center text-green-600 text-sm">
                                <i class="fas fa-arrow-up mr-1"></i>
                                <span>+18.3% dari bulan lalu</span>
                            </div>
                        </div>
                    </div>

                    <!-- Net Profit -->
                    <div class="bg-white rounded-xl p-6 card-shadow card-hover stat-counter" style="animation-delay: 0.2s">
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                                <i class="fas fa-chart-line text-blue-600 text-xl"></i>
                            </div>
                        </div>
                        <div>
                            <h3 class="text-3xl font-bold text-gray-800 mb-1" id="netProfit">Rp 287,000,000</h3>
                            <p class="text-gray-500 text-sm mb-2">Net Profit (YTD)</p>
                            <div class="flex items-center text-green-600 text-sm">
                                <i class="fas fa-arrow-up mr-1"></i>
                                <span>+22.3% dari bulan lalu</span>
                            </div>
                        </div>
                    </div>

                    <!-- Total Expenses -->
                    <div class="bg-white rounded-xl p-6 card-shadow card-hover stat-counter" style="animation-delay: 0.3s">
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-12 h-12 bg-orange-100 rounded-xl flex items-center justify-center">
                                <i class="fas fa-credit-card text-orange-600 text-xl"></i>
                            </div>
                        </div>
                        <div>
                            <h3 class="text-3xl font-bold text-gray-800 mb-1" id="totalExpenses">Rp 57,000,000</h3>
                            <p class="text-gray-500 text-sm mb-2">Total Expenses (YTD)</p>
                            <div class="flex items-center text-green-600 text-sm">
                                <i class="fas fa-arrow-up mr-1"></i>
                                <span>+8.7% dari bulan lalu</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Stats Cards Row 2 -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                    <!-- Active Invoice -->
                    <div class="bg-white rounded-xl p-6 card-shadow card-hover stat-counter" style="animation-delay: 0.4s">
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center">
                                <i class="fas fa-file-invoice text-purple-600 text-xl"></i>
                            </div>
                        </div>
                        <div>
                            <h3 class="text-3xl font-bold text-gray-800 mb-1" id="activeInvoice">186</h3>
                            <p class="text-gray-500 text-sm mb-2">Active Invoice</p>
                            <div class="flex items-center text-green-600 text-sm">
                                <i class="fas fa-arrow-up mr-1"></i>
                                <span>+12 dari bulan lalu</span>
                            </div>
                        </div>
                    </div>

                 <!-- Payment Collection Rate -->
                    <div class="bg-white rounded-xl p-6 card-shadow card-hover stat-counter" style="animation-delay: 0.5s">
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center">
                                <i class="fas fa-percentage text-green-600 text-xl"></i>
                            </div>
                        </div>
                        <div>
                            <h3 class="text-3xl font-bold text-gray-800 mb-1" id="collectionRate">92.8%</h3>
                            <p class="text-gray-500 text-sm mb-2">Payment Collection Rate</p>
                            <div class="flex items-center text-green-600 text-sm">
                                <i class="fas fa-arrow-up mr-1"></i>
                                <span>+3.2% improvement</span>
                            </div>
                        </div>
                    </div>

                    <!-- Total Revenue YTD -->
                    <div class="bg-white rounded-xl p-6 card-shadow card-hover stat-counter" style="animation-delay: 0.6s">
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                                <i class="fas fa-bolt text-blue-600 text-xl"></i>
                            </div>
                        </div>
                        <div>
                            <h3 class="text-3xl font-bold text-gray-800 mb-1" id="totalRevenueYTD">Rp 89,700,000</h3>
                            <p class="text-gray-500 text-sm mb-2">Total Revenue (YTD)</p>
                            <div class="flex items-center text-green-600 text-sm">
                                <i class="fas fa-arrow-up mr-1"></i>
                                <span>Healthy flow</span>
                            </div>
                        </div>
                    </div>
                </div>


             <!-- Charts Row -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
                    <!-- Sales Chart -->
                    <div class="lg:col-span-2 bg-white rounded-xl p-6 card-shadow card-hover slide-in">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-lg font-semibold text-gray-800">Monthly Sales Trend</h3>
                            <div class="relative">
                                <button onclick="toggleTimeFilter()" class="flex items-center space-x-2 px-4 py-2 bg-gray-100 rounded-lg hover:bg-gray-200 transition-colors button-hover">
                                    <span class="text-sm" id="selectedTime">Last 6 months</span>
                                    <i class="fas fa-chevron-down transition-transform duration-300" id="timeChevron"></i>
                                </button>
                                <div id="timeDropdown" class="hidden absolute right-0 mt-2 w-40 bg-white border rounded-lg shadow-lg z-10 dropdown-enter">
                                    <a href="#" onclick="selectTimeFilter('Last 6 months')" class="block px-4 py-2 hover:bg-gray-100">Last 6 months</a>
                                    <a href="#" onclick="selectTimeFilter('Last year')" class="block px-4 py-2 hover:bg-gray-100">Last year</a>
                                    <a href="#" onclick="selectTimeFilter('All time')" class="block px-4 py-2 hover:bg-gray-100">All time</a>
                                </div>
                            </div>
                        </div>
                        <div class="h-64">
                            <canvas id="salesChart"></canvas>
                        </div>
                    </div>

<!-- Expense Distribution -->
                    <div class="bg-white rounded-xl p-6 card-shadow card-hover slide-in">
                        <h3 class="text-lg font-semibold text-gray-800 mb-6">Expense Distribution</h3>
                        <div class="h-64 flex items-center justify-center">
                            <canvas id="expenseChart"></canvas>
                        </div>
                        <div class="mt-4 space-y-2">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-2">
                                    <div class="w-3 h-3 bg-blue-500 rounded-full"></div>
                                    <span class="text-sm text-gray-600">Operational (45%)</span>
                                </div>
                            </div>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-2">
                                    <div class="w-3 h-3 bg-indigo-500 rounded-full"></div>
                                    <span class="text-sm text-gray-600">Marketing (23%)</span>
                                </div>
                            </div>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-2">
                                    <div class="w-3 h-3 bg-yellow-500 rounded-full"></div>
                                    <span class="text-sm text-gray-600">R&D (20%)</span>
                                </div>
                            </div>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-2">
                                    <div class="w-3 h-3 bg-red-500 rounded-full"></div>
                                    <span class="text-sm text-gray-600">Others (12%)</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                 <!-- Recent Activities -->
                <div class="bg-white rounded-xl p-6 mb-6 card-shadow card-hover fade-in">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-lg font-semibold text-gray-800">Recent Financial Activities</h3>
                        <button onclick="refreshActivities()" class="text-purple-600 hover:text-purple-800 transition-colors">
                            <i class="fas fa-refresh"></i>
                        </button>
                    </div>
                    <div class="space-y-4" id="activitiesList">
                        <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors cursor-pointer">
                            <div class="flex items-center space-x-3">
                                <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center">
                                    <i class="fas fa-dollar-sign text-green-600"></i>
                                </div>
                                <div>
                                    <p class="font-medium text-gray-800">Payment received from TechCorp Inc.</p>
                                    <p class="text-sm text-gray-500">2 hours ago</p>
                                </div>
                            </div>
                            <span class="text-green-600 font-semibold">+$5,200</span>
                        </div>
                        
                        <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors cursor-pointer">
                            <div class="flex items-center space-x-3">
                                <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center">
                                    <i class="fas fa-file-invoice text-blue-600"></i>
                                </div>
                                <div>
                                    <p class="font-medium text-gray-800">New Invoice INV-2025-0158 created</p>
                                    <p class="text-sm text-gray-500">5 hours ago</p>
                                </div>
                            </div>
                            <span class="text-blue-600 font-semibold">$2,543</span>
                        </div>

                        <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors cursor-pointer">
                            <div class="flex items-center space-x-3">
                                <div class="w-10 h-10 bg-orange-100 rounded-full flex items-center justify-center">
                                    <i class="fas fa-user-plus text-orange-600"></i>
                                </div>
                                <div>
                                    <p class="font-medium text-gray-800">New Customer "Digi Bali Advertisment" added</p>
                                    <p class="text-sm text-gray-500">6 hours ago</p>
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors cursor-pointer">
                            <div class="flex items-center space-x-3">
                                <div class="w-10 h-10 bg-red-100 rounded-full flex items-center justify-center">
                                    <i class="fas fa-exclamation-triangle text-red-600"></i>
                                </div>
                                <div>
                                    <p class="font-medium text-gray-800">Invoice INV-2025-0158 is overdue</p>
                                    <p class="text-sm text-gray-500">1 day ago</p>
                                </div>
                            </div>
                            <span class="text-red-600 font-semibold">$3,200</span>
                        </div>

                        <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors cursor-pointer">
                            <div class="flex items-center space-x-3">
                                <div class="w-10 h-10 bg-purple-100 rounded-full flex items-center justify-center">
                                    <i class="fas fa-box text-purple-600"></i>
                                </div>
                                <div>
                                    <p class="font-medium text-gray-800">Product "Premium Software License" updated</p>
                                    <p class="text-sm text-gray-500">2 days ago</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Financial Reports & Analysis -->
                <div class="bg-white rounded-xl p-6 mb-6 card-shadow card-hover fade-in">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-lg font-semibold text-gray-800">
                            <i class="fas fa-chart-bar mr-2"></i>
                            Financial Reports & Analysis
                        </h3>
                        <button onclick="viewDetailedReports()" class="text-purple-600 hover:text-purple-800 transition-colors">
                            <i class="fas fa-external-link-alt"></i>
                        </button>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="text-center p-6 bg-gray-50 rounded-xl hover:bg-gray-100 transition-colors cursor-pointer card-hover">
                            <div class="w-16 h-16 bg-blue-100 rounded-xl flex items-center justify-center mx-auto mb-4">
                                <i class="fas fa-chart-line text-blue-600 text-2xl"></i>
                            </div>
                            <h4 class="text-2xl font-bold text-gray-800 mb-1">23.3%</h4>
                            <p class="text-gray-500 text-sm mb-2">Profit Margin</p>
                            <div class="flex items-center justify-center text-green-600 text-sm">
                                <i class="fas fa-arrow-up mr-1"></i>
                                <span>+3.2% dari target</span>
                            </div>
                        </div>

                        <div class="text-center p-6 bg-gray-50 rounded-xl hover:bg-gray-100 transition-colors cursor-pointer card-hover">
                            <div class="w-16 h-16 bg-orange-100 rounded-xl flex items-center justify-center mx-auto mb-4">
                                <i class="fas fa-bullseye text-orange-600 text-2xl"></i>
                            </div>
                            <h4 class="text-2xl font-bold text-gray-800 mb-1">87.5%</h4>
                            <p class="text-gray-500 text-sm mb-2">Budget Utilization</p>
                            <div class="flex items-center justify-center text-green-600 text-sm">
                                <i class="fas fa-check mr-1"></i>
                                <span>On track</span>
                            </div>
                        </div>

                        <div class="text-center p-6 bg-gray-50 rounded-xl hover:bg-gray-100 transition-colors cursor-pointer card-hover">
                            <div class="w-16 h-16 bg-green-100 rounded-xl flex items-center justify-center mx-auto mb-4">
                                <i class="fas fa-coins text-green-600 text-2xl"></i>
                            </div>
                            <h4 class="text-2xl font-bold text-gray-800 mb-1">Rp 89,700,000</h4>
                            <p class="text-gray-500 text-sm mb-2">Total Revenue YTD</p>
                            <div class="flex items-center justify-center text-green-600 text-sm">
                                <i class="fas fa-arrow-up mr-1"></i>
                                <span>Healthy flow</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Budget Planning -->
                <div class="bg-white rounded-xl p-6 card-shadow card-hover fade-in">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-lg font-semibold text-gray-800">
                            <i class="fas fa-calendar-alt mr-2"></i>
                            Budget Planning & Forecasting
                        </h3>
                        <button onclick="manageBudget()" class="bg-purple-100 text-purple-700 px-4 py-2 rounded-lg hover:bg-purple-200 transition-colors button-hover">
                            <i class="fas fa-plus mr-2"></i>
                            Add Budget
                        </button>
                    </div>
                    <div class="space-y-4">
                        <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors cursor-pointer" onclick="viewBudgetDetails('Q1')">
                            <div class="flex items-center space-x-3">
                                <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center">
                                    <i class="fas fa-dollar-sign text-green-600"></i>
                                </div>
                                <div>
                                    <p class="font-medium text-gray-800">Q1 2025 Budget Planning</p>
                                    <p class="text-sm text-gray-500">Target: Rp 500,000,000 | Current: Rp 487,000,000</p>
                                </div>
                            </div>
                            <div class="flex items-center space-x-3">
                                <span class="text-green-600 font-semibold">92.7%</span>
                                <div class="w-16 h-2 bg-gray-200 rounded-full">
                                    <div class="w-15 h-2 bg-green-500 rounded-full" style="width: 92.7%"></div>
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors cursor-pointer" onclick="viewBudgetDetails('Q2')">
                            <div class="flex items-center space-x-3">
                                <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center">
                                    <i class="fas fa-chart-line text-blue-600"></i>
                                </div>
                                <div>
                                    <p class="font-medium text-gray-800">Q2 2025 Budget Planning</p>
                                    <p class="text-sm text-gray-500">Budget: Rp 650,000,000 | Actual: Rp 425,000,000</p>
                                </div>
                            </div>
                            <div class="flex items-center space-x-3">
                                <span class="text-blue-600 font-semibold">67.7%</span>
                                <div class="w-16 h-2 bg-gray-200 rounded-full">
                                    <div class="w-11 h-2 bg-blue-500 rounded-full" style="width: 67.7%"></div>
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors cursor-pointer" onclick="viewBudgetDetails('Marketing')">
                            <div class="flex items-center space-x-3">
                                <div class="w-10 h-10 bg-yellow-100 rounded-full flex items-center justify-center">
                                    <i class="fas fa-exclamation-triangle text-yellow-600"></i>
                                </div>
                                <div>
                                    <p class="font-medium text-gray-800">Marketing Budget Alert</p>
                                    <p class="text-sm text-gray-500">80% budget utilized with 2 weeks remaining</p>
                                </div>
                            </div>
                            <button onclick="event.stopPropagation(); monitorBudget('Marketing')" class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-lg text-sm font-medium hover:bg-yellow-200 transition-colors button-hover">Monitor</button>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

     <!-- Loading Overlay -->
    <div id="loadingOverlay" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center">
        <div class="bg-white rounded-xl p-8 flex items-center space-x-4">
            <div class="animate-spin rounded-full h-8 w-8 border-b-2 border-purple-600"></div>
            <span class="text-gray-700">Processing...</span>
        </div>
    </div>

    <!-- Success Toast -->
    <div id="successToast" class="hidden fixed top-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg z-50 bounce-in">
        <div class="flex items-center space-x-2">
            <i class="fas fa-check-circle"></i>
            <span id="successMessage">Action completed successfully!</span>
        </div>
    </div>

    <!-- Error Toast -->
    <div id="errorToast" class="hidden fixed top-4 right-4 bg-red-500 text-white px-6 py-3 rounded-lg shadow-lg z-50 bounce-in">
        <div class="flex items-center space-x-2">
            <i class="fas fa-exclamation-circle"></i>
            <span id="errorMessage">An error occurred!</span>
        </div>
    </div>


    

    <script>
        // Sales Chart
        const salesCtx = document.getElementById('salesChart').getContext('2d');
        const salesChart = new Chart(salesCtx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                datasets: [{
                    label: 'Sales',
                    data: [65000000, 59000000, 80000000, 81000000, 78000000, 85000000],
                    borderColor: '#6366f1',
                    backgroundColor: 'rgba(99, 102, 241, 0.1)',
                    borderWidth: 3,
                    fill: true,
                    tension: 0.4,
                    pointBackgroundColor: '#6366f1',
                    pointBorderColor: '#6366f1',
                    pointHoverRadius: 8,
                    pointRadius: 5
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        backgroundColor: 'rgba(0, 0, 0, 0.8)',
                        titleColor: '#fff',
                        bodyColor: '#fff',
                        borderColor: '#6366f1',
                        borderWidth: 1,
                        cornerRadius: 8,
                        callbacks: {
                            label: function(context) {
                                return 'Sales: Rp ' + (context.parsed.y / 1000000).toFixed(1) + 'M';
                            }
                        }
                    }
                },
                scales: {
                    x: {
                        grid: {
                            display: false
                        },
                        ticks: {
                            color: '#6b7280'
                        }
                    },
                    y: {
                        beginAtZero: false,
                        grid: {
                            color: 'rgba(107, 114, 128, 0.1)'
                        },
                        ticks: {
                            color: '#6b7280',
                            callback: function(value) {
                                return 'Rp ' + (value / 1000000) + 'M';
                            }
                        }
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index'
                }
            }
        });

        

        // Expense Distribution Chart
        const expenseCtx = document.getElementById('expenseChart').getContext('2d');
        const expenseChart = new Chart(expenseCtx, {
            type: 'doughnut',
            data: {
                labels: ['Operational', 'Marketing', 'R&D', 'Others'],
                datasets: [{
                    data: [45, 25, 20, 10],
                    backgroundColor: [
                        '#3b82f6',
                        '#10b981',
                        '#f59e0b',
                        '#ef4444'
                    ],
                    borderWidth: 0,
                    hoverOffset: 10
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        backgroundColor: 'rgba(0, 0, 0, 0.8)',
                        titleColor: '#fff',
                        bodyColor: '#fff',
                        borderColor: '#6366f1',
                        borderWidth: 1,
                        cornerRadius: 8,
                        callbacks: {
                            label: function(context) {
                                return context.label + ': ' + context.parsed + '%';
                            }
                        }
                    }
                }
            }
        });

        // Dashboard Interactive Functions
        document.addEventListener('DOMContentLoaded', function() {
            // Add loading states to buttons
            const generateReportBtn = document.querySelector('.bg-indigo-600');
            const exportDataBtn = document.querySelector('.border-gray-300');

            if (generateReportBtn) {
                generateReportBtn.addEventListener('click', function(e) {
                    e.preventDefault();
                    showLoadingState(this, 'Generating Report...');
                    
                    // Simulate API call
                    setTimeout(() => {
                        hideLoadingState(this, 'Generate Report');
                        showNotification('Report generated successfully!', 'success');
                    }, 2000);
                });
            }

            if (exportDataBtn) {
                exportDataBtn.addEventListener('click', function(e) {
                    e.preventDefault();
                    showLoadingState(this, 'Exporting...');
                    
                    // Simulate API call
                    setTimeout(() => {
                        hideLoadingState(this, '📊 Export Data');
                        showNotification('Data exported successfully!', 'success');
                    }, 1500);
                });
            }

            // Add period selector functionality
            const periodSelector = document.querySelector('select');
            if (periodSelector) {
                periodSelector.addEventListener('change', function() {
                    updateSalesChart(this.value);
                });
            }

            // Add hover effects to stat cards
            const statCards = document.querySelectorAll('.bg-white\\/90');
            statCards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.classList.add('transform', 'scale-105', 'shadow-lg');
                    this.style.transition = 'all 0.3s ease';
                });
                
                card.addEventListener('mouseleave', function() {
                    this.classList.remove('transform', 'scale-105', 'shadow-lg');
                });
            });

            // Initialize real-time updates
            startRealTimeUpdates();
        });

        // Helper Functions
        function showLoadingState(button, loadingText) {
            button.disabled = true;
            button.innerHTML = `
                <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white inline" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                ${loadingText}
            `;
        }

        function hideLoadingState(button, originalText) {
            button.disabled = false;
            button.innerHTML = originalText;
        }

        function showNotification(message, type = 'info') {
            const notification = document.createElement('div');
            notification.className = `
                fixed top-4 right-4 z-50 p-4 rounded-lg shadow-lg max-w-sm
                ${type === 'success' ? 'bg-green-500 text-white' : 'bg-blue-500 text-white'}
                transform translate-x-full transition-transform duration-300 ease-in-out
            `;
            notification.innerHTML = `
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        ${type === 'success' 
                            ? '<path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"/>'
                            : '<path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"/>'
                        }
                    </svg>
                    <span>${message}</span>
                </div>
                <button onclick="this.parentElement.remove()" class="ml-4 text-white hover:text-gray-200">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"/>
                    </svg>
                </button>
            `;
            
            document.body.appendChild(notification);
            
            // Slide in
            setTimeout(() => {
                notification.classList.remove('translate-x-full');
            }, 100);
            
            // Auto remove after 5 seconds
            setTimeout(() => {
                notification.classList.add('translate-x-full');
                setTimeout(() => notification.remove(), 300);
            }, 5000);
        }

        function updateSalesChart(period) {
            // Simulate different data based on period
            let newData, newLabels;
            
            switch(period) {
                case 'Last 12 months':
                    newLabels = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
                    newData = [65000000, 59000000, 80000000, 81000000, 78000000, 85000000, 88000000, 92000000, 87000000, 95000000, 89000000, 98000000];
                    break;
                default:
                    newLabels = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'];
                    newData = [65000000, 59000000, 80000000, 81000000, 78000000, 85000000];
            }
            
            salesChart.data.labels = newLabels;
            salesChart.data.datasets[0].data = newData;
            salesChart.update('active');
        }

        function startRealTimeUpdates() {
            // Simulate real-time data updates every 30 seconds
            setInterval(() => {
                // Update random KPI values slightly
                updateKPIValues();
            }, 30000);
        }

        function updateKPIValues() {
            const kpiElements = document.querySelectorAll('.text-3xl');
            kpiElements.forEach(element => {
                if (element.textContent.includes('Rp')) {
                    // Add small random fluctuation to revenue numbers
                    const currentValue = element.textContent;
                    // This would typically come from your backend API
                    console.log('Real-time update triggered for:', currentValue);
                }
            });
        }

        // Add smooth scrolling for internal links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Add keyboard shortcuts
        document.addEventListener('keydown', function(e) {
            // Ctrl/Cmd + G for Generate Report
            if ((e.ctrlKey || e.metaKey) && e.key === 'g') {
                e.preventDefault();
                const generateBtn = document.querySelector('.bg-indigo-600');
                if (generateBtn) generateBtn.click();
            }
            
            // Ctrl/Cmd + E for Export Data  
            if ((e.ctrlKey || e.metaKey) && e.key === 'e') {
                e.preventDefault();
                const exportBtn = document.querySelector('.border-gray-300');
                if (exportBtn) exportBtn.click();
            }
        });

        // Add data refresh functionality
        function refreshDashboardData() {
            showNotification('Refreshing dashboard data...', 'info');
            
            // This would typically be an AJAX call to your Laravel backend
            // fetch('/api/dashboard/data')
            //     .then(response => response.json())
            //     .then(data => {
            //         updateDashboard(data);
            //         showNotification('Dashboard data refreshed!', 'success');
            //     })
            //     .catch(error => {
            //         showNotification('Failed to refresh data', 'error');
            //     });
            
            // Simulate successful refresh
            setTimeout(() => {
                showNotification('Dashboard data refreshed!', 'success');
            }, 1000);
        }

        // Add auto-refresh every 5 minutes
        setInterval(refreshDashboardData, 300000);

        // Add window resize handler for charts
        window.addEventListener('resize', function() {
            salesChart.resize();
            expenseChart.resize();
        });
    </script>
    </div>
    @endsection
</body>
                    