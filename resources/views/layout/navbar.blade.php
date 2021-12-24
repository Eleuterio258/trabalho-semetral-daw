<nav class="hidden bg-gray-800 lg:block">
    <div class="container">
        <div class="flex">

            <!-- all category -->
            <div class="relative flex items-center px-8 py-4 cursor-pointer bg-primary group">
                <span class="text-white">
                    <i class="fas fa-bars"></i>
                </span>
                <span class="ml-2 text-white capitalize">All categories</span>

                <div
                    class="absolute left-0 z-50 invisible w-full py-3 transition duration-300 bg-white divide-y divide-gray-300 shadow-md opacity-0 top-full group-hover:opacity-100 group-hover:visible divide-dashed">
                    <!-- single category -->
                    @foreach ($categories as $category)
                        <a href="{{ url('category/' . $category->name) }}"
                            class="flex items-center px-6 py-3 transition hover:bg-gray-100">
                            <img src="{{ $category->icon }}" class="object-contain w-5 h-5">
                            <span class="ml-6 text-sm text-gray-600">{{ $category->name }}</span>
                        </a>
                    @endforeach
                </div>
            </div>
            <!-- all category end -->

            <!-- nav menu -->
            <div class="flex items-center justify-between flex-grow pl-12">
                <div class="flex items-center space-x-6 text-base capitalize">
                    <a href="{{ route('home') }}" class="text-gray-200 transition hover:text-white">Home</a>
                    <a href="{{ url('shop') }}" class="text-gray-200 transition hover:text-white">Shop</a>
                </div>
                @if (Auth::guest())
                    <a href="{{ url('login') }}"
                        class="ml-auto text-gray-200 transition justify-self-end hover:text-white">
                        login
                    </a>

                @else

                @endif
            </div>
            <!-- nav menu end -->

        </div>
    </div>
</nav>


