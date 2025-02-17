@extends('components.layouts.admin')

@section('title', 'Dashboard - PantauKolam')

@section('content')
<section class="w-full min-h-screen bg-gray-50 dark:bg-lightBlue">
    <div class="min-h-screen p-2 py-12 md:p-6 2xl:p-10">
        <h1 class="mb-6 text-3xl font-bold text-center text-transparent lg:text-4xl bg-gradient-to-r from-primary to-secondary bg-clip-text motion-opacity-in-0 motion-translate-y-in-100 motion-blur-in-md lg:text-start">
            Academy
        </h1>
        <div class="p-6 bg-white shadow-2xl rounded-2xl motion-opacity-in-0 motion-translate-y-in-100 motion-blur-in-md">
            <div class="flex items-center justify-between pb-4 rounded-xl">
                <h2 class="text-xl font-semibold text-gray-800">Video edukasi</h2>
                <div class="flex items-center space-x-2">
                    <select class="px-3 py-3 text-sm text-black border rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none focus:border-blue-500">
                        <option>10</option>
                        <option>20</option>
                        <option>50</option>
                    </select>
                    <span class="text-gray-600 text-md">entries per page</span>
                </div>
            </div>
            <div class="flex items-center justify-between pb-4 w-full">
                <div class="w-full">
                    <input type="text" placeholder="Search..." class="px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 w-full">
                </div>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 p-4">
                @php
                function formatNumber($number) {
                if ($number >= 1000 && $number < 1000000) { return number_format($number / 1000, ($number % 1000==0) ? 0 : 1, ',' , '' ) . 'k' ; } elseif ($number>= 1000000) {
                    return number_format($number / 1000000, ($number % 1000000 == 0) ? 0 : 1, ',', '') . 'M';
                    }
                    return $number;
                    }
                    @endphp
                    @foreach ($videos as $v)
                    <a href="/dashboard/academy/{{$v->id}}" class="block">
                        <div class="bg-white text-black rounded-lg overflow-hidden shadow-md border border-gray-200 hover:shadow-lg transition-shadow duration-200 cursor-pointer">
                            <div class="relative">
                                <img src="{{$v->thumbnails}}" alt="Video Thumbnail" class="w-full h-auto">
                            </div>
                            <div class="p-4">
                                <h2 class="font-semibold text-lg truncate">
                                    {{$v->title}}
                                </h2>
                                <p class="text-xs truncate">{{$v->description}}</p>
                                <div class="flex items-center mt-2 text-gray-500 text-sm">
                                    <p class="text-xs">{{ formatNumber($v->view) }} views • {{date_format($v->updated_at,"y M d")}}</p>
                                </div>
                            </div>
                        </div>
                    </a>
                    @endforeach
            </div>
        </div>
    </div>
    <script>
        function openUpdateModal() {
            const modal = document.getElementById('update-modal');
            const updateForm = document.getElementById('update-form');

            if (modal) {
                modal.classList.remove('hidden');
                modal.classList.add('flex');

                const closeBtn = modal.querySelector('[data-modal-toggle="update-modal"]');
                closeBtn.addEventListener('click', () => {
                    modal.classList.add('hidden');
                    modal.classList.remove('flex');
                });
            }
        }
        document.addEventListener('DOMContentLoaded', function() {
            const openModalBtn = document.querySelector('[data-modal-toggle="crud-modal"]');
            const modal = document.getElementById('crud-modal');

            openModalBtn.addEventListener('click', () => {
                modal.classList.remove('hidden');
                modal.classList.add('flex');
            });

            const closeModalBtn = modal.querySelector('[data-modal-toggle="crud-modal"]');
            closeModalBtn.addEventListener('click', () => {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            const entriesSelect = document.querySelector('select');
            const tableBody = document.querySelector('tbody');
            let allRows = Array.from(tableBody.querySelectorAll('tr'));

            const updateTable = () => {
                const selected = parseInt(entriesSelect.value, 10);
                allRows.forEach((row, index) => {
                    row.style.display = index < selected ? '' : 'none';
                });
            };
            entriesSelect.addEventListener('change', updateTable);
            updateTable();
        });

    </script>
</section>
@endsection
