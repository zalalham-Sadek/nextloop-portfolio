<section class="relative min-h-screen bg-gradient-to-b from-white to-[#f0f5ec] py-20 overflow-hidden">
    <div class="container mx-auto px-4 relative z-10">
        <!-- Main Content Grid -->
        <div class="grid lg:grid-cols-2 gap-12 lg:gap-20 items-start">
            <!-- Right Side: Graphical Element -->
            <div class="relative flex items-center justify-center lg:justify-end w-full h-full min-h-[500px]">
                <div class="relative w-full h-full flex items-center justify-center">
                    <!-- Plus Sign and Number -->
                    <div class="relative flex items-center justify-center w-full">
                        <!-- Plus Sign -->
                        <div class="relative">
                            <!-- Horizontal Bar -->
                            <div class="w-60 md:w-60 h-16 md:h-15 bg-[#2d5016] rounded"></div>
                            <!-- Vertical Bar -->
                            <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-13 md:w-15 h-60 md:h-60 bg-[#2d5016] rounded"></div>
                        </div>
                        <!-- Number 15 -->
                        <div class="text-[10rem] md:text-[14rem] font-bold text-[#2d5016] ml-8 md:ml-12">15</div>
                    </div>

                    <!-- Labeled Boxes - Pop Up Animation -->
                    <!-- Optimization (Left of the numbers) -->
                    <div class="absolute left-[10%] top-1/2 transform -translate-y-1/2 px-5 py-1 bg-orange-500 text-white rounded-[20px] font-medium whitespace-nowrap text-lg md:text-xl pop-up-animation" style="animation-delay: 0s;">
                        {{ __('messages.optimization') }}
                    </div>
                    <!-- Evaluation (Above the vertical bar of number 1) -->
                    <div class="absolute left-[60%] top-[35%] transform -translate-x-1/2 -translate-y-1/2 px-5 py-1 bg-green-300 text-[#2d5016] rounded-[20px] font-medium whitespace-nowrap text-lg md:text-xl pop-up-animation" style="animation-delay: 0.2s;">
                        {{ __('messages.evaluation') }}
                    </div>
                    <!-- Consultation (Below the vertical bar of number 1) -->
                    <div class="absolute left-[42%] bottom-[30%] transform -translate-x-1/2 translate-y-1/2 px-5 py-1 bg-lime-400 text-[#2d5016] rounded-[20px] font-medium whitespace-nowrap text-lg md:text-xl pop-up-animation" style="animation-delay: 0.4s;">
                        {{ __('messages.consultation') }}
                    </div>
                </div>
            </div>
            <!-- Left Side: Rating and Testimonial -->
            <div class="space-y-8">
                <!-- Title -->
                <div class="mb-8">
                    <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold text-[#2d5016]">
                        {{ __('messages.about_title') }}
                    </h2>
                </div>

                <!-- Team Description -->
                <div class="space-y-4 mb-8">

                    <p class="text-gray-700 text-base leading-relaxed">
                        {{ __('messages.about_team_description') }}
                    </p>
                    <p class="text-gray-700 text-base leading-relaxed">
                        {{ __('messages.about_team_philosophy') }}
                    </p>
                    <p class="text-gray-700 text-base leading-relaxed">
                        {{ __('messages.about_team_expertise') }}
                    </p>
                </div>

                <!-- Average Rating Section -->

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
