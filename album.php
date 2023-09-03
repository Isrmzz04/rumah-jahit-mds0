<?php include "./album_datas.php" ?>

<section class="w-[90%] m-auto mb-[4rem]">
    <div class="text-4xl text-[#222] font-bold text-center mt-[4rem]">Album</div>

    <div class="flex justify-center mt-10">
        <form action="" method="POST" class="flex items-center gap-2">
            <input type="text" name="q" placeholder="Cari barang..."
                class="bg-white border p-3 w-full lg:w-96 rounded-2xl text-sm">
            <button type="submit" name="ok" class="text-3xl"><i class='bx bx-search'></i></button>
        </form>
    </div>

    <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
        <div class="mt-[1rem] grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
            <?php
            foreach ($produk_datas as $produk) {

                ?>
                <div class="group relative shadow rounded-lg">
                    <div
                        class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none group-hover:opacity-75 lg:h-80">
                        <img src="<?=$produk['image']?>"
                            class="h-full w-full object-cover object-center lg:h-full lg:w-full">
                    </div>
                    <div class="mt-1 flex justify-between py-5 px-3">
                        <div>
                            <h3 class="text-md text-gray-900 font-medium">
                                <a href="index.php?page=album&act=view&id=<?= $produk['id'] ?>">
                                    <span aria-hidden="true" class="absolute inset-0"></span>
                                    <?= $produk['title'] ?>
                                </a>
                            </h3>
                            <p class="mt-1 text-xs text-white badge badge-secondary">
                                <?= $produk['category'] ?>
                            </p>
                        </div>                        
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>