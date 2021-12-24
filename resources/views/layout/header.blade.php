<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" />
    <title>Laravel</title>
</head>

<body>
    <header class="py-4 bg-pink-100 shadow-sm lg:bg-white">
        <div class="container flex items-center justify-between">
            <!-- logo -->
            <a href="{{ url('cart') }}" class="block w-32">
                <img src="images/logo.svg" alt="logo" class="w-full">
            </a>
            <!-- logo end -->

            <!-- searchbar -->
            <div class="relative hidden w-full xl:max-w-xl lg:max-w-lg lg:flex">
                <span class="absolute text-lg text-gray-400 left-4 top-3">
                    <i class="fas fa-search"></i>
                </span>
                <input type="text"
                    class="w-full px-3 py-3 pl-12 border border-r-0 border-primary rounded-l-md focus:ring-primary focus:border-primary"
                    placeholder="search">
                <button type="submit"
                    class="px-8 font-medium text-white transition border bg-primary border-primary rounded-r-md hover:bg-transparent hover:text-primary">
                    Search
                </button>
            </div>
            <!-- searchbar end -->

            <!-- navicons -->


            @if (Auth::guest())

            @else
                <div class="flex items-center space-x-4">
                    <a href="{{ url('wishlist') }}"
                        class="relative block text-center text-gray-700 transition hover:text-primary">
                        <span
                            class="absolute flex items-center justify-center w-5 h-5 text-xs text-white rounded-full -right-0 -top-1 bg-primary">5</span>
                        <div class="text-2xl">
                            <i class="far fa-heart"></i>
                        </div>
                        <div class="text-xs leading-3">Wish List</div>
                    </a>
                    <a href="{{ url('cart') }}"
                        class="relative hidden text-center text-gray-700 transition lg:block hover:text-primary">
                        <span
                            class="absolute flex items-center justify-center w-5 h-5 text-xs text-white rounded-full -right-3 -top-1 bg-primary">{{ $carts }}</span>
                        <div class="text-2xl">
                            <i class="fas fa-shopping-bag"></i>
                        </div>
                        <div class="text-xs leading-3">Cart</div>
                    </a>
                    <a href="{{ url('order') }}" class="block text-center text-gray-700 transition hover:text-primary">
                        <div class="text-2xl">
                            <i class="far fa-user"></i>
                        </div>
                        <div class="text-xs leading-3">Account</div>
                    </a>
                </div>
                <!-- navicons end -->
            @endif
        </div>
    </header>
    <!-- header end -->
