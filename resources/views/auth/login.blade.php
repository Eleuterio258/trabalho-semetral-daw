
@extends('layout.app')
@section('titolo', 'Dashboard.')

@section('content')





<div class="container py-16">
    <div class="max-w-lg px-6 mx-auto overflow-hidden rounded shadow py-7">
        <h2 class="mb-1 text-2xl font-medium uppercase">
            LOGIN
        </h2>
        <p class="mb-6 text-sm text-gray-600">
            Login if you are a returing customer
        </p>
        <form method="POST"  action="{{ route('login') }}">
            @csrf
            <div class="space-y-4">
                <div>
                    <label class="block mb-2 text-gray-600">
                        Email Address <span class="text-primary">*</span>
                    </label>
                    <input type="email" name="email" id="email" class="input-box" placeholder="example@mail.com">
                    @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <div>
                    <label class="block mb-2 text-gray-600">Password <span class="text-primary">*</span></label>
                    <input type="password" id="password" name="password"  class="input-box" placeholder="type password">
                    @if ($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif
                </div>
            </div>
            <div class="flex items-center justify-between mt-6">
                <div class="flex items-center">
                    <input type="checkbox" id="agreement" class="rounded-sm cursor-pointer text-primary focus:ring-0">
                    <label for="agreement" class="ml-3 text-gray-600 cursor-pointer">
                        Remember Me
                    </label>
                </div>
                <a href="#" class="text-primary">Forgot Password?</a>
            </div>
            <div class="mt-4">
                <button type="submit"
                    class="block w-full py-2 font-medium text-center text-white uppercase transition border rounded bg-primary border-primary hover:bg-transparent hover:text-primary font-roboto">
                    Login
                </button>
            </div>
        </form>

        <!-- login with social -->
        <div class="relative flex justify-center mt-6">
            <div class="absolute left-0 w-full border-b-2 border-gray-200 top-3"></div>
            <div class="relative z-10 px-3 text-gray-600 uppercase bg-white">
                OR LOGIN IN WITH
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
            Don't have an account? <a href="{{ route('register') }}" class="text-primary">Register Now
            </a>
        </p>
    </div>
</div>
@endsection