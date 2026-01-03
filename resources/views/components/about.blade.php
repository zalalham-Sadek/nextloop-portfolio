<section class="relative min-h-screen bg-gradient-to-b from-white to-[#f0f5ec] py-12 md:py-20 overflow-hidden">
    <div class="container mx-auto px-4 relative z-10">
        <!-- Main Content Grid -->
        <div class="grid lg:grid-cols-2 gap-8 lg:gap-20 items-start">
            <!-- Mobile: Graphical Element First (Above Text) -->
            <div class="lg:hidden relative flex items-center justify-center w-full h-full min-h-[250px] md:min-h-[350px] mb-8 order-1">
                <div class="relative w-full h-full flex items-center justify-center max-w-md mx-auto">
                    <!-- Plus Sign and Number -->
                    <div class="relative flex items-center justify-center w-full">
                        <!-- Plus Sign -->
                        <div class="relative">
                            <!-- Horizontal Bar -->
                            <div class="w-40 md:w-60 h-12 md:h-16 bg-[#2d5016] rounded"></div>
                            <!-- Vertical Bar -->
                            <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-10 md:w-13 h-40 md:h-60 bg-[#2d5016] rounded"></div>
                        </div>
                        <!-- Number 15 -->
                        <div class="text-6xl md:text-[10rem] font-bold text-[#2d5016] ml-4 md:ml-8">15</div>
                    </div>

                    <!-- Labeled Boxes - Pop Up Animation -->
                    <!-- Optimization (Left of the numbers) -->
                    <div class="absolute left-[8%] md:left-[10%] top-1/2 transform -translate-y-1/2 px-3 md:px-5 py-1 bg-orange-500 text-white rounded-[20px] font-medium whitespace-nowrap text-sm md:text-lg pop-up-animation" style="animation-delay: 0s;">
                        {{ __('messages.optimization') }}
                    </div>
                    <!-- Evaluation (Above the vertical bar of number 1) -->
                    <div class="absolute left-[55%] md:left-[60%] top-[35%] transform -translate-x-1/2 -translate-y-1/2 px-3 md:px-5 py-1 bg-green-300 text-[#2d5016] rounded-[20px] font-medium whitespace-nowrap text-sm md:text-lg pop-up-animation" style="animation-delay: 0.2s;">
                        {{ __('messages.evaluation') }}
                    </div>
                    <!-- Consultation (Below the vertical bar of number 1) -->
                    <div class="absolute left-[40%] md:left-[42%] bottom-[30%] transform -translate-x-1/2 translate-y-1/2 px-3 md:px-5 py-1 bg-lime-400 text-[#2d5016] rounded-[20px] font-medium whitespace-nowrap text-sm md:text-lg pop-up-animation" style="animation-delay: 0.4s;">
                        {{ __('messages.consultation') }}
                    </div>
                </div>
            </div>

            <!-- Desktop: Graphical Element (Right Side) -->
            <div class="hidden lg:flex relative items-center justify-center lg:justify-end w-full h-full min-h-[500px] order-2">
                <div class="relative w-full h-full flex items-center justify-center">
                    <!-- Plus Sign and Number -->
                    <div class="relative flex items-center justify-center w-full">
                        <!-- Plus Sign -->
                        <div class="relative">
                            <!-- Horizontal Bar -->
                            <div class="w-60 h-16 bg-[#2d5016] rounded"></div>
                            <!-- Vertical Bar -->
                            <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-15 h-60 bg-[#2d5016] rounded"></div>
                        </div>
                        <!-- Number 15 -->
                        <div class="text-[14rem] font-bold text-[#2d5016] ml-12">15</div>
                    </div>

                    <!-- Labeled Boxes - Pop Up Animation -->
                    <!-- Optimization (Left of the numbers) -->
                    <div class="absolute left-[10%] top-1/2 transform -translate-y-1/2 px-5 py-1 bg-orange-500 text-white rounded-[20px] font-medium whitespace-nowrap text-xl pop-up-animation" style="animation-delay: 0s;">
                        {{ __('messages.optimization') }}
                    </div>
                    <!-- Evaluation (Above the vertical bar of number 1) -->
                    <div class="absolute left-[60%] top-[35%] transform -translate-x-1/2 -translate-y-1/2 px-5 py-1 bg-green-300 text-[#2d5016] rounded-[20px] font-medium whitespace-nowrap text-xl pop-up-animation" style="animation-delay: 0.2s;">
                        {{ __('messages.evaluation') }}
                    </div>
                    <!-- Consultation (Below the vertical bar of number 1) -->
                    <div class="absolute left-[42%] bottom-[30%] transform -translate-x-1/2 translate-y-1/2 px-5 py-1 bg-lime-400 text-[#2d5016] rounded-[20px] font-medium whitespace-nowrap text-xl pop-up-animation" style="animation-delay: 0.4s;">
                        {{ __('messages.consultation') }}
                    </div>
                </div>
            </div>

            <!-- Content Section (Mobile: Below Graphic, Desktop: Left Side) -->
            <div class="space-y-6 md:space-y-8 order-2 lg:order-1">
                <!-- Title -->
                <div class="mb-6 lg:mb-8">
                    <h2 class="text-3xl md:text-4xl lg:text-6xl font-bold text-[#2d5016]">
                        {{ __('messages.about_title') }}
                    </h2>
                </div>

                <!-- Team Description -->
                <div class="space-y-4">
                    <p class="text-gray-700 text-sm md:text-base leading-relaxed">
                        {{ __('messages.about_team_description') }}
                    </p>
                    <p class="text-gray-700 text-sm md:text-base leading-relaxed">
                        {{ __('messages.about_team_philosophy') }}
                    </p>
                    <p class="text-gray-700 text-sm md:text-base leading-relaxed">
                        {{ __('messages.about_team_expertise') }}
                    </p>
                </div>
            </div>


        </div>

        <!-- Scroll Up Indicator (Bottom Left) -->
        <div class="fixed bottom-8 {{ app()->getLocale() === 'ar' ? 'right-8' : 'left-8' }} z-20 opacity-0 pointer-events-none transition-opacity duration-300">
            <button id="scroll-top" class="w-12 h-12 bg-gray-200 rounded-full flex items-center justify-center hover:bg-[#2d5016] hover:text-white transition-colors group relative">
                <svg class="w-6 h-6 text-gray-600 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path>
                </svg>
                <div class="absolute bottom-0 left-0 right-0 h-1 bg-green-500 rounded-b-full"></div>
            </button>
        </div>
    </div>
</section>
