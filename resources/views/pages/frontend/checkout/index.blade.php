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
    <div class="w-full max-w-6xl p-8 mt-32 bg-white shadow-xl rounded-2xl">

        <!-- Judul Halaman -->
        <h2 class="mb-6 text-2xl font-bold text-center text-gray-800">Checkout Pesanan</h2>
        <form method="POST" action="{{route('page.invoice.create')}}">
            @csrf
            <input type="hidden" name="product_id" value="{{ $product->id }}">
    <input type="hidden" name="amount" value="{{ $product->price }}">
            <!-- Informasi Pengiriman -->
            <div class="mb-6">
                <h3 class="mb-3 text-lg font-semibold text-gray-700">Informasi Pengiriman</h3>
                <label class="block mb-2 font-medium text-gray-700">Nama Penerima</label>
                <input name="receiver" type="text" class="w-full p-3 mb-4 text-sm text-gray-700 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none" placeholder="Masukkan nama penerima">

                <label class="block mb-2 font-medium text-gray-700">Nomor Telepon (081xxxxxxxxx)</label>
                <input name="phone_number" type="number" class="w-full p-3 mb-4 text-sm text-gray-700 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none" placeholder="Masukkan nomor telepon">

                <label class="block mb-2 font-medium text-gray-700">Alamat Lengkap</label>
                <textarea name="address" class="w-full p-3 text-sm text-gray-700 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none" rows="3" placeholder="Masukkan alamat lengkap"></textarea>
            </div>

            <!-- Catatan -->
            <div class="mb-6">
                <label class="block mb-2 font-medium text-gray-700">Catatan (Opsional)</label>
                <textarea name="note" class="w-full p-3 text-sm text-gray-700 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none" rows="3" placeholder="Tambahkan catatan untuk pesanan..."></textarea>
            </div>

            <!-- Metode Pembayaran -->
            <div class="mb-6">
                <h3 class="mb-3 text-lg font-semibold text-gray-700">Metode Pembayaran</h3>
                <label class="flex items-center gap-3 p-4 border border-gray-300 rounded-lg cursor-pointer hover:bg-gray-50">
                    <input type="radio" name="payment" class="w-5 h-5 text-blue-600 focus:ring-blue-500">
                    <span class="flex-1 text-gray-800">Qris (DANA, OVO, GoPay, ShopeePay, LinkAja, AstraPay)</span>
                    <img class="w-24" src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a2/Logo_QRIS.svg/2560px-Logo_QRIS.svg.png" alt="Bank Icon">
                </label>
            </div>

            <!-- Ringkasan Pesanan -->
            <div class="mb-6">
                <h3 class="mb-3 text-lg font-semibold text-gray-700">Ringkasan Pesanan</h3>
                <div class="flex justify-between text-sm text-gray-600">
                    <span>{{ $product->product_name }}</span>
                    <span>Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                </div>
                <hr class="my-3 border-gray-300">
                <div class="flex justify-between text-lg font-bold text-gray-900">
                    <span>Total</span>
                    <span>Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                </div>
            </div>
    
            <button class="w-full py-3 text-lg font-semibold text-white transition duration-300 shadow-lg bg-gradient-to-r from-primary to-secondary rounded-xl hover:bg-blue-700">
                Konfirmasi & Bayar
            </button>
        </form>
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
