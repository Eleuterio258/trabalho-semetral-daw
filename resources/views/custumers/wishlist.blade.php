<div class="container flex items-center gap-3 py-4">
    <a href="index.html" class="text-base text-primary">
        <i class="fas fa-home"></i>
    </a>
    <span class="text-sm text-gray-400"><i class="fas fa-chevron-right"></i></span>
    <p class="font-medium text-gray-600 uppercase">My Account</p>
</div>
<!-- breadcrum end -->

<!-- account wrapper -->
<div class="container items-start grid-cols-12 gap-6 pt-4 pb-16 lg:grid">
    <!-- sidebar -->
    <div class="col-span-3">
        <!-- account profile -->
        <div class="flex items-center gap-4 px-4 py-3 shadow">
            <div class="flex-shrink-0">
                <img src="images/avatar.png" class="object-cover p-1 border border-gray-200 rounded-full w-14 h-14">
            </div>
            <div>
                <p class="text-gray-600">Hello,</p>
                <h4 class="font-medium text-gray-800 capitalize">Russell Ahmed</h4>
            </div>
        </div>
        <!-- account profile end -->

        <!-- profile links -->
        <div class="p-4 mt-6 space-y-4 text-gray-600 bg-white divide-y divide-gray-200 rounded shadow">
            <!-- single link -->
            <div class="pl-8 space-y-1">
                <a href="account.html"
                    class="relative block text-base font-medium capitalize transition hover:text-primary">
                    Manage account
                    <span class="absolute top-0 text-base -left-8">
                        <i class="far fa-address-card"></i>
                    </span>
                </a>
                <a href="profile-info.html" class="block capitalize transition hover:text-primary">Profile
                    information</a>
                <a href="manage-address.html" class="block capitalize transition hover:text-primary">Manage
                    address</a>
                <a href="change-password.html" class="block capitalize transition hover:text-primary">change
                    password</a>
            </div>
            <!-- single link end -->
            <!-- single link -->
            <div class="pt-4 pl-8 space-y-1">
                <a href="#"
                    class="relative block font-medium text-gray-800 capitalize transition medium hover:text-primary">
                    My order history
                    <span class="absolute top-0 text-base -left-8">
                        <i class="fas fa-gift"></i>
                    </span>
                </a>
                <a href="#" class="block capitalize transition hover:text-primary">my returns</a>
                <a href="#" class="block capitalize transition hover:text-primary">my cancellations</a>
                <a href="#" class="block capitalize transition hover:text-primary">my reviews</a>
            </div>
            <!-- single link end -->
            <!-- single link -->
            <div class="pt-4 pl-8 space-y-1">
                <a href="#"
                    class="relative block font-medium text-gray-800 capitalize transition medium hover:text-primary">
                    Payment methods
                    <span class="absolute top-0 text-base -left-8">
                        <i class="far fa-credit-card"></i>
                    </span>
                </a>
                <a href="#" class="block capitalize transition hover:text-primary">Voucher</a>
            </div>
            <!-- single link end -->
            <!-- single link -->
            <div class="pt-4 pl-8">
                <a href="wishlist.html"
                    class="relative block font-medium capitalize transition medium hover:text-primary text-primary">
                    my wishlist
                    <span class="absolute top-0 text-base -left-8">
                        <i class="far fa-heart"></i>
                    </span>
                </a>
            </div>
            <!-- single link end -->
            <!-- single link -->
            <div class="pt-4 pl-8">
                <a href="#"
                    class="relative block font-medium text-gray-800 capitalize transition medium hover:text-primary">
                    logout
                    <span class="absolute top-0 text-base -left-8">
                        <i class="fas fa-sign-out-alt"></i>
                    </span>
                </a>
            </div>
            <!-- single link end -->
        </div>
        <!-- profile links end -->
    </div>
    <!-- sidebar end -->

    <!-- account content -->
    <div class="col-span-9 mt-6 space-y-4 lg:mt-0 ">

        @foreach ($wishlists as $wishlist)


            <!-- single wishlist -->
            <div
                class="flex flex-wrap items-center gap-4 p-4 border border-gray-200 rounded md:justify-between md:gap-6 md:flex-nowrap product_data">
                <!-- cart image -->
                <input type="hidden" class="product_id" value="{{ $wishlist->products->id }}">
                <input class="quantity-p" type="hidden" name="quantity"  value="1">
                <div class="flex-shrink-0 w-28">
                    <img src="{{ $wishlist->products->image }}" class="w-full">
                </div>
                <!-- cart image end -->
                <!-- cart content -->
                <div class="w-full md:w-1/3">
                    <h2 class="mb-1 font-medium text-gray-800 uppercase xl:text-xl textl-lg">
                        {{ $wishlist->products->name }}
                    </h2>
                    @if ($wishlist->products->stock == 0)
                        <p class="text-sm text-gray-500">Availability: <span class="text-red-600">Out of Stock</span>
                        </p>
                    @else
                        <p class="text-sm text-gray-500">Availability: <span class="text-green-600">In Stock</span></p>
                    @endif

                </div>
                <!-- cart content end -->
                <div class="">
                    <p class="text-lg font-semibold text-primary">${{ $wishlist->products->price }}</p>
                </div>
                @if ($wishlist->products->stock == 0)
                    <a href="#"
                        class="block px-6 py-2 ml-auto text-sm font-medium text-center text-white uppercase border rounded cursor-not-allowed md:ml-0 bg-primary border-primary font-roboto bg-opacity-80">
                        Add to cart
                    </a>
                @else
                    <a href="#"
                        class="block px-6 py-2 ml-auto text-sm font-medium text-center text-white uppercase transition border rounded md:ml-0 bg-primary border-primary hover:bg-transparent hover:text-primary font-roboto addToCart">
                        Add to cart
                    </a>
                @endif
               
                <button class="text-gray-600 cursor-pointer hover:text-primary wishlist-btn">
                    <i class="fas fa-trash"></i>
                </button>
            </div>
            <!-- single wishlist end -->
            <!-- single wishlist -->
        @endforeach
    </div>
    <!-- account content end -->
</div>
