<h2 class="text-[#222] font-bold text-4xl">TAMBAH KATEGORI</h2>

<form action="" method="POST" class="mt-10">
    <div class="form-group">
        <label>Nama Kategori</label>
        <input class="form-control" name="nama_kategori" type="text" required>
    </div>
    <div class="flex justify-end gap-3 mt-10">
        <button class="btn btn-primary" name="save">Simpan</button>
        <a href="index.php?halaman=kategori" class="btn btn-default">Kembali</a>
    </div>
</form>

<?php

if (isset($_POST['save'])) {
    $nama_kategori = $_POST['nama_kategori'];

    $koneksi->query("INSERT INTO kategori
    (nama_kategori)
    VALUES('$nama_kategori')");

    echo "<div class='alert alert-info'>DATA TERSIMPAN</div>";
    echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=kategori'>";
}

?>