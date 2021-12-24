@extends('layout.app')
@section('titolo', 'Dashboard.')

@section('content')
<!-- breadcrum -->
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
                <a href="profile-info.html" class="block capitalize transition hover:text-primary">Profile information</a>
                <a href="manage-address.html" class="block capitalize transition hover:text-primary text-primary">Manage address</a>
                <a href="change-password.html" class="block capitalize transition hover:text-primary">change password</a>
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
                <a href="wishlist.html" class="relative block font-medium text-gray-800 capitalize transition medium hover:text-primary">
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
    <div class="col-span-9 px-6 pt-5 mt-6 rounded shadow pb-7 lg:mt-0">
        <form action="">
            <h3 class="mb-4 text-lg font-medium capitalize">
                Manage Address
            </h3>
            <div class="space-y-4">
                <!-- Form row -->
                <div class="grid gap-4 sm:grid-cols-2">
                    <!-- Single input -->
                    <div>
                        <label class="block mb-2 text-gray-600">
                            Full Name
                        </label>
                        <input type="text" class="input-box" value="John">
                    </div>
                    <!-- single input end -->
                    <!-- single input -->
                    <div>
                        <label class="block mb-2 text-gray-600">
                            Phone Number
                        </label>
                        <input type="text" class="input-box" value="+123 456 789">
                    </div>
                    <!-- Single input end -->
                </div>
                <!-- Form row end -->
                <div class="grid gap-4 sm:grid-cols-2">
                    <div>
                        <label class="block mb-2 text-gray-600">
                            Country
                        </label>
                        <select class="input-box">
                            <option>Bangladesh</option>
                            <option>Bidesh</option>
                        </select>
                    </div>
                    <div>
                        <label class="block mb-2 text-gray-600">
                            Region
                        </label>
                        <select class="input-box">
                            <option>Dhaka</option>
                            <option>Noakhali</option>
                        </select>
                    </div>
                </div>
                <div class="grid gap-4 sm:grid-cols-2">
                    <div>
                        <label class="block mb-2 text-gray-600">
                            City
                        </label>
                        <select class="input-box">
                            <option>Dhaka-North</option>
                            <option>Dhaka-South</option>
                        </select>
                    </div>
                    <div>
                        <label class="block mb-2 text-gray-600">
                            Area
                        </label>
                        <select class="input-box">
                            <option>Notun Bazar</option>
                            <option>Gulshan</option>
                        </select>
                    </div>
                </div>
                <div>
                    <label class="block mb-2 text-gray-600">
                        Address
                    </label>
                    <input type="text" class="input-box" value="Badda Notun Bazar">
                </div>
            </div>
            <div class="mt-6">
                <button type="submit"
                        class="px-6 py-2 font-medium text-center text-white uppercase transition border rounded bg-primary border-primary hover:bg-transparent hover:text-primary font-roboto">
                    Save change
                </button>
            </div>
        </form>
    </div>
    <!-- account content end -->
</div>
<!-- account wrapper end -->

@endsection
