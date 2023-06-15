<?php

session_start();

require './koneksi/inc_koneksi.php';
require './helpers/queryFunc.php';
require './helpers/cartFunc.php';
require './helpers/cartRequest.php';
require './helpers/formatRupiah.php';
// // require './helpers/randNumOrder.php';

?>

<!DOCTYPE html>
<html lang="en" class="bg-[#fff]">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dafitosz</title>
    <link rel="stylesheet" href="public/css/main.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@3.0.22/dist/full.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <?php include './public/component/cartContent.php'; ?>
    <nav class="w-[90%] m-auto mt-2 py-3 flex justify-between items-center sticky top-0 z-40 bg-white">
        <div class="logo__content">
            <div class="font-bold text-2xl text-[#222]">Dafitosz</div>
        </div>
        <ul class="flex gap-5 items-center">
            <li><a href="./">Home</a></li>
            <li><a href="index.php?page=products">Products</a></li>
            <li><span class="text-3xl relative text-[#222] cursor-pointer" id="btn-cart">
                    <i class='bx bx-shopping-bag'></i>
                    <span
                        class="bg-[#e73737] absolute left-[50%] text-sm w-[20px] h-[20px] rounded-3xl text-center text-white">
                        <?= $totalItems ?></span>
                </span>
            </li>
            <li class="ms-5">
                <div class="dropdown dropdown-end">
                    <label tabindex="0" class="cursor-pointer flex items-center gap-5">
                        <span>
                            <?php
                                if(!isset($_SESSION['username'])){
                                    echo 'Sign in';
                                }
                                else{
                                    echo $_SESSION['username'];
                                }
                            ?>
                        </span>
                        <div class="avatar">
                            <div class="w-[25px] rounded-full ring ring-primary ring-offset-base-100 ring-offset-2">
                                <img src="/images/stock/photo-1534528741775-53994a69daeb.jpg" />
                            </div>
                        </div>
                    </label>
                    <ul tabindex="0" class="dropdown-content menu p-2 shadow bg-base-100 rounded-box w-52">
                        <li><a>Item 1</a></li>
                        <li><a><a href="logout.php">Logout</a></a></li>
                    </ul>
                </div>
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
    <script src="helpers/myJs.js"></script>
</body>

</html>

<?php
        if (isset($_GET['must_login'])) {
            require_once 'login.php';
        }
?>