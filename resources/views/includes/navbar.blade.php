@vite('resources/css/app.css')
<nav class="fixed top-0 z-20 w-full bg-white border-b border-white dark:bg-white start-0 dark:border-white">
    <div class="flex flex-wrap items-center justify-between max-w-screen-xl p-4 mx-auto">
        <a href="https://flowbite.com/" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Flowbite Logo">
            <span class="self-center text-2xl font-semibold text-black dark:text-black">Marivora</span>
        </a>
        <div class="flex space-x-3 md:order-2 md:space-x-0 rtl:space-x-reverse">
            <button type="button" class="lg:px-5">
                <svg class="w-6 h-6 text-black dark:text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-1.4 5M17 13l1.4 5M9 21h6M9 21a2 2 0 11-4 0M15 21a2 2 0 104 0"/>
                </svg>
            </button>
            <button type="button" class="px-5 py-2.5 text-sm font-medium text-center text-white rounded-3xl bg-primary hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-gradient-to-r from-primary to-secondary dark:hover:bg-secondary dark:focus:ring-primary">Get started</button>
            <button data-collapse-toggle="navbar-sticky" type="button" class="inline-flex items-center justify-center w-10 h-10 p-2 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:text-white dark:hover:bg-primary dark:focus:ring-primary" aria-controls="navbar-sticky" aria-expanded="false" onclick="toggleDropdown()">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                </svg>
            </button>
        </div>
        <div id="navbar-sticky" class="absolute left-0 w-full px-4 pt-4 pb-6 transition-all duration-300 transform scale-95 bg-gray-100 border border-white rounded-lg shadow-lg opacity-0 top-16 md:relative md:top-0 md:flex md:w-auto md:opacity-100 md:scale-100 md:bg-transparent md:border-0 md:shadow-none sm:mx-4 md:mx-6">
            <ul class="flex flex-col font-medium md:flex-row md:space-x-8">
                <li>
                    <a href="" class="block px-4 py-3 text-white transition duration-500 ease-in-out transform rounded-md bg-primary md:bg-transparent md:text-black md:p-0 md:dark:text-primary lg:hover:bg-transparent lg:hover:text-black hover:scale-105">Home</a>
                </li>
                <li>
                    <a href="" class="block px-4 py-3 text-gray-900 transition duration-500 ease-in-out transform rounded-md hover:bg-primary hover:text-white hover:px-6 md:hover:bg-transparent md:hover:text-primary md:p-0 md:dark:hover:text-white dark:text-black dark:hover:bg-primary dark:hover:text-white lg:hover:bg-transparent lg:hover:text-black hover:scale-105">KolamCerdas</a>
                </li>
                <li>
                    <a href="" class="block px-4 py-3 text-gray-900 transition duration-500 ease-in-out transform rounded-md hover:bg-primary hover:text-white hover:px-6 md:hover:bg-transparent md:hover:text-primary md:p-0 md:dark:hover:text-white dark:text-black dark:hover:bg-primary dark:hover:text-white lg:hover:bg-transparent lg:hover:text-black hover:scale-105">TanyaKolam</a>
                </li>
                <li>
                    <a href="" class="block px-4 py-3 text-gray-900 transition duration-500 ease-in-out transform rounded-md hover:bg-primary hover:text-white hover:px-6 md:hover:bg-transparent md:hover:text-primary md:p-0 md:dark:hover:text-white dark:text-black dark:hover:bg-primary dark:hover:text-white lg:hover:bg-transparent lg:hover:text-black hover:scale-105">Academy</a>
                </li>
                <li>
                    <a href="" class="block px-4 py-3 text-gray-900 transition duration-500 ease-in-out transform rounded-md hover:bg-primary hover:text-white hover:px-6 md:hover:bg-transparent md:hover:text-primary md:p-0 md:dark:hover:text-white dark:text-black dark:hover:bg-primary dark:hover:text-white lg:hover:bg-transparent lg:hover:text-black hover:scale-105">Marketplace</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<script>
    function toggleDropdown() {
        var element = document.getElementById("navbar-sticky");

        if (element.classList.contains("opacity-0")) {
            element.classList.remove("opacity-0", "scale-95");
            element.classList.add("opacity-100", "scale-100");
        } else {
            element.classList.remove("opacity-100", "scale-100");
            element.classList.add("opacity-0", "scale-95");
        }
    }
</script>
