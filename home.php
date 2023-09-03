<!-- BANNER -->
<section class="hero w-[90%] m-auto rounded-lg overflow-hidden bg-transparent relative mt-5">
    <div class="absolute z-40 flex justify-center flex-col items-center">
        <div class="text-center text-[#fff] text-4xl font-bold">Buat Pakaianmu <br> di Rumah Jahit MDS</div>
        <a href="?page=album"
            class="btn max-w-[150px] font-medium capitalize mt-5 border-[#fff] text-white hover:border-[#fff]"
            style="background-color: rgba(255,255,255,0.1);">Lihat Album</a>
    </div>
    <div class="carousel h-[80vh]">
        <div id="slide1" class="carousel-item relative w-full">
            <img src="assets/images/banner/banner-1.jpg" class="w-full object-cover brightness-[.8]" />
            <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
                <a href="#slide4" class="btn btn-circle">❮</a>
                <a href="#slide2" class="btn btn-circle">❯</a>
            </div>
        </div>
        <div id="slide2" class="carousel-item relative w-full">
            <img src="assets/images/banner/banner-2.jpg" class="w-full object-cover brightness-[.8]" />
            <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
                <a href="#slide1" class="btn btn-circle">❮</a>
                <a href="#slide3" class="btn btn-circle">❯</a>
            </div>
        </div>
        <div id="slide3" class="carousel-item relative w-full">
            <img src="assets/images/banner/banner-3.jpg" class="w-full object-cover brightness-[.8]" />
            <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
                <a href="#slide2" class="btn btn-circle">❮</a>
                <a href="#slide1" class="btn btn-circle">❯</a>
            </div>
        </div>
    </div>
</section>

<!-- CATEGORY -->
<section class="my-[10rem] w-[90%] m-auto min-h-screen">
    <div class="max-w-screen-xl px-4 py-8 mx-auto sm:px-6 sm:py-12 lg:px-8">
        <header class="text-center">
            <h2 class="text-3xl font-bold text-[#222] lg:text-4xl ">
                Kategori
            </h2>

            <p class="max-w-md mx-auto mt-4 text-gray-500">
                Kami menyajikan produk-produk kami dalam tampilan daftar yang rinci dan terurut. Ini adalah pilihan yang
                sempurna untuk melihat detail setiap produk dengan cermat
            </p>
        </header>

        <ul class="grid grid-cols-1 gap-4 mt-8 lg:grid-cols-3">
            <li>
                <div class="relative block group rounded-lg overflow-hidden">
                    <img src="./assets/images/category/cat-1.jpg" alt=""
                        class="object-cover w-full transition duration-500 aspect-square group-hover:opacity-90" />

                    <div class="absolute inset-0 flex flex-col items-start justify-end p-6">
                        <h3 class="text-xl font-medium text-white">Kategori A</h3>

                        <a href="?page=album"
                            class="mt-1.5 rounded-lg inline-block bg-black px-5 py-3 text-xs font-medium uppercase tracking-wide text-white hover:bg-blue-500 transition-all">
                            Selengkapnya
                        </a>
                    </div>
                </div>
            </li>

            <li>
                <div class="relative block group rounded-lg overflow-hidden">
                    <img src="./assets/images/category/cat-2.jpg" alt="./assets/images/category/cat-2.jpg"
                        class="object-cover w-full transition duration-500 aspect-square group-hover:opacity-90" />

                    <div class="absolute inset-0 flex flex-col items-start justify-end p-6">
                        <h3 class="text-xl font-medium text-white">Kategori B</h3>

                        <a href="?page=album"
                            class="mt-1.5 rounded-lg inline-block bg-black px-5 py-3 text-xs font-medium uppercase tracking-wide text-white hover:bg-blue-500 transition-all">
                            Selengkapnya
                        </a>
                    </div>
                </div>
            </li>

            <li class="lg:col-span-2 lg:col-start-2 lg:row-span-2 lg:row-start-1">
                <div class="relative block group rounded-lg overflow-hidden">
                    <img src="./assets/images/category/cat-3.jpg" alt=""
                        class="object-cover w-full transition duration-500 aspect-square group-hover:opacity-90" />

                    <div class="absolute inset-0 flex flex-col items-start justify-end p-6">
                        <h3 class="text-xl font-medium text-white">Kategori C</h3>

                        <a href="?page=album"
                            class="mt-1.5 rounded-lg inline-block bg-black px-5 py-3 text-xs font-medium uppercase tracking-wide text-white hover:bg-blue-500 transition-all">
                            Selengkapnya
                        </a>
                    </div>
                </div>
            </li>
        </ul>
    </div>

</section>