<?php

$ambil = $koneksi->query("SELECT * FROM produk_foto WHERE id_produk='$_GET[id]'");
if ($ambil->num_rows > 0) {
    $pecah = $ambil->fetch_assoc();
    $fotoproduk = $pecah['foto_produk'];
    if (file_exists("../assets/images/products/$fotoproduk")) {
        unlink("../assets/images/products/$fotoproduk");
    }
}

$koneksi->query("DELETE FROM produk WHERE id_produk='$_GET[id]'");

echo "<script>alert('produk dihapus');</script>";
echo "<script>location='index.php?halaman=produk';</script>";

?>