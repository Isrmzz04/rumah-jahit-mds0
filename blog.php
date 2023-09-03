<?php

$blog_datas = [
    [
        "id" => "1",
        "title" => "Set Baju Keluarga",
        "description" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil architecto, blanditiis molestias dolore pariatur nemo asperiores quidem veritatis repudiandae laborum eligendi error incidunt minus ad! Necessitatibus magnam hic facilis quaerat?",
        "create_at" => "1 September 2023"
    ],
    [
        "id" => "2",
        "title" => "Set Baju Wisuda",
        "description" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil architecto, blanditiis molestias dolore pariatur nemo asperiores quidem veritatis repudiandae laborum eligendi error incidunt minus ad! Necessitatibus magnam hic facilis quaerat?",
        "create_at" => "2 September 2023"
    ],
    [
        "id" => "3",
        "title" => "Set Baju Couple",
        "description" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil architecto, blanditiis molestias dolore pariatur nemo asperiores quidem veritatis repudiandae laborum eligendi error incidunt minus ad! Necessitatibus magnam hic facilis quaerat?",
        "create_at" => "3 September 2023"
    ]
]

    ?>

<div class="px-4 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-20">
    <div class="max-w-xl mb-10 md:mx-auto sm:text-center lg:max-w-2xl md:mb-12">        
        <h2
            class="max-w-lg mb-6 text-3xl font-bold leading-none tracking-tight text-gray-900 sm:text-4xl md:mx-auto text-center">
            <span class="relative inline-block">
                <svg viewBox="0 0 52 24" fill="currentColor"
                    class="absolute top-0 left-0 z-0 hidden w-32 -mt-8 -ml-20 text-blue-gray-100 lg:w-32 lg:-ml-28 lg:-mt-10 sm:block">
                    <defs>
                        <pattern id="db164e35-2a0e-4c0f-ab05-f14edc6d4d30" x="0" y="0" width=".135" height=".30">
                            <circle cx="1" cy="1" r=".7"></circle>
                        </pattern>
                    </defs>
                    <rect fill="url(#db164e35-2a0e-4c0f-ab05-f14edc6d4d30)" width="52" height="24"></rect>
                </svg>

            </span>
            Ragam Contoh Hasil Jahit MDS
        </h2>
        <p class="text-base text-gray-700 md:text-lg text-center">
            Jahitan berkualitas, nyaman, dan cocok digunakan untuk keluarga.
        </p>
    </div>
    <div class="grid max-w-sm gap-5 mb-8 lg:grid-cols-3 sm:mx-auto lg:max-w-full">
        <?php
        foreach ($blog_datas as $list) {
            ?>
            <div class="px-10 py-20 text-center border rounded-lg lg:px-5 lg:py-10 xl:py-20">
                <p class="mb-2 text-xs font-semibold tracking-wide text-gray-600 uppercase">
                    <?= $list["create_at"] ?>
                </p>
                <a href="/"
                    class="text-black/80 inline-block max-w-xs mx-auto mb-3 text-2xl font-extrabold leading-7 transition-colors duration-200 hover:text-deep-purple-accent-400"
                    aria-label="Read article" title="<?= $list["title"] ?>">
                    <?= $list["title"] ?>
                </a>
                <p class="max-w-xs mx-auto mb-2 text-gray-700">
                    <?php echo substr($list["description"], 0, 100)."..." ?>
                </p>
                <a href="/" aria-label=""
                    class="inline-flex items-center font-semibold transition-colors duration-200 text-deep-purple-accent-400 hover:text-deep-purple-800">Lihat Selengkapnya</a>
            </div>
        <?php } ?>
    </div>
</div>