@extends('layouts.adminnavbar')

@section('title', 'Invoice')
@section('page-title', 'Invoice')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'primary': '#6366f1',
                        'primary-dark': '#4f46e5',
                    }
                }
            }
        }
    </script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50 font-sans">
    <!-- Header -->
    <div class="bg-primary text-white px-6 py-4">
        <div class="flex justify-between items-center">
            <h1 class="text-2xl font-semibold">Customer</h1>
            <div class="flex items-center space-x-4">
                <!-- Search Bar -->
                <div class="relative">
                    <input type="text" 
                           id="search-input"
                           placeholder="Search invoices..." 
                           class="bg-white/20 text-white placeholder-white/70 px-4 py-2 pl-10 rounded-lg border-0 focus:outline-none focus:ring-2 focus:ring-white/30 w-64">
                    <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-white/70"></i>
                </div>
                <!-- Notification Bell -->
                <div class="relative">
                    <button class="relative p-2">
                        <i class="fas fa-bell text-xl p-2 bg-white/20 rounded-lg cursor-pointer hover:bg-white/30 transition-colors"></i>
                        <span class="absolute -top-1 -right-1 bg-yellow-400 text-xs rounded-full w-5 h-5 flex items-center justify-center text-black font-semibold">3</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="px-6 py-6">
        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <!-- Total Invoices -->
            <div class="bg-white rounded-xl shadow-sm p-6 hover:shadow-md transition-shadow cursor-pointer" data-filter="all">
                <div class="flex items-center">
                    <div class="bg-blue-100 p-3 rounded-lg">
                        <i class="fas fa-file-invoice text-blue-600 text-xl"></i>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-3xl font-bold text-gray-900" id="total-count">42</h3>
                        <p class="text-gray-500 text-sm font-medium">Total Invoices</p>
                    </div>
                </div>
            </div>

            <!-- Paid Invoices -->
            <div class="bg-white rounded-xl shadow-sm p-6 hover:shadow-md transition-shadow cursor-pointer" data-filter="paid">
                <div class="flex items-center">
                    <div class="bg-green-100 p-3 rounded-lg">
                        <i class="fas fa-check-circle text-green-600 text-xl"></i>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-3xl font-bold text-gray-900" id="paid-count">28</h3>
                        <p class="text-gray-500 text-sm font-medium">Paid Invoices</p>
                    </div>
                </div>
            </div>

            <!-- Pending Invoices -->
            <div class="bg-white rounded-xl shadow-sm p-6 hover:shadow-md transition-shadow cursor-pointer" data-filter="pending">
                <div class="flex items-center">
                    <div class="bg-orange-100 p-3 rounded-lg">
                        <i class="fas fa-clock text-orange-600 text-xl"></i>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-3xl font-bold text-gray-900" id="pending-count">11</h3>
                        <p class="text-gray-500 text-sm font-medium">Pending Invoices</p>
                    </div>
                </div>
            </div>

            <!-- Overdue Invoices -->
            <div class="bg-white rounded-xl shadow-sm p-6 hover:shadow-md transition-shadow cursor-pointer" data-filter="overdue">
                <div class="flex items-center">
                    <div class="bg-red-100 p-3 rounded-lg">
                        <i class="fas fa-exclamation-triangle text-red-600 text-xl"></i>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-3xl font-bold text-gray-900" id="overdue-count">3</h3>
                        <p class="text-gray-500 text-sm font-medium">Overdue Invoices</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Invoice Management Section -->
        <div class="bg-white rounded-xl shadow-sm">
            <!-- Header with Create Button and Filters -->
            <div class="p-6 border-b border-gray-200">
                <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center space-y-4 lg:space-y-0">
                    <!-- Create Invoice Button -->
                    <button id="create-invoice-btn" 
                            class="bg-primary hover:bg-primary-dark text-white px-6 py-3 rounded-lg font-medium transition-colors flex items-center">
                        <i class="fas fa-plus mr-2"></i>
                        Create Invoice
                    </button>

                    <!-- Filters and Actions -->
                    <div class="flex flex-wrap items-center gap-4">
                        <!-- Status Filter Tabs -->
                        <div class="flex bg-gray-100 rounded-lg p-1">
                            <button class="status-filter-btn active px-4 py-2 rounded-md text-sm font-medium transition-colors bg-primary text-white" data-status="all">All</button>
                            <button class="status-filter-btn px-4 py-2 rounded-md text-sm font-medium transition-colors hover:bg-gray-200" data-status="paid">Paid</button>
                            <button class="status-filter-btn px-4 py-2 rounded-md text-sm font-medium transition-colors hover:bg-gray-200" data-status="pending">Pending</button>
                            <button class="status-filter-btn px-4 py-2 rounded-md text-sm font-medium transition-colors hover:bg-gray-200" data-status="overdue">Overdue</button>
                            <button class="status-filter-btn px-4 py-2 rounded-md text-sm font-medium transition-colors hover:bg-gray-200" data-status="draft">Draft</button>
                        </div>

                        <!-- Advanced Filter Dropdown -->
                        <div class="relative">
                            <button id="filter-dropdown-btn" class="flex items-center px-4 py-2 text-gray-600 hover:text-gray-900 border border-gray-300 rounded-lg hover:border-gray-400 transition-colors">
                                <i class="fas fa-filter mr-2"></i>
                                Filter
                                <i class="fas fa-chevron-down ml-2"></i>
                            </button>
                            <!-- Advanced Filter Dropdown -->
                            <div id="filter-dropdown" class="absolute right-0 mt-2 w-80 bg-white border border-gray-200 rounded-lg shadow-lg z-10 hidden">
                                <div class="p-4">
                                    <h3 class="font-medium text-gray-900 mb-4">Advanced Filters</h3>
                                    
                                    <!-- Amount Range -->
                                    <div class="mb-4">
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Amount Range</label>
                                        <div class="flex space-x-2">
                                            <input type="number" id="amount-min" placeholder="Min" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary text-sm">
                                            <input type="number" id="amount-max" placeholder="Max" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary text-sm">
                                        </div>
                                    </div>

                                    <!-- Customer Filter -->
                                    <div class="mb-4">
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Customer</label>
                                        <select id="customer-filter" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary text-sm">
                                            <option value="">All Customers</option>
                                            <!-- Options will be populated dynamically -->
                                        </select>
                                    </div>

                                    <!-- Actions -->
                                    <div class="flex justify-between pt-4 border-t">
                                        <button id="clear-advanced-filters" class="text-sm text-gray-500 hover:text-gray-700">Clear All</button>
                                        <div class="space-x-2">
                                            <button id="cancel-advanced-filter" class="px-3 py-1 text-sm text-gray-600 hover:text-gray-800">Cancel</button>
                                            <button id="apply-advanced-filter" class="px-3 py-1 text-sm bg-primary text-white rounded hover:bg-primary-dark">Apply</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Export Button -->
                        <button id="export-btn" class="flex items-center px-4 py-2 text-gray-600 hover:text-gray-900 border border-gray-300 rounded-lg hover:border-gray-400 transition-colors">
                            <i class="fas fa-download mr-2"></i>
                            Export
                        </button>
                        
                        <!-- Date Range Filter -->
                        <div class="relative">
                            <button id="date-range-btn" class="flex items-center px-4 py-2 text-gray-600 hover:text-gray-900 border border-gray-300 rounded-lg hover:border-gray-400 transition-colors">
                                <i class="fas fa-calendar mr-2"></i>
                                <span id="date-range-text">Date Range</span>
                                <i class="fas fa-chevron-down ml-2"></i>
                            </button>
                            <!-- Date Range Dropdown -->
                            <div id="date-range-dropdown" class="absolute right-0 mt-2 w-80 bg-white border border-gray-200 rounded-lg shadow-lg z-10 hidden">
                                <div class="p-4">
                                    <h3 class="font-medium text-gray-900 mb-4">Filter by Date</h3>
                                    
                                    <!-- Quick Date Options -->
                                    <div class="mb-4">
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Quick Select</label>
                                        <div class="grid grid-cols-2 gap-2">
                                            <button class="quick-date-btn px-3 py-2 text-sm border border-gray-300 rounded hover:bg-gray-50" data-days="7">Last 7 days</button>
                                            <button class="quick-date-btn px-3 py-2 text-sm border border-gray-300 rounded hover:bg-gray-50" data-days="30">Last 30 days</button>
                                            <button class="quick-date-btn px-3 py-2 text-sm border border-gray-300 rounded hover:bg-gray-50" data-days="90">Last 3 months</button>
                                            <button class="quick-date-btn px-3 py-2 text-sm border border-gray-300 rounded hover:bg-gray-50" data-days="365">This year</button>
                                        </div>
                                    </div>

                                    <!-- Custom Date Range -->
                                    <div class="mb-4">
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Custom Range</label>
                                        <div class="space-y-3">
                                            <div>
                                                <label class="block text-xs text-gray-600 mb-1">From Date</label>
                                                <input type="date" id="date-from" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary text-sm">
                                            </div>
                                            <div>
                                                <label class="block text-xs text-gray-600 mb-1">To Date</label>
                                                <input type="date" id="date-to" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary text-sm">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Actions -->
                                    <div class="flex justify-between pt-4 border-t">
                                        <button id="clear-date-filter" class="text-sm text-gray-500 hover:text-gray-700">Clear</button>
                                        <div class="space-x-2">
                                            <button id="cancel-date-filter" class="px-3 py-1 text-sm text-gray-600 hover:text-gray-800">Cancel</button>
                                            <button id="apply-date-filter" class="px-3 py-1 text-sm bg-primary text-white rounded hover:bg-primary-dark">Apply</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Invoice Table -->
            <div class="overflow-x-auto">
                <!-- Loading State -->
                <div id="loading-state" class="hidden flex justify-center items-center py-12">
                    <div class="animate-spin rounded-full h-8 w-8 border-b-2 border-primary"></div>
                    <span class="ml-2 text-gray-600">Loading invoices...</span>
                </div>

                <!-- Empty State -->
                <div id="empty-state" class="flex flex-col items-center justify-center py-16 px-6">
                    <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mb-6">
                        <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-medium text-gray-900 mb-2">No invoices yet</h3>
                    <p class="text-gray-500 text-center max-w-sm mb-6">Create your first invoice to get started with managing your billing.</p>
                    <button class="create-first-invoice-btn bg-primary hover:bg-primary-dark text-white px-6 py-3 rounded-lg font-medium transition-colors">
                        Create First Invoice
                    </button>
                </div>

                <!-- Invoice Table -->
                <table id="invoice-table" class="w-full hidden">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                <input type="checkbox" id="select-all" class="rounded border-gray-300 text-primary focus:ring-primary">
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider cursor-pointer hover:bg-gray-100" data-sort="invoice_number">
                                Invoice # <i class="fas fa-sort text-gray-400 ml-1"></i>
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider cursor-pointer hover:bg-gray-100" data-sort="customer_name">
                                Customer <i class="fas fa-sort text-gray-400 ml-1"></i>
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider cursor-pointer hover:bg-gray-100" data-sort="amount">
                                Amount <i class="fas fa-sort text-gray-400 ml-1"></i>
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider cursor-pointer hover:bg-gray-100" data-sort="status">
                                Status <i class="fas fa-sort text-gray-400 ml-1"></i>
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider cursor-pointer hover:bg-gray-100" data-sort="due_date">
                                Date <i class="fas fa-sort text-gray-400 ml-1"></i>
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="invoice-tbody" class="bg-white divide-y divide-gray-200">
                        <!-- Invoice rows will be populated here -->
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div id="pagination" class="px-6 py-4 border-t border-gray-200 hidden">
                <div class="flex items-center justify-between">
                    <div class="text-sm text-gray-700">
                        Showing <span id="showing-from">1</span> to <span id="showing-to">10</span> of <span id="total-records">0</span> results
                    </div>
                    <div class="flex space-x-2" id="pagination-controls">
                        <!-- Pagination buttons will be generated here -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Create Invoice Modal -->
    <div id="create-invoice-modal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50">
        <div class="flex items-center justify-center min-h-screen p-4">
            <div class="bg-white rounded-xl shadow-xl max-w-2xl w-full max-h-[90vh] overflow-y-auto">
                <div class="flex justify-between items-center p-6 border-b">
                    <h2 class="text-xl font-semibold">Create New Invoice</h2>
                    <button id="close-modal" class="text-gray-400 hover:text-gray-600">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>
                <div class="p-6">
                    <form id="invoice-form" class="space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Customer Name *</label>
                                <input type="text" name="customer_name" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                                <div class="text-red-600 text-sm mt-1 hidden" id="customer_name_error"></div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Invoice Number *</label>
                                <input type="text" name="invoice_number" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                                <div class="text-red-600 text-sm mt-1 hidden" id="invoice_number_error"></div>
                            </div>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Amount *</label>
                                <div class="relative">
                                    <span class="absolute left-3 top-2 text-gray-600">$</span>
                                    <input type="number" name="amount" step="0.01" required class="w-full pl-8 pr-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                                </div>
                                <div class="text-red-600 text-sm mt-1 hidden" id="amount_error"></div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Due Date *</label>
                                <input type="date" name="due_date" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                                <div class="text-red-600 text-sm mt-1 hidden" id="due_date_error"></div>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                            <select name="status" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                                <option value="draft">Draft</option>
                                <option value="pending">Pending</option>
                                <option value="paid">Paid</option>
                                <option value="overdue">Overdue</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                            <textarea name="description" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" placeholder="Add invoice description..."></textarea>
                        </div>

                        <div class="flex justify-end space-x-4">
                            <button type="button" id="cancel-create" class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
                                Cancel
                            </button>
                            <button type="submit" class="px-6 py-2 bg-primary text-white rounded-lg hover:bg-primary-dark transition-colors">
                                <span id="create-btn-text">Create Invoice</span>
                                <i class="fas fa-spinner fa-spin hidden" id="create-btn-loading"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Notification Container -->
    <div id="notification-container" class="fixed top-4 right-4 z-50 space-y-2"></div>

    <script>
        // Application State
        const AppState = {
            invoices: [
                // Sample data untuk demo
                {
                    id: 1,
                    invoice_number: 'INV-001',
                    customer_name: 'John Doe',
                    amount: 1500.00,
                    status: 'paid',
                    due_date: '2024-01-15',
                    description: 'Web development services',
                    created_at: '2024-01-01'
                },
                {
                    id: 2,
                    invoice_number: 'INV-002',
                    customer_name: 'Jane Smith',
                    amount: 2500.00,
                    status: 'pending',
                    due_date: '2024-02-15',
                    description: 'Consulting services',
                    created_at: '2024-01-05'
                },
                {
                    id: 3,
                    invoice_number: 'INV-003',
                    customer_name: 'ABC Corp',
                    amount: 850.00,
                    status: 'overdue',
                    due_date: '2024-01-30',
                    description: 'Design services',
                    created_at: '2024-01-10'
                }
            ],
            filters: {
                status: 'all',
                search: '',
                dateFrom: null,
                dateTo: null,
                amountMin: null,
                amountMax: null,
                customer: ''
            },
            sorting: {
                field: null,
                direction: 'asc'
            },
            pagination: {
                currentPage: 1,
                perPage: 10
            }
        };

        // DOM Elements
        const elements = {
            searchInput: document.getElementById('search-input'),
            statsCards: document.querySelectorAll('[data-filter]'),
            statusFilterBtns: document.querySelectorAll('.status-filter-btn'),
            createInvoiceBtn: document.getElementById('create-invoice-btn'),
            createFirstInvoiceBtn: document.querySelector('.create-first-invoice-btn'),
            modal: document.getElementById('create-invoice-modal'),
            closeModal: document.getElementById('close-modal'),
            cancelCreate: document.getElementById('cancel-create'),
            invoiceForm: document.getElementById('invoice-form'),
            invoiceTable: document.getElementById('invoice-table'),
            invoiceTableBody: document.getElementById('invoice-tbody'),
            emptyState: document.getElementById('empty-state'),
            loadingState: document.getElementById('loading-state'),
            pagination: document.getElementById('pagination'),
            
            // Date Range Elements
            dateRangeBtn: document.getElementById('date-range-btn'),
            dateRangeDropdown: document.getElementById('date-range-dropdown'),
            dateRangeText: document.getElementById('date-range-text'),
            dateFrom: document.getElementById('date-from'),
            dateTo: document.getElementById('date-to'),
            applyDateFilter: document.getElementById('apply-date-filter'),
            clearDateFilter: document.getElementById('clear-date-filter'),
            cancelDateFilter: document.getElementById('cancel-date-filter'),
            quickDateBtns: document.querySelectorAll('.quick-date-btn'),

            // Advanced Filter Elements
            filterDropdownBtn: document.getElementById('filter-dropdown-btn'),
            filterDropdown: document.getElementById('filter-dropdown'),
            amountMin: document.getElementById('amount-min'),
            amountMax: document.getElementById('amount-max'),
            customerFilter: document.getElementById('customer-filter'),
            applyAdvancedFilter: document.getElementById('apply-advanced-filter'),
            clearAdvancedFilters: document.getElementById('clear-advanced-filters'),
            cancelAdvancedFilter: document.getElementById('cancel-advanced-filter'),

            // Export
            exportBtn: document.getElementById('export-btn')
        };

        // Utility Functions
        const Utils = {
            formatCurrency: (amount) => `$${Number(amount).toFixed(2)}`,
            formatDate: (dateString) => new Date(dateString).toLocaleDateString(),
            getStatusBadge: (status) => {
                const badges = {
                    paid: '<span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">Paid</span>',
                    pending: '<span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-orange-100 text-orange-800">Pending</span>',
                    overdue: '<span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800">Overdue</span>',
                    draft: '<span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-gray-100 text-gray-800">Draft</span>'
                };
                return badges[status] || '';
            },
            showNotification: (message, type = 'info') => {
                const container = document.getElementById('notification-container');
                const notification = document.createElement('div');
                const colors = {
                    success: 'bg-green-500',
                    error: 'bg-red-500',
                    info: 'bg-blue-500',
                    warning: 'bg-yellow-500'
                };
                
                notification.className = `${colors[type]} text-white px-6 py-3 rounded-lg shadow-lg transform transition-transform duration-300 translate-x-full`;
                notification.textContent = message;
                
                container.appendChild(notification);
                
                // Animate in
                setTimeout(() => notification.classList.remove('translate-x-full'), 100);
                
                // Remove after 3 seconds
                setTimeout(() => {
                    notification.classList.add('translate-x-full');
                    setTimeout(() => notification.remove(), 300);
                }, 3000);
            },
            debounce: (func, wait) => {
                let timeout;
                return function executedFunction(...args) {
                    const later = () => {
                        clearTimeout(timeout);
                        func(...args);
                    };
                    clearTimeout(timeout);
                    timeout = setTimeout(later, wait);
                };
            }
        };

        // Filter Functions
        const FilterManager = {
            getFilteredInvoices: () => {
                let filtered = [...AppState.invoices];
                const filters = AppState.filters;

                // Status filter
                if (filters.status !== 'all') {
                    filtered = filtered.filter(inv => inv.status === filters.status);
                }

                // Search filter
                if (filters.search) {
                    const searchTerm = filters.search.toLowerCase();
                    filtered = filtered.filter(inv => 
                        inv.customer_name.toLowerCase().includes(searchTerm) ||
                        inv.invoice_number.toLowerCase().includes(searchTerm) ||
                        inv.description.toLowerCase().includes(searchTerm)
                    );
                }

                // Date range filter
                if (filters.dateFrom || filters.dateTo) {
                    filtered = filtered.filter(inv => {
                        const invDate = new Date(inv.due_date);
                        let passFilter = true;
                        
                        if (filters.dateFrom) {
                            passFilter = passFilter && invDate >= new Date(filters.dateFrom);
                        }
                        
                        if (filters.dateTo) {
                            passFilter = passFilter && invDate <= new Date(filters.dateTo);
                        }
                        
                        return passFilter;
                    });
                }

                // Amount filter
                if (filters.amountMin !== null || filters.amountMax !== null) {
                    filtered = filtered.filter(inv => {
                        let passFilter = true;
                        
                        if (filters.amountMin !== null) {
                            passFilter = passFilter && inv.amount >= filters.amountMin;
                        }
                        
                        if (filters.amountMax !== null) {
                            passFilter = passFilter && inv.amount <= filters.amountMax;
                        }
                        
                        return passFilter;
                    });
                }

                // Customer filter
                if (filters.customer) {
                    filtered = filtered.filter(inv => inv.customer_name === filters.customer);
                }

                return filtered;
            },

            applySorting: (invoices) => {
                const { field, direction } = AppState.sorting;
                if (!field) return invoices;

                return [...invoices].sort((a, b) => {
                    let aVal = a[field];
                    let bVal = b[field];

                    if (field === 'amount') {
                        aVal = Number(aVal);
                        bVal = Number(bVal);
                    } else if (field === 'due_date') {
                        aVal = new Date(aVal);
                        bVal = new Date(bVal);
                    } else {
                        aVal = String(aVal).toLowerCase();
                        bVal = String(bVal).toLowerCase();
                    }

                    if (direction === 'asc') {
                        return aVal > bVal ? 1 : -1;
                    } else {
                        return aVal < bVal ? 1 : -1;
                    }
                });
            },

            updateStats: () => {
                const invoices = AppState.invoices;
                const stats = {
                    total: invoices.length,
                    paid: invoices.filter(inv => inv.status === 'paid').length,
                    pending: invoices.filter(inv => inv.status === 'pending').length,
                    overdue: invoices.filter(inv => inv.status === 'overdue').length
                };

                document.getElementById('total-count').textContent = stats.total;
                document.getElementById('paid-count').textContent = stats.paid;
                document.getElementById('pending-count').textContent = stats.pending;
                document.getElementById('overdue-count').textContent = stats.overdue;
            }
        };

        // Table Renderer
        const TableRenderer = {
            render: () => {
                const filteredInvoices = FilterManager.getFilteredInvoices();
                const sortedInvoices = FilterManager.applySorting(filteredInvoices);
                
                if (sortedInvoices.length === 0) {
                    elements.emptyState.classList.remove('hidden');
                    elements.invoiceTable.classList.add('hidden');
                    elements.pagination.classList.add('hidden');
                } else {
                    elements.emptyState.classList.add('hidden');
                    elements.invoiceTable.classList.remove('hidden');
                    elements.pagination.classList.remove('hidden');

                    // Render table rows
                    elements.invoiceTableBody.innerHTML = sortedInvoices.map(invoice => `
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4">
                                <input type="checkbox" class="invoice-checkbox rounded border-gray-300 text-primary focus:ring-primary" data-id="${invoice.id}">
                            </td>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900">${invoice.invoice_number}</td>
                            <td class="px-6 py-4 text-sm text-gray-900">${invoice.customer_name}</td>
                            <td class="px-6 py-4 text-sm text-gray-900">${Utils.formatCurrency(invoice.amount)}</td>
                            <td class="px-6 py-4">${Utils.getStatusBadge(invoice.status)}</td>
                            <td class="px-6 py-4 text-sm text-gray-900">${Utils.formatDate(invoice.due_date)}</td>
                            <td class="px-6 py-4 text-sm">
                                <div class="flex space-x-2">
                                    <button class="text-primary hover:text-primary-dark transition-colors" title="View" onclick="InvoiceActions.view(${invoice.id})">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="text-gray-600 hover:text-gray-900 transition-colors" title="Edit" onclick="InvoiceActions.edit(${invoice.id})">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="text-red-600 hover:text-red-900 transition-colors" title="Delete" onclick="InvoiceActions.delete(${invoice.id})">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    `).join('');

                    // Update pagination info
                    document.getElementById('showing-from').textContent = '1';
                    document.getElementById('showing-to').textContent = sortedInvoices.length.toString();
                    document.getElementById('total-records').textContent = sortedInvoices.length.toString();
                }

                // Update select all checkbox
                TableRenderer.updateSelectAll();
            },

            updateSelectAll: () => {
                const selectAll = document.getElementById('select-all');
                const checkboxes = document.querySelectorAll('.invoice-checkbox');
                const checkedBoxes = document.querySelectorAll('.invoice-checkbox:checked');
                
                if (checkboxes.length === 0) {
                    selectAll.indeterminate = false;
                    selectAll.checked = false;
                } else if (checkedBoxes.length === checkboxes.length) {
                    selectAll.indeterminate = false;
                    selectAll.checked = true;
                } else if (checkedBoxes.length > 0) {
                    selectAll.indeterminate = true;
                    selectAll.checked = false;
                } else {
                    selectAll.indeterminate = false;
                    selectAll.checked = false;
                }
            }
        };

        // Invoice Actions
        const InvoiceActions = {
            view: (id) => {
                const invoice = AppState.invoices.find(inv => inv.id === id);
                if (invoice) {
                    alert(`Invoice Details:\n\nNumber: ${invoice.invoice_number}\nCustomer: ${invoice.customer_name}\nAmount: ${Utils.formatCurrency(invoice.amount)}\nStatus: ${invoice.status}\nDue Date: ${Utils.formatDate(invoice.due_date)}\nDescription: ${invoice.description}`);
                }
            },

            edit: (id) => {
                Utils.showNotification('Edit functionality will be implemented with backend integration', 'info');
                // TODO: Implement edit functionality
                // This would open the modal with pre-filled data for editing
            },

            delete: (id) => {
                if (confirm('Are you sure you want to delete this invoice?')) {
                    AppState.invoices = AppState.invoices.filter(inv => inv.id !== id);
                    FilterManager.updateStats();
                    TableRenderer.render();
                    Utils.showNotification('Invoice deleted successfully!', 'success');
                }
            },

            create: (formData) => {
                // Generate new ID
                const newId = Math.max(...AppState.invoices.map(inv => inv.id), 0) + 1;
                
                const newInvoice = {
                    id: newId,
                    invoice_number: formData.get('invoice_number'),
                    customer_name: formData.get('customer_name'),
                    amount: parseFloat(formData.get('amount')),
                    status: formData.get('status'),
                    due_date: formData.get('due_date'),
                    description: formData.get('description') || '',
                    created_at: new Date().toISOString().split('T')[0]
                };

                AppState.invoices.push(newInvoice);
                FilterManager.updateStats();
                TableRenderer.render();
                Utils.showNotification('Invoice created successfully!', 'success');
            }
        };

        // Date Filter Handler
        const DateFilterHandler = {
            applyQuickDate: (days) => {
                const today = new Date();
                const fromDate = new Date(today.getTime() - (days * 24 * 60 * 60 * 1000));
                
                elements.dateFrom.value = fromDate.toISOString().split('T')[0];
                elements.dateTo.value = today.toISOString().split('T')[0];
                
                DateFilterHandler.apply();
            },

            apply: () => {
                const fromDate = elements.dateFrom.value;
                const toDate = elements.dateTo.value;
                
                AppState.filters.dateFrom = fromDate || null;
                AppState.filters.dateTo = toDate || null;
                
                // Update button text
                if (fromDate || toDate) {
                    const fromText = fromDate ? Utils.formatDate(fromDate) : 'Start';
                    const toText = toDate ? Utils.formatDate(toDate) : 'End';
                    elements.dateRangeText.textContent = `${fromText} - ${toText}`;
                    elements.dateRangeBtn.classList.add('bg-primary', 'text-white', 'border-primary');
                } else {
                    DateFilterHandler.clear();
                }
                
                elements.dateRangeDropdown.classList.add('hidden');
                TableRenderer.render();
            },

            clear: () => {
                AppState.filters.dateFrom = null;
                AppState.filters.dateTo = null;
                elements.dateFrom.value = '';
                elements.dateTo.value = '';
                elements.dateRangeText.textContent = 'Date Range';
                elements.dateRangeBtn.classList.remove('bg-primary', 'text-white', 'border-primary');
                elements.dateRangeDropdown.classList.add('hidden');
                TableRenderer.render();
            }
        };

        // Advanced Filter Handler
        const AdvancedFilterHandler = {
            populateCustomerDropdown: () => {
                const customers = [...new Set(AppState.invoices.map(inv => inv.customer_name))];
                elements.customerFilter.innerHTML = '<option value="">All Customers</option>' + 
                    customers.map(customer => `<option value="${customer}">${customer}</option>`).join('');
            },

            apply: () => {
                AppState.filters.amountMin = elements.amountMin.value ? parseFloat(elements.amountMin.value) : null;
                AppState.filters.amountMax = elements.amountMax.value ? parseFloat(elements.amountMax.value) : null;
                AppState.filters.customer = elements.customerFilter.value;
                
                elements.filterDropdown.classList.add('hidden');
                TableRenderer.render();
                
                Utils.showNotification('Advanced filters applied', 'info');
            },

            clear: () => {
                AppState.filters.amountMin = null;
                AppState.filters.amountMax = null;
                AppState.filters.customer = '';
                
                elements.amountMin.value = '';
                elements.amountMax.value = '';
                elements.customerFilter.value = '';
                
                elements.filterDropdown.classList.add('hidden');
                TableRenderer.render();
                
                Utils.showNotification('Advanced filters cleared', 'info');
            }
        };

        // Event Listeners
        const EventListeners = {
            init: () => {
                // Modal events
                elements.createInvoiceBtn.addEventListener('click', () => elements.modal.classList.remove('hidden'));
                elements.createFirstInvoiceBtn.addEventListener('click', () => elements.modal.classList.remove('hidden'));
                elements.closeModal.addEventListener('click', () => EventListeners.closeModal());
                elements.cancelCreate.addEventListener('click', () => EventListeners.closeModal());

                // Close modal when clicking outside
                elements.modal.addEventListener('click', (e) => {
                    if (e.target === elements.modal) EventListeners.closeModal();
                });

                // Form submission
                elements.invoiceForm.addEventListener('submit', EventListeners.handleFormSubmit);

                // Search functionality
                elements.searchInput.addEventListener('input', Utils.debounce((e) => {
                    AppState.filters.search = e.target.value;
                    TableRenderer.render();
                }, 300));

                // Status filter buttons
                elements.statusFilterBtns.forEach(btn => {
                    btn.addEventListener('click', () => EventListeners.handleStatusFilter(btn));
                });

                // Stats cards click
                elements.statsCards.forEach(card => {
                    card.addEventListener('click', () => {
                        const filterStatus = card.dataset.filter;
                        EventListeners.setActiveStatusFilter(filterStatus);
                    });
                });

                // Date range events
                elements.dateRangeBtn.addEventListener('click', (e) => {
                    e.stopPropagation();
                    elements.dateRangeDropdown.classList.toggle('hidden');
                    elements.filterDropdown.classList.add('hidden');
                });

                elements.applyDateFilter.addEventListener('click', DateFilterHandler.apply);
                elements.clearDateFilter.addEventListener('click', DateFilterHandler.clear);
                elements.cancelDateFilter.addEventListener('click', () => elements.dateRangeDropdown.classList.add('hidden'));

                // Quick date buttons
                elements.quickDateBtns.forEach(btn => {
                    btn.addEventListener('click', () => {
                        const days = parseInt(btn.dataset.days);
                        DateFilterHandler.applyQuickDate(days);
                    });
                });

                // Advanced filter events
                elements.filterDropdownBtn.addEventListener('click', (e) => {
                    e.stopPropagation();
                    elements.filterDropdown.classList.toggle('hidden');
                    elements.dateRangeDropdown.classList.add('hidden');
                });

                elements.applyAdvancedFilter.addEventListener('click', AdvancedFilterHandler.apply);
                elements.clearAdvancedFilters.addEventListener('click', AdvancedFilterHandler.clear);
                elements.cancelAdvancedFilter.addEventListener('click', () => elements.filterDropdown.classList.add('hidden'));

                // Export button
                elements.exportBtn.addEventListener('click', () => {
                    Utils.showNotification('Export functionality will be implemented with backend', 'info');
                });

                // Select all checkbox
                document.addEventListener('change', (e) => {
                    if (e.target.id === 'select-all') {
                        const checkboxes = document.querySelectorAll('.invoice-checkbox');
                        checkboxes.forEach(cb => cb.checked = e.target.checked);
                    } else if (e.target.classList.contains('invoice-checkbox')) {
                        TableRenderer.updateSelectAll();
                    }
                });

                // Table sorting
                document.querySelectorAll('[data-sort]').forEach(header => {
                    header.addEventListener('click', () => EventListeners.handleSort(header.dataset.sort));
                });

                // Close dropdowns when clicking outside
                document.addEventListener('click', (e) => {
                    if (!elements.dateRangeDropdown.contains(e.target) && !elements.dateRangeBtn.contains(e.target)) {
                        elements.dateRangeDropdown.classList.add('hidden');
                    }
                    if (!elements.filterDropdown.contains(e.target) && !elements.filterDropdownBtn.contains(e.target)) {
                        elements.filterDropdown.classList.add('hidden');
                    }
                });
            },

            closeModal: () => {
                elements.modal.classList.add('hidden');
                elements.invoiceForm.reset();
                EventListeners.clearFormErrors();
            },

            handleFormSubmit: (e) => {
                e.preventDefault();
                
                if (EventListeners.validateForm()) {
                    const formData = new FormData(e.target);
                    InvoiceActions.create(formData);
                    EventListeners.closeModal();
                }
            },

            validateForm: () => {
                const formData = new FormData(elements.invoiceForm);
                let isValid = true;

                // Clear previous errors
                EventListeners.clearFormErrors();

                // Validate required fields
                const requiredFields = ['customer_name', 'invoice_number', 'amount', 'due_date'];
                requiredFields.forEach(field => {
                    if (!formData.get(field)) {
                        EventListeners.showFieldError(field, 'This field is required');
                        isValid = false;
                    }
                });

                // Validate amount
                const amount = formData.get('amount');
                if (amount && (isNaN(amount) || parseFloat(amount) <= 0)) {
                    EventListeners.showFieldError('amount', 'Please enter a valid amount');
                    isValid = false;
                }

                // Check if invoice number already exists
                const invoiceNumber = formData.get('invoice_number');
                if (invoiceNumber && AppState.invoices.some(inv => inv.invoice_number === invoiceNumber)) {
                    EventListeners.showFieldError('invoice_number', 'Invoice number already exists');
                    isValid = false;
                }

                return isValid;
            },

            showFieldError: (fieldName, message) => {
                const errorElement = document.getElementById(`${fieldName}_error`);
                if (errorElement) {
                    errorElement.textContent = message;
                    errorElement.classList.remove('hidden');
                }
                
                const fieldElement = document.querySelector(`[name="${fieldName}"]`);
                if (fieldElement) {
                    fieldElement.classList.add('border-red-500');
                }
            },

            clearFormErrors: () => {
                const errorElements = document.querySelectorAll('[id$="_error"]');
                errorElements.forEach(el => {
                    el.classList.add('hidden');
                    el.textContent = '';
                });
                
                const fieldElements = document.querySelectorAll('#invoice-form input, #invoice-form select, #invoice-form textarea');
                fieldElements.forEach(el => el.classList.remove('border-red-500'));
            },

            handleStatusFilter: (btn) => {
                elements.statusFilterBtns.forEach(b => {
                    b.classList.remove('active', 'bg-primary', 'text-white');
                    b.classList.add('hover:bg-gray-200');
                });
                
                btn.classList.add('active', 'bg-primary', 'text-white');
                btn.classList.remove('hover:bg-gray-200');
                
                AppState.filters.status = btn.dataset.status;
                TableRenderer.render();
            },

            setActiveStatusFilter: (status) => {
                const targetBtn = document.querySelector(`[data-status="${status}"]`);
                if (targetBtn) {
                    EventListeners.handleStatusFilter(targetBtn);
                }
            },

            handleSort: (field) => {
                if (AppState.sorting.field === field) {
                    AppState.sorting.direction = AppState.sorting.direction === 'asc' ? 'desc' : 'asc';
                } else {
                    AppState.sorting.field = field;
                    AppState.sorting.direction = 'asc';
                }
                
                TableRenderer.render();
                
                // Update sort icons
                document.querySelectorAll('[data-sort] i').forEach(icon => {
                    icon.className = 'fas fa-sort text-gray-400 ml-1';
                });
                
                const currentIcon = document.querySelector(`[data-sort="${field}"] i`);
                if (currentIcon) {
                    currentIcon.className = AppState.sorting.direction === 'asc' 
                        ? 'fas fa-sort-up text-primary ml-1' 
                        : 'fas fa-sort-down text-primary ml-1';
                }
            }
        };

        // Initialize Application
        document.addEventListener('DOMContentLoaded', () => {
            EventListeners.init();
            AdvancedFilterHandler.populateCustomerDropdown();
            FilterManager.updateStats();
            TableRenderer.render();
            
            Utils.showNotification('Dashboard loaded successfully!', 'success');
        });
    </script>

    <style>
        /* Custom styles for enhanced interactivity */
        .status-filter-btn.active {
            @apply bg-primary text-white;
        }
        
        .status-filter-btn:not(.active):hover {
            @apply bg-gray-200;
        }
        
        /* Loading animation */
        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.5; }
        }
        
        .animate-pulse {
            animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }
        
        /* Smooth transitions */
        * {
            transition-property: background-color, border-color, color, fill, stroke, opacity, box-shadow, transform;
            transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
            transition-duration: 150ms;
        }
    </style>
</body>
@endsection
</html>