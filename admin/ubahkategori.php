<h2 class="text-[#222] font-bold text-4xl">UBAH KATEGORI</h2>
<?php
$ambil = $koneksi->query("SELECT * FROM kategori WHERE id_kategori='$_GET[id]'");
$pecah = $ambil->fetch_assoc();
?>

<form method="post" enctype="multipart/form-data" class="mt-10">
    <div class="form-group">
        <label>Nama Kategori</label>
        <input class="form-control" name="nama" type="text" value="<?php echo $pecah['nama_kategori']; ?>">
    </div>
    <div class="flex justify-end gap-3">
        <button class="btn btn-primary" name="update">Update Data</button>
        <a href="index.php?halaman=kategori" class="btn btn-default">Kembali</a>
    </div>
</form>

<?php
if (isset($_POST['update'])) {

    $koneksi->query("UPDATE kategori SET nama_kategori='$_POST[nama]' WHERE id_kategori='$_GET[id]'");

    echo "<script>alert('produk berhasil di update');</script>";
    echo "<script>location='index.php?halaman=kategori';</script>";
}
?>