<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ __('messages.projects') }} - {{ config('app.name', 'Laravel') }}</title>
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
            <div class="max-w-7xl mx-auto">
                <h2 class="text-3xl font-bold text-gray-800 mb-6">{{ __('messages.projects_management') }}</h2>
                
                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="bg-white rounded-lg shadow-md p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-xl font-semibold text-gray-800">{{ __('messages.all_projects') }}</h3>
                        <a href="{{ route('admin.projects.create') }}" class="bg-[#2d5016] text-white px-6 py-2 rounded-lg hover:bg-[#1a3a0e] transition-colors flex items-center gap-2">
                            <i class="fas fa-plus"></i> {{ __('messages.add_project') }}
                        </a>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('messages.image') }}</th>
                                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('messages.name') }}</th>
                                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('messages.type') }}</th>
                                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('messages.description') }}</th>
                                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('messages.actions') }}</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse($projects as $project)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @if($project->image)
                                                @php
                                                    // Use asset() for better compatibility with symbolic links
                                                    $imageUrl = asset('storage/' . $project->image);
                                                @endphp
                                                <div class="w-16 h-16 bg-gray-200 rounded flex items-center justify-center relative overflow-hidden">
                                                    <img src="{{ $imageUrl }}" alt="{{ $project->name }}" class="w-16 h-16 object-cover rounded" onerror="if(this.parentElement){this.style.display='none';if(!this.parentElement.querySelector('.error-placeholder')){var icon=document.createElement('i');icon.className='fas fa-image text-gray-400 error-placeholder';this.parentElement.appendChild(icon)}}">
                                                </div>
                                            @else
                                                <div class="w-16 h-16 bg-gray-200 rounded flex items-center justify-center">
                                                    <i class="fas fa-image text-gray-400"></i>
                                                </div>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm font-medium text-gray-900">{{ $project->name }}</div>
                                            <div class="text-xs text-gray-500">{{ $project->name_en ?? '' }} / {{ $project->name_ar ?? '' }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-500">{{ $project->type ?? '-' }}</div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="text-sm text-gray-500 max-w-xs truncate">{{ $project->description }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <div class="flex gap-2">
                                                <a href="{{ route('admin.projects.edit', $project) }}" class="text-[#2d5016] hover:text-[#1a3a0e]">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" class="inline" onsubmit="return confirm('{{ __('messages.confirm_delete') }}')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-600 hover:text-red-800">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                                            {{ __('messages.no_projects') }}
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>

