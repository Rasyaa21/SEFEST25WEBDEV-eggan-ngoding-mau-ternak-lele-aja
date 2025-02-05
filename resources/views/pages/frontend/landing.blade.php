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
        <div class="flex flex-col items-center justify-center w-full h-56 gap-2 p-6 text-lg font-semibold text-white transition-all duration-700 delay-150 translate-y-10 bg-white shadow-xl opacity-0 col box sm:w-1/2 md:w-1/3 lg:w-1/4 rounded-2xl lg:gap-4">
            <div class="p-3 bg-gradient-to-r from-primary to-secondary rounded-3xl">
                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z"/>
                </svg>
            </div>
            <h1 class="font-bold text-center text-transparent transition-all duration-700 translate-y-10 opacity-0 text-l lg:text-xl bg-gradient-to-r from-primary to-secondary bg-clip-text section-hidden">
                Kolam Cerdas
            </h1>
            <h4 class="px-4 text-base font-normal text-center text-transparent transition-all duration-700 translate-y-10 bg-black opacity-0 lg:text-sm bg-clip-text section-hidden">
                Mendukung Peternak Ikan dalam Memulai dan Mengembangkan Budidaya
            </h4>
        </div>
        <div class="flex flex-col items-center justify-center w-full h-56 gap-2 p-6 text-lg font-semibold text-white transition-all duration-700 delay-200 translate-y-10 bg-white shadow-xl opacity-0 col box sm:w-1/2 md:w-1/3 lg:w-1/4 rounded-2xl lg:gap-4">
            <div class="p-3 bg-gradient-to-r from-primary to-secondary rounded-3xl">
                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12.4472 4.10557c-.2815-.14076-.6129-.14076-.8944 0L2.76981 8.49706l9.21949 4.39024L21 8.38195l-8.5528-4.27638Z"/>
                    <path d="M5 17.2222v-5.448l6.5701 3.1286c.278.1325.6016.1293.8771-.0084L19 11.618v5.6042c0 .2857-.1229.5583-.3364.7481l-.0025.0022-.0041.0036-.0103.009-.0119.0101-.0181.0152c-.024.02-.0562.0462-.0965.0776-.0807.0627-.1942.1465-.3405.2441-.2926.195-.7171.4455-1.2736.6928C15.7905 19.5208 14.1527 20 12 20c-2.15265 0-3.79045-.4792-4.90614-.9751-.5565-.2473-.98098-.4978-1.27356-.6928-.14631-.0976-.2598-.1814-.34049-.2441-.04036-.0314-.07254-.0576-.09656-.0776-.01201-.01-.02198-.0185-.02991-.0253l-.01038-.009-.00404-.0036-.00174-.0015-.0008-.0007s-.00004 0 .00978-.0112l-.00009-.0012-.01043.0117C5.12215 17.7799 5 17.5079 5 17.2222Zm-3-6.8765 2 .9523V17c0 .5523-.44772 1-1 1s-1-.4477-1-1v-6.6543Z"/>
                </svg>
            </div>
            <h1 class="font-bold text-center text-transparent transition-all duration-700 translate-y-10 opacity-0 text-l lg:text-xl bg-gradient-to-r from-primary to-secondary bg-clip-text section-hidden">
                Marivora Academy
            </h1>
            <h4 class="px-4 text-base font-normal text-center text-transparent transition-all duration-700 translate-y-10 bg-black opacity-0 lg:text-sm bg-clip-text section-hidden">
                Academy Berbasis Subscription Belajar Budidaya Ikan dengan Panduan Lengkap
            </h4>
        </div>
        <div class="flex flex-col items-center justify-center w-full h-56 gap-2 p-6 text-lg font-semibold text-white transition-all duration-700 translate-y-10 bg-white shadow-xl opacity-0 delay-250 col box sm:w-1/2 md:w-1/3 lg:w-1/4 rounded-2xl lg:gap-4">
            <div class="p-3 bg-gradient-to-r from-primary to-secondary rounded-3xl">
                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M5.535 7.677c.313-.98.687-2.023.926-2.677H17.46c.253.63.646 1.64.977 2.61.166.487.312.953.416 1.347.11.42.148.675.148.779 0 .18-.032.355-.09.515-.06.161-.144.3-.243.412-.1.111-.21.192-.324.245a.809.809 0 0 1-.686 0 1.004 1.004 0 0 1-.324-.245c-.1-.112-.183-.25-.242-.412a1.473 1.473 0 0 1-.091-.515 1 1 0 1 0-2 0 1.4 1.4 0 0 1-.333.927.896.896 0 0 1-.667.323.896.896 0 0 1-.667-.323A1.401 1.401 0 0 1 13 9.736a1 1 0 1 0-2 0 1.4 1.4 0 0 1-.333.927.896.896 0 0 1-.667.323.896.896 0 0 1-.667-.323A1.4 1.4 0 0 1 9 9.74v-.008a1 1 0 0 0-2 .003v.008a1.504 1.504 0 0 1-.18.712 1.22 1.22 0 0 1-.146.209l-.007.007a1.01 1.01 0 0 1-.325.248.82.82 0 0 1-.316.08.973.973 0 0 1-.563-.256 1.224 1.224 0 0 1-.102-.103A1.518 1.518 0 0 1 5 9.724v-.006a2.543 2.543 0 0 1 .029-.207c.024-.132.06-.296.11-.49.098-.385.237-.85.395-1.344ZM4 12.112a3.521 3.521 0 0 1-1-2.376c0-.349.098-.8.202-1.208.112-.441.264-.95.428-1.46.327-1.024.715-2.104.958-2.767A1.985 1.985 0 0 1 6.456 3h11.01c.803 0 1.539.481 1.844 1.243.258.641.67 1.697 1.019 2.72a22.3 22.3 0 0 1 .457 1.487c.114.433.214.903.214 1.286 0 .412-.072.821-.214 1.207A3.288 3.288 0 0 1 20 12.16V19a2 2 0 0 1-2 2h-6a1 1 0 0 1-1-1v-4H8v4a1 1 0 0 1-1 1H6a2 2 0 0 1-2-2v-6.888ZM13 15a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1v-2Z" clip-rule="evenodd"/>
                </svg>
            </div>
            <h1 class="font-bold text-center text-transparent transition-all duration-700 translate-y-10 opacity-0 text-l lg:text-xl bg-gradient-to-r from-primary to-secondary bg-clip-text section-hidden">
                Marketplace
            </h1>
            <h4 class="px-4 text-base font-normal text-center text-transparent transition-all duration-700 translate-y-10 bg-black opacity-0 lg:text-sm bg-clip-text section-hidden">
                Marketplace Khusus untuk Peternak Ikan: Jual Beli Mudah dan Terpercaya
            </h4>
        </div>
        <div class="flex flex-col items-center justify-center w-full h-56 gap-2 p-6 text-lg font-semibold text-white transition-all duration-700 delay-300 translate-y-10 bg-white shadow-xl opacity-0 col box sm:w-1/2 md:w-1/3 lg:w-1/4 rounded-2xl lg:gap-4">
            <div class="p-3 bg-gradient-to-r from-primary to-secondary rounded-3xl">
                <svg w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M10.5 3.75a6.75 6.75 0 1 0 0 13.5 6.75 6.75 0 0 0 0-13.5ZM2.25 10.5a8.25 8.25 0 1 1 14.59 5.28l4.69 4.69a.75.75 0 1 1-1.06 1.06l-4.69-4.69A8.25 8.25 0 0 1 2.25 10.5Z" clip-rule="evenodd" />
                </svg>

            </div>
            <h1 class="font-bold text-center text-transparent transition-all duration-700 translate-y-10 opacity-0 text-l lg:text-xl bg-gradient-to-r from-primary to-secondary bg-clip-text section-hidden">
                Pantau Kolam
            </h1>
            <h4 class="px-4 text-base font-normal text-center text-transparent transition-all duration-700 translate-y-10 bg-black opacity-0 lg:text-sm bg-clip-text section-hidden">
                Fitur Pantau Kolam: Monitoring Kualitas Air Secara Real-Time untuk Budidaya Ikan yang Lebih Optimal
            </h4>
        </div>
        <div class="flex flex-col items-center justify-center w-full h-56 gap-2 p-6 text-lg font-semibold text-white transition-all duration-700 translate-y-10 bg-white shadow-xl opacity-0 delay-350 col box sm:w-1/2 md:w-1/3 lg:w-1/4 rounded-2xl lg:gap-4">
            <div class="p-3 bg-gradient-to-r from-primary to-secondary rounded-3xl">
                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M3.559 4.544c.355-.35.834-.544 1.33-.544H19.11c.496 0 .975.194 1.33.544.356.35.559.829.559 1.331v9.25c0 .502-.203.981-.559 1.331-.355.35-.834.544-1.33.544H15.5l-2.7 3.6a1 1 0 0 1-1.6 0L8.5 17H4.889c-.496 0-.975-.194-1.33-.544A1.868 1.868 0 0 1 3 15.125v-9.25c0-.502.203-.981.559-1.331ZM7.556 7.5a1 1 0 1 0 0 2h8a1 1 0 0 0 0-2h-8Zm0 3.5a1 1 0 1 0 0 2H12a1 1 0 1 0 0-2H7.556Z" clip-rule="evenodd"/>
                </svg>
            </div>
            <h1 class="font-bold text-center text-transparent transition-all duration-700 translate-y-10 opacity-0 text-l lg:text-xl bg-gradient-to-r from-primary to-secondary bg-clip-text section-hidden">
                TanyaKolam
            </h1>
            <h4 class="px-4 text-base font-normal text-center text-transparent transition-all duration-700 translate-y-10 bg-black opacity-0 lg:text-sm bg-clip-text section-hidden">
                Solusi Cerdas untuk Permasalahan Budidaya Ikan dengan Chatbot AI Pagi Para Peternak
            </h4>
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
          <blockquote class="p-6 transition-all ease-in-out delay-100 translate-y-10 rounded-lg shadow-xl opacity-0 duration-600 bg-gray-50 sm:p-8 section-hidden">
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

          <blockquote class="p-6 transition-all ease-in-out delay-150 translate-y-10 rounded-lg shadow-xl opacity-0 duration-650 bg-gray-50 sm:p-8 section-hidden">
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

        <blockquote class="p-6 transition-all duration-700 ease-in-out delay-200 translate-y-10 rounded-lg shadow-xl opacity-0 bg-gray-50 sm:p-8 section-hidden">
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
