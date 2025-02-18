@extends('components.layouts.admin')
@section('title', 'Dashboard - PantauKolam')
@section('content')
<section class="w-full min-h-screen bg-gray-50 dark:bg-lightBlue">
    <!-- Premium Content Wrapper -->
    <div class="relative min-h-screen">
        <!-- Main Content (will be blurred for non-premium) -->
        <div class="{{ !auth()->user()->is_premium ? 'blur-md pointer-events-none' : '' }} min-h-screen p-2 py-12 md:p-6 2xl:p-10">
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
                
                <div class="flex items-center justify-between w-full pb-4">
                    <div class="w-full">
                        <input type="text" placeholder="Search..." class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                </div>
                
                <div class="grid grid-cols-1 gap-6 p-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                    @php
                        function formatNumber($number) {
                            if ($number >= 1000 && $number < 1000000) {
                                return number_format($number / 1000, ($number % 1000 == 0) ? 0 : 1, ',', '') . 'k';
                            } elseif ($number >= 1000000) {
                                return number_format($number / 1000000, ($number % 1000000 == 0) ? 0 : 1, ',', '') . 'M';
                            }
                            return $number;
                        }
                    @endphp
                    
                    @foreach ($videos as $v)
                        <a href="/dashboard/academy/{{$v->id}}" class="block">
                            <div class="overflow-hidden text-black transition-shadow duration-200 bg-white border border-gray-200 rounded-lg shadow-md cursor-pointer hover:shadow-lg">
                                <div class="relative">
                                    <img src="https://img.youtube.com/vi/{{ $v->video }}/hqdefault.jpg" alt="Video Thumbnail" class="w-full h-auto">
                                </div>
                                <div class="p-4">
                                    <h2 class="text-lg font-semibold truncate">
                                        {{$v->title}}
                                    </h2>
                                    <p class="text-xs truncate">{{$v->description}}</p>
                                    <div class="flex items-center mt-2 text-sm text-gray-500">
                                        <p class="text-xs">{{ formatNumber($v->view) }} views • {{date_format($v->updated_at,"y M d")}}</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Premium Overlay (Full Screen) -->
        @if(!auth()->user()->is_premium)
        <div class="absolute inset-0 flex items-center justify-center bg-black/40">
            <div class="max-w-md p-8 mx-4 text-center bg-white shadow-xl rounded-xl">
                <h3 class="mb-4 text-2xl font-bold text-gray-800">
                    Konten Premium
                </h3>
                <p class="mb-6 text-gray-600">
                    Berlangganan untuk membuka akses ke video edukasi ini dan fitur premium lainnya
                </p>
                <a href="" 
                    class="inline-block px-6 py-3 font-semibold text-white transition-opacity rounded-lg bg-gradient-to-r from-primary to-secondary hover:opacity-90">
                    Berlangganan Sekarang
                </a>
            </div>
        </div>
        @endif
    </div>
</section>
@endsection