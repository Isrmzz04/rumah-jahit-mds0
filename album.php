<?php include "./album_datas.php";

$hasil_pencarian = array();

if (isset($_POST['ok'])) {
    $kata_kunci = $_POST['q'];

    foreach ($produk_datas as $produk) {
        if (stripos($produk['title'], $kata_kunci) !== false) {
            $hasil_pencarian[] = $produk;
        }
    }
}

?>

<section class="w-[90%] m-auto mb-[4rem]">
    <div class="text-4xl text-[#222] font-bold text-center mt-[4rem]">Album</div>

    <div class="flex justify-center mt-10">
        <form action="" method="POST" class="flex items-center gap-2">
            <input type="text" name="q" placeholder="Cari barang..."
                class="bg-white border p-3 w-full lg:w-96 rounded-2xl text-sm">
            <button type="submit" name="ok" class="text-3xl"><i class='bx bx-search'></i></button>
        </form>
    </div>

    <div class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8">
        <?php
        if (isset($kata_kunci)) {
            if (!empty($hasil_pencarian)) { ?>
                <span class="text-gray-700 mb-4">
                    <?php echo 'Hasil Pencarian untuk: "' . htmlspecialchars($kata_kunci) . '"' ?>
                    <br>
                    <a href="?page=album" class="underline">Kembali</a>
                </span>
            <?php } else { ?>
                <span class="text-gray-700 mb-4">
                    <?php echo 'Tidak ada hasil untuk: "' . htmlspecialchars($kata_kunci) . '"' ?>
                </span>
            <?php }
        } ?>
        <div class="mt-[1rem] grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
            <?php
            $data_produk_to_display = empty($hasil_pencarian) ? $produk_datas : $hasil_pencarian;
            foreach ($data_produk_to_display as $produk) {
                ?>
                <div class="group relative shadow rounded-lg">
                    <div
                        class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none group-hover:opacity-75 lg:h-80">
                        <img src="<?= $produk['image'] ?>"
                            class="h-full w-full object-cover object-center lg:h-full lg:w-full">
                    </div>
                    <div class="mt-1 flex justify-between py-3 px-5">
                        <div class="mb-5">
                            <span
                                class="flex gap-1 items-center justify-center rounded-full bg-blue-100 px-2.5 py-0.5 text-blue-700">
                                <i class='bx bx-purchase-tag'></i>
                                <p class="whitespace-nowrap text-sm">Kategori:
                                    <?= $produk['category'] ?>
                                </p>
                            </span>
                            <h3 class="text-md text-gray-900 font-medium mt-3">
                                <a href="index.php?page=album&act=view&id=<?= $produk['id'] ?>" class="font-semibold">
                                    <span aria-hidden="true" class="absolute inset-0"></span>
                                    <?= $produk['title'] ?>
                                </a>
                            </h3>
                            <p class="text-sm">
                                <?= substr($produk['description'], 0, 50) . "..." ?>
                            </p>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>