<footer class="bg-[#2d5016] text-white py-12">
    <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row justify-between items-center gap-6">
            <!-- Copyright -->
            <div class="text-center md:text-left">
                <p class="text-sm text-gray-300">
                    {{ __('messages.copyright') }} © {{ date('Y') }} {{ __('messages.company_name') }}. {{ __('messages.all_rights_reserved') }}
                </p>
            </div>

            <!-- Social Media Links -->
            <div class="flex items-center gap-4">
                <!-- Facebook -->
                <a href="#" class="w-10 h-10 bg-white bg-opacity-10 rounded-full flex items-center justify-center hover:bg-opacity-20 transition-all duration-300 hover:scale-110" aria-label="Facebook">
                    <i class="fab fa-facebook-f text-white"></i>
                </a>
                <!-- Pinterest -->
                <a href="#" class="w-10 h-10 bg-white bg-opacity-10 rounded-full flex items-center justify-center hover:bg-opacity-20 transition-all duration-300 hover:scale-110" aria-label="Pinterest">
                    <i class="fab fa-pinterest-p text-white"></i>
                </a>
                <!-- Behance -->
                <a href="#" class="w-10 h-10 bg-white bg-opacity-10 rounded-full flex items-center justify-center hover:bg-opacity-20 transition-all duration-300 hover:scale-110" aria-label="Behance">
                    <i class="fab fa-behance text-white"></i>
                </a>
                <!-- LinkedIn -->
                <a href="#" class="w-10 h-10 bg-white bg-opacity-10 rounded-full flex items-center justify-center hover:bg-opacity-20 transition-all duration-300 hover:scale-110" aria-label="LinkedIn">
                    <i class="fab fa-linkedin-in text-white"></i>
                </a>
            </div>
        </div>
    </div>
</footer>
