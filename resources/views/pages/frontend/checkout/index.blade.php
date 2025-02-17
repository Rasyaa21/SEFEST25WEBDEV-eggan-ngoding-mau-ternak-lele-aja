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
<section class="flex justify-center items-center min-h-screen bg-lightBlue p-6">
    <div class="bg-white shadow-xl rounded-2xl p-8 w-full max-w-6xl mt-32">

        <!-- Judul Halaman -->
        <h2 class="text-2xl font-bold text-gray-800 text-center mb-6">Checkout Pesanan</h2>
        <form method="POST" action="{{route('page.invoice.create')}}">
            @csrf
            <!-- Informasi Pengiriman -->
            <div class="mb-6">
                <h3 class="text-lg font-semibold text-gray-700 mb-3">Informasi Pengiriman</h3>
                <label class="block text-gray-700 font-medium mb-2">Nama Penerima</label>
                <input name="receiver" type="text" class="w-full border border-gray-300 rounded-lg p-3 text-sm text-gray-700 focus:ring-2 focus:ring-blue-500 focus:outline-none mb-4" placeholder="Masukkan nama penerima">

                <label class="block text-gray-700 font-medium mb-2">Nomor Telepon (081xxxxxxxxx)</label>
                <input name="phone_number" type="number" class="w-full border border-gray-300 rounded-lg p-3 text-sm text-gray-700 focus:ring-2 focus:ring-blue-500 focus:outline-none mb-4" placeholder="Masukkan nomor telepon">
                <input name="amount" type="hidden" value="100000">

                <label class="block text-gray-700 font-medium mb-2">Alamat Lengkap</label>
                <textarea name="address" class="w-full border border-gray-300 rounded-lg p-3 text-sm text-gray-700 focus:ring-2 focus:ring-blue-500 focus:outline-none" rows="3" placeholder="Masukkan alamat lengkap"></textarea>
            </div>

            <!-- Catatan -->
            <div class="mb-6">
                <label class="block text-gray-700 font-medium mb-2">Catatan (Opsional)</label>
                <textarea name="note" class="w-full border border-gray-300 rounded-lg p-3 text-sm text-gray-700 focus:ring-2 focus:ring-blue-500 focus:outline-none" rows="3" placeholder="Tambahkan catatan untuk pesanan..."></textarea>
            </div>

            <!-- Metode Pembayaran -->
            <div class="mb-6">
                <h3 class="text-lg font-semibold text-gray-700 mb-3">Metode Pembayaran</h3>
                <label class="flex items-center gap-3 p-4 border border-gray-300 rounded-lg cursor-pointer hover:bg-gray-50">
                    <input type="radio" name="payment" class="w-5 h-5 text-blue-600 focus:ring-blue-500">
                    <span class="flex-1 text-gray-800">Qris (DANA, OVO, GoPay, ShopeePay, LinkAja, AstraPay)</span>
                    <img class="w-24" src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a2/Logo_QRIS.svg/2560px-Logo_QRIS.svg.png" alt="Bank Icon">
                </label>
            </div>

            <!-- Ringkasan Pesanan -->
            <div class="mb-6">
                <h3 class="text-lg font-semibold text-gray-700 mb-3">Ringkasan Pesanan</h3>
                <div class="flex justify-between text-sm text-gray-600">
                    <span>Pancingan</span>
                    <span class="font-semibold">Rp 200.000</span>
                </div>
                <hr class="my-3 border-gray-300">
                <div class="flex justify-between text-lg font-bold text-gray-900">
                    <span>Total</span>
                    <span>Rp 200.000</span>
                </div>
            </div>
    
            <!-- Tombol Konfirmasi -->
            <button class="w-full bg-blue-600 text-white py-3 rounded-xl shadow-lg hover:bg-blue-700 transition duration-300 font-semibold text-lg">
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
