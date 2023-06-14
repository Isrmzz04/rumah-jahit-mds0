<?php

require 'randNumOrder.php';

// Fungsi untuk mendapatkan seluruh item dalam keranjang
function getCartItems()
{
    if (isset($_SESSION['cart'])) {
        return $_SESSION['cart'];
    } else {
        return [];
    }
}

// Fungsi untuk menyimpan keranjang belanja ke dalam database MySQL
function saveCartToDatabase()
{
    global $conn;

    // Menghapus semua data keranjang belanja yang ada di database
    $sqlDelete = "DELETE FROM cart_items";
    $conn->query($sqlDelete);

    // Mendapatkan seluruh item dalam keranjang
    $cartItems = getCartItems();

    // Menyimpan setiap item dalam keranjang ke database
    foreach ($cartItems as $item) {
        $kd_product = $item['kd_product'];
        $name = $item['name'];
        $price = $item['price'];
        $quantity = $item['quantity'];

        $sqlInsert = "INSERT INTO cart_items (kd_product, name, price, quantity) VALUES ('$kd_product', '$name', '$price', '$quantity')";
        $conn->query($sqlInsert);
    }
}

// Fungsi untuk memuat keranjang belanja dari database MySQL
function loadCartFromDatabase()
{
    global $conn;

    // Menghapus seluruh item dalam keranjang dari session
    $_SESSION['cart'] = [];

    // Mengambil data item dari database
    $sqlSelect = "SELECT * FROM carts";
    $result = $conn->query($sqlSelect);

    if ($result->num_rows > 0) {
        // Menambahkan setiap item ke dalam keranjang
        while ($row = $result->fetch_assoc()) {
            $item = [
                'kd_product' => $row['kd_product'],
                'name' => $row['name'],
                'price' => $row['price'],
                'quantity' => $row['quantity']
            ];
            $_SESSION['cart'][] = $item;
        }
    }
}


// Fungsi untuk checkout (memindahkan item dari keranjang belanja ke tabel transaksi)
function checkout()
{
    // Mendapatkan seluruh item dalam keranjang
    $cartItems = getCartItems();

    // Memasukkan item dari keranjang belanja ke tabel transaksi
    global $conn;
    global $no_order;
    foreach ($cartItems as $item) {
        $kd_product = $item['kd_product'];
        $product_name = $item['name'];
        $product_price = $item['price'];
        $quantity = $item['quantity'];

        // Simpan item ke tabel transaksi
        $sqlInsert = "INSERT INTO transactions (no_order, kd_product, product_name, product_price, quantity) VALUES ('$no_order', '$kd_product', '$product_name', '$product_price', '$quantity')";
        $conn->query($sqlInsert);
    }

    // Mengosongkan keranjang belanja
    $_SESSION['cart'] = [];

    // Menghapus data item dari tabel cart_items
    $sqlDelete = "DELETE FROM cart_items";
    $conn->query($sqlDelete);

    // Redirect ke halaman sukses atau halaman lain yang diinginkan
    if ($sqlInsert) {
        echo "<script>alert('Berhasil checkout!');document.location.href='index.php';</script>";
    } else {
        echo "<script>alert('Gagal checkout!');document.location.href='index.php';</script>";
    }
}


?>