
<!-- breadcrum -->
<div class="container flex items-center gap-3 py-4">
    <a href="index.html" class="text-base text-primary">
        <i class="fas fa-home"></i>
    </a>
    <span class="text-sm text-gray-400"><i class="fas fa-chevron-right"></i></span>
    <a href="shop.html" class="text-base font-medium uppercase text-primary">
        Shop
    </a>
    <span class="text-sm text-gray-400"><i class="fas fa-chevron-right"></i></span>
    <p class="font-medium text-gray-600 uppercase">{{ $products->name }}</p>
</div>
<!-- breadcrum end -->

<!-- product view -->
<div class="container grid gap-6 pt-4 pb-6 lg:grid-cols-2 product_data">
    <!-- product image -->
    <div>
        <div>
            <img id="main-img" src="{{ $products->image }}" class="w-full">
        </div>
        <div class="grid grid-cols-5 gap-4 mt-4">
            <div>
                <img src="{{ $products->image }}"
                    class="w-full border cursor-pointer single-img border-primary">
            </div>
            <div>
                <img src="{{ $products->image }}" class="w-full border cursor-pointer single-img">
            </div>
            <div>
                <img src="{{ $products->image }}" class="w-full border cursor-pointer single-img">
            </div>
            <div>
                <img src="{{ $products->image }}" class="w-full border cursor-pointer single-img">
            </div>
            <div>
                <img src="{{ $products->image }}" class="w-full border cursor-pointer single-img">
            </div>
        </div>
    </div>
    <!-- product image end -->
    <!-- product content -->
    <div>
        <h2 class="mb-2 text-2xl font-medium uppercase md:text-3xl">{{ $products->name }}</h2>
        <div class="space-y-2">
            <p class="space-x-2 font-semibold text-gray-800">
                <span>Availability: </span>
                @if ($products->stock == 0)
                    <span class="text-red-600">Out of
                        Stock</span>

                @else
                    <span class="text-green-600">In Stock</span>
                @endif

            </p>
            <p class="space-x-2">
                <span class="font-semibold text-gray-800">Brand: </span>
                <span class="text-gray-600">{{ $products->brand }}</span>
            </p>
            <p class="space-x-2">
                <span class="font-semibold text-gray-800">Category: </span>
                <span class="text-gray-600"> {{ $products->category->name }}</span>
            </p>
            <p class="space-x-2">
                <span class="font-semibold text-gray-800">SKU: </span>
                <span class="text-gray-600">{{ $products->sku }}</span>
            </p>
        </div>
        <div class="flex items-baseline gap-3 mt-4">
            <span class="text-xl font-semibold text-primary">${{ $products->price }}</span>
            <span class="text-base text-gray-500 line-through">${{ $products->old_price }}</span>
        </div>
        <p class="mt-4 text-gray-600">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim exercitationem quaerat excepturi
            labore blanditiis
        </p>
        <!-- size -->
        <!-- size -->

        <!-- size end -->
        <!-- color -->

        <!-- color end -->
        <!-- quantity -->
        <div class="mt-4">
            <input type="hidden" class="product_id" value="{{$products->id  }}">
            <h3 class="mb-1 text-base text-gray-800">Quantity</h3>
            
            <div class="flex text-gray-600 border border-gray-300 divide-x divide-gray-300 w-max">
                <button class="flex items-center justify-center w-8 h-8 text-xl cursor-pointer select-none decrement-btn">-</button>
                <input class="flex items-center justify-center w-10 h-8 quantity-p" type="text"  value="1">
                <button class="flex items-center justify-center w-8 h-8 text-xl cursor-pointer select-none increment-btn">+</button>
            </div>
        </div>
        <!-- color end -->
        <!-- add to cart button -->
        <div class="flex gap-3 pb-5 mt-6 border-b border-gray-200">

            @if ($products->stock == 0)
                <a href="#"
                    class="flex items-center px-8 py-2 text-sm font-medium text-white uppercase transition border rounded cursor-not-allowed bg-opacity-80 bg-primary border-primary hover:bg-transparent hover:text-primary">
                    <span class="mr-2"><i class="fas fa-shopping-bag"></i></span> Add to cart
                </a>

            @else
                <a href="#"
                    class="flex items-center px-8 py-2 text-sm font-medium text-white uppercase transition border rounded bg-primary border-primary hover:bg-transparent hover:text-primary addToCart">
                    <span class="mr-2"><i class="fas fa-shopping-bag"></i></span> Add to cart
                </a>
            @endif
            {{-- <input type="hidden" class="product_id" value="{{ $products->id }}">
            <input class="quantity-p" type="hidden" name="quantity" value="1"> --}}
            <a href="#"
                class="px-8 py-2 text-sm font-medium text-gray-600 uppercase transition border border-gray-300 rounded hover:bg-transparent hover:text-primary addTowishlist">
                <span class="mr-2"><i class="far fa-heart"></i></span> Wishlist
            </a>
        </div>
        <!-- add to cart button end -->
        <!-- product share icons -->
        <div class="flex mt-4 space-x-3">
            <a href="#"
                class="flex items-center justify-center w-8 h-8 text-gray-400 border border-gray-300 rounded-full hover:text-gray-500">
                <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#"
                class="flex items-center justify-center w-8 h-8 text-gray-400 border border-gray-300 rounded-full hover:text-gray-500">
                <i class="fab fa-twitter"></i>
            </a>
            <a href="#"
                class="flex items-center justify-center w-8 h-8 text-gray-400 border border-gray-300 rounded-full hover:text-gray-500">
                <i class="fab fa-instagram"></i>
            </a>
        </div>
        <!-- product share icons end -->
    </div>
    <!-- product content end -->
</div>
<!-- product view end -->

<!-- product details and review -->

<!-- product details and review end -->

<!-- related products -->

<!-- related products end -->

