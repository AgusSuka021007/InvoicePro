@extends('layouts.app')

@section('title', 'Additional Company Data - InvoicePro')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-indigo-500 via-purple-500 to-purple-600 flex items-center justify-center p-4">
    <div class="w-full max-w-lg">
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
                <h1 class="text-2xl font-bold text-indigo-600 mb-2">InvoicePro</h1>
                <h2 class="text-xl font-semibold text-gray-800 mb-2">Additional Company Data</h2>
                <p class="text-gray-600 text-sm">Enhance your company profile with additional information to create more professional invoices</p>
            </div>

            <!-- Optional Notice -->
            <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-3 mb-6">
                <p class="text-yellow-800 text-sm">All fields on this page are optional. You can skip this step and add this information later.</p>
            </div>

            <!-- Progress Line -->
            <div class="w-full h-0.5 bg-gradient-to-r from-indigo-500 to-purple-500 rounded-full mb-8"></div>

            <!-- Form -->
            <form action="{{ route('company.additional-data.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                @csrf

                <!-- Company Profile Photo Section -->
                <div class="space-y-4">
                    <div class="flex items-center space-x-2 mb-4">
                        <div class="w-6 h-6 bg-indigo-100 rounded flex items-center justify-center">
                            <svg class="w-4 h-4 text-indigo-600" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                            </svg>
                        </div>
                        <h3 class="text-sm font-semibold text-gray-700">Company Profile Photo</h3>
                    </div>

                    <div>
                        <label for="profile_photo" class="block text-sm font-medium text-gray-700 mb-2">
                            Profile Photo <span class="text-gray-400 text-xs">(Optional)</span>
                        </label>
                        <div class="flex items-center space-x-4">
                            <div class="w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center">
                                <svg class="w-6 h-6 text-indigo-600" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8l-6-6z"/>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <input 
                                    type="file" 
                                    id="profile_photo" 
                                    name="profile_photo" 
                                    accept="image/*"
                                    class="hidden"
                                    onchange="updateFileName(this)"
                                >
                                <label 
                                    for="profile_photo" 
                                    class="cursor-pointer inline-flex items-center px-4 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 transition-colors"
                                >
                                    📷 Choose company photo
                                </label>
                                <p class="text-xs text-gray-500 mt-1">Recommended: Square image (max 2MB)</p>
                            </div>
                        </div>
                        @error('profile_photo')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Business Information Section -->
                <div class="space-y-4">
                    <div class="flex items-center space-x-2 mb-4">
                        <div class="w-6 h-6 bg-indigo-100 rounded flex items-center justify-center">
                            <svg class="w-4 h-4 text-indigo-600" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-5 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z"/>
                            </svg>
                        </div>
                        <h3 class="text-sm font-semibold text-gray-700">Business Information</h3>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="website" class="block text-sm font-medium text-gray-700 mb-1">
                                Website <span class="text-gray-400 text-xs">(Optional)</span>
                            </label>
                            <input 
                                type="url" 
                                id="website" 
                                name="website" 
                                value="{{ old('website') }}"
                                placeholder="https://yourcompany.com"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors @error('website') border-red-500 @enderror"
                            >
                            @error('website')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="tax_id" class="block text-sm font-medium text-gray-700 mb-1">
                                TAX ID (NPWP)
                            </label>
                            <input 
                                type="text" 
                                id="tax_id" 
                                name="tax_id" 
                                value="{{ old('tax_id') }}"
                                placeholder="XX.XXX.XXX.X-XXX.XXX"
                                maxlength="20"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors @error('tax_id') border-red-500 @enderror"
                            >
                            @error('tax_id')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- System Preferences Section -->
                <div class="space-y-4">
                    <div class="flex items-center space-x-2 mb-4">
                        <div class="w-6 h-6 bg-indigo-100 rounded flex items-center justify-center">
                            <svg class="w-4 h-4 text-indigo-600" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M19.14,12.94c0.04-0.3,0.06-0.61,0.06-0.94c0-0.32-0.02-0.64-0.07-0.94l2.03-1.58c0.18-0.14,0.23-0.41,0.12-0.61 l-1.92-3.32c-0.12-0.22-0.37-0.29-0.59-0.22l-2.39,0.96c-0.5-0.38-1.03-0.7-1.62-0.94L14.4,2.81c-0.04-0.24-0.24-0.41-0.48-0.41 h-3.84c-0.24,0-0.43,0.17-0.47,0.41L9.25,5.35C8.66,5.59,8.12,5.92,7.63,6.29L5.24,5.33c-0.22-0.08-0.47,0-0.59,0.22L2.74,8.87 C2.62,9.08,2.66,9.34,2.86,9.48l2.03,1.58C4.84,11.36,4.82,11.69,4.82,12s0.02,0.64,0.07,0.94l-2.03,1.58 c-0.18,0.14-0.23,0.41-0.12,0.61l1.92,3.32c0.12,0.22,0.37,0.29,0.59,0.22l2.39-0.96c0.5,0.38,1.03,0.7,1.62,0.94l0.36,2.54 c0.05,0.24,0.24,0.41,0.48,0.41h3.84c0.24,0,0.44-0.17,0.47-0.41l0.36-2.54c0.59-0.24,1.13-0.56,1.62-0.94l2.39,0.96 c0.22,0.08,0.47,0,0.59-0.22l1.92-3.32c0.12-0.22,0.07-0.47-0.12-0.61L19.14,12.94z M12,15.6c-1.98,0-3.6-1.62-3.6-3.6 s1.62-3.6,3.6-3.6s3.6,1.62,3.6,3.6S13.98,15.6,12,15.6z"/>
                            </svg>
                        </div>
                        <h3 class="text-sm font-semibold text-gray-700">System Preferences</h3>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="timezone" class="block text-sm font-medium text-gray-700 mb-1">
                                Timezone <span class="text-gray-400 text-xs">(Optional)</span>
                            </label>
                            <div class="relative">
                                <select 
                                    id="timezone" 
                                    name="timezone" 
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors appearance-none bg-white @error('timezone') border-red-500 @enderror"
                                >
                                    <option value="">Select your timezone</option>
                                    <optgroup label="Select Timezone">
                                        <option value="Asia/Jakarta" {{ old('timezone') == 'Asia/Jakarta' ? 'selected' : '' }}>Asia/Jakarta (WIB)</option>
                                        <option value="Asia/Kuala_Lumpur" {{ old('timezone') == 'Asia/Kuala_Lumpur' ? 'selected' : '' }}>Asia/Malaysia (WIB)</option>
                                        <option value="Asia/Makassar" {{ old('timezone') == 'Asia/Makassar' ? 'selected' : '' }}>Asia/Kalimantan(WITA)</option>
                                        <option value="Asia/Jayapura" {{ old('timezone') == 'Asia/Jayapura' ? 'selected' : '' }}>Asia/Papua (WIT)</option>
                                        <option value="Asia/Singapore" {{ old('timezone') == 'Asia/Singapore' ? 'selected' : '' }}>Asia/Singapore (SGT)</option>
                                    </optgroup>
                                </select>
                                <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                    </svg>
                                </div>
                            </div>
                            @error('timezone')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="invoice_format" class="block text-sm font-medium text-gray-700 mb-1">
                                Invoice Format
                            </label>
                            <div class="relative">
                                <select 
                                    id="invoice_format" 
                                    name="invoice_format" 
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors appearance-none bg-white @error('invoice_format') border-red-500 @enderror"
                                >
                                    <option value="">Select invoice format</option>
                                    <optgroup label="Select Invoice Format">
                                        <option value="company-inv-yy-mm-0001" {{ old('invoice_format') == 'company-inv-yy-mm-0001' ? 'selected' : '' }}>Company-INV-YY-MM-0001</option>
                                        <option value="company-inv-0001" {{ old('invoice_format') == 'company-inv-0001' ? 'selected' : '' }}>Company-INV-0001</option>
                                        <option value="company-yy-0001" {{ old('invoice_format') == 'company-yy-0001' ? 'selected' : '' }}>Company-YY-0001</option>
                                        <option value="inv-yyy-0001" {{ old('invoice_format') == 'inv-yyy-0001' ? 'selected' : '' }}>INV-YYY-0001</option>
                                    </optgroup>
                                </select>
                                <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                    </svg>
                                </div>
                            </div>
                            @error('invoice_format')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="flex items-center justify-between pt-6 border-t border-gray-200">
                    <a 
                        href="{{ route('company.create') }}" 
                        class="text-sm text-gray-600 hover:text-gray-900 transition-colors flex items-center"
                    >
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                        </svg>
                        Back to Company Info
                    </a>

                    <button 
                        type="submit" 
                        class="bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2 px-6 rounded-lg transition-colors focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 flex items-center"
                    >
                        Complete Setup
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
    // Format TAX ID input
    document.getElementById('tax_id').addEventListener('input', function(e) {
        let value = e.target.value.replace(/\D/g, '');
        if (value.length > 0) {
            // Format as XX.XXX.XXX.X-XXX.XXX
            value = value.replace(/(\d{2})(\d{3})(\d{3})(\d{1})(\d{3})(\d{3})/, '$1.$2.$3.$4-$5.$6');
            value = value.replace(/(\d{2})(\d{3})(\d{3})(\d{1})(\d{1,3})/, '$1.$2.$3.$4-$5');
            value = value.replace(/(\d{2})(\d{3})(\d{3})(\d{1})/, '$1.$2.$3.$4');
            value = value.replace(/(\d{2})(\d{3})(\d{1,3})/, '$1.$2.$3');
            value = value.replace(/(\d{2})(\d{1,3})/, '$1.$2');
        }
        e.target.value = value;
    });

    // Update file name when file is selected
    function updateFileName(input) {
        const label = input.nextElementSibling;
        if (input.files && input.files[0]) {
            label.textContent = `📷 ${input.files[0].name}`;
            label.classList.add('text-indigo-600');
        } else {
            label.textContent = '📷 Choose company photo';
            label.classList.remove('text-indigo-600');
        }
    }

    // Skip step functionality
    document.addEventListener('DOMContentLoaded', function() {
        // Add skip button dynamically if needed
        const skipBtn = document.createElement('button');
        skipBtn.type = 'button';
        skipBtn.className = 'text-sm text-gray-500 hover:text-gray-700 transition-colors';
        skipBtn.innerHTML = 'Skip this step →';
        skipBtn.onclick = function() {
            window.location.href = "{{ route('dashboard') }}";
        };
        
        // You can uncomment this to add a skip option
        // document.querySelector('.border-t').appendChild(skipBtn);
    });
</script>
@endpush
@endsection