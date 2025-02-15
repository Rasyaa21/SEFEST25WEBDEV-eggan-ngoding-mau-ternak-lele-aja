@extends('components.layouts.admin')

@section('title', 'Dashboard')

@section('content')
<section class="w-full min-h-screen bg-gray-50 dark:bg-lightBlue">
    <div class="min-h-screen p-2 py-12 md:p-6 2xl:p-10">
        <h1 class="mb-6 text-3xl font-bold text-center text-transparent lg:text-4xl bg-gradient-to-r from-primary to-secondary bg-clip-text motion-opacity-in-0 motion-translate-y-in-100 motion-blur-in-md lg:text-start">
            Selamat Datang {{ $user->name }}
        </h1>
        <div class="mx-auto max-w-screen">
            <div class="flex flex-col items-center w-full md:grid md:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6 2xl:gap-7.5">
                <div class="w-full max-w-lg p-6 delay-100 bg-white rounded-lg shadow-lg motion-opacity-in-0 motion-translate-y-in-100 motion-blur-in-md">
                    <div class="flex items-center justify-center w-12 h-12 bg-gray-100 rounded-full">
                        <svg class="w-6 h-6 text-blue-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 22 16" fill="none">
                            <path d="M11 15.1156C4.19376 15.1156 0.825012 8.61876 0.687512 8.34376C0.584387 8.13751 0.584387 7.86251 0.687512 7.65626C0.825012 7.38126 4.19376 0.918762 11 0.918762C17.8063 0.918762 21.175 7.38126 21.3125 7.65626C21.4156 7.86251 21.4156 8.13751 21.3125 8.34376C21.175 8.61876 17.8063 15.1156 11 15.1156ZM2.26876 8.00001C3.02501 9.27189 5.98126 13.5688 11 13.5688C16.0188 13.5688 18.975 9.27189 19.7313 8.00001C18.975 6.72814 16.0188 2.43126 11 2.43126C5.98126 2.43126 3.02501 6.72814 2.26876 8.00001Z" fill="currentColor"></path>
                            <path d="M11 10.9219C9.38438 10.9219 8.07812 9.61562 8.07812 8C8.07812 6.38438 9.38438 5.07812 11 5.07812C12.6156 5.07812 13.9219 6.38438 13.9219 8C13.9219 9.61562 12.6156 10.9219 11 10.9219ZM11 6.625C10.2437 6.625 9.625 7.24375 9.625 8C9.625 8.75625 10.2437 9.375 11 9.375C11.7563 9.375 12.375 8.75625 12.375 8C12.375 7.24375 11.7563 6.625 11 6.625Z" fill="currentColor"></path>
                        </svg>
                    </div>
                    <div class="flex items-end justify-between mt-4">
                        <div>
                            <h4 class="text-xl font-bold text-gray-900">$3.456K</h4>
                            <span class="text-sm text-gray-500">Total views</span>
                        </div>
                        <span class="flex items-center gap-1 text-sm font-medium text-green-500">
                            0.43%
                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10 11" fill="none">
                                <path d="M4.35716 2.47737L0.908974 5.82987L5.0443e-07 4.94612L5 0.0848689L10 4.94612L9.09103 5.82987L5.64284 2.47737V10.0849H4.35716V2.47737Z" fill="currentColor"></path>
                            </svg>
                        </span>
                    </div>
                </div>

                <div class="w-full max-w-lg p-6 delay-150 bg-white rounded-lg shadow-lg motion-opacity-in-0 motion-translate-y-in-100 motion-blur-in-md">
                    <div class="flex items-center justify-center w-12 h-12 bg-gray-100 rounded-full">
                        <svg class="w-6 h-6 text-blue-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 22 16" fill="none">
                            <path d="M11 15.1156C4.19376 15.1156 0.825012 8.61876 0.687512 8.34376C0.584387 8.13751 0.584387 7.86251 0.687512 7.65626C0.825012 7.38126 4.19376 0.918762 11 0.918762C17.8063 0.918762 21.175 7.38126 21.3125 7.65626C21.4156 7.86251 21.4156 8.13751 21.3125 8.34376C21.175 8.61876 17.8063 15.1156 11 15.1156ZM2.26876 8.00001C3.02501 9.27189 5.98126 13.5688 11 13.5688C16.0188 13.5688 18.975 9.27189 19.7313 8.00001C18.975 6.72814 16.0188 2.43126 11 2.43126C5.98126 2.43126 3.02501 6.72814 2.26876 8.00001Z" fill="currentColor"></path>
                            <path d="M11 10.9219C9.38438 10.9219 8.07812 9.61562 8.07812 8C8.07812 6.38438 9.38438 5.07812 11 5.07812C12.6156 5.07812 13.9219 6.38438 13.9219 8C13.9219 9.61562 12.6156 10.9219 11 10.9219ZM11 6.625C10.2437 6.625 9.625 7.24375 9.625 8C9.625 8.75625 10.2437 9.375 11 9.375C11.7563 9.375 12.375 8.75625 12.375 8C12.375 7.24375 11.7563 6.625 11 6.625Z" fill="currentColor"></path>
                        </svg>
                    </div>
                    <div class="flex items-end justify-between mt-4">
                        <div>
                            <h4 class="text-xl font-bold text-gray-900">$3.456K</h4>
                            <span class="text-sm text-gray-500">Total views</span>
                        </div>
                        <span class="flex items-center gap-1 text-sm font-medium text-green-500">
                            0.43%
                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10 11" fill="none">
                                <path d="M4.35716 2.47737L0.908974 5.82987L5.0443e-07 4.94612L5 0.0848689L10 4.94612L9.09103 5.82987L5.64284 2.47737V10.0849H4.35716V2.47737Z" fill="currentColor"></path>
                            </svg>
                        </span>
                    </div>
                </div>

                <div class="w-full max-w-lg p-6 delay-200 bg-white rounded-lg shadow-lg motion-opacity-in-0 motion-translate-y-in-100 motion-blur-in-md">
                    <div class="flex items-center justify-center w-12 h-12 bg-gray-100 rounded-full">
                        <svg class="w-6 h-6 text-blue-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 22 16" fill="none">
                            <path d="M11 15.1156C4.19376 15.1156 0.825012 8.61876 0.687512 8.34376C0.584387 8.13751 0.584387 7.86251 0.687512 7.65626C0.825012 7.38126 4.19376 0.918762 11 0.918762C17.8063 0.918762 21.175 7.38126 21.3125 7.65626C21.4156 7.86251 21.4156 8.13751 21.3125 8.34376C21.175 8.61876 17.8063 15.1156 11 15.1156ZM2.26876 8.00001C3.02501 9.27189 5.98126 13.5688 11 13.5688C16.0188 13.5688 18.975 9.27189 19.7313 8.00001C18.975 6.72814 16.0188 2.43126 11 2.43126C5.98126 2.43126 3.02501 6.72814 2.26876 8.00001Z" fill="currentColor"></path>
                            <path d="M11 10.9219C9.38438 10.9219 8.07812 9.61562 8.07812 8C8.07812 6.38438 9.38438 5.07812 11 5.07812C12.6156 5.07812 13.9219 6.38438 13.9219 8C13.9219 9.61562 12.6156 10.9219 11 10.9219ZM11 6.625C10.2437 6.625 9.625 7.24375 9.625 8C9.625 8.75625 10.2437 9.375 11 9.375C11.7563 9.375 12.375 8.75625 12.375 8C12.375 7.24375 11.7563 6.625 11 6.625Z" fill="currentColor"></path>
                        </svg>
                    </div>
                    <div class="flex items-end justify-between mt-4">
                        <div>
                            <h4 class="text-xl font-bold text-gray-900">$3.456K</h4>
                            <span class="text-sm text-gray-500">Total views</span>
                        </div>
                        <span class="flex items-center gap-1 text-sm font-medium text-green-500">
                            0.43%
                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10 11" fill="none">
                                <path d="M4.35716 2.47737L0.908974 5.82987L5.0443e-07 4.94612L5 0.0848689L10 4.94612L9.09103 5.82987L5.64284 2.47737V10.0849H4.35716V2.47737Z" fill="currentColor"></path>
                            </svg>
                        </span>
                    </div>
                </div>

                <div class="w-full max-w-lg p-6 bg-white rounded-lg shadow-lg motion-opacity-in-0 motion-translate-y-in-100 motion-blur-in-md delay-250">
                    <div class="flex items-center justify-center w-12 h-12 bg-gray-100 rounded-full">
                        <svg class="w-6 h-6 text-blue-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 22 16" fill="none">
                            <path d="M11 15.1156C4.19376 15.1156 0.825012 8.61876 0.687512 8.34376C0.584387 8.13751 0.584387 7.86251 0.687512 7.65626C0.825012 7.38126 4.19376 0.918762 11 0.918762C17.8063 0.918762 21.175 7.38126 21.3125 7.65626C21.4156 7.86251 21.4156 8.13751 21.3125 8.34376C21.175 8.61876 17.8063 15.1156 11 15.1156ZM2.26876 8.00001C3.02501 9.27189 5.98126 13.5688 11 13.5688C16.0188 13.5688 18.975 9.27189 19.7313 8.00001C18.975 6.72814 16.0188 2.43126 11 2.43126C5.98126 2.43126 3.02501 6.72814 2.26876 8.00001Z" fill="currentColor"></path>
                            <path d="M11 10.9219C9.38438 10.9219 8.07812 9.61562 8.07812 8C8.07812 6.38438 9.38438 5.07812 11 5.07812C12.6156 5.07812 13.9219 6.38438 13.9219 8C13.9219 9.61562 12.6156 10.9219 11 10.9219ZM11 6.625C10.2437 6.625 9.625 7.24375 9.625 8C9.625 8.75625 10.2437 9.375 11 9.375C11.7563 9.375 12.375 8.75625 12.375 8C12.375 7.24375 11.7563 6.625 11 6.625Z" fill="currentColor"></path>
                        </svg>
                    </div>
                    <div class="flex items-end justify-between mt-4">
                        <div>
                            <h4 class="text-xl font-bold text-gray-900">$3.456K</h4>
                            <span class="text-sm text-gray-500">Total views</span>
                        </div>
                        <span class="flex items-center gap-1 text-sm font-medium text-green-500">
                            0.43%
                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10 11" fill="none">
                                <path d="M4.35716 2.47737L0.908974 5.82987L5.0443e-07 4.94612L5 0.0848689L10 4.94612L9.09103 5.82987L5.64284 2.47737V10.0849H4.35716V2.47737Z" fill="currentColor"></path>
                            </svg>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
