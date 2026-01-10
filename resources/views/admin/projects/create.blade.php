<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ __('messages.add_project') }} - {{ config('app.name', 'Laravel') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 {{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
    <div class="min-h-screen">
        <!-- Sidebar -->
        <aside class="fixed top-0 left-0 h-full w-64 bg-[#2d5016] text-white p-6">
            <h1 class="text-2xl font-bold mb-8">Dashboard</h1>
            <nav class="space-y-4">
                <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 rounded-lg hover:bg-[#1a3a0e] transition-colors">
                    <i class="fas fa-home mr-2"></i> {{ __('messages.dashboard') }}
                </a>
                <a href="{{ route('admin.projects.index') }}" class="block px-4 py-2 rounded-lg bg-[#1a3a0e] transition-colors">
                    <i class="fas fa-folder mr-2"></i> {{ __('messages.projects') }}
                </a>
                <a href="{{ route('admin.services.index') }}" class="block px-4 py-2 rounded-lg hover:bg-[#1a3a0e] transition-colors">
                    <i class="fas fa-concierge-bell mr-2"></i> {{ __('messages.services') }}
                </a>
                <a href="{{ route('welcome') }}" class="block px-4 py-2 rounded-lg hover:bg-[#1a3a0e] transition-colors">
                    <i class="fas fa-globe mr-2"></i> {{ __('messages.view_site') }}
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="ml-64 p-8">
            <div class="max-w-4xl mx-auto">
                <div class="mb-6">
                    <a href="{{ route('admin.projects.index') }}" class="text-[#2d5016] hover:text-[#1a3a0e] flex items-center gap-2">
                        <i class="fas fa-arrow-left"></i> {{ __('messages.back') }}
                    </a>
                </div>

                <h2 class="text-3xl font-bold text-gray-800 mb-6">{{ __('messages.add_project') }}</h2>

                @if($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                        <ul class="list-disc list-inside">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="bg-white rounded-lg shadow-md p-6">
                    <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Name English -->
                        <div class="mb-6">
                            <label for="name_en" class="block text-sm font-medium text-gray-700 mb-2">{{ __('messages.name_en') }} *</label>
                            <input type="text" name="name_en" id="name_en" value="{{ old('name_en') }}" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#2d5016] focus:border-transparent">
                            @error('name_en')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Name Arabic -->
                        <div class="mb-6">
                            <label for="name_ar" class="block text-sm font-medium text-gray-700 mb-2">{{ __('messages.name_ar') }}</label>
                            <input type="text" name="name_ar" id="name_ar" value="{{ old('name_ar') }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#2d5016] focus:border-transparent">
                            @error('name_ar')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Type English -->
                        <div class="mb-6">
                            <label for="type_en" class="block text-sm font-medium text-gray-700 mb-2">{{ __('messages.type_en') }}</label>
                            <input type="text" name="type_en" id="type_en" value="{{ old('type_en') }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#2d5016] focus:border-transparent"
                                placeholder="{{ __('messages.project_type_placeholder') }}">
                            @error('type_en')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Type Arabic -->
                        <div class="mb-6">
                            <label for="type_ar" class="block text-sm font-medium text-gray-700 mb-2">{{ __('messages.type_ar') }}</label>
                            <input type="text" name="type_ar" id="type_ar" value="{{ old('type_ar') }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#2d5016] focus:border-transparent"
                                placeholder="{{ __('messages.project_type_placeholder') }}">
                            @error('type_ar')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Description English -->
                        <div class="mb-6">
                            <label for="description_en" class="block text-sm font-medium text-gray-700 mb-2">{{ __('messages.description_en') }} *</label>
                            <textarea name="description_en" id="description_en" rows="4" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#2d5016] focus:border-transparent">{{ old('description_en') }}</textarea>
                            @error('description_en')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Description Arabic -->
                        <div class="mb-6">
                            <label for="description_ar" class="block text-sm font-medium text-gray-700 mb-2">{{ __('messages.description_ar') }}</label>
                            <textarea name="description_ar" id="description_ar" rows="4"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#2d5016] focus:border-transparent">{{ old('description_ar') }}</textarea>
                            @error('description_ar')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Image -->
                        <div class="mb-6">
                            <label for="image" class="block text-sm font-medium text-gray-700 mb-2">{{ __('messages.image') }}</label>
                            <input type="file" name="image" id="image" accept="image/*"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#2d5016] focus:border-transparent">
                            @error('image')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Link -->
                        <div class="mb-6">
                            <label for="link" class="block text-sm font-medium text-gray-700 mb-2">{{ __('messages.link') }}</label>
                            <input type="url" name="link" id="link" value="{{ old('link') }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#2d5016] focus:border-transparent"
                                placeholder="https://example.com">
                            @error('link')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Order -->
                        <div class="mb-6">
                            <label for="order" class="block text-sm font-medium text-gray-700 mb-2">{{ __('messages.order') }}</label>
                            <input type="number" name="order" id="order" value="{{ old('order', 0) }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#2d5016] focus:border-transparent">
                            @error('order')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <div class="flex gap-4">
                            <button type="submit" id="submit-btn" class="bg-[#2d5016] text-white px-6 py-2 rounded-lg hover:bg-[#1a3a0e] transition-colors disabled:opacity-50 disabled:cursor-not-allowed flex items-center gap-2">
                                <span id="submit-text">{{ __('messages.save') }}</span>
                                <span id="submit-spinner" class="hidden">
                                    <i class="fas fa-spinner fa-spin"></i>
                                </span>
                            </button>
                            <a href="{{ route('admin.projects.index') }}" class="bg-gray-200 text-gray-700 px-6 py-2 rounded-lg hover:bg-gray-300 transition-colors">
                                {{ __('messages.cancel') }}
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('form[method="POST"]');
            const submitBtn = document.getElementById('submit-btn');
            const submitText = document.getElementById('submit-text');
            const submitSpinner = document.getElementById('submit-spinner');
            const imageInput = document.getElementById('image');
            let isSubmitting = false;
            
            // Image preview
            if (imageInput) {
                imageInput.addEventListener('change', function(e) {
                    const file = e.target.files[0];
                    if (file) {
                        // Check file size
                        const maxSize = 2 * 1024 * 1024; // 2MB
                        if (file.size > maxSize) {
                            alert('{{ __("messages.file_too_large") ?? "حجم الملف كبير جداً. الحد الأقصى 2 ميجابايت" }}');
                            e.target.value = '';
                            // Remove preview if exists
                            const existingPreview = document.getElementById('image-preview');
                            if (existingPreview) {
                                existingPreview.remove();
                            }
                            return;
                        }
                        
                        // Check file type
                        if (!file.type.match('image.*')) {
                            alert('{{ __("messages.invalid_image_type") ?? "نوع الملف غير مدعوم. يرجى رفع صورة" }}');
                            e.target.value = '';
                            const existingPreview = document.getElementById('image-preview');
                            if (existingPreview) {
                                existingPreview.remove();
                            }
                            return;
                        }
                        
                        // Show preview
                        const reader = new FileReader();
                        reader.onload = function(event) {
                            let preview = document.getElementById('image-preview');
                            if (!preview) {
                                preview = document.createElement('div');
                                preview.id = 'image-preview';
                                preview.className = 'mt-2';
                                imageInput.parentElement.appendChild(preview);
                            }
                            preview.innerHTML = `
                                <img src="${event.target.result}" alt="Preview" class="w-32 h-32 object-cover rounded border">
                                <p class="text-sm text-gray-500 mt-1">${file.name} (${(file.size / 1024).toFixed(2)} KB)</p>
                            `;
                        };
                        reader.onerror = function() {
                            alert('{{ __("messages.error_reading_file") ?? "خطأ في قراءة الملف" }}');
                            e.target.value = '';
                        };
                        reader.readAsDataURL(file);
                    } else {
                        // Remove preview if no file selected
                        const existingPreview = document.getElementById('image-preview');
                        if (existingPreview) {
                            existingPreview.remove();
                        }
                    }
                });
            }
            
            // Form submission
            if (form && submitBtn) {
                form.addEventListener('submit', function(e) {
                    // Prevent double submission
                    if (isSubmitting) {
                        e.preventDefault();
                        return false;
                    }
                    
                    // Validate form before showing loading
                    if (!form.checkValidity()) {
                        form.reportValidity();
                        return;
                    }
                    
                    // Show loading state
                    isSubmitting = true;
                    submitBtn.disabled = true;
                    if (submitText) {
                        submitText.textContent = '{{ __("messages.uploading") ?? "جاري الرفع..." }}';
                    }
                    if (submitSpinner) {
                        submitSpinner.classList.remove('hidden');
                    }
                    
                    // Allow form to submit normally
                    // The loading state will reset when page reloads after redirect
                });
            }
            
            // Reset loading state if form validation fails (browser will stop submission)
            if (form) {
                form.addEventListener('invalid', function(e) {
                    isSubmitting = false;
                    if (submitBtn) submitBtn.disabled = false;
                    if (submitText) submitText.textContent = '{{ __("messages.save") ?? "حفظ" }}';
                    if (submitSpinner) submitSpinner.classList.add('hidden');
                }, true);
            }
        });
    </script>
</body>
</html>

