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
<section class="flex items-center justify-center min-h-screen p-6 shadow-2xl bg-lightBlue min-w-xl ">
        <div class="container px-8 py-12 mx-auto">
            <div class="max-w-6xl mx-auto overflow-hidden transition-all duration-300 bg-white shadow-lg rounded-2xl hover:shadow-xl">
                <div class="flex flex-col md:flex-row md:items-start">
                    <div class="relative overflow-hidden md:w-1/2">
                        <div class="aspect-w-4 aspect-h-3">
                            <img
                                src="{{$product->product_image}}"
                                alt="{{$product->product_name}}"
                                class="object-cover w-full h-full duration-500 transform hover:scale-105"
                            >
                        </div>
                    </div>
        
                    <div class="items-center p-6 space-y-6 md:w-1/2 md:p-8">
                        <h1 class="text-3xl font-bold tracking-tight text-gray-800 md:text-4xl">
                            {{$product->product_name}}
                        </h1>
        
                        <div class="prose prose-lg text-gray-600">
                            <p>{{$product->description}} Lorem ipsum dolor sit, amet consectetur adipisicing elit. Asperiores nulla optio tenetur cupiditate magnam, explicabo sapiente ex praesentium fuga, earum doloribus voluptatibus aut alias quaerat ad assumenda voluptatum sunt consectetur! Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellat autem minus consequuntur accusamus facilis mollitia quod odit officia unde quibusdam est repellendus, velit atque fugiat blanditiis sint, nobis debitis reprehenderit?</p>
                        </div>
        
                        <div class="pt-2">
                            <p class="text-3xl font-bold text-transparent lg:text-3xl bg-gradient-to-r from-primary to-secondary bg-clip-text ">
                                Rp {{ number_format($product->price, 0, ',', '.') }}
                            </p>
                        </div>
        
                        <div class="pt-2">
                            <a href="{{ route('product.checkout', request()->route('id')) }}" 
                            class="inline-flex items-center px-8 py-3 text-lg font-semibold text-white bg-gradient-to-r from-primary to-secondary rounded-xl
                                    transition-all duration-300 hover:bg-secondary   hover:shadow-lg transform hover:-translate-y-0.5">
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
        -webkit-animation: spinner 1.5s linear infinite;
        animation: spinner 1.5s linear infinite;
    }

    @-webkit-keyframes spinner {
        0% {
            -webkit-transform: rotate(0deg);
        }

        100% {
            -webkit-transform: rotate(360deg);
        }
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
