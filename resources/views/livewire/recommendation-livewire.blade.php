<div class="flex flex-col items-center justify-start w-full min-h-screen">
    <div class="w-full mt-28"></div>
    <h1 class="text-3xl font-bold text-transparent lg:text-4xl bg-gradient-to-r from-primary to-secondary bg-clip-text motion-opacity-in-0 motion-translate-y-in-100 motion-blur-in-md">
        Kolam Cerdas
    </h1>
    <div class="container justify-center w-full max-w-xl lg:h-[450px] md:h-[400px] h-[450px] bg-white rounded-2xl shadow-2xl mt-12 motion-opacity-in-0 motion-translate-y-in-100 motion-blur-in-md delay-100 p-6 flex flex-col">
        <form wire:submit.prevent="submit" class="flex flex-col">
            <div class="mb-6">
                <label for="fish" class="block mb-2 text-sm font-bold text-gray-700">Ikan Apa Yang Ingin Diternak</label>
                <input type="text" id="fish" wire:model.defer="fish" placeholder="Lele"
                    class="w-full px-3 py-2.5 leading-tight text-gray-700 border rounded-lg shadow appearance-none focus:outline-none focus:shadow-outline border-primary @error('fish') border-red-500 @enderror"
                    style="-webkit-appearance: none;">
                @error('fish') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
            </div>

            <div class="mb-6">
                <label class="block mb-2 text-sm font-bold text-gray-700">Ukuran Kolam Ikan</label>
                <div class="grid grid-cols-3 gap-4">
                    <div>
                        <label for="length" class="block text-sm font-bold text-gray-700">Panjang</label>
                        <input type="text" id="length" wire:model.defer="length" placeholder="12m"
                            class="w-full px-2.5 py-2.5 text-gray-700 border rounded-lg shadow appearance-none focus:outline-none focus:shadow-outline border-primary @error('length') border-red-500 @enderror">
                        @error('length') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label for="width" class="block text-sm font-bold text-gray-700">Lebar</label>
                        <input type="text" id="width" wire:model.defer="width" placeholder="5m"
                            class="w-full px-2.5 py-2.5 text-gray-700 border rounded-lg shadow appearance-none focus:outline-none focus:shadow-outline border-primary @error('width') border-red-500 @enderror">
                        @error('width') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label for="height" class="block text-sm font-bold text-gray-700">Tinggi</label>
                        <input type="text" id="height" wire:model.defer="height" placeholder="2m"
                            class="w-full px-2.5 py-2.5 text-gray-700 border rounded-lg shadow appearance-none focus:outline-none focus:shadow-outline border-primary @error('height') border-red-500 @enderror">
                        @error('height') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>

            <div class="relative mb-6">
                <label for="management" class="block mb-2 text-sm font-bold text-gray-700">Jenis Pengelolaan Kolam</label>
                <select id="management" wire:model.defer="management"
                    class="w-full px-3 py-2.5 leading-tight text-gray-700 border rounded-lg shadow appearance-none focus:outline-none focus:shadow-outline border-primary @error('management') border-red-500 @enderror">
                    <option value="" selected>Pilih Jenis Pengelolaan</option>
                    <option value="tanah">Kolam Tanah</option>
                    <option value="terpal">Kolam Terpal</option>
                    <option value="bioflok">Bioflok</option>
                </select>
                @error('management') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
            </div>

            <button type="submit"
                class="block w-full px-4 py-3 mt-6 font-bold text-center text-white transition-all duration-300 rounded-lg bg-gradient-to-r from-primary to-secondary hover:bg-gradient-to-br focus:outline-none focus:shadow-outline"
                wire:loading.attr="disabled"
                wire:loading.class="opacity-50 cursor-not-allowed">
                <span wire:loading.remove>Konsultasi</span>
                <span wire:loading>
                    Memproses...
                    <svg class="inline w-5 h-5 mr-2 animate-spin" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" fill="none"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                </span>
            </button>
        </form>
    </div>
    <div class="container flex flex-col justify-start w-full max-w-xl mt-12 mb-24 delay-100 bg-white shadow-2xl rounded-2xl motion-opacity-in-0 motion-translate-y-in-100 motion-blur-in-md"
    <div class="container flex flex-col justify-start mt-12 mb-24 delay-100 bg-white shadow-2xl lg:max-w-1/3 md:max-w-3/4 max-w-3/4 rounded-2xl motion-opacity-in-0 motion-translate-y-in-100 motion-blur-in-md"
        x-data
        x-show="$wire.showRecommendation"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 transform -translate-y-4"
        x-transition:enter-end="opacity-100 transform translate-y-0"
        x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="opacity-100 transform translate-y-0"
        x-transition:leave-end="opacity-0 transform -translate-y-4">

        <div class="flex flex-row items-center justify-between w-full p-6 box-text h-1/6 bg-gradient-to-r from-primary to-secondary rounded-t-2xl">
            <h1 class="text-xl font-bold text-center text-white lg:text-2xl lg:text-start">
                Rekomendasi
            </h1>
            <div class="p-3 bg-white rounded-3xl">
                <svg class="w-6 h-6 text-primary" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z"/>
                </svg>
            </div>
        </div>

        <div class="grid w-full h-auto grid-cols-1 p-4 sm:grid-cols-2 lg:grid-cols-2 gap-x-4 gap-y-2 res-container rounded-b-2xl">
            <div class="flex flex-col justify-center h-20 p-4 bg-cream box rounded-xl">
                <div class="flex flex-row justify-between">
                    <h1 class="text-xl font-bold text-primary">Suhu</h1>
                    <div class="p-1 bg-white rounded-3xl">
                        <svg id='Temperature_24' width='20' height='20' viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'><rect width='24' height='24' stroke='none' fill='#000000' opacity='0'/>
                            <g transform="matrix(1.43 0 0 1.43 12 12)" >
                            <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: #39A7FF; fill-rule: nonzero; opacity: 1;" transform=" translate(-7.5, -8)" d="M 7.511719 1 C 6.140625 1 5.011719 2.128906 5.011719 3.5 L 5.011719 9.121094 C 4.414063 9.746094 4 10.5625 4 11.5 C 4 13.425781 5.574219 15 7.5 15 C 9.425781 15 11 13.425781 11 11.5 C 11 10.574219 10.597656 9.765625 10.011719 9.140625 L 10.011719 3.5 C 10.011719 2.128906 8.882813 1 7.511719 1 Z M 7.511719 2 C 8.339844 2 9.011719 2.671875 9.011719 3.5 L 9.011719 9.289063 C 9.011719 9.429688 9.070313 9.5625 9.175781 9.65625 C 9.683594 10.117188 10 10.765625 10 11.5 C 10 12.886719 8.886719 14 7.5 14 C 6.113281 14 5 12.886719 5 11.5 C 5 10.757813 5.328125 10.105469 5.84375 9.640625 C 5.949219 9.546875 6.011719 9.414063 6.011719 9.269531 L 6.011719 3.5 C 6.011719 2.671875 6.683594 2 7.511719 2 Z M 7 5 L 7 10.089844 C 6.402344 10.300781 6 10.863281 6 11.5 C 6 12.328125 6.671875 13 7.5 13 C 8.328125 13 9 12.328125 9 11.5 C 9 10.863281 8.597656 10.300781 8 10.089844 L 8 5 Z" stroke-linecap="round" />
                            </g>
                            </svg>
                    </div>
                </div>
                <h1 class="text-lg font-bold text-primary">{{ $temperature ?? '-' }}°C</h1>
            </div>

            <div class="flex flex-col justify-center h-20 p-4 bg-cream box rounded-xl">
                <div class="flex flex-row justify-between">
                    <h1 class="text-xl font-bold text-primary">Jumlah Ikan</h1>
                    <div class="p-1 bg-white rounded-3xl">
                        <svg id='Fish_24' width='20' height='20' viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'><rect width='24' height='24' stroke='none' fill='#000000' opacity='0'/>
                            <g transform="matrix(1 0 0 1 12 12)" >
                            <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: #39A7FF; fill-rule: nonzero; opacity: 1;" transform=" translate(-12, -12)" d="M 13 3 L 8 7 L 8.625 8.875 C 7.925781 9.410156 7.246094 9.945313 6.625 10.46875 C 5.46875 9.339844 3.738281 8 2 8 C 2 8 3 10.5 3 13 C 3 15.5 2 18 2 18 C 3.84375 18 5.695313 16.476563 6.84375 15.3125 C 8.058594 16.183594 9.457031 17.121094 10.78125 17.84375 L 10 21 L 14 20 L 14.53125 18.96875 C 17.53125 18.757813 21.054688 16.777344 22 13 C 21.140625 9.566406 18.945313 6.882813 15.6875 6.1875 Z M 18 11 C 18.601563 11 19 11.398438 19 12 C 19 12.601563 18.601563 13 18 13 C 17.398438 13 17 12.601563 17 12 C 17 11.398438 17.398438 11 18 11 Z" stroke-linecap="round" />
                            </g>
                            </svg>
                    </div>
                </div>
                <h1 class="text-lg font-bold text-primary">{{ $fishCount ?? '-' }} ekor</h1>
            </div>

            <div class="flex flex-col justify-center h-20 p-4 bg-cream box rounded-xl">
                <div class="flex flex-row justify-between">
                    <h1 class="text-xl font-bold text-primary">Oksigen</h1>
                    <div class="p-1 bg-white rounded-3xl">
                        <svg id='Pollution_O_2_24' width='20' height='20' viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'><rect width='24' height='24' stroke='none' fill='#000000' opacity='0'/>
                            <g transform="matrix(0.83 0 0 0.83 12 12)" >
                            <g style="" >
                            <g transform="matrix(1 0 0 1 0 0)" id="Regular" >
                            <circle style="stroke: #39A7FF; stroke-width: 1.5; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" cx="0" cy="0" r="11.25" />
                            </g>
                            <g transform="matrix(1 0 0 1 -1.5 0)" id="Regular" >
                            <rect style="stroke: #39A7FF; stroke-width: 1.5; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" x="-2.25" y="-3.75" rx="1.5" ry="1.5" width="4.5" height="7.5" />
                            </g>
                            <g transform="matrix(1 0 0 1 4.13 3)" id="Regular" >
                            <path style="stroke: #39A7FF; stroke-width: 1.5; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" transform=" translate(-16.13, -15)" d="M 15 13.875 C 15 13.253679656440358 15.503679656440358 12.75 16.125 12.75 L 16.125 12.75 C 16.746320343559642 12.75 17.25 13.253679656440358 17.25 13.875 L 17.25 13.875 C 17.249365676849152 14.238420309255714 17.12564232242775 14.590908498490478 16.899 14.875 L 15 17.25 L 17.25 17.25" stroke-linecap="round" />
                            </g>
                            </g>
                            </g>
                            </svg>
                    </div>
                </div>
                <h1 class="text-lg font-bold text-primary">{{ $oxygenLevel ?? '-' }} mg/L</h1>
            </div>

            <div class="flex flex-col justify-center h-20 p-4 bg-cream box rounded-xl">
                <div class="flex flex-row justify-between">
                    <h1 class="text-xl font-bold text-primary">pH Air</h1>
                    <div class="p-1 bg-white rounded-3xl">
                        <svg id='Weather_Rain_Drop_24' width='20' height='20' viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'><rect width='24' height='24' stroke='none' fill='#000000' opacity='0'/>
                            <g transform="matrix(1.43 0 0 1.43 12 12)" >
                            <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: #39A7FF; fill-rule: evenodd; opacity: 1;" transform=" translate(-7, -7)" d="M 7 0.5 L 7.40024 0.20032 C 7.30583 0.0742289 7.15752 0 7 0 C 6.84248 0 6.69417 0.0742289 6.59976 0.20032 L 7 0.5 Z M 7 0.5 C 7.40024 0.20032 7.40029 0.200382 7.40035 0.200466 L 7.40056 0.20075 L 7.40129 0.201729 L 7.40397 0.205316 L 7.4141 0.218916 L 7.45274 0.271058 C 7.48638 0.316613 7.53545 0.383381 7.59774 0.469031 C 7.72229 0.640307 7.89982 0.887228 8.11267 1.19113 C 8.53804 1.79848 9.10606 2.63561 9.6749 3.5527 C 10.2427 4.46809 10.8169 5.47212 11.2508 6.41179 C 11.6759 7.33231 12 8.26038 12 9 C 12 10.3261 11.4732 11.5979 10.5355 12.5355 C 9.59785 13.4732 8.32608 14 7 14 C 5.67392 14 4.40215 13.4732 3.46447 12.5355 C 2.52678 11.5979 2 10.3261 2 9 C 2 8.26038 2.32411 7.33231 2.74919 6.41179 C 3.1831 5.47212 3.75731 4.46809 4.3251 3.5527 C 4.89394 2.63561 5.46196 1.79848 5.88733 1.19113 C 6.10018 0.887228 6.27771 0.640307 6.40226 0.469031 C 6.46455 0.383381 6.51362 0.316613 6.54726 0.271058 L 6.5859 0.218916 L 6.59603 0.205316 L 6.59871 0.201729 L 6.59944 0.20075 L 6.59965 0.200466 C 6.59971 0.200382 6.59976 0.20032 7 0.5 Z" stroke-linecap="round" />
                            </g>
                            </svg>
                    </div>
                </div>
                <h1 class="text-lg font-bold text-primary">{{ $phLevel ?? '-' }}</h1>
            </div>

            <div class="flex flex-col justify-center h-20 p-4 bg-cream box rounded-xl">
                <div class="flex flex-row justify-between">
                    <h1 class="text-xl font-bold text-primary">Salinitas</h1>
                    <div class="p-1 bg-white rounded-3xl">
                        <svg id='Water_Element_20' width='20' height='20' viewBox='0 0 20 20' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'><rect width='20' height='20' stroke='none' fill='#000000' opacity='0'/>
                            <g transform="matrix(0.32 0 0 0.32 10 10)" >
                            <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: #39A7FF; fill-rule: nonzero; opacity: 1;" transform=" translate(-24.91, -25.51)" d="M 22.75 4 C 17.078125 3.996094 13.4375 7.625 10.5625 10.90625 C 7.632813 14.25 5.269531 17.199219 1.6875 17.78125 C 0.9375 17.835938 0.277344 18.3125 -0.0117188 19.007813 C -0.300781 19.703125 -0.171875 20.503906 0.320313 21.078125 C 0.808594 21.648438 1.578125 21.898438 2.3125 21.71875 C 7.648438 20.851563 10.761719 16.792969 13.59375 13.5625 C 16.425781 10.332031 18.75 7.894531 22.9375 8 C 22.957031 8 22.980469 8 23 8 C 23.042969 8 23.082031 8 23.125 8 C 26.386719 8.066406 28 10.558594 28 13 C 28 14.179688 27.640625 15.574219 27 16.5 C 26.359375 17.425781 25.613281 18 24 18 C 23.984375 18 23.113281 17.84375 22.625 17.5625 C 22.136719 17.28125 22 17.191406 22 16.6875 C 22 15.996094 22.144531 15.863281 22.1875 15.8125 C 22.1875 15.8125 22.1875 15.78125 22.1875 15.78125 C 23.058594 15.261719 23.398438 14.171875 22.984375 13.246094 C 22.570313 12.320313 21.53125 11.851563 20.5625 12.15625 C 20.5625 12.15625 19.660156 12.53125 19.0625 13.28125 C 18.464844 14.03125 18 15.203125 18 16.6875 C 18 18.75 19.359375 20.300781 20.625 21.03125 C 21.890625 21.761719 23.007813 22 24 22 C 26.804688 22 29.0625 20.59375 30.3125 18.78125 C 31.449219 17.136719 31.894531 15.261719 31.96875 13.53125 C 34.144531 11.808594 36.917969 10.035156 40.125 10 C 40.15625 10 40.1875 10 40.21875 10 C 40.28125 10.003906 40.34375 10.003906 40.40625 10 C 42.46875 10.042969 43.824219 10.742188 44.71875 11.59375 C 45.640625 12.46875 46 13.609375 46 14 C 46 15.386719 45.652344 16.457031 45.1875 17.0625 C 44.722656 17.667969 44.210938 18 43 18 C 42.988281 18 42.617188 17.917969 42.40625 17.75 C 42.203125 17.589844 42.042969 17.4375 42 16.90625 C 42 16.929688 42 16.867188 42 16.875 C 42.011719 16.925781 42.03125 16.65625 42.03125 16.65625 C 42.21875 15.945313 42 15.1875 41.460938 14.683594 C 40.925781 14.183594 40.152344 14.015625 39.457031 14.25 C 38.757813 14.488281 38.246094 15.085938 38.125 15.8125 C 38.125 15.8125 37.957031 16.273438 38 17.09375 C 38 17.105469 38 17.113281 38 17.125 C 38.105469 18.757813 38.945313 20.125 39.9375 20.90625 C 40.929688 21.6875 41.96875 22 43 22 C 45.222656 22 47.195313 21.042969 48.375 19.5 C 49.554688 17.957031 50 16.003906 50 14 C 50 12.140625 49.109375 10.28125 47.46875 8.71875 C 45.890625 7.21875 43.511719 6.117188 40.5625 6.03125 C 40.449219 6.011719 40.335938 6 40.21875 6 C 40.15625 5.996094 40.09375 5.996094 40.03125 6 C 40.011719 6 39.988281 6 39.96875 6 C 36.351563 6.070313 33.390625 7.609375 31.125 9.1875 C 29.804688 6.371094 27.042969 4.164063 23.34375 4.03125 C 23.3125 4.019531 23.28125 4.007813 23.25 4 C 23.1875 4 23.125 4 23.0625 4 C 23.039063 4 23.019531 4 23 4 C 22.9375 3.996094 22.875 3.996094 22.8125 4 C 22.792969 4 22.769531 4 22.75 4 Z M 13 27 C 10.09375 27 8.023438 28.160156 6.4375 29.125 C 4.851563 30.089844 3.722656 30.816406 1.8125 31 C 0.707031 31.105469 -0.105469 32.082031 0 33.1875 C 0.105469 34.292969 1.082031 35.105469 2.1875 35 C 5.039063 34.726563 6.984375 33.453125 8.5 32.53125 C 10.015625 31.609375 11.074219 31 13 31 C 14.863281 31 16.238281 31.75 18.03125 32.75 C 19.824219 33.75 22.035156 35 25 35 C 27.964844 35 30.175781 33.75 31.96875 32.75 C 33.761719 31.75 35.144531 31 37 31 C 38.855469 31 40.164063 31.738281 41.78125 32.71875 C 43.398438 33.699219 45.332031 35 48 35 C 48.722656 35.011719 49.390625 34.632813 49.753906 34.007813 C 50.121094 33.386719 50.121094 32.613281 49.753906 31.992188 C 49.390625 31.367188 48.722656 30.988281 48 31 C 46.667969 31 45.523438 30.300781 43.84375 29.28125 C 42.164063 28.261719 39.960938 27 37 27 C 34.039063 27 31.824219 28.25 30.03125 29.25 C 28.238281 30.25 26.863281 31 25 31 C 23.136719 31 21.761719 30.25 19.96875 29.25 C 18.175781 28.25 15.96875 27 13 27 Z M 13 39 C 10.125 39 8.0625 40.089844 6.46875 41.03125 C 4.875 41.972656 3.707031 42.746094 1.71875 43.03125 C 0.953125 43.058594 0.269531 43.519531 -0.0390625 44.21875 C -0.351563 44.917969 -0.234375 45.734375 0.261719 46.320313 C 0.753906 46.90625 1.539063 47.15625 2.28125 46.96875 C 5.109375 46.5625 7.003906 45.355469 8.5 44.46875 C 9.996094 43.582031 11.039063 43 13 43 C 14.863281 43 16.238281 43.75 18.03125 44.75 C 19.824219 45.75 22.035156 47 25 47 C 27.964844 47 30.175781 45.75 31.96875 44.75 C 33.761719 43.75 35.144531 43 37 43 C 38.855469 43 40.28125 43.746094 41.9375 44.71875 C 43.59375 45.691406 45.464844 47 48 47 C 48.722656 47.011719 49.390625 46.632813 49.753906 46.007813 C 50.121094 45.386719 50.121094 44.613281 49.753906 43.992188 C 49.390625 43.367188 48.722656 42.988281 48 43 C 46.953125 43 45.714844 42.308594 43.96875 41.28125 C 42.222656 40.253906 39.960938 39 37 39 C 34.039063 39 31.824219 40.25 30.03125 41.25 C 28.238281 42.25 26.863281 43 25 43 C 23.136719 43 21.761719 42.25 19.96875 41.25 C 18.175781 40.25 15.96875 39 13 39 Z" stroke-linecap="round" />
                            </g>
                            </svg>
                    </div>
                </div>
                <h1 class="text-lg font-bold text-primary">{{ $salinity ?? '-' }} ppt</h1>
            </div>
        </div>

        <div class="p-4">
            <h1 class="text-lg font-bold text-center text-transparent bg-primary lg:text-xl bg-clip-text lg:text-start md:text-start">
                Rekomendasi Pengelolaan
            </h1>
            <p class="mt-2 text-center text-gray-700 lg:text-start md:text-start">{{ $recommendation }}</p>
        </div>
    </div>
</div>
