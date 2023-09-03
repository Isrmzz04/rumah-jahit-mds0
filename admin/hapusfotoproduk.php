<?php 
$id_foto = $_GET["idfoto"];
$id_produk = $_GET["idproduk"];

$ambilfoto = $koneksi->query("SELECT * FROM produk_foto WHERE id_produk_foto='$id_foto'");
$detailfoto = $ambilfoto->fetch_assoc();

$getnamefoto = $detailfoto["nama_produk_foto"];

//hapus file foto dari folder
unlink("assets/foto_produk/detail_foto/".$getnamefoto);

// echo "<pre>";
// print_r($detailfoto);
// echo "</pre>";

$koneksi->query("DELETE FROM produk_foto WHERE id_produk_foto='$id_foto'");

echo "<script>alert('Foto produk berhasil di hapus');</script>";
echo "<script>location='index.php?halaman=detailproduk&id=$id_produk';</script>";
?>