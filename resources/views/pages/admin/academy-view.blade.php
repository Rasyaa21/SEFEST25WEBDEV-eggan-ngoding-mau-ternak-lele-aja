@extends('components.layouts.admin')

@section('title', 'Dashboard - PantauKolam')

@section('content')
<section class="w-full min-h-screen bg-gray-50 dark:bg-lightBlue">
    <div class="min-h-screen p-2 py-12  md:p-6 2xl:p-10">
        <h1 class="mb-6 text-3xl font-bold text-center text-transparent lg:text-4xl 
            bg-gradient-to-r from-primary to-secondary bg-clip-text 
            motion-opacity-in-0 motion-translate-y-in-100 motion-blur-in-md lg:text-start">
            Academy
        </h1>
        <div class="p-8 bg-white shadow-2xl rounded-3xl max-w-5xl mx-auto">
            <!-- Tombol Kembali -->
            <a href="javascript:history.back()" class="flex items-center text-gray-600 hover:text-gray-800 transition duration-200">
                <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"></path>
                </svg>
                <span class="font-medium text-lg">Kembali</span>
            </a>
        
            <!-- Kontainer Video -->
            <div class="mt-6 space-y-6">
                <div class="w-full aspect-video bg-black rounded-2xl overflow-hidden shadow-lg">
                    <iframe class="w-full h-full" src="https://www.youtube.com/embed/{{$videos->video}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
        
                <!-- Detail Video -->
                <div class="space-y-3">
                    <h2 class="text-3xl font-bold text-gray-900">{{$videos->title}}</h2>
                    <p class="text-gray-600 text-lg leading-relaxed">
                        {{$videos->description}}
                    </p>
                    <div class="flex items-center text-base text-gray-500">
                        <span>10K views</span>
                        <span class="mx-3">•</span>
                        <span>Uploaded on {{date_format($videos->updated_at,"M, d, Y")}}</span>
                    </div>
                </div>
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
