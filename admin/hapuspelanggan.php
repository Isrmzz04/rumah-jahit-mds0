<?php
$ambil = $koneksi->query("SELECT * FROM pelanggan WHERE id_pelanggan='$_GET[id]'");
$pecah = $ambil->fetch_assoc();

$koneksi->query("DELETE FROM pembelian_produk WHERE id_pembelian IN (SELECT id_pembelian FROM pembelian WHERE id_pelanggan='$_GET[id]')");
$koneksi->query("DELETE FROM pembelian WHERE id_pelanggan='$_GET[id]'");
$koneksi->query("DELETE FROM pelanggan WHERE id_pelanggan='$_GET[id]'");

echo "<script>alert('data pelanggan di hapus');</script>";
echo "<script>location='index.php?halaman=pelanggan';</script>";

?>