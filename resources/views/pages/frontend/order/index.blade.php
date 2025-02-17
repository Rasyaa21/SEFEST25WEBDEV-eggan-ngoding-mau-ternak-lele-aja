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
    <div class="bg-white rounded-xl shadow-lg p-8 mb-8 max-w-3xl mx-auto mt-28">

        <!-- Section Title -->
        <div class="mb-6 text-center">
            <h2 class="text-3xl font-extrabold text-gray-800">Invoice Summary</h2>
            <p class="text-gray-500 text-sm mt-2">Review all details carefully before proceeding to payment</p>
        </div>

        <!-- Invoice Details -->
        <div class="bg-gray-50 p-6 rounded-lg shadow-sm border border-gray-100">
            <div class="space-y-5">
                <!-- Invoice Number and Date -->
                <div class="flex justify-between items-center text-gray-700">
                    <span class="font-medium">Invoice Number:</span>
                    <span class="text-gray-900 font-semibold">{{ $transaction->invoice_number }}</span>
                </div>
                <!-- Invoice Number and Date -->
                <div class="flex justify-between items-center text-gray-700">
                    <span class="font-medium">Billing Address:</span>
                    <span class="text-gray-900">{{$transaction->address}}</span>
                </div>
                <div class="flex justify-between items-center text-gray-700">
                    <span class="font-medium">Date:</span>
                    <span class="text-gray-900">{{ $transaction->invoice_date }}</span>
                </div>

                <!-- Payment Method and Due Date -->
                <div class="flex justify-between items-center text-gray-700">
                    <span class="font-medium">Payment Method:</span>
                    <span class="text-gray-900">QRIS</span>
                </div>
                <div class="flex justify-between items-center text-gray-700">
                    <span class="font-medium">Due Date:</span>
                    <span class="text-gray-900">{{ $transaction->due_date }}</span>
                </div>

                <!-- Total Amount and Status -->
                <div class="flex justify-between items-center text-gray-700">
                    <span class="font-medium">Total Amount:</span>
                    <span class="text-gray-900 font-semibold">Rp{{ number_format($transaction->amount, 0, ',', '.') }}</span>
                </div>
                <div class="flex justify-between items-center text-gray-700">
                    <span class="font-medium">Status:</span>
                    <h1 hidden class="text-yellow-600 text-green-600 text-red-600"></h1>
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

        <!-- Notes Section -->
        <div class="mt-6 bg-gray-50 p-4 rounded-lg border border-gray-100">
            <p class="text-sm text-gray-500">
                <span class="font-semibold text-gray-700">Note:</span> Please ensure that all invoice details
                are correct. If you have any questions or issues with the invoice, contact support before
                proceeding with the payment.
            </p>
        </div>

        <!-- Payment Button -->
        <div class="mt-8 text-center">
            @if ($transaction->status !== 'completed')
            <a href="{{ $transaction->redirect_url }}" class="inline-block bg-green-600 text-white font-medium py-3 px-8 rounded-lg shadow-lg hover:bg-green-700 hover:scale-105 transition duration-300 ease-in-out transform">
                Proceed to Payment
            </a>
            <p class="text-xs text-gray-400 mt-3">You will be redirected to a secure payment page.</p>
            @endif
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
