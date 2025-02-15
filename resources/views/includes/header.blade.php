<header 
    x-data="sidebar"
    class="sticky top-0 flex w-full py-3 bg-white z-999 drop-shadow-1 dark:bg-boxdark dark:drop-shadow-none lg:hidden">
    <div class="flex items-center justify-between flex-grow px-4 py-4 shadow-2 md:px-6 2xl:px-11">
        <div class="flex items-center gap-2 sm:gap-4">
            <button 
                class="z-99999 block rounded-sm border border-primary bg-primary text-white p-1.5 shadow-sm dark:border-strokedark dark:bg-boxdark" 
                @click="toggleSidebar">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
            </button>
            <h1 class="text-2xl font-bold text-transparent lg:text-3xl bg-gradient-to-r from-primary to-secondary bg-clip-text ">
                Marivora
            </h1>
        </div>
    </div>
</header>
