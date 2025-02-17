@extends('layouts.app')

@section('title', 'Marivora - KolamCerdas')

@push('styles')
@livewireStyles
@endpush

@push('scripts')
@livewireScripts
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
@endpush

@section('content')
<section class="flex items-center justify-center min-h-screen p-6 bg-lightBlue">
    <div class="container px-4 py-10 mx-auto">
        <div class="max-w-5xl mx-auto overflow-hidden transition-all duration-300 bg-white shadow-xl rounded-xl hover:shadow-2xl">
            <div class="flex flex-col md:flex-row">
                <div class="md:w-1/2">
                    <div class="aspect-[1/1]">
                        <img src="{{$product->product_image}}" alt="{{$product->product_name}}" 
                            class="object-cover w-full h-full transition-transform duration-500 hover:scale-105">
                    </div>
                </div>

                <!-- Content -->
                <div class="flex flex-col justify-center p-6 space-y-4 md:w-1/2">
                    <h1 class="text-4xl font-bold text-gray-800">{{$product->product_name}}</h1>

                    <div class="overflow-y-auto text-gray-600 max-h-40">
                        {{$product->description}} Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nemo repudiandae voluptates corporis magnam delectus quasi odio consequatur voluptatum excepturi ducimus, commodi nostrum pariatur debitis sint sapiente aliquid libero sequi quod!
                    </div>

                    <div>
                        <p class="text-3xl font-extrabold text-transparent bg-gradient-to-r from-primary to-secondary bg-clip-text">
                            Rp {{ number_format($product->price, 0, ',', '.') }}
                        </p>
                    </div>

                    <div>
                        <a href="{{ route('page.order', request()->route('id')) }}" 
                           class="inline-flex items-center px-6 py-3 text-lg font-semibold text-white transition-transform duration-300 bg-gradient-to-r from-primary to-secondary rounded-xl hover:scale-105">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z">
                                </path>
                            </svg>
                            Beli Sekarang
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.loader {
    border-top-color: #3498db;
    animation: spinner 1.5s linear infinite;
}

@keyframes spinner {
    0% {
        transform: rotate(0deg);
    }
    100% {
        transform: rotate(360deg);
    }
}
</style>
@endsection
