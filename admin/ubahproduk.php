<h2 class="text-[#222] font-bold text-4xl">UBAH PRODUK</h2>
<?php
$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$_GET[id]'");
$pecah = $ambil->fetch_assoc();
?>

<?php
$datakategori = array();
$ambil = $koneksi->query("SELECT * FROM kategori");
while ($data = $ambil->fetch_assoc()) {
    $datakategori[] = $data;
}

// echo "<pre>";
// print_r($datakategori);
// echo "</pre>";
?>

<form method="post" enctype="multipart/form-data" class="mt-10">
    <div class="form-group">
        <label>Kategori</label>
        <select name="id_kategori" class="form-control">
            <option value="">Pilih Kategori</option>
            <?php foreach ($datakategori as $key => $value): ?>
                <option value="<?php echo $value["id_kategori"] ?>" <?php if ($pecah["id_kategori"] == $value["id_kategori"]) {
                       echo "selected";
                   } ?>>
                    <?php echo $value["nama_kategori"] ?></option>
            <?php endforeach ?>
        </select>
    </div>
    <div class="form-group">
        <label>Nama</label>
        <input class="form-control" name="nama" type="text" value="<?php echo $pecah['nama_produk']; ?>">
    </div>
    <div class="form-group">
        <label>Harga</label>
        <input class="form-control" name="harga" type="number" value="<?php echo $pecah['harga_produk']; ?>">
    </div>
    <div class="form-group">
        <img src="../assets/images/products/<?php echo $pecah['foto_produk'] ?>" width="150">
    </div>
    <div class="form-group">
        <label>Ubah Foto</label>
        <input type="file" class="form-control" name="foto" />
    </div>
    <div class="form-group">
        <label>Text area</label>
        <textarea class="form-control" rows="10" name="deskripsi"><?php echo $pecah['deskripsi_produk']; ?></textarea>
    </div>
    <div class="form-group">
        <label>Stok Produk</label>
        <input type="number" class="form-control" name="stok" value="<?php echo $pecah['stok_produk'] ?>" />
    </div>
    <div class="flex justify-end gap-3 mt-10">
        <button class="btn btn-primary" name="update">Simpan</button>
        <a href="index.php?halaman=produk" class="btn btn-default">Kembali</a>
    </div>
</form>

<?php
if (isset($_POST['update'])) {
    $namafoto = $_FILES['foto']['name'];
    $lokasifoto = $_FILES['foto']['tmp_name'];
    if (!empty($lokasifoto)) {
        move_uploaded_file($lokasifoto, "../assets/images/products/$namafoto");

        $koneksi->query("UPDATE produk SET
        nama_produk='$_POST[nama]', harga_produk='$_POST[harga]', foto_produk='$namafoto', deskripsi_produk='$_POST[deskripsi]', stok_produk='$_POST[stok]',id_kategori=$_POST[id_kategori]
        WHERE id_produk='$_GET[id]'");
    } else {
        $koneksi->query("UPDATE produk SET
        nama_produk='$_POST[nama]', harga_produk='$_POST[harga]', deskripsi_produk='$_POST[deskripsi]', stok_produk='$_POST[stok]',id_kategori=$_POST[id_kategori]
        WHERE id_produk='$_GET[id]'");
    }

    echo "<script>alert('produk berhasil di update');</script>";
    echo "<script>location='index.php?halaman=produk';</script>";
}
?>