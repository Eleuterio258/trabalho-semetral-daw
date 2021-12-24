
<div class="container flex items-center gap-3 py-4">
    <router-link :to="{name: 'Home'}" class="text-base text-primary">
        <i class="fas fa-home"></i>
    </router-link>
    <span class="text-sm text-gray-400"><i class="fas fa-chevron-right"></i></span>
    <p class="font-medium text-gray-600 uppercase">Shopping Cart</p>
</div>
<!-- breadcrum end -->

<!-- order complete wrapper -->
<div class="max-w-3xl px-4 pt-16 pb-24 mx-auto text-center">
    <div class="mb-8">
        <img src="images/complete.png" class="inline-block w-16">
    </div>
    <h2 class="mb-3 text-3xl font-medium text-gray-800">
        YOUR ORDER IS COMPLETED!
    </h2>
    <p class="text-gray-600 ">
        Thank you for your order! Your order is being processed and will be completed within 3-6 hours. You will
        receive an email confirmation when your order is completed.
    </p>
    <div class="mt-10">
        <a href="{{ route('home') }}"
           class="px-6 py-3 font-medium text-center text-white uppercase transition border rounded-md bg-primary border-primary hover:bg-transparent hover:text-primary">Continue
            shopping</a>
    </div>
</div>
<!-- order complete wrapper end -->

