<?php


header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=laporan-pembelian.xls"); 
require '../koneksi.php';
require '../func/func.php';
require '../func/format_rupiah.php';

$mulai = $_POST["tglm"];
$selesai = $_POST["tgls"];
$status = $_POST["status"];

$condition = "tanggal_pembelian >= '$mulai' AND tanggal_pembelian <= '$selesai' AND status_pembelian = '$status'";
$table = "pembelian JOIN pelanggan ON pembelian.id_pelanggan = pelanggan.id_pelanggan JOIN pembelian_produk ON pembelian.id_pembelian = pembelian_produk.id_pembelian JOIN produk ON pembelian_produk.id_produk = produk.id_produk JOIN kategori ON produk.id_kategori = kategori.id_kategori";
$data = selectData($table,'*', $condition);


?>

<h3 style="text-align:center">Laporan Pembelian</h3>
<table style="width:100%;border-collapse:collapse" border="1">
    <thead>
        <tr>
            <th>No. </th>
            <th>Tanggal Pembelian</th>
            <th>ID Pembelian</th>
            <th>Nama Pelanggan</th>
            <th>ID Produk</th>
            <th>Nama Produk</th>
            <th>Kategori</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Subtotal</th>
            <th>Ongkir</th>
            <th>Jumlah Pembayaran</th>            
            <th>Status</th>                        
        </tr>
    </thead>
    <tbody>
    <?php $total = 0; ?>
        <?php $in=1; foreach ($data as $i => $v): ?>
            <?php $total += $v['total_pembelian'] ?>
            <tr>
                <td><?=$in++ ?></td>
                <td><?=$v['tanggal_pembelian'] ?></td>
                <td><?=$v['id_pembelian'] ?></td>
                <td><?=$v['nama_pelanggan'] ?></td>
                <td><?=$v['id_produk'] ?></td>
                <td><?=$v['nama_produk'] ?></td>
                <td><?=$v['nama_kategori'] ?></td>
                <td><?=f_idr($v['harga']) ?></td>                
                <td><?=$v['jumlah'] ?></td>
                <td><?=f_idr($v['subharga']) ?></td>                
                <td><?=f_idr($v['ongkir']) ?></td>
                <td><?=f_idr($v['total_pembelian']) ?></td>
                <td><?=$v['status_pembelian'] ?></td>                
            </tr>
        <?php endforeach; ?>
    </tbody>
    <tfoot>
        <tr>
            <th colspan="11">Total</th>
            <th>Rp.
                <?=f_idr($total) ?>
            </th>
        </tr>
    </tfoot>
</table>