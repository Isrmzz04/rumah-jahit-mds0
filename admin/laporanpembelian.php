<?php

require '../func/func.php';
$semuadata = array();
$mulai = "-";
$selesai = "-";
$status = "";

if (isset($_POST["kirim"])) {
    $mulai = $_POST["tglm"];
    $selesai = $_POST["tgls"];
    $status = $_POST["status"];
    $ambil = $koneksi->query("SELECT * FROM pembelian pm LEFT JOIN pelanggan pl ON pm.id_pelanggan=pl.id_pelanggan WHERE status_pembelian='$status' AND tanggal_pembelian BETWEEN '$mulai' AND '$selesai'");
    while ($pecah = $ambil->fetch_assoc()) {
        $semuadata[] = $pecah;
    }
    // print_r($semuadata);
}

$data = selectData('pembelian', '*', '', '', '', 'pelanggan', 'pembelian.id_pelanggan = pelanggan.id_pelanggan');
?>

<h2 class="text-[#222] font-bold text-4xl">LAPORAN PEMBELIAN</h2>
<div class="row d-flex mt-10">
    <div class="col-md-4">
        <form action="downloadlaporan.php" method="POST">
            <div class="form-group">
                <label for="">Tanggal Mulai</label>
                <input type="date" class="form-control" name="tglm" value="<?php echo $mulai ?>" required>
            </div>
            <div class="form-group">
                <label for="">Tanggal Selesai</label>
                <input type="date" class="form-control" name="tgls" value="<?php echo $selesai ?>" required>
            </div>
            <div class="form-group">
                <label for="">Status</label>
                <select name="status" class="form-control" required>
                    <option value="">Pilih Status</option>
                    <option value="Pending" <?php echo $status == "Pending" ? "selected" : ""; ?>>Pending</option>
                    <option value="Lunas" <?php echo $status == "Lunas" ? "selected" : ""; ?>>Lunas</option>
                    <option value="Barang Dikirim" <?php echo $status == "Barang Dikirim" ? "selected" : ""; ?>>Barang
                        Dikirim
                    </option>
                    <option value="Di Batalkan" <?php echo $status == "Di Batalkan" ? "selected" : ""; ?>>Di Batalkan
                    </option>
                    <option value="Barang Telah Sampai" <?php echo $status == "Barang Telah Sampai" ? "selected" : ""; ?>>
                        Barang Telah Sampai</option>
                </select>
            </div>
            <div class="form-group">
                <button class="btn btn-primary" name="kirim">Ekspor</button>
            </div>
        </form>
    </div>
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Pelanggan</th>
            <th>Tanggal</th>
            <th>Jumlah</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php $total = 0; ?>
        <?php foreach ($data as $key => $value): ?>
            <?php $total += $value['total_pembelian'] ?>
            <tr>
                <td>
                    <?php echo $key + 1; ?>
                </td>
                <td>
                    <?php echo $value["nama_pelanggan"] ?>
                </td>
                <td>
                    <?php echo date("d F Y", strtotime($value["tanggal_pembelian"])) ?>
                </td>
                <td>Rp.
                    <?php echo number_format($value["total_pembelian"]) ?>
                </td>
                <td>
                    <?php echo $value["status_pembelian"] ?>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
    <tfoot>
        <tr>
            <th colspan="3">Total</th>
            <th>Rp.
                <?php echo number_format($total) ?>
            </th>
            <th></th>
        </tr>
    </tfoot>
</table>