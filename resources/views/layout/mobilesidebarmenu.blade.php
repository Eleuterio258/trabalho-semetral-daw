<div class="fixed top-0 left-0 z-50 hidden w-full h-full bg-black shadow bg-opacity-30" id="mobileMenu">
    <div class="absolute top-0 left-0 z-50 h-full bg-white shadow w-72">
        <div id="closeMenu"
            class="absolute text-lg text-gray-400 cursor-pointer hover:text-primary right-3 top-3">
            <i class="fas fa-times"></i>
        </div>
        <!-- navlink -->
        <h3 class="pt-4 pl-4 mb-1 text-xl font-semibold text-gray-700 font-roboto">Menu</h3>
        <div class="">
            <a href="{{ url('login') }}" class="block px-4 py-2 font-medium transition hover:bg-gray-100">
                Home
            </a>
            <a href="{{ url('login') }}" class="block px-4 py-2 font-medium transition hover:bg-gray-100">
                Shop
            </a>
            
        </div>
        <!-- navlinks end -->
    </div>
</div>