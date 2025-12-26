<section class="relative min-h-screen bg-gradient-to-b from-white to-[#f0f5ec] pt-32 pb-20 overflow-hidden">
    <!-- Background Text -->
    <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 pointer-events-none opacity-5">
        <div class="text-[20rem] font-bold text-[#2d5016] whitespace-nowrap select-none" style="transform: scaleY(-1); font-family: sans-serif;">
            {{ app()->getLocale() === 'ar' ? 'solution' : 'solution' }}
        </div>
    </div>

    <!-- Mobile Layout: Title First -->
    <div class="container mx-auto px-4 mb-16 relative z-10 lg:hidden">
        <!-- Main Heading -->
        <div class="text-center mb-16 animate-fade-in-up">
            <h1 class="text-5xl md:text-6xl font-bold mb-4 leading-tight">
                <span class="text-[#2d5016] font-sans block">{{ __('messages.hero_title_part1') }}</span>
                <span class="text-[#2d5016] font-serif italic block">{{ __('messages.hero_title_part2') }}</span>
            </h1>
        </div>

        <!-- Statistics Section -->
        <div class="p-8 animate-fade-in">
            <!-- Horizontal Line Separator above stats -->
            <div class="mb-8 -mt-4">
                <div class="border-t border-gray-300"></div>
            </div>
            <div class="grid grid-cols-2 gap-12">
                <!-- Left Statistic -->
                <div class="text-center">
                    <div class="text-4xl font-bold text-[#2d5016] mb-4">
                        <span class="counter" data-target="152" data-suffix="+">0+</span>
                    </div>
                    <div class="text-base text-[#2d5016]">
                        <div>{{ __('messages.projects_completed') }}</div>
                        <div class="font-medium">{{ __('messages.countries') }}</div>
                    </div>
                </div>

                <!-- Right Statistic -->
                <div class="text-center">
                    <div class="text-4xl font-bold text-[#2d5016] mb-4">
                        <span class="counter" data-target="99" data-suffix="%">0%</span>
                    </div>
                    <div class="text-base text-[#2d5016]">
                        <div>{{ __('messages.clients_satisfied') }}</div>
                        <div class="font-medium">{{ __('messages.repeating') }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Desktop Layout: Stats and Title in One Row -->
    <div class="hidden lg:block container mx-auto px-4 mb-16 relative z-10">
        <!-- Stats and Title Row -->
        <div class="p-8 lg:p-12 animate-fade-in">
            <div class="grid lg:grid-cols-2 gap-16 lg:gap-20 items-start">
                <!-- Title Container -->
                <div class="text-left rtl:text-right">
                    <h1 class="{{ app()->getLocale() === 'ar' ? 'text-6xl xl:text-7xl' : 'text-4xl xl:text-5xl' }} font-bold leading-tight">
                        <span class="text-[#2d5016] font-sans block">{{ __('messages.hero_title_part1') }}</span>
                        <span class="text-[#2d5016] font-serif italic block">{{ __('messages.hero_title_part2') }}</span>
                    </h1>
                </div>
                <!-- Stats Container -->
                <div class="grid grid-cols-2 gap-8 lg:gap-10 {{ app()->getLocale() === 'ar' ? 'pt-8 mt-8' : '' }}">
                    <!-- Horizontal Line Separator above stats -->
                    <div class="col-span-2 mb-2 -mt-4 {{ app()->getLocale() === 'ar' ? 'rtl:text-right' : 'ltr:text-left' }}">
                        @if(app()->getLocale() === 'ar')
                            <div class="border-t border-gray-300 inline-block" style="width: 90%"></div>
                        @else
                            <div class="border-t border-gray-300 w-full"></div>
                        @endif
                    </div>
                    <!-- Left Statistic -->
                    <div class="text-left rtl:text-right">
                        <div class="text-5xl xl:text-6xl font-bold text-[#2d5016] mb-4">
                            <span class="counter" data-target="152" data-suffix="+">0+</span>
                        </div>
                        <div class="text-lg xl:text-xl text-[#2d5016]">
                            <div>{{ __('messages.projects_completed') }}</div>
                            <div class="font-medium">{{ __('messages.countries') }}</div>
                        </div>
                    </div>

                    <!-- Right Statistic -->
                    <div class="text-left rtl:text-right">
                        <div class="text-5xl xl:text-6xl font-bold text-[#2d5016] mb-4">
                            <span class="counter" data-target="99" data-suffix="%">0%</span>
                        </div>
                        <div class="text-lg xl:text-xl text-[#2d5016]">
                            <div>{{ __('messages.clients_satisfied') }}</div>
                            <div class="font-medium">{{ __('messages.repeating') }}</div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

    <!-- Service Tags -->
    <div class="relative z-10 overflow-hidden">
        <!-- Mobile: Scrolling Loop -->
        <div class="md:hidden">
            <div class="service-tags-scroll">
                <div class="flex gap-3 service-tags-container {{ app()->getLocale() === 'ar' ? 'rtl-scroll' : '' }}">
                    <!-- First set -->
                    <span class="px-4 py-2 bg-[#f0f5ec] text-[#2d5016] rounded-full text-sm font-medium whitespace-nowrap flex-shrink-0">{{ __('messages.service_development') }}</span>
                    <span class="px-4 py-2 bg-[#f0f5ec] text-[#2d5016] rounded-full text-sm font-medium whitespace-nowrap flex-shrink-0">{{ __('messages.service_consulting') }}</span>
                    <span class="px-4 py-2 bg-[#f0f5ec] text-[#2d5016] rounded-full text-sm font-medium whitespace-nowrap flex-shrink-0">{{ __('messages.service_network') }}</span>
                    <span class="px-4 py-2 bg-[#f0f5ec] text-[#2d5016] rounded-full text-sm font-medium whitespace-nowrap flex-shrink-0">{{ __('messages.service_database') }}</span>
                    <span class="px-4 py-2 bg-[#f0f5ec] text-[#2d5016] rounded-full text-sm font-medium whitespace-nowrap flex-shrink-0">{{ __('messages.service_support') }}</span>
                    <span class="px-4 py-2 bg-[#f0f5ec] text-[#2d5016] rounded-full text-sm font-medium whitespace-nowrap flex-shrink-0">{{ __('messages.service_audit') }}</span>
                    <span class="px-4 py-2 bg-[#f0f5ec] text-[#2d5016] rounded-full text-sm font-medium whitespace-nowrap flex-shrink-0">{{ __('messages.service_data') }}</span>
                    <span class="px-4 py-2 bg-[#f0f5ec] text-[#2d5016] rounded-full text-sm font-medium whitespace-nowrap flex-shrink-0">{{ __('messages.service_roadmap') }}</span>
                    <!-- Duplicate set for seamless loop -->
                    <span class="px-4 py-2 bg-[#f0f5ec] text-[#2d5016] rounded-full text-sm font-medium whitespace-nowrap flex-shrink-0">{{ __('messages.service_development') }}</span>
                    <span class="px-4 py-2 bg-[#f0f5ec] text-[#2d5016] rounded-full text-sm font-medium whitespace-nowrap flex-shrink-0">{{ __('messages.service_consulting') }}</span>
                    <span class="px-4 py-2 bg-[#f0f5ec] text-[#2d5016] rounded-full text-sm font-medium whitespace-nowrap flex-shrink-0">{{ __('messages.service_network') }}</span>
                    <span class="px-4 py-2 bg-[#f0f5ec] text-[#2d5016] rounded-full text-sm font-medium whitespace-nowrap flex-shrink-0">{{ __('messages.service_database') }}</span>
                    <span class="px-4 py-2 bg-[#f0f5ec] text-[#2d5016] rounded-full text-sm font-medium whitespace-nowrap flex-shrink-0">{{ __('messages.service_support') }}</span>
                    <span class="px-4 py-2 bg-[#f0f5ec] text-[#2d5016] rounded-full text-sm font-medium whitespace-nowrap flex-shrink-0">{{ __('messages.service_audit') }}</span>
                    <span class="px-4 py-2 bg-[#f0f5ec] text-[#2d5016] rounded-full text-sm font-medium whitespace-nowrap flex-shrink-0">{{ __('messages.service_data') }}</span>
                    <span class="px-4 py-2 bg-[#f0f5ec] text-[#2d5016] rounded-full text-sm font-medium whitespace-nowrap flex-shrink-0">{{ __('messages.service_roadmap') }}</span>
                </div>
            </div>
        </div>
        <!-- Desktop: Static Layout -->
        <div class="hidden md:block container mx-auto px-4">
            <div class="flex flex-wrap justify-center gap-3 md:gap-4">
                <span class="px-4 py-2 bg-[#f0f5ec] text-[#2d5016] rounded-full text-sm font-medium hover:bg-[#2d5016] hover:text-white transition-colors cursor-pointer">{{ __('messages.service_development') }}</span>
                <span class="px-4 py-2 bg-[#f0f5ec] text-[#2d5016] rounded-full text-sm font-medium hover:bg-[#2d5016] hover:text-white transition-colors cursor-pointer">{{ __('messages.service_consulting') }}</span>
                <span class="px-4 py-2 bg-[#f0f5ec] text-[#2d5016] rounded-full text-sm font-medium hover:bg-[#2d5016] hover:text-white transition-colors cursor-pointer">{{ __('messages.service_network') }}</span>
                <span class="px-4 py-2 bg-[#f0f5ec] text-[#2d5016] rounded-full text-sm font-medium hover:bg-[#2d5016] hover:text-white transition-colors cursor-pointer">{{ __('messages.service_database') }}</span>
                <span class="px-4 py-2 bg-[#f0f5ec] text-[#2d5016] rounded-full text-sm font-medium hover:bg-[#2d5016] hover:text-white transition-colors cursor-pointer">{{ __('messages.service_support') }}</span>
                <span class="px-4 py-2 bg-[#f0f5ec] text-[#2d5016] rounded-full text-sm font-medium hover:bg-[#2d5016] hover:text-white transition-colors cursor-pointer">{{ __('messages.service_audit') }}</span>
                <span class="px-4 py-2 bg-[#f0f5ec] text-[#2d5016] rounded-full text-sm font-medium hover:bg-[#2d5016] hover:text-white transition-colors cursor-pointer">{{ __('messages.service_data') }}</span>
                <span class="px-4 py-2 bg-[#f0f5ec] text-[#2d5016] rounded-full text-sm font-medium hover:bg-[#2d5016] hover:text-white transition-colors cursor-pointer">{{ __('messages.service_roadmap') }}</span>
            </div>
        </div>
    </div>

    <!-- FOLLOW Sidebar (Desktop Only) -->
    <div class="hidden lg:flex fixed {{ app()->getLocale() === 'ar' ? 'left-8' : 'right-8' }} top-40 z-20 flex-col items-center space-y-2">
        <span class="text-[#2d5016] font-bold uppercase text-sm writing-vertical-rl text-center {{ app()->getLocale() === 'ar' ? '' : 'transform rotate-180' }}">
            {{ __('messages.follow_us') }}
        </span>
        <!-- Arrow Down -->
        <svg class="mt-2" width="6" height="41" viewBox="0 0 6 41" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M3.5 1C3.5 0.723858 3.27614 0.5 3 0.5C2.72386 0.5 2.5 0.723858 2.5 1H3.5ZM3 41L5.88675 36H0.113249L3 41ZM2.5 1L2.5 36.5H3.5L3.5 1H2.5Z" fill="#030303"></path>
        </svg>
        <div class="flex flex-col space-y-4">
            <!-- Facebook Icon -->
            <a href="#" class="text-black hover:text-[#2d5016] transition-colors" aria-label="Facebook">
                <i class="fab fa-facebook-f text-lg"></i>
            </a>
            <!-- Pinterest Icon -->
            <a href="#" class="text-black hover:text-[#2d5016] transition-colors" aria-label="Pinterest">
                <i class="fab fa-pinterest-p text-lg"></i>
            </a>
            <!-- Behance Icon -->
            <a href="#" class="text-black hover:text-[#2d5016] transition-colors" aria-label="Behance">
                <i class="fab fa-behance text-lg"></i>
            </a>
            <!-- LinkedIn Icon -->
            <a href="#" class="text-black hover:text-[#2d5016] transition-colors" aria-label="LinkedIn">
                <i class="fab fa-linkedin-in text-lg"></i>
            </a>
        </div>
    </div>
</section>
