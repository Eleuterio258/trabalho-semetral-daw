<div class="px-6 py-12 md:px-12">
    <div class="w-full mx-auto lg:w-9/12">
        <h2 class="mb-4 text-xl font-semibold">Payment</h2>

        <div class="flex flex-col md:flex-row md:space-x-6">
            <div class="w-full md:w-8/12">
                <div class="px-4 py-3 border rounded">
                    <div class="flex justify-between text-sm">
                        <div class="flex justify-start space-x-6 sm:space-x-12">
                            <h5 class="w-12 sm:w-16">Contact</h5>
                            <h5 class="text-blue-600">{{ $orders->phone }}</h5>
                        </div>

                    </div>

                    <div class="flex justify-between text-sm">
                        <div class="flex justify-start space-x-6 sm:space-x-12">
                            <h5 class="w-12 sm:w-16">Ship to</h5>
                            <h5>Cep: {{ $orders->postalcode }}, {{ $orders->address }}, {{ $orders->city }}
                                {{ $orders->province }}</h5>
                        </div>

                    </div>
                </div>

                <h5 class="mt-6 mb-4 font-semibold">Shipping Method</h5>
                <div class="px-4 py-3 mt-4 border rounded">
                    <div class="flex justify-between text-sm">
                        <h5 class="w-16">CORREIOS</h5>
                        <h5 class="self-center font-bold">{{ $orders->frete }}</h5>
                    </div>
                </div>

                <form method="POST" action="{{ url('pay') }}">
                    @csrf
                    <div class="space-y-4">


                        <div>
                            <label class="block mb-2 text-gray-600">
                                M-pesa Number <span class="text-primary">*</span>
                            </label>
                            <input type="number" name="phone" id="phone" value="{{ $orders->phone }}"
                                class="input-box" placeholder="84/85">
                            <input type="hidden" name="total" value="{{ $orders->total_price }}">
                            <input type="hidden" name="ordersid" value="{{ $orders->id }}">
                        </div>
                    </div>
                    <h5 class="mt-6 mb-4 font-semibold">Payments Methods</h5>


                    <div class="px-4 py-3 mt-4 bg-gray-100 border">

                        @if ($orders->status != '0')

                            <button type="submit"
                                class="block px-6 py-2 ml-auto text-sm font-medium text-center text-white uppercase border rounded cursor-not-allowed md:ml-0 bg-primary border-primary font-roboto bg-opacity-80">
                                Proceed with MPesa

                            </button>
                        @else


                            <button type="submit"
                                class="flex items-center px-8 py-2 text-sm font-medium text-white uppercase transition border rounded bg-primary border-primary hover:bg-transparent hover:text-primary ">Proceed
                                with MPesa

                            </button>
                        @endif





                    </div>
                </form>
            </div>
            <div class="w-full px-5 py-4 mt-6 border rounded md:w-4/12 md:mt-0">




                <div class="flex justify-between pb-4 text-sm font-bold uppercase border-b">
                    <h6>Products</h6>
                    <h6>Total</h6>
                </div>
                @foreach ($orders->orderItems as $item)
                    <div class="flex justify-between mt-3 space-x-6 text-sm">
                        <h5 class="font-semibold text-gray-800">{{ $item->product->name }}</h5>
                        <h5>{{ $item->product->price }}</h5>
                    </div>

                @endforeach
                <div class="flex justify-between py-5 text-sm font-semibold border-t border-b">
                    <h5 class="text-gray-800 uppercase">Sub Total</h5>
                    <h5>{{ $orders->subtotal }}</h5>
                </div>

                <div class="flex justify-between py-5 text-sm font-semibold border-b">
                    <h5 class="text-gray-800 uppercase">Shipping</h5>
                    <h5>{{ $orders->frete }}</h5>
                </div>

                <div class="flex justify-between py-5 text-sm font-semibold border-b">
                    <h5 class="text-gray-800 uppercase">Total</h5>
                    <h5>{{ $orders->total_price }}</h5>
                </div>


            </div>
        </div>
    </div>
</div>
