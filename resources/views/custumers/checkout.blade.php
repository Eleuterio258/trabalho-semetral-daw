<div class="container flex items-center gap-3 py-4">
    <a href="index.html" class="text-base text-primary">
        <i class="fas fa-home"></i>
    </a>
    <span class="text-sm text-gray-400"><i class="fas fa-chevron-right"></i></span>
    <p class="font-medium text-gray-600 uppercase">checkout</p>
</div>
<!-- breadcrum end -->

<!-- checkout wrapper -->
<div class="container items-start grid-cols-12 gap-6 pt-4 pb-16 lg:grid">


    <!-- checkout form -->
    <div class="px-4 py-4 border border-gray-200 rounded lg:col-span-8">
        <form action="{{ url('placeorder') }}" method="POST">
            {{ csrf_field() }}

            <h3 class="mb-4 text-lg font-medium capitalize">
                checkout
            </h3>

            <div class="space-y-4">
                <div class="grid gap-4 sm:grid-cols-2">
                    <div>
                        <label class="block mb-2 text-gray-600">
                            First Name <span class="text-primary">*</span>
                        </label>
                        <input type="text" class="input-box" name="fname" value="{{ Auth::user()->fname }}">
                    </div>
                    <div>
                        <label class="block mb-2 text-gray-600">
                            Last Name <span class="text-primary">*</span>
                        </label>
                        <input type="text" class="input-box" name="lname" value="{{ Auth::user()->lname }}">
                    </div>
                </div>
                <div class="grid gap-4 sm:grid-cols-2">
                    <div>
                        <label class="block mb-2 text-gray-600">
                            Province <span class="text-primary">*</span>
                        </label>

                        <select name="province" id="province=" class="input-box"
                            value="{{ Auth::user()->province }}">
                            <option value="">Seleccione uma opção</option>
                            <option value="MP" selected='selected'>Maputo</option>
                            {{-- <option value="CD">Cabo Delgado</option> --}}
                            <option value="GA">Gaza</option>
                            <option value="IN">Inhambane</option>
                            <option value="MT">Matola</option>
                        </select>
                        </select>
                    </div>
                    <div>
                        <label class="block mb-2 text-gray-600">
                            Address <span class="text-primary">*</span>
                        </label>
                        <input type="text" class="input-box" name="address" value="{{ Auth::user()->province }}">
                    </div>
                </div>
                <div>
                    <label class="block mb-2 text-gray-600">
                        City<span class="text-primary">*</span>
                    </label>
                    <input type="text" class="input-box" name="city" value="{{ Auth::user()->city }}">
                </div>

                <div>
                    <label class="block mb-2 text-gray-600">
                        Zip Code <span class="text-primary">*</span>
                    </label>
                    <input type="text" class="input-box" name="postalcode"
                        value="{{ Auth::user()->postalcode }}">
                </div>
                <div>
                    <label class="block mb-2 text-gray-600">
                        Phone Number <span class="text-primary">*</span>
                    </label>
                    <input type="text" class="input-box" name="phone" value="{{ Auth::user()->phone }}">
                </div>
                <div>
                    <label class="block mb-2 text-gray-600">
                        Email Address <span class="text-primary">*</span>
                    </label>
                    <input type="text" class="input-box" name="email" value="{{ Auth::user()->email }}">
                </div>

                <!-- checkout -->
                <button type="submit"
                    class="block w-full px-4 py-3 text-sm font-medium text-center text-white uppercase transition border rounded-md bg-primary border-primary hover:bg-transparent hover:text-primary">
                    Place order
                </button>
                <!-- checkout end -->
            </div>
        </form>
    </div>
    <!-- checkout form end -->
    @php
        $total = 0;
        $subtotal = 0;
        $frete = 0;
    @endphp
    <!-- order summary -->
    <div class="px-4 py-4 mt-6 border border-gray-200 rounded lg:col-span-4 lg:mt-0">
        <h4 class="mb-4 text-lg font-medium text-gray-800 uppercase">ORDER SUMMARY</h4>
        <table class="min-w-full">
            @foreach ($cartItens as $item)
                <tbody class="bg-white ">
                    <tr>
                        <td class="py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 w-8 h-8">
                                    <img class="w-8 h-8 rounded-full" src="{{ $item->products->image }}" alt="">
                                </div>
                                <div class="ml-4">
                                    <div class="text-gray-900 uppercase text-xsfont-medium">
                                        {{ $item->products->name }}

                                        <div class="text-xs text-gray-500">
                                            Qts: {{ $item->quantity }} X
                                        </div>
                                        <div class="text-xs text-gray-900">
                                            Price: {{ $item->products->price * $item->quantity }}
                                        </div>
                                    </div>
                        </td>
                    </tr>
                    @php
                        $subtotal += $item->quantity * $item->products->price;
                    @endphp
                </tbody>
            @endforeach
        </table>


        @php
            $subtotal >= 10000 ? ($frete = 0) : ($frete = 500);
        @endphp

        <hr>
        <div class="flex justify-between mt-1 border-b border-gray-200">
            <h4 class="my-3 font-medium text-gray-800 uppercase">Subtotal</h4>
            <h4 class="my-3 font-medium text-gray-800 uppercase">{{ $subtotal }}</h4>
        </div>
        <div class="flex justify-between border-b border-gray-200">
            <h4 class="my-3 font-medium text-gray-800 uppercase">Shipping</h4>
            <h4 class="my-3 font-medium text-gray-800 uppercase">{{ $frete == '0' ? 'Free' : $frete }}</h4>
        </div>
        <div class="flex justify-between">
            <h4 class="my-3 font-semibold text-gray-800 uppercase">Total</h4>
            <h4 class="my-3 font-semibold text-gray-800 uppercase">{{ $total = $subtotal + $frete }}</h4>
        </div>


    </div>
    <!-- order summary end -->
</div>
<!-- checkout wrapper end -->
