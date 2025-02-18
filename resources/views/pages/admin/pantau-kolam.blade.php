@extends('components.layouts.admin')

@section('title', 'Dashboard - PantauKolam')

@section('content')
<section class="w-full min-h-screen bg-gray-50 dark:bg-lightBlue">
    <div class="min-h-screen p-2 py-12 md:p-6 2xl:p-10">
        <h1 class="mb-6 text-3xl font-bold text-center text-transparent lg:text-4xl bg-gradient-to-r from-primary to-secondary bg-clip-text motion-opacity-in-0 motion-translate-y-in-100 motion-blur-in-md lg:text-start">
            Pantau Kolam
        </h1>
        <div class="p-6 bg-white shadow-2xl rounded-2xl motion-opacity-in-0 motion-translate-y-in-100 motion-blur-in-md">
            <div class="flex items-center justify-between pb-4 rounded-xl">
                <h2 class="text-xl font-semibold text-gray-800">Daftar Kolam</h2>
                <button class="px-4 py-2 text-white transition rounded-lg bg-gradient-to-r from-primary to-secondary hover:bg-secondary" data-modal-target="crud-modal" data-modal-toggle="crud-modal">
                    Tambah Kolam
                </button>
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
                                <th class="px-4 py-3.5 font-medium text-left text-gray-600 min-w-[150px]">Nama Kolam</th>
                                <th class="px-4 py-3.5 font-medium text-left text-gray-600 min-w-[150px]">Nama Ikan</th>
                                <th class="px-4 py-3.5 font-medium text-left text-gray-600 min-w-[150px]">Jenis Pengelolaan</th>
                                <th class="px-4 py-3.5 font-medium text-left text-gray-600 min-w-[100px]">Kondisi</th>
                                <th class="px-4 py-3.5 font-medium text-left text-gray-600 min-w-[150px]">Terakhir Cek</th>
                                <th class="px-4 py-3.5 font-medium text-left text-gray-600 min-w-[150px]">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($ponds->isEmpty())
                            <tr>
                                <td colspan="7" class="px-4 py-6 text-center text-gray-500">Tidak Ada Data Kolam</td>
                            </tr>
                            @endif
                            @foreach($ponds as $pond)
                            <tr class="border-b border-gray-200">
                                <td class="sticky left-0 px-4 py-2 bg-white">{{ $loop->iteration }}</td>
                                <td class="px-4 py-2">{{ $pond->pond_name }}</td>
                                <td class="px-4 py-2">{{ $pond->fish_type }}</td>
                                <td class="px-4 py-2">{{ $pond->management_type }}</td>
                                <td class="px-4 py-2">{{ $pond->recommendations->first()?->pond_status ?? 'No status' }}</td>
                                <td class="px-4 py-2">{{ $pond->measurement_date }}</td>
                                <td class="px-4 py-2">
                                    <div class="flex space-x-2">
                                        <button type="button" class="inline-flex items-center p-2 text-white transition bg-blue-500 rounded-lg hover:bg-blue-600" 
                                            onclick="openUpdateModal()"
                                            data-modal-target="update-modal" 
                                            data-modal-toggle="update-modal">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                            </svg>
                                        </button>
                                        <form action="{{ route('pantau.kolam.destroy', $pond->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Are you sure?')" class="p-2 text-white transition bg-red-500 rounded-lg hover:bg-red-600">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                </svg>
                                            </button>
                                        </form>
                                        <a href="{{ route('pantau.kolam.show', $pond->id) }}" class="inline-flex items-center p-2 text-white transition bg-green-500 rounded-lg hover:bg-green-600">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </div>
    </div>
    <div id="update-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="fixed inset-0 w-screen h-screen bg-lightBlue"></div>
        <div class="relative w-full max-w-md max-h-full p-4">
            <div class="relative bg-white shadow-2xl rounded-2xl motion-opacity-in-0 motion-translate-y-in-100 motion-blur-in-md">
                <div class="flex items-center justify-between p-4 border-b border-gray-200 rounded-t md:p-5">
                    <h3 class="text-lg font-semibold text-black">
                        Update Kondisi Kolam
                    </h3>
                    <button type="button" class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ms-auto" data-modal-toggle="update-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <form class="p-4 md:p-5" method="POST" id="update-form" action="{{ isset($pond) ? route('pantau.kolam.update', $pond->id) : '#' }}">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div class="col-span-2 sm:col-span-1">
                            <label for="update_water_temp" class="block mb-2 text-sm font-medium text-black">Suhu Air</label>
                            <input type="number" step="0.1" name="water_temp" id="update_water_temp" class="w-full px-2.5 py-2.5 text-gray-700 border rounded-lg shadow appearance-none focus:outline-none focus:shadow-outline border-primary" placeholder="e.g., 28.5" required="">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="update_ph_level" class="block mb-2 text-sm font-medium text-black">Level pH</label>
                            <input type="number" step="0.1" name="ph_level" id="update_ph_level" class="w-full px-2.5 py-2.5 text-gray-700 border rounded-lg shadow appearance-none focus:outline-none focus:shadow-outline border-primary" placeholder="e.g., 7.5" required="">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="update_dissolved_oxygen" class="block mb-2 text-sm font-medium text-black">Kadar Oksigen</label>
                            <input type="number" step="0.1" name="dissolved_oxygen" id="update_dissolved_oxygen" class="w-full px-2.5 py-2.5 text-gray-700 border rounded-lg shadow appearance-none focus:outline-none focus:shadow-outline border-primary" placeholder="e.g., 5.0" required="">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="update_salinity" class="block mb-2 text-sm font-medium text-black">Salinitas Air</label>
                            <input type="number" step="0.1" name="salinity" id="update_salinity" class="w-full px-2.5 py-2.5 text-gray-700 border rounded-lg shadow appearance-none focus:outline-none focus:shadow-outline border-primary" placeholder="e.g., 1.5" required="">
                        </div>
                    </div>
                    <button type="submit" class="text-white inline-flex items-center bg-gradient-to-r from-primary to-secondary hover:bg-secondary focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        Update Kondisi
                    </button>
                </form>
            </div>
        </div>
    </div>
<div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="fixed inset-0 w-screen h-screen bg-lightBlue bg-opacity-30"></div>
    <div class="relative w-full max-w-md max-h-full p-4">
        <div class="relative bg-white shadow-2xl rounded-2xl motion-opacity-in-0 motion-translate-y-in-100 motion-blur-in-md">
            <div class="flex items-center justify-between p-4 border-b border-gray-200 rounded-t md:p-5">
                <h3 class="text-lg font-semibold text-black">
                    Tambah Kolam Baru
                </h3>
                <button type="button" class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ms-auto" data-modal-toggle="crud-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <form class="p-4 md:p-5" method="POST" action="{{ route('pantau.kolam.store') }}">
                @csrf
                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div class="col-span-2">
                        <label for="pond_name" class="block mb-2 text-sm font-medium text-black">Nama Kolam</label>
                        <input type="text" name="pond_name" id="pond_name" class="w-full px-2.5 py-2.5 text-gray-700 border rounded-lg shadow appearance-none focus:outline-none focus:shadow-outline border-primary @error('fish_type') border-red-500 @enderror" placeholder="Masukan Nama Ikan" required="">
                        @error('pond_pond_name') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-span-2">
                        <label for="fish_type" class="block mb-2 text-sm font-medium text-black">Nama Ikan</label>
                        <input type="text" name="fish_type" id="fish_type" class="w-full px-2.5 py-2.5 text-gray-700 border rounded-lg shadow appearance-none focus:outline-none focus:shadow-outline border-primary @error('fish_type') border-red-500 @enderror" placeholder="Masukan Nama Ikan" required="">
                        @error('fish_type') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
                    </div>
                    <div class="grid grid-cols-3 col-span-2 gap-4">
                        <div>
                            <label for="length" class="block text-sm font-bold text-gray-700">Panjang</label>
                            <input type="text" id="length" name="length" placeholder="12m"
                                class="w-full px-2.5 py-2.5 text-gray-700 border rounded-lg shadow appearance-none focus:outline-none focus:shadow-outline border-primary @error('length') border-red-500 @enderror">
                            @error('length') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label for="width" class="block text-sm font-bold text-gray-700">Lebar</label>
                            <input type="text" id="width" name="width" placeholder="5m"
                                class="w-full px-2.5 py-2.5 text-gray-700 border rounded-lg shadow appearance-none focus:outline-none focus:shadow-outline border-primary @error('width') border-red-500 @enderror">
                            @error('width') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label for="height" class="block text-sm font-bold text-gray-700">Tinggi</label>
                            <input type="text" id="height" name="height" placeholder="2m"
                                class="w-full px-2.5 py-2.5 text-gray-700 border rounded-lg shadow appearance-none focus:outline-none focus:shadow-outline border-primary @error('height') border-red-500 @enderror">
                            @error('height') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-span-2">
                        <label for="management_type" class="block mb-2 text-sm font-medium text-black">Jenis Pengelolaan</label>
                        <select id="management_type" name="management_type" class="w-full px-2.5 py-2.5 text-gray-700 border rounded-lg shadow appearance-none focus:outline-none focus:shadow-outline border-primary @error('management_type') border-red-500 @enderror">
                            <option selected="">Pilih Jenis Pengelolaan</option>
                            <option value="tanah">Kolam Tanah</option>
                            <option value="terpal">Kolam Terpal</option>
                            <option value="bioflok">Bioflok</option>
                        </select>
                        @error('management_type') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="water_temp" class="block mb-2 text-sm font-medium text-black">Suhu Air</label>
                        <input type="number" step="0.1" name="water_temp" id="water_temp" class="w-full px-2.5 py-2.5 text-gray-700 border rounded-lg shadow appearance-none focus:outline-none focus:shadow-outline border-primary @error('water_temp') border-red-500 @enderror" placeholder="e.g., 28.5" required="">
                        @error('water_temp') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="ph_level" class="block mb-2 text-sm font-medium text-black">Level pH</label>
                        <input type="number" step="0.1" name="ph_level" id="ph_level" class="w-full px-2.5 py-2.5 text-gray-700 border rounded-lg shadow appearance-none focus:outline-none focus:shadow-outline border-primary @error('ph_level') border-red-500 @enderror" placeholder="e.g., 7.5" required="">
                        @error('ph_level') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="dissolved_oxygen" class="block mb-2 text-sm font-medium text-black">Kadar Oksigen</label>
                        <input type="number" step="0.1" name="dissolved_oxygen" id="dissolved_oxygen" class="w-full px-2.5 py-2.5 text-gray-700 border rounded-lg shadow appearance-none focus:outline-none focus:shadow-outline border-primary @error('dissolved_oxygen') border-red-500 @enderror" placeholder="e.g., 5.0" required="">
                        @error('dissolved_oxygen') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="salinity" class="block mb-2 text-sm font-medium text-black">Salinitas Air</label>
                        <input type="number" step="0.1" name="salinity" id="salinity" class="w-full px-2.5 py-2.5 text-gray-700 border rounded-lg shadow appearance-none focus:outline-none focus:shadow-outline border-primary @error('salinity') border-red-500 @enderror" placeholder="e.g., 1.5" required="">
                        @error('salinity') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
                    </div>
                </div>
                <button type="submit" class="text-white inline-flex items-center bg-gradient-to-r from-primary to-secondary hover:bg-secondary focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    Tambah Kolam
                </button>
            </form>
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
    document.addEventListener('DOMContentLoaded', function () {
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

    document.addEventListener('DOMContentLoaded', function () {
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