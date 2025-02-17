@extends('layouts.app')

@section('title', 'Marivora - Register')

@section('content')
<section class="flex items-center justify-center w-full min-h-screen bg-lightBlue">
    <div class="w-full max-w-lg p-6 lg:m-0 md:m-0 m-4 bg-white rounded-xl shadow-lg h-[550px] md:max-w-3xl md:h-[550px] lg:max-w-6xl lg:h-[650px] flex flex-row lg:mt-0 md:mt-0 mt-24 motion-opacity-in-0 motion-translate-y-in-100 motion-blur-in-md">
        <div class="flex flex-col items-center justify-center w-full h-full lg:px-16 lg:w-1/2 md:w-1/2 form-container lg:items-start md:items-starty">
            <h1 class="text-3xl font-bold text-transparent lg:text-4xl bg-gradient-to-r from-primary to-secondary bg-clip-text">Get Started</h1>
            <h3 class="mb-6 text-center text-gray-400 lg:text-start">Selamat Datang di Marivora - Solusi Untuk Para Peternak Ikan</h3>
            <form class="w-full max-w-sm" method="POST" action="{{ route('register.store') }}">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block mb-2 text-sm font-bold text-gray-700">Name</label>
                    <input type="text" id="name" name="name" placeholder="Enter your name"
                        class="w-full px-3 py-2.5 leading-tight text-gray-700 border rounded-lg shadow appearance-none focus:outline-none focus:shadow-outline border-primary @error('name') border-red-500 @enderror"
                        value="{{ old('name') }}">
                    @error('name')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            
                <div class="mb-4">
                    <label for="email" class="block mb-2 text-sm font-bold text-gray-700">Email</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email"
                        class="w-full px-3 py-2.5 leading-tight text-gray-700 border rounded-lg shadow appearance-none focus:outline-none focus:shadow-outline border-primary @error('email') border-red-500 @enderror"
                        value="{{ old('email') }}">
                    @error('email')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            
                <div class="mb-6">
                    <label for="password" class="block mb-2 text-sm font-bold text-gray-700">Password</label>
                    <input type="password" id="password" name="password" placeholder="Create a strong password"
                        class="w-full px-3 py-2.5 leading-tight text-gray-700 border rounded-lg shadow appearance-none focus:outline-none focus:shadow-outline border-primary @error('password') border-red-500 @enderror">
                    @error('password')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            
                <div class="flex items-center justify-between">
                    <button type="submit" class="w-full px-4 py-2.5 font-bold text-white rounded-lg bg-gradient-to-r from-primary to-secondary hover:bg-gradient-to-br focus:outline-none focus:shadow-outline">
                        Sign Up
                    </button>
                </div>
        
                <div class="mt-4 text-center">
                    <p class="text-sm font-bold text-gray-600">Already have an account? 
                        <a href="{{ route('user.login') }}" class="text-secondary hover:text-primary">Log In</a>
                    </p>
                </div>
            </form>
            


        </div>
        <div class="hidden w-1/2 h-full bg-pink-400 rounded-lg image sm:block">
            <img src="{{ asset('assets/images/petani-ikan.png') }}" alt="" class="object-cover w-full h-full rounded-lg">
        </div>
    </div>
</section>
@endsection
