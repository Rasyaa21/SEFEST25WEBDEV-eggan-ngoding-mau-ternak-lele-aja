@extends('components.layouts.admin')

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
    <div class="max-w-3xl p-8 mx-auto mb-8 bg-white shadow-2xl rounded-2xl mt-28 motion-opacity-in-0 motion-translate-y-in-100 motion-blur-in-md">

        <div class="mb-6 text-center">
            <h2 class="text-3xl font-extrabold text-gray-800">Data Invoice</h2>
            <p class="mt-2 text-sm text-gray-500">Data Invoice</p>
        </div>

        <div class="p-6 border border-gray-100 rounded-lg shadow-sm bg-gray-50">
            <div class="space-y-5">
                <!-- Invoice Number and Date -->
                <div class="flex items-center justify-between text-gray-700">
                    <span class="font-medium">Invoice Number:</span>
                    <span class="font-semibold text-gray-900">{{ $transaction->invoice_number }}</span>
                </div>
                <!-- Invoice Number and Date -->
                <div class="flex items-center justify-between text-gray-700">
                    <span class="font-medium">Address:</span>
                    <span class="font-bold text-gray-900">{{$transaction->address}}</span>
                </div>
                <div class="flex items-center justify-between text-gray-700">
                    <span class="font-medium">Date:</span>
                    <span class="font-bold text-gray-900">{{ $transaction->invoice_date }}</span>
                </div>

                <!-- Payment Method and Due Date -->
                <div class="flex items-center justify-between text-gray-700">
                    <span class="font-medium">Payment Method:</span>
                    <span class="font-bold text-gray-900">QRIS</span>
                </div>
                <div class="flex items-center justify-between text-gray-700">
                    <span class="font-medium">Total Amount:</span>
                    <span class="font-bold text-gray-900">Rp{{ number_format($transaction->amount, 0, ',', '.') }}</span>
                </div>
                <div class="flex items-center justify-between text-gray-700">
                    <span class="font-medium">Receipt Number:</span>
                    @if($transaction->receipt_number)
                        <p>{{ $transaction->receipt_number }}</p>
                    @else
                        <p class="font-bold">Menunggu...</p>
                    @endif
                </div>
                <div class="flex items-center justify-between text-gray-700">
                    <span class="font-medium">Status:</span>
                    <h1 hidden class="text-red-600 text-yellow-600 text-green-600"></h1>
                    @php
                    $statusClasses = [
                    'PENDING' => 'text-yellow-600',
                    'PAID' => 'text-green-600',
                    'EXPIRED' => 'text-red-600'
                    ];
                    @endphp
                    <span class="uppercase {{ $statusClasses[$transaction->status] ?? '' }} font-bold">
                        {{ $transaction->status }}
                    </span>
                </div>
            </div>
        </div>

        <div class="p-4 mt-6 border border-gray-100 rounded-lg bg-gray-50">
            <p class="text-sm text-gray-500">
                <span class="font-semibold text-gray-700">Note:</span> Untuk Invoice Akan Segera Dikirimkan Oleh Admin Jika Barang Sudah Mulai Diatar Oleh Ekspedisi
            </p>
        </div>

        <div class="mt-8 text-center">
            <a href="{{ url()->previous() }}" class="inline-block px-8 py-3 font-medium text-white transition duration-300 ease-in-out transform rounded-lg shadow-lg bg-gradient-to-r from-primary to-secondary hover:bg-secondary hover:scale-105">
                Back
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