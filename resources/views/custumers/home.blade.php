<div class="container py-16 ">
    <div class="grid justify-center gap-3 mx-auto lg:w-10/12 md:grid-cols-3 lg:gap-6">
        <!-- single feature -->
        <div class="flex items-center justify-center gap-5 px-8 py-4 border rounded-sm border-primary lg:px-3 lg:py-6">
            <img src="images/icons/delivery-van.svg" class="object-contain w-10 h-12 lg:w-12">
            <div>
                <h4 class="text-lg font-medium capitalize">free shipping</h4>
                <p class="text-xs text-gray-500 lg:text-sm">Order over $200</p>
            </div>
        </div>
        <!-- single feature end -->
        <!-- single feature -->
        <div class="flex items-center justify-center gap-5 px-8 py-4 border rounded-sm border-primary lg:px-3 lg:py-6">
            <img src="images/icons/money-back.svg" class="object-contain w-10 h-12 lg:w-12">
            <div>
                <h4 class="text-lg font-medium capitalize">Money returns</h4>
                <p class="text-xs text-gray-500 lg:text-sm">30 Days money return</p>
            </div>
        </div>
        <!-- single feature end -->
        <!-- single feature -->
        <div class="flex items-center justify-center gap-5 px-8 py-4 border rounded-sm border-primary lg:px-3 lg:py-6">
            <img src="images/icons/service-hours.svg" class="object-contain w-10 h-12 lg:w-12">
            <div>
                <h4 class="text-lg font-medium capitalize">24/7 Support</h4>
                <p class="text-xs text-gray-500 lg:text-sm">Customer support</p>
            </div>
        </div>
        <!-- single feature end -->

    </div>
</div>
<!-- features end -->

<!-- categories -->
<div class="container pb-16">
    <h2 class="mb-6 text-2xl font-medium text-gray-800 uppercase md:text-3xl">shop by category</h2>
    <div class="grid gap-3 lg:grid-cols-3 sm:grid-cols-2">
        @foreach ($categories as $category)
            <div class="relative overflow-hidden rounded-sm group">
                <img src="{{ $category->image_url }}" class="w-full">
                <a href="{{ url('category/' . $category->name) }}"
                    class="absolute inset-0 flex items-center justify-center text-xl font-medium tracking-wide text-white transition bg-black bg-opacity-40 group-hover:bg-opacity-50 font-roboto">
                    {{ $category->name }}
                </a>
            </div>

        @endforeach
    </div>
</div>
<!-- categories end -->

<!-- top new arrival -->
<div class="container pb-16">
    <h2 class="mb-6 text-2xl font-medium text-gray-800 uppercase md:text-3xl">top new arrival</h2>
    <!-- product wrapper -->
    <div class="grid gap-6 lg:grid-cols-4 sm:grid-cols-2 product_data">
        @foreach ($products as $product)

            <!-- single product -->
            <div class="overflow-hidden bg-white rounded shadow group product_data">
                <!-- product image -->
                <div class="relative">
                    <img src="{{ $product->image }}" class="w-full">
                    <div
                        class="absolute inset-0 flex items-center justify-center gap-2 transition bg-black opacity-0 bg-opacity-40 group-hover:opacity-100">
                        <a href="{{ url('shop/' . $product->name) }}"
                            class="flex items-center justify-center text-lg text-white transition rounded-full w-9 h-9 bg-primary hover:bg-gray-800">
                            <i class="fas fa-search"></i>
                        </a><input type="hidden" class="product_id" value="{{ $product->id }}">
                        <input class="quantity-p" type="hidden" name="quantity" value="1">
                        <a href="#"
                            class="flex items-center justify-center text-lg text-white transition rounded-full w-9 h-9 bg-primary hover:bg-gray-800 addTowishlist">
                            <i class="far fa-heart"></i>
                        </a>
                    </div>
                </div>
                <!-- product image end -->
                <!-- product content -->
                <div class="px-4 pt-4 pb-3">
                    <a href="{{ url('shop/' . $product->name) }}">
                        <h4 class="mb-2 text-xl font-medium text-gray-800 uppercase transition hover:text-primary">
                            {{ $product->name }}
                        </h4>
                    </a>
                    <div class="flex items-baseline mb-1 space-x-2">
                        <p class="text-xl font-semibold text-primary font-roboto">${{ $product->price }}</p>
                        <p class="text-sm text-gray-400 line-through font-roboto">${{ $product->old_price }}</p>
                    </div>
                    <div class="flex items-center">
                        <div class="flex gap-1 text-sm text-yellow-400">

                            @for ($i = 0; $i < 4; $i++)
                                <span><i class="fas fa-star"></i></span>
                            @endfor

                        </div>
                        <div class="ml-3 text-xs text-gray-500">({{ $product->rating }})</div>
                    </div>
                </div>
                <!-- product content end -->

            </div>
            <!-- single product end -->
        @endforeach
    </div>
    <!-- product wrapper end -->
</div>
<!-- top new arrival end -->

<!-- ad section -->
<div class="container pb-16">
    <a href="#">
        <img src="images/offer.jpg" class="w-full">
    </a>
</div>
<!-- ad section end -->

<!-- recomended for you -->
<!-- recomended for you -->
