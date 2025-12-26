<header id="header" class="fixed top-0 left-0 right-0 z-50 bg-white transition-all duration-300">
    <nav class="container mx-auto px-4 lg:px-8 py-4 flex items-center justify-between">
        <!-- Left Side: Hamburger (Mobile) -->
        <div class="flex items-center">
            <!-- Hamburger Menu Button (Mobile Only) -->
            <button id="menu-toggle" class="lg:hidden text-black focus:outline-none" aria-label="{{ __('messages.menu') }}">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>

        <!-- Center: Navigation Menu (Desktop Only) -->
        <nav class="hidden lg:flex items-center space-x-8">
            <a href="#home" class="flex items-center text-black hover:text-[#2d5016] transition-colors group">
                <span class="w-1.5 h-1.5 bg-black rounded-full mr-2 group-hover:bg-[#2d5016]"></span>
                <span class="uppercase text-sm font-medium">{{ __('messages.home') }}</span>
            </a>
            <a href="#about" class="flex items-center text-black hover:text-[#2d5016] transition-colors group">
                <span class="w-1.5 h-1.5 bg-black rounded-full mr-2 group-hover:bg-[#2d5016]"></span>
                <span class="uppercase text-sm font-medium">{{ __('messages.about') }}</span>
            </a>
            <a href="#services" class="flex items-center text-black hover:text-[#2d5016] transition-colors group">
                <span class="w-1.5 h-1.5 bg-black rounded-full mr-2 group-hover:bg-[#2d5016]"></span>
                <span class="uppercase text-sm font-medium">{{ __('messages.services') }}</span>
            </a>
            <a href="#team" class="flex items-center text-black hover:text-[#2d5016] transition-colors group">
                <span class="w-1.5 h-1.5 bg-black rounded-full mr-2 group-hover:bg-[#2d5016]"></span>
                <span class="uppercase text-sm font-medium">{{ __('messages.team') }}</span>
            </a>
        </nav>

        <!-- Right Side: Language Switcher (Desktop) & Logo -->
        <div class="flex items-center gap-4">
            <!-- Language Switcher (Desktop Only) -->
            <a href="{{ route('language.switch', app()->getLocale() === 'ar' ? 'en' : 'ar') }}" 
               class="hidden lg:flex items-center justify-center w-10 h-10 rounded-full text-gray-700 hover:text-[#2d5016] hover:bg-gray-100 transition-all" 
               title="{{ __('messages.switch_language') }}">
                <i class="fas fa-globe text-lg"></i>
            </a>

            <!-- Logo -->
            <div class="flex items-center">
                <!-- NEXTLOOP Text -->
                <div class="flex flex-col">
                    <span class="font-bold text-[#2d5016] text-lg leading-tight tracking-tight">NEXTLOOP</span>
                    <span class="text-xs text-gray-600 leading-tight">Since . 2023</span>
                </div>
            </div>
        </div>
    </nav>
</header>

<!-- Overlay -->
<div id="menu-overlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 hidden transition-opacity duration-300"></div>

<!-- Slide-in Menu -->
<div id="slide-menu" class="fixed top-0 {{ app()->getLocale() === 'ar' ? 'left-0' : 'right-0' }} h-full bg-white z-50 w-full lg:w-1/3 transform {{ app()->getLocale() === 'ar' ? '-translate-x-full' : 'translate-x-full' }} transition-transform duration-300 ease-in-out overflow-y-auto">
    <!-- Close Button -->
    <div class="flex justify-between items-center p-4 border-b border-gray-200">
        <button id="menu-close" class="text-black focus:outline-none" aria-label="{{ __('messages.close') }}">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
        <div class="flex items-center">
            <!-- NEXTLOOP Text -->
            <div class="flex flex-col">
                <span class="font-bold text-[#2d5016] text-lg leading-tight tracking-tight">NEXTLOOP</span>
                <span class="text-xs text-gray-600 leading-tight">Since . 2023</span>
            </div>
        </div>
    </div>

    <!-- Menu Items -->
    <div class="px-8 py-6">
        <nav class="space-y-4">
            <a href="#home" class="flex items-center justify-between group hover:text-gray-600 transition-colors" onclick="closeMenu()">
                <span class="text-black font-medium">{{ __('messages.home') }}</span>
                <svg class="w-4 h-4 text-black group-hover:translate-x-1 transition-transform rtl:group-hover:-translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </a>
            <a href="#about" class="flex items-center justify-between group hover:text-gray-600 transition-colors" onclick="closeMenu()">
                <span class="text-black font-medium">{{ __('messages.about') }}</span>
                <svg class="w-4 h-4 text-black group-hover:translate-x-1 transition-transform rtl:group-hover:-translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </a>
            <a href="#services" class="flex items-center justify-between group hover:text-gray-600 transition-colors" onclick="closeMenu()">
                <span class="text-black font-medium">{{ __('messages.services') }}</span>
                <svg class="w-4 h-4 text-black group-hover:translate-x-1 transition-transform rtl:group-hover:-translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </a>
            <a href="#team" class="flex items-center justify-between group hover:text-gray-600 transition-colors" onclick="closeMenu()">
                <span class="text-black font-medium">{{ __('messages.team') }}</span>
                <svg class="w-4 h-4 text-black group-hover:translate-x-1 transition-transform rtl:group-hover:-translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </a>
        </nav>
    </div>

    <!-- Language Switcher -->
    <div class="px-8 py-4 border-t border-gray-200">
        <div class="flex items-center justify-between">
            <span class="text-black font-medium text-sm">{{ __('messages.language') }}</span>
            <div class="flex space-x-2 rtl:space-x-reverse">
                <a href="{{ route('language.switch', 'ar') }}" class="px-3 py-1 text-sm rounded {{ app()->getLocale() === 'ar' ? 'bg-black text-white' : 'text-black hover:bg-gray-100' }}">
                    {{ __('messages.arabic') }}
                </a>
                <a href="{{ route('language.switch', 'en') }}" class="px-3 py-1 text-sm rounded {{ app()->getLocale() === 'en' ? 'bg-black text-white' : 'text-black hover:bg-gray-100' }}">
                    {{ __('messages.english') }}
                </a>
            </div>
        </div>
    </div>

    <!-- Information Section -->
    <div class="px-8 py-8 border-t border-gray-200">
        <h3 class="text-black font-bold uppercase text-sm mb-4">{{ __('messages.information') }}</h3>
        <div class="space-y-3 text-sm text-gray-700">
            <div>
                <a href="tel:+10077700204" class="underline hover:text-black transition-colors">{{ __('messages.phone') }}</a>
            </div>
            <div>
                <a href="mailto:hello@aleric.com" class="hover:text-black transition-colors">{{ __('messages.email') }}</a>
            </div>
            <div>
                <p>{{ __('messages.address') }}</p>
            </div>
        </div>
    </div>

    <!-- Follow Us Section -->
    <div class="px-8 py-8 border-t border-gray-200">
        <h3 class="text-black font-bold uppercase text-sm mb-4">{{ __('messages.follow_us') }}</h3>
        <div class="flex space-x-4 rtl:space-x-reverse">
            <!-- Add social media icons here -->
        </div>
    </div>
</div>
