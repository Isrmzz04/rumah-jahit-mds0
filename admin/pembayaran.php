<h2 class="text-[#222] font-bold text-4xl">DATA PEMBAYARAN</h2>

<?php
//mendapatkan id pembelian dari URL
$id_pembelian = $_GET['id'];
// produk INNER JOIN kategori ON produk.id_kategori = kategori.id_kategori
//mengambil data pembayaran berdasarkan id pembelian
$ambil = $koneksi->query("SELECT pembayaran.*, pembelian.* FROM pembayaran INNER JOIN pembelian ON pembayaran.id_pembelian = pembelian.id_pembelian WHERE pembayaran.id_pembelian='$id_pembelian'");
$detail = $ambil->fetch_assoc();

// echo "<pre>";
// print_r($detail);
// echo "</pre>";

if (isset($detail['resi_pengiriman'])) {
    $detail['resi_pengiriman'];
} else {
    echo '';
}
?>

<div class="row mt-10">
    <div class="col-md-6">
        <table class="table">
            <tr>
                <th>Nama</th>
                <td>
                    <?php echo $detail['nama'] ?>
                </td>
            </tr>
            <tr>
                <th>Bank</th>
                <td>
                    <?php echo $detail['bank'] ?>
                </td>
            </tr>
            <tr>
                <th>Jumlah</th>
                <td>
                    <?php echo $detail['jumlah'] ?>
                </td>
            </tr>
            <tr>
                <th>Tanggal Pembayaran</th>
                <td>
                    <?php echo $detail['tanggal'] ?>
                </td>
            </tr>
        </table>
    </div>
    <div class="col-md-6">
        <p>Bukti Pembayaran </p>
        <img src="assets/foto_bukti_pembayaran/<?php echo $detail['bukti'] ?>" alt="" class="img-responsive">
    </div>
</div>

<form action="" method="post">
    <div class="form-group">
        <label>Nomor Resi Pengiriman</label>
        <?php if ($detail['resi_pengiriman'] == ''): ?>
            <input type="text" class="form-control" name="resi" value="">
        <?php else: ?>
            <input type="text" class="form-control" name="resi" value="<?php echo $detail['resi_pengiriman'] ?>" readonly>
        <?php endif ?>
    </div>
    <div class="form-group">
        <label for="">Status Pembelian :
            <?php echo $detail['status_pembelian'] ?>
        </label>
        <select name="status" class="form-control">
            <option value="" selected disabled>Update Status</option>
            <option value="Lunas">Lunas</option>
            <option value="Barang Dikirim">Barang Dikirim</option>
            <option value="Di Batalkan">Di Batalkan</option>
            <option value="Barang Telah Sampai">Barang Telah Sampai</option>
        </select>
    </div>

    <div class="flex justify-end gap-3">
        <button class="btn btn-primary" name="proses">Proses</button>
        <a href="index.php?halaman=pembelian" class="btn btn-default">Kembali</a>
    </div>
</form>

<?php
if (isset($_POST["proses"])) {
    $resi = $_POST["resi"];
    $status = $_POST["status"];
    $koneksi->query("UPDATE pembelian SET resi_pengiriman='$resi', status_pembelian='$status' WHERE id_pembelian='$id_pembelian'");

    echo "<script>alert('Resi Pengiriman dan Status Pembelian Berhasil Di Update');</script>";
    echo "<script>location='index.php?halaman=pembelian';</script>";
}
?>