<div class="relative bg-center bg-no-repeat bg-cover py-36" style="background-image: url('images/banner-bg.jpg')">
    <div class="container">
        <!-- banner content -->
        <h1 class="mb-4 text-4xl font-medium text-gray-800 xl:text-6xl md:text-5xl">
            Best Ecommerce For <br class="hidden sm:block"> Mozambique
        </h1>
        <p class="text-base leading-6 text-gray-600">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa <br class="hidden sm:block">
            assumenda aliquid inventore nihil laboriosam odio
        </p>
        <!-- banner button -->
        !@auth
        <div class="mt-12">
            <a href="{{route('shop')}}" class="px-8 py-3 font-medium text-white uppercase transition border rounded-md bg-primary border-primary hover:bg-transparent hover:text-primary">
                Shop now
            </a>
        </div>
        @endauth
    </div>
</div>
