@extends('layouts.app')

@section('title', 'Marivora - KolamCerdas')

@push('styles')
@livewireStyles
<style>
    .loader {
        border-top-color: #3498db;
        -webkit-animation: spinner 1.5s linear infinite;
        animation: spinner 1.5s linear infinite;
    }

    @-webkit-keyframes spinner {
        0% { -webkit-transform: rotate(0deg); }
        100% { -webkit-transform: rotate(360deg); }
    }

    @keyframes spinner {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    .hidden-element {
        opacity: 0;
        transform: translateY(20px);
        transition: opacity 0.5s ease, transform 0.5s ease;
    }
    
    .show-element {
        opacity: 1;
        transform: translateY(0);
    }

    /* Add styles for initial load animation */
    .initial-load {
        animation: fadeInUp 0.5s ease forwards;
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>
@endpush

@push('scripts')
@livewireScripts
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const animatedElements = document.querySelectorAll('.motion-animation');
        
        // Check if this is the first visit to the page in this session
        const isFirstVisit = !sessionStorage.getItem('hasVisited');
        
        if (isFirstVisit) {
            // First visit - show initial load animation
            animatedElements.forEach((element, index) => {
                element.classList.add('initial-load');
                element.style.animationDelay = `${200 * index}ms`;
            });
            sessionStorage.setItem('hasVisited', 'true');
        } else {
            // Subsequent visits - use scroll-based animation
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('show-element');
                    }
                });
            }, {
                root: null,
                threshold: 0.2,
                rootMargin: '50px'
            });
            
            animatedElements.forEach(element => {
                element.classList.add('hidden-element');
                observer.observe(element);
            });
        }

        // Reset animation state when navigating away
        window.addEventListener('beforeunload', () => {
            animatedElements.forEach(element => {
                element.classList.remove('show-element', 'initial-load');
            });
        });
    });
</script>
@endpush

@section('content')
<section class="flex flex-col items-center justify-center min-h-screen p-6 bg-lightBlue">
    <div class="relative w-full max-w-6xl mb-12">
        <h1 class="mt-16 text-3xl font-bold text-center text-transparent lg:text-4xl bg-gradient-to-r from-primary to-secondary bg-clip-text motion-animation md:mt-28">
            Academy
        </h1>
    
        <!-- Timeline vertical line - adjusted position and visibility -->
        <div class="absolute z-0 hidden h-[calc(100%-10rem)] transform -translate-x-1/2 border-l-2 border-gray-300 border-dotted md:block top-48 left-1/2"></div>
        
        @php
            $courses = [
                [
                    'title' => 'Cara Budidaya Lele!',
                    'description' => 'Tutorial lengkap cara mengelola kolam lele dengan teknik terbaru. Dari pemilihan bibit unggul sampai tips pemberian pakan yang hemat tapi bikin lele cepat besar. Dijamin hasil panen melimpah!',
                    'order' => ['image' => 'order-1', 'text' => 'order-2'],
                ],
                [
                    'title' => 'Cara Mengelola Kolam Yang Baik Dan Benar',
                    'description' => 'Berbagi pengalaman membuat kolam lele skala rumahan yang menguntungkan. Cocok untuk pemula yang ingin memulai bisnis sampingan dengan modal kecil. Termasuk tips pemasaran dan cara menjaga kualitas air.',
                    'order' => ['image' => 'order-1 md:order-1', 'text' => 'order-2 md:order-2'],
                ],
                [
                    'title' => 'Cara Mengelola Kolam Yang Baik Dan Benar',
                    'description' => 'Berbagi pengalaman membuat kolam lele skala rumahan yang menguntungkan. Cocok untuk pemula yang ingin memulai bisnis sampingan dengan modal kecil. Termasuk tips pemasaran dan cara menjaga kualitas air.',
                    'order' => ['image' => 'order-1 md:order-1', 'text' => 'order-2 md:order-2'],
                ],
                [
                    'title' => 'Cara Mengelola Kolam Yang Baik Dan Benar',
                    'description' => 'Berbagi pengalaman membuat kolam lele skala rumahan yang menguntungkan. Cocok untuk pemula yang ingin memulai bisnis sampingan dengan modal kecil. Termasuk tips pemasaran dan cara menjaga kualitas air.',
                    'order' => ['image' => 'order-1 md:order-1', 'text' => 'order-2 md:order-2'],
                ],
            ];
        @endphp
        
        @foreach($courses as $index => $course)
            <div class="grid items-center grid-cols-1 gap-8 mt-12 md:grid-cols-2 md:gap-24 motion-animation" style="transition-delay: {{ 200 * $index }}ms">
                <div class="relative {{ $course['order']['image'] }} md:order-none">
                    <img src="https://asset.kompas.com/crops/A2FJZz12Slempn4Yrb61IX8ZFIA=/0x0:1000x667/1200x800/data/photo/2024/02/26/65dc5a22b7951.jpg" alt="Course Image" class="object-cover w-full h-48 rounded-lg md:h-64">
                    <div class="absolute top-0 left-0 flex items-center justify-center w-full h-full bg-gray-900 rounded-lg opacity-85">
                        <h1 class="text-4xl">🔒</h1>
                    </div>
                </div>
                <div class="{{ $course['order']['text'] }} md:order-none">
                    <h3 class="text-3xl font-bold text-transparent bg-gradient-to-r from-primary to-secondary bg-clip-text">
                        {{ $course['title'] }}
                    </h3>
                    <p class="mt-4 leading-relaxed text-gray-600">{{ $course['description'] }}</p>
                </div>
            </div>
        @endforeach
    </div>
    <a class="flex items-center justify-center w-full h-16 mt-8 font-bold text-white shadow-xl md:w-1/5 bg-gradient-to-r from-primary to-secondary rounded-2xl motion-animation" href="{{ route('register.store') }}">
        Join Now
    </a>
</section>
@endsection