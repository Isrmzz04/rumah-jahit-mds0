<h2 class="text-[#222] font-bold text-4xl">UBAH PELANGGAN</h2>
<?php
$ambil = $koneksi->query("SELECT * FROM pelanggan WHERE id_pelanggan='$_GET[id]'");
$pecah = $ambil->fetch_assoc();
?>

<form method="post" enctype="multipart/form-data" class="mt-10">
    <div class="form-group">
        <label>Email pelanggan</label>
        <input class="form-control" name="email_pelanggan" type="email" value="<?php echo $pecah['email_pelanggan']; ?>">
    </div>
    <div class="form-group">
        <label>Password pelanggan</label>
        <input class="form-control" name="password_pelanggan" type="text" value="<?php echo $pecah['password_pelanggan']; ?>">
    </div>
    <div class="form-group">
        <label>Nama pelanggan</label>
        <input class="form-control" name="nama_pelanggan" type="text" value="<?php echo $pecah['nama_pelanggan']; ?>">
    </div>
    <div class="form-group">
        <label>Alamat pelanggan</label>
        <input class="form-control" name="alamat_pelanggan" type="text" value="<?php echo $pecah['alamat_pelanggan']; ?>">
    </div>
    <div class="form-group">
        <label>Telepon pelanggan</label>
        <input class="form-control" name="telepon_pelanggan" type="text" value="<?php echo $pecah['telepon_pelanggan']; ?>">
    </div>
    <div class="flex justify-end gap-3">
        <button class="btn btn-primary" name="update">Update Data</button>
        <a href="index.php?halaman=pelanggan" class="btn btn-default">Kembali</a>
    </div>
</form>

<?php
if (isset($_POST['update'])) {
    $email_pelanggan = $_POST['email_pelanggan'];
    $password_pelanggan = $_POST['password_pelanggan'];
    $nama_pelanggan = $_POST['nama_pelanggan'];
    $alamat_pelanggan = $_POST['alamat_pelanggan'];
    $telepon_pelanggan = $_POST['telepon_pelanggan'];

    $koneksi->query("UPDATE pelanggan SET nama_pelanggan='$nama_pelanggan', email_pelanggan='$email_pelanggan', password_pelanggan='$password_pelanggan', alamat_pelanggan='$alamat_pelanggan', telepon_pelanggan='$telepon_pelanggan' WHERE id_pelanggan='$_GET[id]'");

    echo "<script>alert('data berhasil di update');</script>";
    echo "<script>location='index.php?halaman=pelanggan';</script>";
}
?>