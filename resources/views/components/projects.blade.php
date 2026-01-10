<section class="relative py-20 bg-white overflow-hidden">
    <div class="container mx-auto px-4 relative z-10">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <!-- Left Section: Title and Description -->
            <div class="space-y-8">
                <!-- Tag -->
                <div class="inline-block px-4 py-2 border border-[#2d5016] rounded-lg">
                    <span class="text-[#2d5016] text-sm font-medium">{{ __('messages.projects_tag') }}</span>
                </div>
                
                <!-- Main Heading -->
                <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold text-[#2d5016] leading-tight">
                    {{ __('messages.projects_title') }}
                </h2>
            </div>

                   <!-- Right Section: Stacked Cards -->
                   <div class="relative h-[600px] flex items-center justify-center">
                       <div id="cards-container" class="relative w-full max-w-md h-full cursor-grab active:cursor-grabbing">
                           @php
                               $projects = \App\Models\Project::orderBy('order')->get();
                               $totalProjects = $projects->count();
                           @endphp
                           @forelse($projects as $index => $project)
                               <div class="project-card absolute w-full bg-white rounded-xl overflow-hidden shadow-lg border border-gray-200 transform" 
                                    data-index="{{ $index }}"
                                    style="opacity: {{ $index === 0 ? 1 : max(0.4, 1 - ($index * 0.2)) }};">
                                   <!-- Project Image -->
                                   <div class="relative h-64 bg-gradient-to-br from-gray-200 to-gray-300 overflow-hidden">
                                       @if($project->image)
                                           @php
                                               // Use asset() for better compatibility with symbolic links
                                               $imageUrl = asset('storage/' . $project->image);
                                           @endphp
                                           <img src="{{ $imageUrl }}" alt="{{ $project->name }}" class="w-full h-full object-cover" onerror="if(this.parentElement){this.style.display='none';if(!this.parentElement.querySelector('.error-placeholder')){var div=document.createElement('div');div.className='w-full h-full bg-gradient-to-br from-gray-200 to-gray-300 flex items-center justify-center error-placeholder';div.innerHTML='<i class=\'fas fa-image text-gray-400 text-4xl\'></i>';this.parentElement.appendChild(div)}}">
                                       @else
                                           <div class="w-full h-full bg-gradient-to-br from-gray-200 to-gray-300 flex items-center justify-center">
                                               <i class="fas fa-image text-gray-400 text-4xl"></i>
                                           </div>
                                       @endif
                                       <!-- Project Type/Name Overlay -->
                                       <div class="absolute bottom-0 left-0 right-0 bg-white bg-opacity-90 p-4">
                                           @if($project->type)
                                               <span class="text-[#2d5016] font-bold text-lg">{{ $project->type }}</span>
                                           @endif
                                           <h3 class="text-gray-800 font-bold text-xl mt-1">{{ $project->name }}</h3>
                                       </div>
                                   </div>
                                   <!-- Project Content -->
                                   <div class="p-6">
                                       <p class="text-gray-600 text-sm leading-relaxed mb-6">
                                           {{ $project->description }}
                                       </p>
                                       @if($project->link)
                                           <a href="{{ $project->link }}" target="_blank" class="inline-block px-4 py-2 bg-[#2d5016] text-white rounded-lg font-medium hover:bg-[#1a3a0e] transition-colors">
                                               {{ __('messages.visit_site') }}
                                           </a>
                                       @endif
                                   </div>
                               </div>
                           @empty
                               <!-- Default placeholder cards if no projects -->
                               <div class="project-card absolute w-full bg-white rounded-xl overflow-hidden shadow-lg border border-gray-200 opacity-100 transform" data-index="0">
                                   <div class="relative h-64 bg-gradient-to-br from-gray-200 to-gray-300">
                                       <div class="absolute bottom-0 left-0 right-0 bg-white bg-opacity-90 p-4">
                                           <span class="text-[#2d5016] font-bold text-lg">{{ __('messages.project_1_type') }}</span>
                                           <h3 class="text-gray-800 font-bold text-xl mt-1">{{ __('messages.project_1_title') }}</h3>
                                       </div>
                                   </div>
                                   <div class="p-6">
                                       <p class="text-gray-600 text-sm leading-relaxed mb-6">{{ __('messages.project_1_desc') }}</p>
                                       <a href="#" class="inline-block px-4 py-2 bg-[#2d5016] text-white rounded-lg font-medium hover:bg-[#1a3a0e] transition-colors">
                                           {{ __('messages.visit_site') }}
                                       </a>
                                   </div>
                               </div>
                           @endforelse
                       </div>
                   </div>
        </div>
    </div>
</section>
