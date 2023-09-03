<!DOCTYPE html>
<html lang="en" class="bg-white">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rumah Jahit MDS</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@3.0.22/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="admin/assets/js/jquery.min.js"></script>
</head>

<body>
    <?php include 'menu.php'; ?>
    <!-- MAIN CONTENT -->
    <main class="min-h-screen">
        <?php

        if (isset($_GET['page'])) {
            if ($_GET['page'] == 'album') {
                if (@$_GET['act'] == 'view') {
                    require_once 'detail.php';
                } else {
                    require_once 'album.php';
                }
            } elseif ($_GET['page'] == 'blog') {
                require_once 'blog.php';
            } elseif ($_GET['page'] == 'faq') {
                require_once 'faq.php';
            } elseif ($_GET['page'] == 'contact') {
                require_once 'contact.php';
            } elseif ($_GET['page'] == 'about') {
                require_once 'about.php';
            } elseif ($_GET['page'] == 'kualitas') {
                require_once 'kualitas.php';
            } elseif ($_GET['page'] == 'ukur') {
                require_once 'ukur.php';
            } elseif ($_GET['page'] == 'order') {
                require_once 'order.php';
            } elseif ($_GET['page'] == 'tarif') {
                require_once 'tarif.php';
            } elseif ($_GET['page'] == 'pengiriman') {
                require_once 'pengiriman.php';
            }
        } else {
            require_once 'home.php';
        }

        ?>
    </main>

    <footer class="footer footer-center p-4 bg-[#222] text-base-content">
        <div>
            <p>Copyright © 2023 - All right reserved by Rumah Jahit MDS</p>
        </div>
    </footer>
</body>

</html>