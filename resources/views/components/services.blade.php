<section class="relative py-20 bg-white overflow-hidden">
    <div class="container mx-auto px-4 relative z-10">
        <!-- Services Grid -->
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($services as $service)
            <!-- Service Card -->
            <div class="bg-[#f0f5ec] rounded-lg p-6 flex flex-col text-center transition-all duration-300 hover:shadow-xl hover:-translate-y-2 cursor-pointer">
                <!-- Icon Container -->
                <div class="bg-[#b7e793] bg-opacity-10 rounded-lg p-4 mb-6">
                    <div class="w-16 h-16 bg-[#2d5016] rounded-full flex items-center justify-center mx-auto">
                        <!-- Icon -->
                        @if($service->icon)
                            {!! $service->icon !!}
                        @else
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        @endif
                    </div>
                </div>
                <!-- Title -->
                <h3 class="text-[#2d5016] font-bold text-xl mb-3">{{ $service->title }}</h3>
                <!-- Description -->
                @if($service->description)
                    <p class="text-gray-700 text-sm mb-6 flex-grow">{{ $service->description }}</p>
                @endif
                <!-- Arrow Button -->
                <button class="w-12 h-12 bg-[#2d5016] rounded-full flex items-center justify-center mx-auto hover:bg-[#1a3a0e] transition-colors group">
                    <svg class="w-6 h-6 text-white group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </button>
            </div>
            @endforeach
        </div>
    </div>
</section>
