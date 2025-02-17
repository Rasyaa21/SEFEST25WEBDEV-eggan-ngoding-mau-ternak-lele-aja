@extends('layouts.app')

@section('title', 'Marivora - KolamCerdas')

@push('styles')
@livewireStyles
@endpush

@push('scripts')
<script>
    document.getElementById('cart-button').addEventListener('click', function(event) {
        event.stopPropagation(); // Mencegah event klik menyebar ke document
        document.getElementById('cart-dropdown').classList.toggle('hidden');
    });

    // Deteksi klik di luar elemen cart-dropdown
    document.addEventListener('click', function(event) {
        const cartDropdown = document.getElementById('cart-dropdown');
        const cartButton = document.getElementById('cart-button');

        // Jika yang diklik bukan cartDropdown atau cartButton, sembunyikan dropdown
        if (!cartDropdown.contains(event.target) && !cartButton.contains(event.target)) {
            cartDropdown.classList.add('hidden');
        }
    });
</script>


@livewireScripts
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
@endpush

@section('content')
<section class="flex flex-col items-center justify-start w-full min-h-screen bg-lightBlue">
    @livewire('marketplace-components')

    @if (session()->has('error'))
    <div class="fixed relative px-4 py-3 text-red-700 bg-red-100 border border-red-400 rounded bottom-4 right-4" role="alert">
        <strong class="font-bold">Error!</strong>
        <span class="block sm:inline">{{ session('error') }}</span>
    </div>
    @endif

    @if (session()->has('success'))
    <div class="fixed relative px-4 py-3 text-green-700 bg-green-100 border border-green-400 rounded bottom-4 right-4" role="alert">
        <strong class="font-bold">Success!</strong>
        <span class="block sm:inline">{{ session('success') }}</span>
    </div>
    @endif
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
