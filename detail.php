<?php
include "./album_datas.php";

$id = $_GET["id"];
$detail_album = $produk_datas[$id - 1];

?>

<section class="w-[90%] mx-auto">
    <div class="pt-6">
        <nav aria-label="Breadcrumb">
            <ol role="list" class="mx-auto flex max-w-2xl items-center space-x-2 px-4 sm:px-6 lg:max-w-7xl lg:px-8">
                <li>
                    <div class="flex items-center">
                        <a href="index.php?page=album" class="mr-2 text-sm font-medium text-gray-900">Album</a>
                        <svg width="16" height="20" viewBox="0 0 16 20" fill="currentColor" aria-hidden="true"
                            class="h-5 w-4 text-gray-300">
                            <path d="M5.697 4.34L8.98 16.532h1.327L7.025 4.341H5.697z" />
                        </svg>
                    </div>
                </li>
                <li>
                    <div class="flex items-center">
                        <a href="index.php?page=album&act=view&id=<?= $detail_album['id'] ?>"
                            class="mr-2 text-sm font-medium text-gray-500">Detail Barang</a>
                    </div>
                </li>
            </ol>
        </nav>

        <!-- Image gallery -->
        <div class="mx-auto mt-6 max-w-2xl sm:px-6 lg:grid lg:max-w-7xl lg:grid-cols-3 lg:gap-x-8 lg:px-8">
            <div class="aspect-h-4 aspect-w-3 hidden overflow-hidden rounded-lg lg:block">
                <img src="<?= $detail_album['image'] ?>" class="h-full w-full object-cover object-center">
            </div>
            <div class="hidden lg:grid lg:grid-cols-1 lg:gap-y-8">
                <div class="aspect-h-2 aspect-w-3 overflow-hidden rounded-lg">
                    <img src="<?= $detail_album['image'] ?>" alt="Model wearing plain black basic tee."
                        class="max-h-[250px] w-full object-cover object-center">
                </div>
                <div class="aspect-h-2 aspect-w-3 overflow-hidden rounded-lg">
                    <img src="<?= $detail_album['image'] ?>" alt="Model wearing plain gray basic tee."
                        class="max-h-[250px] w-full object-cover object-center">
                </div>
            </div>
            <div class="aspect-h-5 aspect-w-4 lg:aspect-h-4 lg:aspect-w-3 sm:overflow-hidden sm:rounded-lg">
                <img src="<?= $detail_album['image'] ?>" alt="Model wearing plain white basic tee."
                    class="h-full w-full object-cover object-center">
            </div>
        </div>

        <!-- Product info -->
        <div
            class="mx-auto max-w-2xl px-4 pb-16 pt-10 sm:px-6 lg:grid lg:max-w-7xl lg:grid-cols-3 lg:grid-rows-[auto,auto,1fr] lg:gap-x-8 lg:px-8 lg:pb-24 lg:pt-16">
            <div class="lg:col-span-2 lg:border-r lg:border-gray-200 lg:pr-8">
                <h1 class="text-2xl font-bold tracking-tight text-gray-900 sm:text-3xl">
                    <?= $detail_album['title'] ?>
                </h1>
            </div>

            <!-- Options -->
            <div class="mt-4 lg:row-span-3 lg:mt-0">
                <h2 class="sr-only">Product information</h2>
                <p class="text-3xl tracking-tight text-gray-900">
                    Kategori : <span><?= $detail_album['category'] ?></span>
                </p>
            </div>


            <div class="py-10 lg:col-span-2 lg:col-start-1 lg:border-r lg:border-gray-200 lg:pb-16 lg:pr-8 lg:pt-6">
                <div class="mt-10">
                    <h2 class="text-sm font-medium text-gray-900">Description</h2>

                    <div class="mt-4 space-y-6">
                        <p class="text-sm text-gray-600">
                            <?= $detail_album['description'] ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>