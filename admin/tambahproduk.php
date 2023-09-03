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

<h2 class="text-[#222] font-bold text-4xl">TAMBAH PRODUK</h2>

<form method="post" enctype="multipart/form-data" class="mt-10">
    <div class="form-group">
        <label>Kategori</label>
        <select name="id_kategori" class="form-control" required>
            <option value="">Pilih Kategori</option>
            <?php foreach ($datakategori as $key => $value): ?>
                <option value="<?php echo $value["id_kategori"] ?>"><?php echo $value["nama_kategori"] ?></option>
            <?php endforeach ?>
        </select>
    </div>
    <div class="form-group">
        <label>Nama</label>
        <input class="form-control" name="nama" type="text" required>
    </div>
    <div class="form-group">
        <label>Harga</label>
        <input class="form-control" name="harga" type="number" required>
    </div>
    <div class="form-group">
        <label>Berat</label>
        <input class="form-control" name="berat" type="number" required>
    </div>
    <div class="form-group">
        <label>Foto</label>
        <div class="letak-input" style="margin-bottom: 10px;">
            <input type="file" class="form-control" name="foto[]" required>
        </div>
        <span class="btn btn-primary btn-tambah"><i class="fa fa-plus"></i></span>
        <span class="text-danger">Maksimal Total Ukuran Semua Foto 2MB</span>
    </div>
    <div class="form-group">
        <label>Text area</label>
        <textarea class="form-control" rows="10" name="deskripsi" required></textarea>
    </div>
    <div class="form-group">
        <label>Stok</label>
        <input class="form-control" name="stok" type="number" required>
    </div>
    <div class="flex justify-end gap-3 mt-10">
        <button class="btn btn-primary" name="save">Simpan</button>
        <a href="index.php?halaman=produk" class="btn btn-default">Kembali</a>
    </div>
</form>
<?php
if (isset($_POST['save'])) {
    $namanamafoto = $_FILES['foto']['name'];
    $lokasilokasifoto = $_FILES['foto']['tmp_name'];
    move_uploaded_file($lokasilokasifoto[0], "../assets/images/products/" . $namanamafoto[0]);
    $koneksi->query("INSERT INTO produk
    (nama_produk,harga_produk,berat_produk,foto_produk,deskripsi_produk,stok_produk,id_kategori)
    VALUES('$_POST[nama]','$_POST[harga]','$_POST[berat]','$namanamafoto[0]','$_POST[deskripsi]','$_POST[stok]','$_POST[id_kategori]')");

    //mendapatkan id produk
    $id_produk = $koneksi->insert_id;

    foreach ($namanamafoto as $key => $value) {
        $lokasi = $lokasilokasifoto[$key];
        move_uploaded_file($lokasi, "../assets/images/products/detail_products/" . $value);

        //simpan ke mysql dengan mengetahui id produk
        $koneksi->query("INSERT INTO produk_foto (id_produk,nama_produk_foto) VALUES ('$id_produk','$value')");
    }

    echo "<div class='alert alert-info'>DATA TERSIMPAN</div>";
    echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=produk'>";
    // echo "<pre>";
    // print_r($_FILES["foto"]);
    // echo "</pre>";
}
?>

<script>
    $(document).ready(function () {
        $(".btn-tambah").on("click", function () {
            $(".letak-input").append("<input type='file' class='form-control' name='foto[]'>");
        })
    })
</script>