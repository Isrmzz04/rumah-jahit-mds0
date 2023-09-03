<?php
$id_produk = $_GET["id"];

$ambil = $koneksi->query("SELECT * FROM produk LEFT JOIN kategori ON produk.id_kategori=kategori.id_kategori WHERE id_produk='$id_produk'");
$detail = $ambil->fetch_assoc();

$fotoproduk = array();
$getfoto = $koneksi->query("SELECT * FROM produk_foto WHERE id_produk='$id_produk'");
while ($detailfoto = $getfoto->fetch_assoc()) {
    $fotoproduk[] = $detailfoto;
}

// echo "<pre>";
// // print_r($detail);
// print_r($fotoproduk);
// echo "</pre>";
?>
<h2 class="text-[#222] font-bold text-4xl">DETAIL PRODUK</h2>
<table class="table mt-10">
    <tr>
        <th>Kategori</th>
        <td>
            <?php echo $detail["nama_kategori"] ?>
        </td>
    </tr>
    <tr>
        <th>Produk</th>
        <td>
            <?php echo $detail["nama_produk"] ?>
        </td>
    </tr>
    <tr>
        <th>Harga</th>
        <td>Rp.
            <?php echo number_format($detail["harga_produk"]) ?>
        </td>
    </tr>
    <tr>
        <th>Deskripsi</th>
        <td>
            <?php echo $detail["deskripsi_produk"] ?>
        </td>
    </tr>
    <tr>
        <th>Stok</th>
        <td>
            <?php echo $detail["stok_produk"] ?>
        </td>
    </tr>
</table>

<div class="row">
    <?php foreach ($fotoproduk as $key => $value): ?>
        <div class="col-md-3 text-center">
            <img src="../assets/images/products/<?php echo $value["nama_produk_foto"] ?>" alt="" class="img-responsive">
            <img src="../assets/images/products/detail_products/<?php echo $value["nama_produk_foto"] ?>" alt=""
                class="img-responsive">
            <br>
            <a href="index.php?halaman=hapusfotoproduk&idfoto=<?php echo $value["id_produk_foto"] ?>&idproduk=<?php echo $id_produk ?>"
                class="btn btn-danger btn-sm">Hapus Foto</a>
        </div>
    <?php endforeach ?>
</div>

<hr>

<form action="" enctype="multipart/form-data" method="post" class="mt-10">
    <div class="form-group mb-10">
        <label for="">File Foto</label>
        <input type="file" name="produk_foto">
    </div>
    <div class="flex justify-end gap-3 mt-10">
        <button class="btn btn-primary" value="simpan" name="simpan">Simpan</button>
        <a href="index.php?halaman=produk" class="btn btn-default">Kembali</a>
    </div>
</form>

<?php
if (isset($_POST["simpan"])) {
    $lokasifoto = $_FILES["produk_foto"]["tmp_name"];
    $namafoto = $_FILES["produk_foto"]["name"];
    move_uploaded_file($lokasifoto, "../assets/images/products/detail_products/" . $namafoto);

    $koneksi->query("INSERT INTO produk_foto(id_produk,nama_produk_foto)VALUES ('$id_produk','$namafoto')");

    echo "<script>alert('Foto produk berhasil di simpan');</script>";
    echo "<script>location='index.php?halaman=detailproduk&id=$id_produk';</script>";
}
?>