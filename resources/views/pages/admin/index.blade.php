@extends('components.layouts.admin')

@section('title', 'Dashboard')

@section('content')
<section class="w-full min-h-screen bg-gray-50 dark:bg-lightBlue">
    <div class="items-start min-h-screen p-2 py-12 md:p-6 2xl:p-10 justify">
        <h1 class="mb-6 text-3xl font-bold text-center text-transparent lg:text-4xl bg-gradient-to-r from-primary to-secondary bg-clip-text motion-opacity-in-0 motion-translate-y-in-100 motion-blur-in-md lg:text-start">
            Selamat Datang {{ $user->name }}
        </h1>
        <div class="mx-auto max-w-screen">
            <div class="flex flex-col items-center w-full md:grid md:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6 2xl:gap-7.5">
                <div class="w-full max-w-lg p-6 delay-100 bg-white rounded-lg shadow-lg motion-opacity-in-0 motion-translate-y-in-100 motion-blur-in-md">
                    <div class="flex items-center justify-center w-12 h-12 bg-gray-100 rounded-full">
                        <svg id='Wave_Lines_20' width='20' height='20' viewBox='0 0 20 20' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'><rect width='20' height='20' stroke='none' fill='#39A7FF' opacity='0'/>
                            <g transform="matrix(0.89 0 0 0.89 10 10)" >
                            <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: #39A7FF; fill-rule: nonzero; opacity: 1;" transform=" translate(-12, -12)" d="M 7.5 3 C 6.2296296 3 5.3292969 3.6972656 4.6542969 4.1972656 C 3.9792969 4.6972656 3.5296296 5 3 5 L 3 7 C 4.2703704 7 5.1707031 6.3027344 5.8457031 5.8027344 C 6.5207031 5.3027344 6.9703704 5 7.5 5 C 8.0296296 5 8.4792969 5.3027344 9.1542969 5.8027344 C 9.8292969 6.3027344 10.72963 7 12 7 C 13.27037 7 14.170703 6.3027344 14.845703 5.8027344 C 15.520703 5.3027344 15.97037 5 16.5 5 C 17.02963 5 17.479297 5.3027344 18.154297 5.8027344 C 18.829297 6.3027344 19.72963 7 21 7 L 21 5 C 20.47037 5 20.020703 4.6972656 19.345703 4.1972656 C 18.670703 3.6972656 17.77037 3 16.5 3 C 15.22963 3 14.329297 3.6972656 13.654297 4.1972656 C 12.979297 4.6972656 12.52963 5 12 5 C 11.47037 5 11.020703 4.6972656 10.345703 4.1972656 C 9.6707032 3.6972656 8.7703704 3 7.5 3 z M 7.5 10 C 6.2296296 10 5.3292969 10.697266 4.6542969 11.197266 C 3.9792969 11.697266 3.5296296 12 3 12 L 3 14 C 4.2703704 14 5.1707031 13.302734 5.8457031 12.802734 C 6.5207031 12.302734 6.9703704 12 7.5 12 C 8.0296296 12 8.4792969 12.302734 9.1542969 12.802734 C 9.8292969 13.302734 10.72963 14 12 14 C 13.27037 14 14.170703 13.302734 14.845703 12.802734 C 15.520703 12.302734 15.97037 12 16.5 12 C 17.02963 12 17.479297 12.302734 18.154297 12.802734 C 18.829297 13.302734 19.72963 14 21 14 L 21 12 C 20.47037 12 20.020703 11.697266 19.345703 11.197266 C 18.670703 10.697266 17.77037 10 16.5 10 C 15.22963 10 14.329297 10.697266 13.654297 11.197266 C 12.979297 11.697266 12.52963 12 12 12 C 11.47037 12 11.020703 11.697266 10.345703 11.197266 C 9.6707032 10.697266 8.7703704 10 7.5 10 z M 7.5 17 C 6.2296296 17 5.3292969 17.697266 4.6542969 18.197266 C 3.9792969 18.697266 3.5296296 19 3 19 L 3 21 C 4.2703704 21 5.1707031 20.302734 5.8457031 19.802734 C 6.5207031 19.302734 6.9703704 19 7.5 19 C 8.0296296 19 8.4792969 19.302734 9.1542969 19.802734 C 9.8292969 20.302734 10.72963 21 12 21 C 13.27037 21 14.170703 20.302734 14.845703 19.802734 C 15.520703 19.302734 15.97037 19 16.5 19 C 17.02963 19 17.479297 19.302734 18.154297 19.802734 C 18.829297 20.302734 19.72963 21 21 21 L 21 19 C 20.47037 19 20.020703 18.697266 19.345703 18.197266 C 18.670703 17.697266 17.77037 17 16.5 17 C 15.22963 17 14.329297 17.697266 13.654297 18.197266 C 12.979297 18.697266 12.52963 19 12 19 C 11.47037 19 11.020703 18.697266 10.345703 18.197266 C 9.6707032 17.697266 8.7703704 17 7.5 17 z" stroke-linecap="round" />
                            </g>
                            </svg>
                    </div>
                    <div class="flex items-end justify-between mt-4">
                        <div>
                            <h4 class="text-xl font-bold text-gray-900">{{ $ponds->count() }}</h4>
                            <span class="text-sm text-gray-500">Total Kolam</span>
                        </div>
                        <span class="flex items-center gap-1 text-sm font-medium text-green-500">
                        </span>
                    </div>
                </div>

                <div class="w-full max-w-lg p-6 delay-150 bg-white rounded-lg shadow-lg motion-opacity-in-0 motion-translate-y-in-100 motion-blur-in-md">
                    <div class="flex items-center justify-center w-12 h-12 bg-gray-100 rounded-full">
                        <svg id='Thumbup_20' width='20' height='20' viewBox='0 0 20 20' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'><rect width='20' height='20' stroke='none' fill='#000000' opacity='0'/>
                            <g transform="matrix(0.73 0 0 0.73 10 10)" >
                            <path style="stroke: #39A7FF; stroke-width: 2; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" transform=" translate(-12, -12)" d="M 1 11 L 1 23 L 14.994 23 C 17.713260394398077 23.001176822761 20.09333742741091 21.173441804650796 20.793999999999997 18.546 L 22.935000000000002 10.514999999999999 C 23.095095764814662 9.914236571347148 22.96669702148948 9.273185850873546 22.58757462123834 8.780424694991574 C 22.2084522209872 8.287663539109605 21.621728858898578 7.999240308619008 21 8 L 15 8 L 15 5 C 15 2.790861000676826 13.209138999323173 1 11 1 L 5 11 z" stroke-linecap="round" />
                            </g>
                            </svg>
                    </div>
                    <div class="flex items-end justify-between mt-4">
                        <div>
                            <h4 class="text-xl font-bold text-gray-900">{{ $ponds->where('condition', 'good')->count() }}</h4>
                            <span class="text-sm text-gray-500">PantauKolam - Good</span>
                        </div>
                    </div>
                </div>

                <div class="w-full max-w-lg p-6 delay-200 bg-white rounded-lg shadow-lg motion-opacity-in-0 motion-translate-y-in-100 motion-blur-in-md">
                    <div class="flex items-center justify-center w-12 h-12 bg-gray-100 rounded-full">
                        <svg id='Thumbdown_20' width='20' height='20' viewBox='0 0 20 20' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'><rect width='20' height='20' stroke='none' fill='#000000' opacity='0'/>
                            <g transform="matrix(0.73 0 0 0.73 10 10)" >
                            <path style="stroke: #39A7FF; stroke-width: 2; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" transform=" translate(-12, -12)" d="M 23 13 L 23 1 L 9.006 1 C 6.286739605601923 0.9988231772390026 3.906662572589088 2.8265581953492056 3.2060000000000004 5.454000000000002 L 1.0680000000000005 13.485 C 0.9080405013343914 14.08525385356587 1.0360803326927255 14.725758176683087 1.4145118526850777 15.218385129468162 C 1.79294337267743 15.711012082253237 2.3787981809033965 15.999827126917864 2.9999999999999996 16 L 9 16 L 9 19 C 9 21.209138999323173 10.790861000676827 23 13 23 L 19 13 z" stroke-linecap="round" />
                            </g>
                            </svg>
                    </div>
                    <div class="flex items-end justify-between mt-4">
                        <div>
                            <h4 class="text-xl font-bold text-gray-900">{{ $ponds->where('condition', 'bad')->count() }}</h4>
                            <span class="text-sm text-gray-500">PantauKolam - Bad</span>
                        </div>
                    </div>
                </div>
                <div class="w-full max-w-lg p-6 bg-white rounded-lg shadow-lg motion-opacity-in-0 motion-translate-y-in-100 motion-blur-in-md delay-250">
                    <div class="flex items-center justify-center w-12 h-12 bg-gray-100 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#39A7FF" class="size-6">
                            <path d="M11.7 2.805a.75.75 0 0 1 .6 0A60.65 60.65 0 0 1 22.83 8.72a.75.75 0 0 1-.231 1.337 49.948 49.948 0 0 0-9.902 3.912l-.003.002c-.114.06-.227.119-.34.18a.75.75 0 0 1-.707 0A50.88 50.88 0 0 0 7.5 12.173v-.224c0-.131.067-.248.172-.311a54.615 54.615 0 0 1 4.653-2.52.75.75 0 0 0-.65-1.352 56.123 56.123 0 0 0-4.78 2.589 1.858 1.858 0 0 0-.859 1.228 49.803 49.803 0 0 0-4.634-1.527.75.75 0 0 1-.231-1.337A60.653 60.653 0 0 1 11.7 2.805Z" />
                            <path d="M13.06 15.473a48.45 48.45 0 0 1 7.666-3.282c.134 1.414.22 2.843.255 4.284a.75.75 0 0 1-.46.711 47.87 47.87 0 0 0-8.105 4.342.75.75 0 0 1-.832 0 47.87 47.87 0 0 0-8.104-4.342.75.75 0 0 1-.461-.71c.035-1.442.121-2.87.255-4.286.921.304 1.83.634 2.726.99v1.27a1.5 1.5 0 0 0-.14 2.508c-.09.38-.222.753-.397 1.11.452.213.901.434 1.346.66a6.727 6.727 0 0 0 .551-1.607 1.5 1.5 0 0 0 .14-2.67v-.645a48.549 48.549 0 0 1 3.44 1.667 2.25 2.25 0 0 0 2.12 0Z" />
                            <path d="M4.462 19.462c.42-.419.753-.89 1-1.395.453.214.902.435 1.347.662a6.742 6.742 0 0 1-1.286 1.794.75.75 0 0 1-1.06-1.06Z" />
                        </svg>  
                    </div>
                    <div class="flex items-end justify-between mt-4">
                        <div>
                            <h4 class="text-xl font-bold text-gray-900">{{ $user->is_premium ? 'Premium' : 'Free' }}</h4>
                            <span class="text-sm text-gray-500">Member Status</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
                                    ($transaction->status === 'pending' ? 'bg-yellow-500' : 'bg-red-500') }}">
                                    {{ ucfirst($transaction->status) }}
                                </span>
                            </td>
                            <td class="px-4 py-3">
                                <a href="#" class="inline-flex items-center p-2 text-white transition bg-green-500 rounded-lg hover:bg-green-600">
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
    
    
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const entriesSelect = document.querySelector('select');
            const searchInput = document.querySelector('input[type="text"]');
            const tableBody = document.querySelector('tbody');
            let allRows = Array.from(tableBody.querySelectorAll('tr'));
            
            const updateTable = () => {
                const searchTerm = searchInput.value.toLowerCase();
                const selected = parseInt(entriesSelect.value, 10);
                
                let visibleCount = 0;
                allRows.forEach(row => {
                    const text = row.textContent.toLowerCase();
                    const matchesSearch = text.includes(searchTerm);
                    
                    if (matchesSearch && visibleCount < selected) {
                        row.style.display = '';
                        visibleCount++;
                    } else {
                        row.style.display = 'none';
                    }
                });
            };
            
            entriesSelect.addEventListener('change', updateTable);
            searchInput.addEventListener('input', updateTable);
            updateTable();
        });
        </script>
</section>
@endsection
