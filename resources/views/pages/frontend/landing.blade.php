@extends('layouts.app')

@section('title', 'Marivora')

@section('content')
<section class="flex items-center justify-center w-full h-screen bg-lightBlue">
    <div class="container flex flex-col items-center justify-center w-full h-full gap-6 lg:flex-row lg:items-center lg:justify-center lg:gap-36">
        <div class="text-center lg:text-left motion-opacity-in-0 motion-translate-y-in-100">
            <h1 class="text-3xl font-bold text-transparent lg:text-4xl bg-gradient-to-r from-primary to-secondary bg-clip-text ">
                Membantu Para Peternak Ikan <br> Dengan Marivora
            </h1>
            <br class="gap-1">
            <h3 class="break-words text-1xl lg:text-xl">Membantu para peternak ikan yang ingin memulai</h3>
            <h3 class="break-words text-1xl lg:text-xl">budidaya dengan panduan lengkap dan solusi cerdas</h3>
            <button class="px-8 py-3 mt-5 font-bold text-white bg-gradient-to-r from-primary to-secondary rounded-4xl hover:bg-primary">
                Ayo Mulai
            </button>
        </div>
        <div class="relative my-4 mt-4 lg:mt-0 lg:ml-4 lg:p-0 motion-opacity-in-0 motion-translate-y-in-100">
            <img src="{{ asset('assets/images/illustrasi-2.png') }}" alt="Descriptive Alt Text" class="absolute top-0 left-0 w-full h-full origin-bottom shadow-xl -rotate-6 rounded-2xl" style="width: 500px; height: 500px; object-fit: fill; opacity: 0.5;">
            <img src="{{ asset('assets/images/ilustrasi.png') }}" alt="Descriptive Alt Text" class="relative w-full h-full transition-transform duration-300 origin-bottom transform shadow-xl rounded-2xl hover:scale-105 hover:motion-rotate-out-3" style="width: 500px; height: 500px; object-fit: fill;">
        </div>
    </div>
</section>

<section class="flex flex-col items-center justify-start w-full py-8 pb-48 bg-gradient-to-t from-white to-lightBlue">
    <h1 class="text-3xl font-bold text-transparent transition-all duration-700 translate-y-10 opacity-0 lg:text-4xl bg-gradient-to-r from-primary to-secondary bg-clip-text section-hidden">
        Apa Yang Kami Tawarkan
    </h1>
    <h3 class="mt-2 text-lg break-words transition-all duration-700 translate-y-10 opacity-0 lg:mt-4 lg:text-xl section-hidden">
        Fitur Yang Di Tawarkan Pada Website Kami
    </h3>

    <div class="flex flex-wrap items-center justify-center w-full max-w-screen-xl gap-4 p-4 mx-auto mt-8 lg:gap-8 lg:mt-12">
        <div class="flex items-center justify-center w-full h-56 text-lg font-semibold text-white transition-all duration-700 delay-100 translate-y-10 bg-white shadow-xl opacity-0 box sm:w-1/2 md:w-1/3 lg:w-1/4 rounded-2xl">
            Kotak 1
        </div>
        <div class="flex items-center justify-center w-full h-56 text-lg font-semibold text-white transition-all duration-700 delay-150 translate-y-10 bg-white shadow-xl opacity-0 box sm:w-1/2 md:w-1/3 lg:w-1/4 rounded-2xl">
            Kotak 1
        </div>
        <div class="flex items-center justify-center w-full h-56 text-lg font-semibold text-white transition-all duration-700 delay-200 translate-y-10 bg-white shadow-xl opacity-0 box sm:w-1/2 md:w-1/3 lg:w-1/4 rounded-2xl">
            Kotak 1
        </div>
        <div class="flex items-center justify-center w-full h-56 text-lg font-semibold text-white transition-all duration-700 translate-y-10 bg-white shadow-xl opacity-0 delay-250 box sm:w-1/2 md:w-1/3 lg:w-1/4 rounded-2xl">
            Kotak 1
        </div>
        <div class="flex items-center justify-center w-full h-56 text-lg font-semibold text-white transition-all duration-700 delay-300 translate-y-10 bg-white shadow-xl opacity-0 box sm:w-1/2 md:w-1/3 lg:w-1/4 rounded-2xl">
            Kotak 1
        </div>
    </div>
</section>

<section class="flex items-center justify-center w-full py-8 bg-white pb-36">
    <div class="container flex flex-col items-center justify-center w-full gap-4 px-4 lg:flex-row lg:items-center lg:justify-center lg:gap-32 ">
        <div class="w-full col flex-col lg:w-1/3 bg-white shadow-xl min-h-[300px] lg:min-h-[400px] flex rounded-2xl mx-4 lg:mx-0 transition-all duration-700 opacity-100 translate-y-0 p-8 gap-4">
            <div class="flex items-center space-x-3">
                <div class="flex items-center justify-center p-2 bg-blue-100 rounded-lg">
                    <svg class="w-6 h-6 text-blue-600" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2 4a2 2 0 012-2h16a2 2 0 012 2v12a2 2 0 01-2 2H6l-4 4V4z"/>
                    </svg>
                </div>
                <span class="font-semibold text-gray-900">TanyaKolam</span>
            </div>
            <div class="flex items-center p-2 py-3 space-x-4 bg-blue-100 rounded-lg">
                <span class="font-normal text-gray-700">Apa Saja Makanan Untuk Ikan Lele</span>
            </div>
            <div class="flex items-center p-2 py-3 space-x-4 bg-blue-100 rounded-lg">
                <span class="font-normal text-gray-700">Gimana Cara Budidaya Ikan Nila</span>
            </div>
            <div class="flex items-center p-2 py-3 space-x-4 bg-blue-100 rounded-lg">
                <span class="font-normal text-gray-700">Ikan Gabus Apakah Bisa di Ternak</span>
            </div>
            <br class="lg:gap-y-24">
            <div class="flex items-end w-full px-4 py-2 border border-gray-300 rounded-lg">
                <input type="text" placeholder="Tanya Apa Saja Mengenai Ternak Ikan"
                    class="w-full text-gray-600 placeholder-gray-400 bg-transparent outline-none">
                <button type="submit" class="flex items-end text-primary hover:text-blue-700">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M22 2L11 13"></path>
                        <path d="M22 2L15 22l-4-9-9-4z"></path>
                    </svg>
                </button>
            </div>
        </div>
        <div class="text-center transition-all duration-700 delay-300 translate-y-10 opacity-0 section-hidden lg:text-left">
            <h1 class="mt-2 text-3xl font-bold text-transparent transition-all duration-700 ease-in-out translate-y-10 opacity-0 lg:text-4xl bg-gradient-to-r from-primary to-secondary bg-clip-text lg:mt-4 section-hidden">
                Mulai Berkonsultasi <br> Tentang Perikanan
            </h1>
            <br class="gap-1">
            <h3 class="break-words text-1xl lg:text-xl">Membantu para peternak ikan yang ingin memulai</h3>
            <h3 class="break-words text-1xl lg:text-xl">budidaya dengan panduan lengkap dan solusi cerdas</h3>
            <button class="px-8 py-3 mt-5 font-bold text-white bg-gradient-to-r from-primary to-secondary rounded-4xl hover:bg-primary">
                Ayo Mulai
            </button>
        </div>
    </div>
</section>
<section class="flex flex-col items-center justify-start w-full py-8 pb-48 bg-gradient-to-t from-white to-lightBlue ">
    <div class="max-w-screen-xl px-4 py-12 mx-auto text-center sm:px-6 lg:px-8 lg:py-16">
        <h2 class="mt-2 mb-3 text-3xl font-bold text-transparent lg:text-4xl bg-gradient-to-r from-primary to-secondary bg-clip-text lg:mt-4">
            Apa Kata Mereka Tentang Marivora
        </h2>
        <div class="grid grid-cols-1 gap-4 mt-8 md:grid-cols-3 md:gap-8 lg:mt-24">
          <blockquote class="p-6 transition-all ease-in-out delay-100 translate-y-10 rounded-lg shadow-xs opacity-0 duration-600 bg-gray-50 sm:p-8 section-hidden">
            <div class="flex items-center gap-4">
              <img
                alt=""
                src="{{ asset('assets/images/foto1.jpeg') }}"
                class="object-cover rounded-full size-14"
              />

              <div>
                <div class="flex justify-center gap-0.5 text-primary">
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="size-5"
                    viewBox="0 0 20 20"
                    fill="currentColor"
                  >
                    <path
                      d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                    />
                  </svg>
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="size-5"
                    viewBox="0 0 20 20"
                    fill="currentColor"
                  >
                    <path
                      d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                    />
                  </svg>
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="size-5"
                    viewBox="0 0 20 20"
                    fill="currentColor"
                  >
                    <path
                      d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                    />
                  </svg>
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="size-5"
                    viewBox="0 0 20 20"
                    fill="currentColor"
                  >
                    <path
                      d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                    />
                  </svg>
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="size-5"
                    viewBox="0 0 20 20"
                    fill="currentColor"
                  >
                    <path
                      d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                    />
                  </svg>
                </div>

                <p class="mt-0.5 text-lg font-medium text-gray-900">Mas Budi</p>
              </div>
            </div>

            <p class="mt-4 text-gray-700">
                Saya baru memulai usaha peternakan ikan di kolam kecil, dan aplikasi Marivora benar-benar membantu saya. Fitur panduan pemula sangat mudah diikuti, dari cara membuat kolam hingga pemilihan bibit ikan yang tepat. Sekarang saya merasa lebih percaya diri untuk mengembangkan usaha ini. Terima kasih, Marivora!”
            </p>
          </blockquote>

          <blockquote class="p-6 transition-all ease-in-out delay-150 translate-y-10 rounded-lg shadow-xs opacity-0 duration-650 bg-gray-50 sm:p-8 section-hidden">
            <div class="flex items-center gap-4">
              <img
                alt=""
                src="{{ asset('assets/images/foto2.jpeg') }}"
                class="object-cover rounded-full size-14"
              />

              <div>
                <div class="flex justify-center gap-0.5 text-primary">
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="size-5"
                    viewBox="0 0 20 20"
                    fill="currentColor"
                  >
                    <path
                      d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                    />
                  </svg>
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="size-5"
                    viewBox="0 0 20 20"
                    fill="currentColor"
                  >
                    <path
                      d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                    />
                  </svg>
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="size-5"
                    viewBox="0 0 20 20"
                    fill="currentColor"
                  >
                    <path
                      d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                    />
                  </svg>
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="size-5"
                    viewBox="0 0 20 20"
                    fill="currentColor"
                  >
                    <path
                      d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                    />
                  </svg>
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="size-5"
                    viewBox="0 0 20 20"
                    fill="currentColor"
                  >
                    <path
                      d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                    />
                  </svg>
                </div>

                <p class="mt-0.5 text-lg font-medium text-gray-900">Andi Marjong</p>
              </div>
            </div>

            <p class="mt-4 text-gray-700">
                Aplikasi Marivora sangat membantu dalam manajemen kolam ikan saya. Fitur monitoring kualitas air dan pemberian pakan otomatis sangat praktis. Hanya saja, saya berharap ada lebih banyak analitik untuk memantau perkembangan hasil panen secara detail. Secara keseluruhan, aplikasi ini sangat berguna!
            </p>
        </blockquote>

        <blockquote class="p-6 transition-all duration-700 ease-in-out delay-200 translate-y-10 rounded-lg shadow-xs opacity-0 bg-gray-50 sm:p-8 section-hidden">
            <div class="flex items-center gap-4">
            <img
                alt=""
                src="{{ asset('assets/images/rasya.png') }}"
                class="object-cover rounded-full size-14"
            />

            <div>
                <div class="flex justify-center gap-0.5 text-primary">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="size-5"
                    viewBox="0 0 20 20"
                    fill="currentColor"
                >
                    <path
                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                    />
                </svg>
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="size-5"
                    viewBox="0 0 20 20"
                    fill="currentColor"
                >
                    <path
                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                    />
                </svg>
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="size-5"
                    viewBox="0 0 20 20"
                    fill="currentColor"
                >
                    <path
                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                    />
                </svg>
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="size-5"
                    viewBox="0 0 20 20"
                    fill="currentColor"
                >
                    <path
                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                    />
                </svg>
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="size-5"
                    viewBox="0 0 20 20"
                    fill="currentColor"
                >
                    <path
                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                    />
                    </svg>
                </div>

                <p class="mt-0.5 text-lg font-medium text-gray-900">Rasya Hidayat</p>
                </div>
            </div>

                <p class="mt-4 text-gray-700">
                    Saya sudah mengelola kolam ikan selama bertahun-tahun, tetapi aplikasi Marivora memberikan solusi baru yang sangat efektif. Fitur untuk menghitung biaya operasional dan estimasi keuntungan sangat membantu dalam merencanakan bisnis saya. Aplikasi ini membuat semuanya lebih terorganisir dan efisien.
                </p>
            </blockquote>
        </div>
    </div>
</section>



<script>
    document.addEventListener("DOMContentLoaded", () => {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.remove("opacity-0", "translate-y-10");
                }
            });
        }, { threshold: 0.2 });

        document.querySelectorAll(".section-hidden, .box").forEach((el) => observer.observe(el));
    });

</script>
@endsection
