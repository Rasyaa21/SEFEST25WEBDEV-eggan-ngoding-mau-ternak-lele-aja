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
    <div class="max-w-6xl w-full mb-12">
        <div class="w-full mt-28"></div>
        <h1 class="text-center text-3xl font-bold text-transparent lg:text-4xl bg-gradient-to-r from-primary to-secondary bg-clip-text motion-opacity-in-0 motion-translate-y-in-100 motion-blur-in-md">
            Kolam Cerdas
        </h1>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-12 items-center">
            <!-- Crypto Investing -->
            <div class="relative">
                <img src="https://asset.kompas.com/crops/A2FJZz12Slempn4Yrb61IX8ZFIA=/0x0:1000x667/1200x800/data/photo/2024/02/26/65dc5a22b7951.jpg" alt="Crypto Investing" class="rounded-lg w-full">
                <div class="absolute top-0 left-0 bg-gray-900 opacity-85 w-full h-full flex items-center justify-center rounded-lg">
                    <h1 class="text-4xl">🔒</h1>
                </div>
            </div>

            <div>
                <h3 class="text-3xl font-bold text-blue-600">KOLAM LELE CEPAT PANEN!</h3>
                <p class="text-gray-600 mt-4 leading-relaxed">Tutorial lengkap cara mengelola kolam lele dengan teknik terbaru. Dari pemilihan bibit unggul sampai tips pemberian pakan yang hemat tapi bikin lele cepat besar. Dijamin hasil panen melimpah!</p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-12 items-center">
            <div>
                <h3 class="text-3xl font-bold text-yellow-600">BISNIS LELE MODAL KECIL</h3>
                <p class="text-gray-600 mt-4 leading-relaxed">Berbagi pengalaman membuat kolam lele skala rumahan yang menguntungkan. Cocok untuk pemula yang ingin memulai bisnis sampingan dengan modal kecil. Termasuk tips pemasaran dan cara menjaga kualitas air.</p>
            </div>

            <div class="relative">
                <img src="https://asset.kompas.com/crops/A2FJZz12Slempn4Yrb61IX8ZFIA=/0x0:1000x667/1200x800/data/photo/2024/02/26/65dc5a22b7951.jpg" alt="Crypto Investing" class="rounded-lg w-full">
                <div class="absolute top-0 left-0 bg-gray-900 opacity-85 w-full h-full flex items-center justify-center rounded-lg">
                    <h1 class="text-4xl">🔒</h1>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-12 items-center">
            <!-- Crypto Investing -->
            <div class="relative">
                <img src="https://asset.kompas.com/crops/A2FJZz12Slempn4Yrb61IX8ZFIA=/0x0:1000x667/1200x800/data/photo/2024/02/26/65dc5a22b7951.jpg" alt="Crypto Investing" class="rounded-lg w-full">
                <div class="absolute top-0 left-0 bg-gray-900 opacity-85 w-full h-full flex items-center justify-center rounded-lg">
                    <h1 class="text-4xl">🔒</h1>
                </div>
            </div>

            <div>
                <h3 class="text-3xl font-bold text-blue-600">SUKSES BIOFLOK LELE</h3>
                <p class="text-gray-600 mt-4 leading-relaxed">Panduan lengkap sistem bioflok untuk budidaya lele hemat dan efisien.</p>
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
