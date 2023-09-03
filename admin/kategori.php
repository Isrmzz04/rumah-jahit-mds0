<h2 class="text-[#222] font-bold text-4xl">DATA KATEGORI</h2>
<br>

<?php
$alldata = array();
$ambil = $koneksi->query("SELECT * FROM kategori");
while ($data = $ambil->fetch_assoc()) {
    $alldata[] = $data;
}
;

// echo "<pre>";
// print_r($alldata);
// echo "</pre>";
?>
<div class="mt-10">
    <a href="index.php?halaman=tambahkategori" class="btn btn-primary">+ Tambah Data</a>
</div>
<table class="table table-bordered mt-5">
    <thead>
        <tr>
            <th>No</th>
            <th>Kategori</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($alldata as $key => $value): ?>
            <tr>
                <td>
                    <?php echo $key + 1 ?>
                </td>
                <td>
                    <?php echo $value["nama_kategori"] ?>
                </td>
                <td>
                    <a href="index.php?halaman=ubahkategori&id=<?php echo $value['id_kategori']; ?>"
                        class="btn btn-warning">Ubah</a>
                    <a href="index.php?halaman=hapuskategori&id=<?php echo $value['id_kategori']; ?>"
                        class="btn btn-danger">Delete</a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>