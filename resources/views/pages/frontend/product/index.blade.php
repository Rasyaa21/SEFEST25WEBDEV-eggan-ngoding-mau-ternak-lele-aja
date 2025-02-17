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
<section class="flex justify-center items-center min-h-screen bg-gradient-to-br from-blue-50 to-blue-100 p-6">
    <div class="container mx-auto px-4 pb-12 pt-16 flex flex-col md:flex-row items-center">
        <div class="md:w-1/2 flex justify-center">
            <img src="{{$product->product_image}}" alt="Joran Pancing" class="w-full max-w-md rounded-lg shadow-lg object-cover transition-transform duration-500 hover:scale-105">
        </div>
        <div class="md:w-1/2 mt-8 md:mt-0 md:pl-12">
            <h2 class="text-5xl font-bold text-gray-800 mb-6">{{$product->product_name}}</h2>
            <p class="text-gray-600 leading-relaxed mb-6">
                {{$product->description}}
            </p>
            <p class="text-4xl font-bold text-blue-600 mb-6">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
            <a href="/checkout" class="w-full md:w-auto bg-blue-600 text-white py-3 px-8 rounded-lg text-lg font-semibold shadow hover:bg-blue-700 transition duration-300 transform hover:scale-105">
                🛒 Beli Sekarang
            </a>
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
