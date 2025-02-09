@extends('layouts.app')

@section('title', 'Marivora - Tanya Kolam')

@push('styles')
    @livewireStyles
@endpush

@push('scripts')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @livewireScripts
@endpush

@section('content')
<section x-data class="flex flex-col items-center justify-start w-full min-h-screen bg-lightBlue">
    @livewire('tanya-kolam-livewire')
</section>
<style>
    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    .fade-in {
        animation: fadeIn 0.5s ease-in;
    }
</style>
@endsection
