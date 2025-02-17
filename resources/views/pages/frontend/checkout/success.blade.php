@extends('layouts.app')

@section('title', 'Pembayaran Berhasil - Marivora')

@push('styles')
@livewireStyles
@endpush

@push('scripts')
@livewireScripts
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
@endpush

@section('content')
<section class="flex items-center justify-center min-h-screen p-6 text-black bg-lightBlue">
    <div class="max-w-md p-8 text-center bg-white shadow-2xl rounded-2xl motion-opacity-in-0 motion-translate-y-in-100 motion-blur-in-md">
        <div class="flex justify-center mb-4">
            <svg class="w-20 h-20 text-primary animate-bounce" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                <path fill-rule="evenodd" d="M2.25 12a9.75 9.75 0 1117.32 6.474l2.4 2.4a.75.75 0 01-1.06 1.06l-2.4-2.4A9.75 9.75 0 012.25 12zm14.28-3.28a.75.75 0 00-1.06 0l-5.97 5.97-2.47-2.47a.75.75 0 10-1.06 1.06l3 3a.75.75 0 001.06 0l6.5-6.5a.75.75 0 000-1.06z" clip-rule="evenodd" />
            </svg>
        </div>
        <h2 class="text-2xl font-bold text-transparent lg:text-3xl bg-gradient-to-r from-primary to-secondary bg-clip-text ">
            Pembayaran Berhasil
        </h2>
        <p class="mt-2 text-color-secondary">Selamat! Transaksi berhasil dan pesanan Anda akan segera diproses</p>
        <a href="{{ route('home') }}" class="inline-block px-6 py-3 mt-6 font-bold text-white transition rounded-lg shadow-md bg-gradient-to-r from-primary to-secondary hover:bg-secondary">
            Kembali ke Home 🏠
        </a>
    </div>
</section>
@endsection