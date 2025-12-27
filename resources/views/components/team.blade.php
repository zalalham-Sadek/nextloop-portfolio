<section class="relative py-20 bg-white overflow-hidden">
    <!-- Background Text Overlay -->
    <div class="absolute top-1/2 left-1/4 transform -translate-x-1/2 -translate-y-1/2 pointer-events-none opacity-5">
        <div class="text-[15rem] font-bold text-gray-300 whitespace-nowrap select-none" style="font-family: sans-serif;">
            {{ __('messages.our_team') }}
        </div>
    </div>

    <div class="container mx-auto px-4 relative z-10">
        <div class="grid lg:grid-cols-2 gap-12 items-start">
            <!-- Left Side: Text and Button -->
            <div class="space-y-8">
               

                <!-- Main Heading -->
                <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold text-[#2d5016] leading-tight">
                    {{ __('messages.team_heading') }}
                </h2>

                <!-- Testimonial Quote -->
                <p class="text-gray-600 text-lg leading-relaxed">
                    {{ __('messages.team_testimonial') }}
                </p>

                <!-- Explore More Button -->
                <button class="px-8 py-4 bg-lime-400 text-[#2d5016] rounded-lg font-bold text-lg hover:bg-lime-500 transition-colors flex items-center gap-3 group">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                    <span>{{ __('messages.explore_more') }}</span>
                </button>
            </div>

            <!-- Right Side: Team Members -->
            <div class="relative">
                <!-- Team Cards Container -->
                <div class="grid grid-cols-2 gap-6">
                    <!-- Team Member 1: Dianne M. Mason -->
                    <div class="tp-team-it-item bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 cursor-pointer group mb-12">
                        <a href="#" class="tp-team-it-thumb block relative overflow-hidden">
                            <!-- Gradient Background -->
                            <div class="absolute inset-0 bg-gradient-to-b from-white to-lime-400 rounded-t-xl"></div>
                            <img src="{{ asset('images/photo_2025-12-27_14-48-58.jpg') }}" alt="{{ __('messages.team_member_1_name') }}" class="relative w-full h-80 object-cover rounded-t-xl group-hover:scale-110 transition-transform duration-300">
                        </a>
                        <div class="tp-team-it-content p-5 relative">
                            <div class="tp-team-it-socials absolute left-0 -top-8 z-10">
                                <div class="tp-team-it-socials-trigger  transition-transform duration-300 border-6 border-[#ffffff] rounded-full">
                                    <span class="tp-team-it-socials-share w-10 h-10 bg-[#2d5016] rounded-full flex items-center justify-center cursor-pointer">
                                        <svg width="22" height="24" viewBox="0 0 22 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M5.68005 11.2873C5.41131 10.8172 4.9896 10.4471 4.48112 10.2352C3.97264 10.0233 3.40618 9.98159 2.87065 10.1165C2.33512 10.2515 1.86085 10.5555 1.52228 10.9808C1.1837 11.4062 1 11.9288 1 12.4666C1 13.0044 1.1837 13.527 1.52228 13.9523C1.86085 14.3777 2.33512 14.6817 2.87065 14.8166C3.40618 14.9516 3.97264 14.9098 4.48112 14.6979C4.9896 14.486 5.41131 14.116 5.68005 13.6459M5.68005 11.2873C5.87983 11.6368 5.99415 12.0382 5.99415 12.4666C5.99415 12.8949 5.87983 13.2974 5.68005 13.6459M5.68005 11.2873L16.2973 5.55355M5.68005 13.6459L16.2973 19.3796M16.2973 5.55355C16.4529 5.83855 16.6655 6.09052 16.9225 6.29473C17.1795 6.49894 17.4758 6.6513 17.7941 6.74288C18.1123 6.83447 18.4462 6.86346 18.7761 6.82814C19.1061 6.79283 19.4255 6.69392 19.7156 6.53721C20.0058 6.3805 20.2609 6.16913 20.466 5.91545C20.6712 5.66178 20.8223 5.37089 20.9104 5.05979C20.9986 4.74869 21.022 4.42363 20.9795 4.10361C20.9369 3.78359 20.8291 3.47503 20.6624 3.19598C20.334 2.64606 19.7967 2.24338 19.1661 2.0745C18.5355 1.90561 17.8619 1.984 17.2901 2.29282C16.7183 2.60164 16.294 3.11622 16.1083 3.72596C15.9226 4.33571 15.9905 4.99192 16.2973 5.55355ZM16.2973 19.3796C16.1379 19.6584 16.0367 19.9649 15.9992 20.2818C15.9618 20.5986 15.9889 20.9195 16.079 21.2261C16.1692 21.5328 16.3205 21.8192 16.5245 22.0689C16.7285 22.3187 16.9811 22.527 17.2678 22.6818C17.5546 22.8367 17.87 22.9351 18.1959 22.9715C18.5218 23.0079 18.8518 22.9816 19.1673 22.894C19.4827 22.8063 19.7773 22.6592 20.0342 22.4609C20.2911 22.2626 20.5054 22.017 20.6647 21.7383C20.9864 21.1752 21.0649 20.511 20.8829 19.8917C20.7008 19.2724 20.2732 18.7488 19.6941 18.436C19.1149 18.1233 18.4317 18.047 17.7946 18.2239C17.1576 18.4009 16.619 18.8166 16.2973 19.3796Z" stroke="#F3F1F2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </span>
                                </div>
                                <div class="tp-team-it-socials-wrapper absolute left-0 bottom-full ">
                                    <ul class="tp-team-it-socials-icon bg-[#2d5016] rounded-lg px-2 py-3 flex flex-col gap-3">
                                        <li><a href="#" class="w-8 h-8 rounded-full flex items-center justify-center text-white hover:text-lime-400 transition-colors"><i class="fab fa-pinterest text-sm"></i></a></li>
                                        <li><a href="#" class="w-8 h-8 rounded-full flex items-center justify-center text-white hover:text-lime-400 transition-colors"><i class="fab fa-linkedin text-sm"></i></a></li>
                                        <li><a href="#" class="w-8 h-8 rounded-full flex items-center justify-center text-white hover:text-lime-400 transition-colors"><i class="fab fa-instagram text-sm"></i></a></li>
                                        <li><a href="#" class="w-8 h-8 rounded-full flex items-center justify-center text-white hover:text-lime-400 transition-colors"><i class="fab fa-facebook text-sm"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <h3 class="font-semibold text-xl text-gray-800 mb-1 group-hover:text-[#2d5016] transition-colors">
                                <a href="#" class="underline decoration-2 underline-offset-4 hover:decoration-[#2d5016] transition-colors">{{ __('messages.team_member_1_name') }}</a>
                            </h3>
                            <span class="text-sm text-gray-600">{{ __('messages.team_member_1_role') }}</span>
                        </div>
                    </div>

                    <!-- Team Member 2: Michael Thomas -->
                    <div class="tp-team-it-item bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 cursor-pointer group mb-12">
                        <a href="#" class="tp-team-it-thumb block relative overflow-hidden">
                            <!-- Gradient Background -->
                            <div class="absolute inset-0 bg-gradient-to-b from-white to-lime-400 rounded-t-xl"></div>
                            <img src="{{ asset('images/photo_2025-12-27_14-52-10.jpg') }}" alt="{{ __('messages.team_member_2_name') }}" class="relative w-full h-80 object-cover rounded-t-xl group-hover:scale-110 transition-transform duration-300">
                        </a>
                        <div class="tp-team-it-content p-5 relative">
                            <div class="tp-team-it-socials absolute left-0 -top-8 z-10">
                                <div class="tp-team-it-socials-trigger  transition-transform duration-300 border-6 border-[#ffffff] rounded-full">
                                    <span class="tp-team-it-socials-share w-10 h-10 bg-[#2d5016] rounded-full flex items-center justify-center cursor-pointer">
                                        <svg width="22" height="24" viewBox="0 0 22 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M5.68005 11.2873C5.41131 10.8172 4.9896 10.4471 4.48112 10.2352C3.97264 10.0233 3.40618 9.98159 2.87065 10.1165C2.33512 10.2515 1.86085 10.5555 1.52228 10.9808C1.1837 11.4062 1 11.9288 1 12.4666C1 13.0044 1.1837 13.527 1.52228 13.9523C1.86085 14.3777 2.33512 14.6817 2.87065 14.8166C3.40618 14.9516 3.97264 14.9098 4.48112 14.6979C4.9896 14.486 5.41131 14.116 5.68005 13.6459M5.68005 11.2873C5.87983 11.6368 5.99415 12.0382 5.99415 12.4666C5.99415 12.8949 5.87983 13.2974 5.68005 13.6459M5.68005 11.2873L16.2973 5.55355M5.68005 13.6459L16.2973 19.3796M16.2973 5.55355C16.4529 5.83855 16.6655 6.09052 16.9225 6.29473C17.1795 6.49894 17.4758 6.6513 17.7941 6.74288C18.1123 6.83447 18.4462 6.86346 18.7761 6.82814C19.1061 6.79283 19.4255 6.69392 19.7156 6.53721C20.0058 6.3805 20.2609 6.16913 20.466 5.91545C20.6712 5.66178 20.8223 5.37089 20.9104 5.05979C20.9986 4.74869 21.022 4.42363 20.9795 4.10361C20.9369 3.78359 20.8291 3.47503 20.6624 3.19598C20.334 2.64606 19.7967 2.24338 19.1661 2.0745C18.5355 1.90561 17.8619 1.984 17.2901 2.29282C16.7183 2.60164 16.294 3.11622 16.1083 3.72596C15.9226 4.33571 15.9905 4.99192 16.2973 5.55355ZM16.2973 19.3796C16.1379 19.6584 16.0367 19.9649 15.9992 20.2818C15.9618 20.5986 15.9889 20.9195 16.079 21.2261C16.1692 21.5328 16.3205 21.8192 16.5245 22.0689C16.7285 22.3187 16.9811 22.527 17.2678 22.6818C17.5546 22.8367 17.87 22.9351 18.1959 22.9715C18.5218 23.0079 18.8518 22.9816 19.1673 22.894C19.4827 22.8063 19.7773 22.6592 20.0342 22.4609C20.2911 22.2626 20.5054 22.017 20.6647 21.7383C20.9864 21.1752 21.0649 20.511 20.8829 19.8917C20.7008 19.2724 20.2732 18.7488 19.6941 18.436C19.1149 18.1233 18.4317 18.047 17.7946 18.2239C17.1576 18.4009 16.619 18.8166 16.2973 19.3796Z" stroke="#F3F1F2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </span>
                                </div>
                                <div class="tp-team-it-socials-wrapper absolute left-0 bottom-full ">
                                    <ul class="tp-team-it-socials-icon bg-[#2d5016] rounded-lg px-2 py-3 flex flex-col gap-3">
                                        <li><a href="#" class="w-8 h-8 rounded-full flex items-center justify-center text-white hover:text-lime-400 transition-colors"><i class="fab fa-pinterest text-sm"></i></a></li>
                                        <li><a href="#" class="w-8 h-8 rounded-full flex items-center justify-center text-white hover:text-lime-400 transition-colors"><i class="fab fa-linkedin text-sm"></i></a></li>
                                        <li><a href="#" class="w-8 h-8 rounded-full flex items-center justify-center text-white hover:text-lime-400 transition-colors"><i class="fab fa-instagram text-sm"></i></a></li>
                                        <li><a href="#" class="w-8 h-8 rounded-full flex items-center justify-center text-white hover:text-lime-400 transition-colors"><i class="fab fa-facebook text-sm"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <h3 class="font-semibold text-xl text-gray-800 mb-1 group-hover:text-[#2d5016] transition-colors">
                                <a href="#" class="underline decoration-2 underline-offset-4 hover:decoration-[#2d5016] transition-colors">{{ __('messages.team_member_2_name') }}</a>
                            </h3>
                            <span class="text-sm text-gray-600">{{ __('messages.team_member_1_role') }}</span>
                        </div>
                    </div>

                </div>
            </div>
        </div>
</div>
</section>
