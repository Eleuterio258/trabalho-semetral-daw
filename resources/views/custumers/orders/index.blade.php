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
                <img src="{{ Auth::user()->profile_img }}" class="object-cover p-1 border border-gray-200 rounded-full w-14 h-14">
            </div>
            <div>
                <p class="text-gray-600">Hello,</p>
                <h4 class="font-medium text-gray-800 capitalize">{{ Auth::user()->fname }} {{ Auth::user()->lname }}
                </h4>
            </div>
        </div>
        <!-- account profile end -->

        <!-- profile links -->
        <div class="p-4 mt-6 space-y-4 text-gray-600 bg-white divide-y divide-gray-200 rounded shadow">
            <!-- single link -->
            <div class="pl-8 space-y-1">
                <a href="#" class="relative block text-base font-medium capitalize transition hover:text-primary">
                    Manage account
                    <span class="absolute top-0 text-base -left-8">
                        <i class="far fa-address-card"></i>
                    </span>
                </a>
                <a href="#" class="block capitalize transition hover:text-primary">Profile
                    information</a>

                <a href="#" class="block capitalize transition hover:text-primary">change
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
                <a href="#"
                    class="relative block font-medium capitalize transition medium hover:text-primary text-primary">my
                    Pending Orders</a>
                <a href="#" class="block capitalize transition hover:text-primary">Payment Pending</a>
                <a href="#" class="block capitalize transition hover:text-primary">Completed Order</a>
            </div>

            <!-- single link end -->
            <!-- single link -->
            <div class="pt-4 pl-8">
                <a href="{{ url('wishlist') }}" class="block capitalize transition hover:text-primary">
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

        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                    <div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                        Order Date
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                        Tracking Order
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                        Total Price
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                        Stutus
                                    </th>
                                    {{-- <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                          Action
                        </th> --}}
                                    <th scope="col" class="relative px-6 py-3">
                                        <span class="sr-only">Edit</span>
                                    </th>
                                </tr>
                            </thead>
                            @foreach ($orders as $order)
                                <tbody class="bg-white divide-y divide-gray-200">

                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">

                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        {{ date('d-m-y', strtotime($order->created_at)) }}
                                                    </div>

                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">{{ $order->order_tacking }}</div>

                                        </td>

                                        <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                            {{ $order->subtotal }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span
                                                class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">
                                                Active
                                            </span>
                                        </td>

                                        <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                                            <a href="{{ url('view') }}/{{ $order->id }}"
                                                class="text-indigo-600 hover:text-indigo-900">Detail</a>
                                        </td>
                                    </tr>
                                </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>

        {{-- @foreach ($orders as $order)
            <div
                class="flex flex-wrap items-center gap-4 p-4 border border-gray-200 rounded md:justify-between md:gap-6 md:flex-nowrap product_data">
                <!-- cart image -->

                <div class="flex-shrink-0 w-28">
                    <h1>{{ $order->id }}</h1>
                </div>
                <!-- cart image end -->
                <!-- cart content -->
                <div class="w-full md:w-1/3">


                        @if ($order->status == 0)
                        <h2 class="mb-1 font-medium text-red-800 uppercase xl:text-xl textl-lg">Pedding</h2>
                        @else
                        <h2 class="mb-1 font-medium text-gray-800 uppercase xl:text-xl textl-lg">sucess</h2>
                        @endif

                </div>
                <!-- cart content end -->
                <div class="w-full md:w-1/3">
                    <p class="text-lg font-semibold text-primary">{{ $order->total_price}}</p>
                </div>

                <a href="#"
                    class="block px-6 py-2 ml-auto text-sm font-medium text-center text-white uppercase transition border rounded md:ml-0 bg-primary border-primary hover:bg-transparent hover:text-primary font-roboto">
                    Detail
                </a>


            </div>
            <!-- single wishlist end -->
            <!-- single wishlist -->
        @endforeach --}}
        <!-- single wishlist -->



    </div>
    <!-- account content end -->
</div>
