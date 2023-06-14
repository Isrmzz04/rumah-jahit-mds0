<?php
// Cek apakah ada permintaan untuk menambahkan item ke keranjang
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_to_cart'])) {
    $kd_product = $_POST['kd_product'];

    if (isset($_SESSION['cart'])) {
        $cartItemIndex = false;

        // Mencari indeks item dalam keranjang belanja
        foreach ($_SESSION['cart'] as $index => $item) {
            if ($item['kd_product'] === $kd_product) {
                $cartItemIndex = $index;
                break;
            }
        }

        // Jika item sudah ada dalam keranjang belanja, tambahkan quantity
        if ($cartItemIndex !== false) {
            $_SESSION['cart'][$cartItemIndex]['quantity']++;
        } else {
            // Jika item belum ada dalam keranjang belanja, tambahkan item baru
            $item = [
                'kd_product' => $_POST['kd_product'],
                'name' => $_POST['product_name'],
                'price' => $_POST['product_price'],
                'quantity' => 1
            ];

            $_SESSION['cart'][] = $item;
        }
    } else {
        // Jika keranjang belanja belum ada, tambahkan item baru
        $item = [
            'kd_product' => $_POST['kd_product'],
            'name' => $_POST['product_name'],
            'price' => $_POST['product_price'],
            'quantity' => 1
        ];

        $_SESSION['cart'] = [$item];
    }

    saveCartToDatabase();
    header("Refresh:0");
}


// Cek apakah ada permintaan untuk menghapus item dari keranjang
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['remove_from_cart'])) {
    $index = $_POST['item_index'];

    if (isset($_SESSION['cart'][$index])) {
        array_splice($_SESSION['cart'], $index, 1);
        saveCartToDatabase();
    }

    header("Refresh:0");
}

// Cek apakah ada permintaan untuk mengupdate kuantitas item dalam keranjang
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_quantity'])) {
    $index = $_POST['item_index'];
    $action = $_POST['update_quantity'];
    $quantity = $_SESSION['cart'][$index]['quantity'];

    if ($action === 'increase') {
        $quantity++;
    } elseif ($action === 'decrease' && $quantity > 1) {
        $quantity--;
    }

    $_SESSION['cart'][$index]['quantity'] = $quantity;
    saveCartToDatabase();

    header("Refresh:0");
}

// Cek apakah ada permintaan untuk checkout
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['checkout'])) {
    checkout();
}


?>