<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ __('messages.edit_project') }} - {{ config('app.name', 'Laravel') }}</title>
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

                <h2 class="text-3xl font-bold text-gray-800 mb-6">{{ __('messages.edit_project') }}</h2>

                <div class="bg-white rounded-lg shadow-md p-6">
                    <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Name English -->
                        <div class="mb-6">
                            <label for="name_en" class="block text-sm font-medium text-gray-700 mb-2">{{ __('messages.name_en') }} *</label>
                            <input type="text" name="name_en" id="name_en" value="{{ old('name_en', $project->name_en) }}" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#2d5016] focus:border-transparent">
                            @error('name_en')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Name Arabic -->
                        <div class="mb-6">
                            <label for="name_ar" class="block text-sm font-medium text-gray-700 mb-2">{{ __('messages.name_ar') }}</label>
                            <input type="text" name="name_ar" id="name_ar" value="{{ old('name_ar', $project->name_ar) }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#2d5016] focus:border-transparent">
                            @error('name_ar')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Type English -->
                        <div class="mb-6">
                            <label for="type_en" class="block text-sm font-medium text-gray-700 mb-2">{{ __('messages.type_en') }}</label>
                            <input type="text" name="type_en" id="type_en" value="{{ old('type_en', $project->type_en) }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#2d5016] focus:border-transparent"
                                placeholder="{{ __('messages.project_type_placeholder') }}">
                            @error('type_en')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Type Arabic -->
                        <div class="mb-6">
                            <label for="type_ar" class="block text-sm font-medium text-gray-700 mb-2">{{ __('messages.type_ar') }}</label>
                            <input type="text" name="type_ar" id="type_ar" value="{{ old('type_ar', $project->type_ar) }}"
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
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#2d5016] focus:border-transparent">{{ old('description_en', $project->description_en) }}</textarea>
                            @error('description_en')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Description Arabic -->
                        <div class="mb-6">
                            <label for="description_ar" class="block text-sm font-medium text-gray-700 mb-2">{{ __('messages.description_ar') }}</label>
                            <textarea name="description_ar" id="description_ar" rows="4"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#2d5016] focus:border-transparent">{{ old('description_ar', $project->description_ar) }}</textarea>
                            @error('description_ar')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Current Image -->
                        @if($project->image)
                            <div class="mb-6">
                                <label class="block text-sm font-medium text-gray-700 mb-2">{{ __('messages.current_image') }}</label>
                                @php
                                    $imageUrl = \Illuminate\Support\Facades\Storage::disk('public')->exists($project->image) 
                                        ? \Illuminate\Support\Facades\Storage::disk('public')->url($project->image)
                                        : asset('storage/' . $project->image);
                                @endphp
                                <img src="{{ $imageUrl }}" alt="{{ $project->name }}" class="w-32 h-32 object-cover rounded" onerror="this.style.display='none'; this.parentElement.innerHTML+='<p class=\'text-red-500 text-sm mt-2\'>{{ __('messages.image_not_found') }}</p>';">
                            </div>
                        @endif

                        <!-- Image -->
                        <div class="mb-6">
                            <label for="image" class="block text-sm font-medium text-gray-700 mb-2">{{ __('messages.new_image') }}</label>
                            <input type="file" name="image" id="image" accept="image/*"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#2d5016] focus:border-transparent">
                            @error('image')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Link -->
                        <div class="mb-6">
                            <label for="link" class="block text-sm font-medium text-gray-700 mb-2">{{ __('messages.link') }}</label>
                            <input type="url" name="link" id="link" value="{{ old('link', $project->link) }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#2d5016] focus:border-transparent"
                                placeholder="https://example.com">
                            @error('link')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Order -->
                        <div class="mb-6">
                            <label for="order" class="block text-sm font-medium text-gray-700 mb-2">{{ __('messages.order') }}</label>
                            <input type="number" name="order" id="order" value="{{ old('order', $project->order) }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#2d5016] focus:border-transparent">
                            @error('order')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <div class="flex gap-4">
                            <button type="submit" class="bg-[#2d5016] text-white px-6 py-2 rounded-lg hover:bg-[#1a3a0e] transition-colors">
                                {{ __('messages.update') }}
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
</body>
</html>

