@extends('components.layouts.admin')

@section('title', 'Dashboard - PantauKolam')

@section('content')
<section class="w-full min-h-screen bg-gray-50 dark:bg-lightBlue">
    <div class="min-h-screen p-2 py-12 md:p-6 2xl:p-10"">
        <h1 class="flex mb-6 text-3xl font-bold text-center text-transparent lg:text-4xl bg-gradient-to-r from-primary to-secondary bg-clip-text motion-opacity-in-0 motion-translate-y-in-100 motion-blur-in-md lg:text-start">
            Riwayat Transaksi
        </h1>
        <div class="w-full p-6 mx-auto mt-6 bg-white shadow-2xl rounded-2xl delay-400 max-w-screen motion-opacity-in-0 motion-translate-y-in-100 motion-blur-in-md">
            <div class="flex items-center justify-between pb-4 rounded-xl">
            <h2 class="text-xl font-semibold text-gray-800">Riwayat Transaksi</h2>
            </div>
            <div class="flex items-center justify-between pb-4">
            <div class="flex items-center space-x-2">
                <select class="px-3 py-3 text-sm text-black border rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none focus:border-blue-500">
                <option>10</option>
                <option>20</option>
                <option>50</option>
                </select>
                <span class="text-gray-600 text-md">entries per page</span>
            </div>
            <div>
                <input type="text" placeholder="Search..." class="px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            </div>
            <div class="relative overflow-x-auto overflow-y-auto max-h-96">
            <div class="w-full">
                <table class="w-full border border-collapse border-gray-200 table-auto rounded-2xl whitespace-nowrap">
                <thead class="bg-gray-100 rounded-2xl">
                    <tr>
                    <th class="sticky left-0 px-4 py-3.5 font-medium text-left text-gray-600 bg-gray-100">No</th>
                    <th class="px-4 py-3.5 font-medium text-left text-gray-600 min-w-[150px]">Tanggal</th>
                    <th class="px-4 py-3.5 font-medium text-left text-gray-600 min-w-[150px]">Nomor Invoice</th>
                    <th class="px-4 py-3.5 font-medium text-left text-gray-600 min-w-[150px]">Total</th>
                    <th class="px-4 py-3.5 font-medium text-left text-gray-600 min-w-[100px]">Status</th>
                    <th class="px-4 py-3.5 font-medium text-left text-gray-600 min-w-[150px]">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($transactions as $transaction) 
                        <tr class="bg-white border-b hover:bg-gray-50">
                            <td class="sticky left-0 px-4 py-3 bg-white">{{ $loop->iteration }}</td>
                            <td class="px-4 py-3">{{ $transaction->created_at->format('d M Y') }}</td>
                            <td class="px-4 py-3">{{ $transaction->invoice_number }}</td>
                            <td class="px-4 py-3">Rp {{ number_format($transaction->amount, 0, ',', '.') }}</td>
                            <td class="px-4 py-3">
                                <span class="px-2 py-1 text-xs text-white rounded-full 
                                    {{ $transaction->status === 'success' ? 'bg-green-500' : 
                                    ($transaction->status === 'pending' ? 'bg-yellow-500' : 'bg-green-500') }}">
                                    {{ ucfirst($transaction->status) }}
                                </span>
                            </td>
                            <td class="px-4 py-3">
                                <a href="/order/{{$transaction->invoice_number}}" class="inline-flex items-center p-2 text-white transition bg-green-500 rounded-lg hover:bg-green-600">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="px-4 py-6 text-center text-gray-500">Tidak ada transaksi ditemukan</td>
                        </tr>
                    @endforelse
                </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>
</section>
@endsection