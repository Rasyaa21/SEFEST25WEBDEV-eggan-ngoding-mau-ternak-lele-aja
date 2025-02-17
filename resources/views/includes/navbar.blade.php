@vite('resources/css/app.css')
<nav class="fixed top-0 z-20 w-full bg-white border-b border-white dark:bg-white start-0 dark:border-white">
    <div class="flex flex-wrap items-center justify-between max-w-screen-xl p-4 mx-auto">
        <a href="{{ route('home') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="{{ asset('assets/logo-cropped.svg') }}" class="h-8" alt="Flowbite Logo">
            <span class="self-center text-2xl font-semibold text-black dark:text-black">Marivora</span>
        </a>
        <div class="flex items-center gap-3 space-x-3 md:order-2 md:space-x-0 rtl:space-x-reverse">
            <a href="{{ route('user.register') }}" class="px-5 py-2.5 text-sm font-medium text-center text-white rounded-3xl bg-primary transition-all duration-300 hover:bg-blue-800 hover:scale-105 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-gradient-to-r from-primary to-secondary dark:hover:bg-secondary dark:focus:ring-primary">
                @if (request()->session()->has('user'))
                    Dashboard
                @else
                    Get started
                @endif
            </a>
            <button data-collapse-toggle="navbar-sticky" type="button" class="inline-flex items-center justify-center w-10 h-10 p-2 text-sm text-gray-500 transition-opacity duration-300 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:text-white dark:hover:bg-primary dark:focus:ring-primary" aria-controls="navbar-sticky" aria-expanded="false" onclick="toggleDropdown()">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                </svg>
            </button>
        </div>
        <div id="navbar-sticky" class="absolute left-0 right-0 hidden w-full px-4 pt-4 pb-6 transition-all duration-300 ease-in-out transform scale-95 bg-white border border-gray-200 rounded-lg shadow-lg opacity-0 top-16 md:relative md:top-0 md:flex md:w-auto md:opacity-100 md:scale-100 md:bg-transparent md:border-0 md:shadow-none md:mx-6">
            <ul class="flex flex-col items-center justify-center font-medium md:flex-row md:space-x-8">
                <li class="w-full md:w-auto">
                    <a href="{{ route('home') }}" class="block w-full px-3 py-2 text-gray-900 transition-all duration-300 rounded md:w-auto hover:text-primary md:p-0">Home</a>
                </li>
                <li class="w-full md:w-auto">
                    <a href="{{ route('page.kolam.cerdas') }}" class="block w-full px-3 py-2 text-gray-900 transition-all duration-300 rounded md:w-auto hover:text-primary md:p-0">KolamCerdas</a>
                </li>
                <li class="w-full md:w-auto">
                    <a href="{{ route('page.tanya.kolam') }}" class="block w-full px-3 py-2 text-gray-900 transition-all duration-300 rounded md:w-auto hover:text-primary md:p-0">TanyaKolam</a>
                </li>
                <li class="w-full md:w-auto">
                    <a href="{{ route('page.academy') }}" class="block w-full px-3 py-2 text-gray-900 transition-colors duration-200 rounded md:w-auto hover:bg-gray-100 md:hover:bg-transparent md:hover:text-primary md:p-0">Academy</a>
                </li>
                <li class="w-full md:w-auto">
                    <a href="{{ route('page.marketplace') }}" class="block w-full px-3 py-2 text-gray-900 transition-colors duration-200 rounded md:w-auto hover:bg-gray-100 md:hover:bg-transparent md:hover:text-primary md:p-0">Marketplace</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<script>
    function toggleDropdown() {
        var button = document.querySelector('[data-collapse-toggle="navbar-sticky"]');
        var element = document.getElementById("navbar-sticky");

        button.style.opacity = "0.5";
        setTimeout(() => {
            button.style.opacity = "1";
        }, 300);

        if (element.classList.contains("hidden")) {
            element.classList.remove("hidden", "opacity-0", "scale-95");
            element.classList.add("block", "opacity-100", "scale-100");
        } else {
            element.classList.remove("block", "opacity-100", "scale-100");
            element.classList.add("hidden", "opacity-0", "scale-95");
        }
    }
</script>
