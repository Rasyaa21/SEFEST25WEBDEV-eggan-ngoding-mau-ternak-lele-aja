<div class="flex flex-col items-center justify-start w-full min-h-screen">
    <div class="w-full mt-28"></div>
    <h1 class="text-3xl font-bold text-transparent lg:text-4xl bg-gradient-to-r from-primary to-secondary bg-clip-text motion-opacity-in-0 motion-translate-y-in-100 motion-blur-in-md">
        MarketPlace
    </h1>
    <div class="w-full max-w-[75%] lg:max-w-[33%] h-[48px] bg-white rounded-2xl shadow-xl mt-10 p-4 flex items-center gap-2 mb-4">
        <i class="text-gray-500 fa fa-magnifying-glass"></i>
        <input type="text" wire:model.defer="searchTerm" wire:keyup="search" class="flex-1 p-1 text-gray-800 rounded-md outline-none" placeholder="Search...">
    </div>
    <div class="flex flex-wrap justify-center gap-2 px-4 mb-8">
        <button wire:click="filterByCategory('')" class="px-4 py-2 text-sm font-medium transition duration-300 rounded-full cursor-pointer md:text-base" :class="{ 'bg-gradient-to-r from-primary to-secondary text-white': @js($category === ''), 'bg-white text-gray-900 border border-blue-200': @js($category !== '') }">
            Semua
        </button>
        <button wire:click="filterByCategory('Peralatan Pemancingan')" class="px-4 py-2 text-sm font-medium transition duration-300 rounded-full cursor-pointer md:text-base" :class="{ 'bg-gradient-to-r from-primary to-secondary text-white': @js($category === 'Peralatan Pemancingan'), 'bg-white text-gray-900 border border-blue-200': @js($category !== 'Peralatan Pemancingan') }">
            Peralatan Pemancingan
        </button>
        <button wire:click="filterByCategory('Aksesoris Kolam')" class="px-4 py-2 text-sm font-medium transition duration-300 rounded-full cursor-pointer md:text-base" :class="{ 'bg-gradient-to-r from-primary to-secondary text-white': @js($category === 'Aksesoris Kolam'), 'bg-white text-gray-900 border border-blue-200': @js($category !== 'Aksesoris Kolam') }">
            Aksesoris Kolam
        </button>
        <button wire:click="filterByCategory('Ikan & Pakan')" class="px-4 py-2 text-sm font-medium transition duration-300 rounded-full cursor-pointer md:text-base" :class="{ 'bg-gradient-to-r from-primary to-secondary text-white': @js($category === 'Ikan & Pakan'), 'bg-white text-gray-900 border border-blue-200': @js($category !== 'Ikan & Pakan') }">
            Ikan & Pakan
        </button>
        <button wire:click="filterByCategory('Dekorasi')" class="px-4 py-2 text-sm font-medium transition duration-300 rounded-full cursor-pointer md:text-base" :class="{ 'bg-gradient-to-r from-primary to-secondary text-white': @js($category === 'Dekorasi'), 'bg-white text-gray-900 border border-blue-200': @js($category !== 'Dekorasi') }">
            Dekorasi
        </button>
    </div>

    <section class="flex flex-wrap justify-center gap-5 px-4 mb-6 sm:px-8 md:px-32">
        @foreach ($products as $product)
        <a href="product/{{$product->id}}" class="block w-full max-w-xs md:max-w-sm lg:w-1/6 lg:max-w-[200px] flex-grow rounded-xl overflow-hidden bg-white shadow-md hover:shadow-lg transition duration-300">
            <div class="relative">
                <img src="{{ asset('storage/' . $product->product_image) }}" alt="Product Image" class="object-cover w-full h-40 md:h-48 rounded-t-xl">
                <span class="absolute top-2 left-2 bg-yellow-500 text-white text-[10px] md:text-[12px] font-semibold px-2 md:px-3 py-[2px] md:py-[3px] rounded-md shadow">
                    {{$product->category}}
                </span>
            </div>
            <div class="p-3 md:p-4">
                <h2 class="text-[13px] md:text-[15px] font-semibold text-gray-800 leading-snug truncate">
                    {{$product->product_name}}
                </h2>
                <div class="mt-0.5 text-red-500 font-bold text-base md:text-lg">
                    Rp{{ number_format($product->price, 0, ',', '.') }}
                </div>
                <div class="flex items-center mt-2 text-xs text-gray-600 md:text-sm">
                    <i class="fa fa-box text-yellow-500 mr-1.5"></i>
                    <span class="font-medium">{{$product->stock}} Stock</span>
                </div>
            </div>
        </a>
        @endforeach

        @if($products->isEmpty())
        <div class="flex flex-col items-center justify-center">
            <i class="text-lg text-red-400 fa fa-heart-crack"></i>
            <span>Maaf! Produk yang kamu cari tidak ditemukan.</span>
        </div>
        @endif
    </section>

    <div class="mb-8">
        {{ $products->links() }}
    </div>


</div>
