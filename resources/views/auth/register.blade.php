@extends('layout.app')
@section('titolo', 'Dashboard.')

@section('content')

    <!-- form wrapper -->
    <div class="container py-16">
        <div class="max-w-lg px-6 mx-auto overflow-hidden rounded shadow py-7">
            <h2 class="mb-1 text-2xl font-medium uppercase">
                create an acocunt
            </h2>
            <p class="mb-6 text-sm text-gray-600">
                Register here if you don't have account
            </p>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="space-y-4">
                    <div>
                        <label class="block mb-2 text-gray-600">
                            Full Name <span class="text-primary">*</span>
                        </label>
                        <input type="text" class="input-box" name="name" placeholder="John Doe">
                    </div>
                    <div>
                        <label class="block mb-2 text-gray-600">
                            Email Address <span class="text-primary">*</span>
                        </label>
                        <input type="email" class="input-box" name="email" placeholder="example@mail.com">
                    </div>
                    <div>
                        <label class="block mb-2 text-gray-600">Password <span class="text-primary">*</span></label>
                        <input type="password" class="input-box" placeholder="type password" name="password">
                    </div>
                    <div>
                        <label class="block mb-2 text-gray-600">Confirm Password
                            <span class="text-primary">*</span>
                        </label>
                        <input type="password" class="input-box" placeholder="confirm your password" name="password_confirmation">
                    </div>
                </div>
                <div class="flex items-center mt-6">
                    <input type="checkbox" id="agreement" class="rounded-sm cursor-pointer text-primary focus:ring-0">
                    <label for="agreement" class="ml-3 text-gray-600 cursor-pointer">
                        I have read and agree to the
                        <a href="#" class="text-primary">terms & conditions</a>
                    </label>
                </div>
                <div class="mt-4">
                    <button type="submit"
                        class="block w-full py-2 font-medium text-center text-white uppercase transition border rounded bg-primary border-primary hover:bg-transparent hover:text-primary font-roboto">
                        create account
                    </button>
                </div>
            </form>
            <!-- login with social -->
            <div class="relative flex justify-center mt-6">
                <div class="absolute left-0 w-full border-b-2 border-gray-200 top-3"></div>
                <div class="relative z-10 px-3 text-gray-600 uppercase bg-white">
                    OR SINGUP IN WITH
                </div>
            </div>
            <div class="flex gap-4 mt-4">
                <a href="#"
                    class="block w-1/2 py-2 text-sm font-medium text-center text-white uppercase bg-blue-800 rounded font-roboto">
                    Facebook
                </a>
                <a href="#"
                    class="block w-1/2 py-2 text-sm font-medium text-center text-white uppercase bg-yellow-600 rounded font-roboto">
                    Google
                </a>
            </div>
            <!-- login with social end -->
            <p class="mt-4 text-center text-gray-600">
                Already have an account? <a href="{{ url('login') }}" class="text-primary">Login Now</a>
            </p>
        </div>
    </div>
    <!-- form wrapper end -->
@endsection
