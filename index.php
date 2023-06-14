<?php
require './koneksi/inc_koneksi.php';
// require './helpers/cartFunc.php';
// require './helpers/cartRequest.php';
// // require './helpers/randNumOrder.php';
// loadCartFromDatabase(); 
?>

<!DOCTYPE html>
<html lang="en" class="bg-[#fff]">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dafitosz</title>
    <link rel="stylesheet" href="./public/css/main.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@3.0.22/dist/full.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <div class="fixed right-0 w-[25vw] top-0 bottom-0 bg-white shadow hidden target:block z-50 p-5" id="cart">
        <div class="flex justify-end">
            <a href="#" class="text-4xl"><i class='bx bx-x'></i></a>
        </div>
        <span class="text-lg text-[#222] font-semibold">Your Cart</span>
        
    </div>
    <nav class="w-[90%] m-auto mt-2 py-3 flex justify-between items-center sticky top-0 z-40 bg-white">
        <div class="logo__content">
            <div class="font-bold text-2xl text-[#222]">Dafitosz</div>
        </div>
        <ul class="flex gap-5 items-center">
            <li><a href="./">Home</a></li>
            <li><a href="index.php?page=products">Products</a></li>
            <li><a href="">Sign In</a></li>
            <li><a href="#cart" class="text-3xl relative text-[#222]">
                    <i class='bx bx-shopping-bag'></i>
                    <span
                        class="bg-[#e73737] absolute left-[50%] text-sm w-[20px] h-[20px] rounded-3xl text-center text-white">
                        5</span>
                </a>
            </li>
        </ul>
    </nav>
    <main>
        <?php

        if (isset($_GET['page'])) {
            if ($_GET['page'] == 'products') {
                require_once 'products.php';
            } else {
                require_once 'home.php';
            }
        } else {
            require_once 'home.php';
        }

        ?>
    </main>

    <script src="helpers/tabs.js"></script>
</body>

</html>