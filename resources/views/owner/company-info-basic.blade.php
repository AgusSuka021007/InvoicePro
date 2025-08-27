@extends('layouts.app')

@section('title', 'Company Registration - InvoicePro')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-indigo-500 via-purple-500 to-purple-600 flex items-center justify-center p-4">
    <div class="w-full max-w-md">
        <div class="bg-white rounded-2xl shadow-2xl p-8">
            <!-- Logo and Header -->
            <div class="text-center mb-8">
                <div class="inline-flex items-center justify-center w-12 h-12 bg-indigo-100 rounded-xl mb-4">
                    <svg class="w-6 h-6 text-indigo-600" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8l-6-6z"/>
                        <polyline points="14,2 14,8 20,8"/>
                        <line x1="16" y1="13" x2="8" y2="13"/>
                        <line x1="16" y1="17" x2="8" y2="17"/>
                        <polyline points="10,9 9,9 8,9"/>
                    </svg>
                </div>
                <h1 class="text-2xl font-bold text-gray-900 mb-2">InvoicePro</h1>
                <h2 class="text-xl font-semibold text-gray-800 mb-2">Company Information</h2>
                <p class="text-gray-600 text-sm">Let's set up your business profile to get started with professional invoicing</p>
            </div>

            <!-- Form -->
            <form action="{{ route('') }}" method="POST" class="space-y-6">
                @csrf

                <!-- Basic Company Information Section -->
                <div class="space-y-4">
                    <div class="flex items-center space-x-2 mb-4">
                        <div class="w-2 h-2 bg-indigo-600 rounded-full"></div>
                        <h3 class="text-sm font-semibold text-gray-700">Basic Company Information</h3>
                    </div>

                    <!-- Company Name and Email Row -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="company_name" class="block text-sm font-medium text-gray-700 mb-1">
                                Company Name <span class="text-red-500">*</span>
                            </label>
                            <input 
                                type="text" 
                                id="company_name" 
                                name="company_name" 
                                value="{{ old('company_name') }}"
                                placeholder="Enter Company Name"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors @error('company_name') border-red-500 @enderror"
                                required
                            >
                            @error('company_name')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="company_email" class="block text-sm font-medium text-gray-700 mb-1">
                                Company Email <span class="text-red-500">*</span>
                            </label>
                            <input 
                                type="email" 
                                id="company_email" 
                                name="company_email" 
                                value="{{ old('company_email') }}"
                                placeholder="yourcompany@gmail.com"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors @error('company_email') border-red-500 @enderror"
                                required
                            >
                            @error('company_email')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Phone Number and Registration Code Row -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="phone_number" class="block text-sm font-medium text-gray-700 mb-1">
                                Phone Number <span class="text-red-500">*</span>
                            </label>
                            <input 
                                type="tel" 
                                id="phone_number" 
                                name="phone_number" 
                                value="{{ old('phone_number') }}"
                                placeholder="(+62) 812 3456 789"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors @error('phone_number') border-red-500 @enderror"
                                required
                            >
                            @error('phone_number')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="registration_code" class="block text-sm font-medium text-gray-700 mb-1">
                                Business Registration Code <span class="text-red-500">*</span>
                            </label>
                            <input 
                                type="text" 
                                id="registration_code" 
                                name="registration_code" 
                                value="{{ old('registration_code') }}"
                                placeholder="Enter Company Email"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors @error('registration_code') border-red-500 @enderror"
                                required
                            >
                            @error('registration_code')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Company Address -->
                    <div>
                        <label for="company_address" class="block text-sm font-medium text-gray-700 mb-1">
                            Company Address <span class="text-red-500">*</span>
                        </label>
                        <textarea 
                            id="company_address" 
                            name="company_address" 
                            rows="3"
                            placeholder="Enter Company Address"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors resize-none @error('company_address') border-red-500 @enderror"
                            required
                        >{{ old('company_address') }}</textarea>
                        @error('company_address')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="flex items-center justify-between pt-6 border-t border-gray-200">
                    <a 
                        href="{{ route('register') }}" 
                        class="text-sm text-gray-600 hover:text-gray-900 transition-colors flex items-center"
                    >
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                        </svg>
                        Back to Register
                    </a>

                    <button 
                        type="submit" 
                        class="bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2 px-6 rounded-lg transition-colors focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                    >
                        Continue Step 
                        <svg class="w-4 h-4 ml-1 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Auto-format phone number
    document.getElementById('phone_number').addEventListener('input', function(e) {
        let value = e.target.value.replace(/\D/g, '');
        if (value.length > 0) {
            if (value.startsWith('62')) {
                value = value.replace(/^62/, '(+62) ');
            } else if (value.startsWith('0')) {
                value = value.replace(/^0/, '(+62) ');
            }
            value = value.replace(/(\+62\) )(\d{3})(\d{4})(\d{3})/, '$1$2 $3 $4');
        }
        e.target.value = value;
    });

    // Form validation feedback
    document.querySelector('form').addEventListener('submit', function(e) {
        const requiredFields = document.querySelectorAll('[required]');
        let isValid = true;
        
        requiredFields.forEach(field => {
            if (!field.value.trim()) {
                field.classList.add('border-red-500');
                isValid = false;
            } else {
                field.classList.remove('border-red-500');
            }
        });
        
        if (!isValid) {
            e.preventDefault();
        }
    });
</script>
@endpush
@endsection