@extends('layouts.adminnavbar')

@section('title', 'Admin Dashboard')
@section('page-title', 'Admin Dashboard')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        body { font-family: 'Inter', sans-serif; }
        .gradient-bg { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); }
        .card-hover { transition: all 0.3s ease; }
        .card-hover:hover { transform: translateY(-5px); box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04); }
        .stat-card { background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); }
        .fade-in { animation: fadeIn 0.6s ease-in; }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
        .slide-up { animation: slideUp 0.5s ease-out; }
        @keyframes slideUp { from { opacity: 0; transform: translateY(30px); } to { opacity: 1; transform: translateY(0); } }
        .pulse-icon { animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite; }
        @keyframes pulse { 0%, 100% { opacity: 1; } 50% { opacity: .7; } }
        .notification-dot { animation: bounce 1s infinite; }
        @keyframes bounce { 0%, 100% { transform: translateY(-25%); animation-timing-function: cubic-bezier(0.8, 0, 1, 1); } 50% { transform: translateY(0); animation-timing-function: cubic-bezier(0, 0, 0.2, 1); } }
    </style>
</head>
<body class="min-h-screen gradient-bg">
    <div class="container mx-auto px-4 py-8">
        <!-- Header Section -->
        <div class="flex justify-between items-center mb-8">
            <div class="flex items-center space-x-4">
                <div class="w-12 h-12 bg-white rounded-full flex items-center justify-center shadow-lg">
                    <i class="fas fa-user text-blue-600 text-xl"></i>
                </div>
                <h1 class="text-white text-2xl font-bold">Dashboard Admin</h1>
            </div>
            <div class="flex items-center space-x-4">
                <!-- Search Bar -->
                <div class="relative">
                    <input type="text" placeholder="Search..." 
                           class="w-80 px-4 py-2 pl-10 bg-white bg-opacity-90 rounded-full focus:outline-none focus:ring-2 focus:ring-white focus:bg-opacity-100 transition-all duration-300">
                    <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                </div>
                <!-- Notification -->
                <div class="relative cursor-pointer">
                    <i class="fas fa-bell text-white text-xl hover:scale-110 transition-transform duration-200"></i>
                    <span class="absolute -top-2 -right-2 bg-red-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center notification-dot">3</span>
                </div>
            </div>
        </div>

        <!-- Welcome Card -->
        <div class="stat-card rounded-2xl p-8 mb-8 shadow-xl fade-in">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-2xl font-bold text-gray-800 mb-2">Welcome back, Agra! 👋</h2>
                    <p class="text-gray-600">Here's your business overview for today</p>
                </div>
                <div class="flex space-x-4">
                    <button class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg font-medium transition-colors duration-200 flex items-center space-x-2">
                        <i class="fas fa-plus"></i>
                        <span>New Invoices</span>
                    </button>
                    <button class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-6 py-3 rounded-lg font-medium transition-colors duration-200 flex items-center space-x-2">
                        <i class="fas fa-chart-bar"></i>
                        <span>View Reports</span>
                    </button>
                </div>
            </div>
        </div>

        <!-- Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-6 mb-8">
            <!-- Total Invoices -->
            <div class="stat-card rounded-2xl p-6 shadow-lg card-hover slide-up" style="animation-delay: 0.1s">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                        <i class="fas fa-file-invoice text-blue-600 text-xl pulse-icon"></i>
                    </div>
                </div>
                <div class="text-3xl font-bold text-gray-800 mb-1" id="totalInvoices">42</div>
                <div class="text-sm text-gray-600">TOTAL INVOICES</div>
            </div>

            <!-- Total Customer -->
            <div class="stat-card rounded-2xl p-6 shadow-lg card-hover slide-up" style="animation-delay: 0.2s">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center">
                        <i class="fas fa-dollar-sign text-green-600 text-xl pulse-icon"></i>
                    </div>
                </div>
                <div class="text-3xl font-bold text-gray-800 mb-1" id="totalCustomer">$24,856</div>
                <div class="text-sm text-gray-600">Total Customer</div>
            </div>

            <!-- Total Product -->
            <div class="stat-card rounded-2xl p-6 shadow-lg card-hover slide-up" style="animation-delay: 0.3s">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                        <i class="fas fa-users text-blue-600 text-xl pulse-icon"></i>
                    </div>
                </div>
                <div class="text-3xl font-bold text-gray-800 mb-1" id="totalProduct">87</div>
                <div class="text-sm text-gray-600">Total Product</div>
            </div>

            <!-- Total Category -->
            <div class="stat-card rounded-2xl p-6 shadow-lg card-hover slide-up" style="animation-delay: 0.4s">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 bg-red-100 rounded-xl flex items-center justify-center">
                        <i class="fas fa-exclamation-triangle text-red-600 text-xl pulse-icon"></i>
                    </div>
                </div>
                <div class="text-3xl font-bold text-gray-800 mb-1" id="totalCategory">$3,750</div>
                <div class="text-sm text-gray-600">Total Category</div>
            </div>

            <!-- Total Task -->
            <div class="stat-card rounded-2xl p-6 shadow-lg card-hover slide-up" style="animation-delay: 0.5s">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 bg-yellow-100 rounded-xl flex items-center justify-center">
                        <i class="fas fa-chart-line text-yellow-600 text-xl pulse-icon"></i>
                    </div>
                </div>
                <div class="text-3xl font-bold text-gray-800 mb-1" id="totalTask">37</div>
                <div class="text-sm text-gray-600">Total Task</div>
            </div>
        </div>

        <!-- Charts Section -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
            <!-- Monthly Sales Trend -->
            <div class="lg:col-span-2 stat-card rounded-2xl p-6 shadow-lg slide-up" style="animation-delay: 0.6s">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-lg font-semibold text-gray-800">Monthly Sales Trend</h3>
                    <select class="bg-gray-50 border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option>Last 6 months</option>
                        <option>Last 12 months</option>
                        <option>This year</option>
                    </select>
                </div>
                <div class="h-64">
                    <canvas id="salesTrendChart"></canvas>
                </div>
            </div>

            <!-- Sales by Category -->
            <div class="stat-card rounded-2xl p-6 shadow-lg slide-up" style="animation-delay: 0.7s">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-lg font-semibold text-gray-800">Sales by Category</h3>
                </div>
                <div class="h-64">
                    <canvas id="categoryChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Recent Activities -->
        <div class="stat-card rounded-2xl p-6 shadow-lg slide-up" style="animation-delay: 0.8s">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-lg font-semibold text-gray-800 flex items-center">
                    <i class="fas fa-clock mr-2 text-gray-500"></i>
                    Recent Activities
                </h3>
            </div>
            <div class="space-y-4" id="recentActivities">
                <!-- Activities will be populated by JavaScript -->
            </div>
        </div>
    </div>

    <script>
        // Counter Animation
        function animateCounter(element, target, duration = 2000) {
            let start = 0;
            const increment = target / (duration / 16);
            const timer = setInterval(() => {
                start += increment;
                if (start >= target) {
                    element.textContent = target.toLocaleString();
                    clearInterval(timer);
                } else {
                    element.textContent = Math.floor(start).toLocaleString();
                }
            }, 16);
        }

        // Initialize counters
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(() => {
                animateCounter(document.getElementById('totalInvoices'), 42);
                animateCounter(document.getElementById('totalProduct'), 87);
                animateCounter(document.getElementById('totalTask'), 37);
            }, 500);

            // Sales Trend Chart
            const salesCtx = document.getElementById('salesTrendChart').getContext('2d');
            new Chart(salesCtx, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                    datasets: [{
                        label: 'Sales',
                        data: [12000, 15000, 13000, 17000, 16000, 20000],
                        borderColor: '#3B82F6',
                        backgroundColor: 'rgba(59, 130, 246, 0.1)',
                        tension: 0.4,
                        fill: true,
                        pointBackgroundColor: '#3B82F6',
                        pointBorderColor: '#ffffff',
                        pointBorderWidth: 2,
                        pointRadius: 6,
                        pointHoverRadius: 8
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        x: {
                            grid: {
                                display: false
                            },
                            ticks: {
                                color: '#6B7280'
                            }
                        },
                        y: {
                            grid: {
                                color: 'rgba(107, 114, 128, 0.1)'
                            },
                            ticks: {
                                color: '#6B7280',
                                callback: function(value) {
                                    return '$' + (value / 1000) + 'k';
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

            // Category Chart
            const categoryCtx = document.getElementById('categoryChart').getContext('2d');
            new Chart(categoryCtx, {
                type: 'doughnut',
                data: {
                    labels: ['Software', 'Hardware', 'Services', 'Consulting'],
                    datasets: [{
                        data: [35, 25, 25, 15],
                        backgroundColor: [
                            '#3B82F6',
                            '#10B981',
                            '#F59E0B',
                            '#EF4444'
                        ],
                        borderWidth: 0
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: {
                                color: '#6B7280',
                                usePointStyle: true,
                                padding: 20
                            }
                        }
                    }
                }
            });

            // Recent Activities
            const activities = [
                {
                    icon: 'fas fa-check-circle',
                    color: 'text-green-600',
                    bgColor: 'bg-green-100',
                    title: 'Payment received from TechCorp Inc.',
                    time: '2 hours ago',
                    amount: '+$5,200',
                    amountColor: 'text-green-600'
                },
                {
                    icon: 'fas fa-file-invoice',
                    color: 'text-blue-600',
                    bgColor: 'bg-blue-100',
                    title: 'New Invoice INV-2025-0156 created',
                    time: '4 hours ago',
                    amount: '$2,543',
                    amountColor: 'text-blue-600'
                },
                {
                    icon: 'fas fa-user-plus',
                    color: 'text-orange-600',
                    bgColor: 'bg-orange-100',
                    title: 'New Customer "Digi Ball Advertisment" added',
                    time: '6 hours ago',
                    amount: '',
                    amountColor: ''
                },
                {
                    icon: 'fas fa-exclamation-triangle',
                    color: 'text-red-600',
                    bgColor: 'bg-red-100',
                    title: 'Invoice INV-2025-0158 is overdue',
                    time: '1 day ago',
                    amount: '$1,200',
                    amountColor: 'text-red-600'
                },
                {
                    icon: 'fas fa-sync-alt',
                    color: 'text-blue-600',
                    bgColor: 'bg-blue-100',
                    title: 'Product "Premium Software License" updated',
                    time: '2 days ago',
                    amount: '',
                    amountColor: ''
                }
            ];

            const activitiesContainer = document.getElementById('recentActivities');
            activities.forEach((activity, index) => {
                const activityElement = document.createElement('div');
                activityElement.className = 'flex items-center justify-between p-4 bg-gray-50 rounded-xl hover:bg-gray-100 transition-colors duration-200';
                activityElement.style.animationDelay = `${0.9 + index * 0.1}s`;
                activityElement.classList.add('slide-up');
                
                activityElement.innerHTML = `
                    <div class="flex items-center space-x-4">
                        <div class="w-10 h-10 ${activity.bgColor} rounded-full flex items-center justify-center">
                            <i class="${activity.icon} ${activity.color}"></i>
                        </div>
                        <div>
                            <div class="font-medium text-gray-800">${activity.title}</div>
                            <div class="text-sm text-gray-500">${activity.time}</div>
                        </div>
                    </div>
                    ${activity.amount ? `<div class="font-semibold ${activity.amountColor}">${activity.amount}</div>` : ''}
                `;
                
                activitiesContainer.appendChild(activityElement);
            });
        });

        // Add interactive hover effects
        document.querySelectorAll('.card-hover').forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-8px)';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });

        // Search functionality placeholder
        document.querySelector('input[type="text"]').addEventListener('input', function(e) {
            console.log('Searching for:', e.target.value);
            // Add your search logic here when connecting to backend
        });

        // Button click handlers (ready for backend integration)
        document.querySelectorAll('button').forEach(button => {
            button.addEventListener('click', function() {
                const buttonText = this.textContent.trim();
                console.log('Button clicked:', buttonText);
                // Add your backend API calls here
                
                // Add visual feedback
                this.style.transform = 'scale(0.95)';
                setTimeout(() => {
                    this.style.transform = 'scale(1)';
                }, 150);
            });
        });
    </script>
</body>
@endsection
</html>