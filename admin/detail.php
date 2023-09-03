<h2 class="text-[#222] font-bold text-4xl">DETAIL PEMBELIAN</h2>
<?php
$ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan WHERE pembelian.id_pembelian='$_GET[id]'");
$detail = $ambil->fetch_assoc();
?>

<div class="mt-10 flex justify-between gap-3 flex-wrap">
    <div class="flex flex-col gap-2">
        <h3>Pembelian</h3>
        <h5><strong>No. Pembelian : <?php echo $detail['id_pembelian'] ?></strong></h5>
        <h5>Tanggal : <?php echo date("d F Y", strtotime($detail["tanggal_pembelian"])) ?></h5>
        <h5><strong>Total : Rp. <?php echo number_format($detail['total_pembelian']) ?></strong></h5>
    </div>
    <div class="flex flex-col gap-2">
        <h3>Pelanggan</h3>
        <h5><strong><?php echo $detail['nama_pelanggan']; ?></strong></h5>
        <h5><?php echo $detail['telepon_pelanggan']; ?></h5>
        <h5><?php echo $detail['email_pelanggan']; ?></h5>
    </div>
    <div class="flex flex-col gap-2">
        <h3>Tujuan</h3>
        <h5><strong><?php echo $detail['tipe']; ?> <?php echo $detail['distrik']; ?>, Provinsi
                <?php echo $detail['provinsi']; ?></strong></h5>
        <h5><?php echo $detail['alamat_pengiriman']; ?></h5>
        <h5>Nama Ekspedisi : <?php echo $detail['ekspedisi']; ?></h5>
    </div>
    <div class="flex flex-col gap-2">
        <h3>Pengiriman</h3>
        <h5><strong>Ongkos Kirim : Rp. <?php echo number_format($detail['ongkir']); ?></strong></h5>
        <h5>Jenis Pengiriman : <?php echo $detail['paket']; ?></h5>
        <h5>Estimasi Pengiriman : <?php echo $detail['estimasi']; ?> Hari </h5>
    </div>
</div>

<table class="table table-bordered mt-10">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Sub Total</th>
        </tr>
    </thead>
    <tbody>
        <?php $angka = 1; ?>
        <?php $ambil = $koneksi->query("SELECT * FROM pembelian_produk JOIN produk ON pembelian_produk.id_produk=produk.id_produk WHERE pembelian_produk.id_pembelian='$_GET[id]'"); ?>
        <?php while($pecah = $ambil->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $angka; ?></td>
            <td><?php echo $pecah['nama_produk']; ?></td>
            <td><?php echo $pecah['harga_produk']; ?></td>
            <td><?php echo $pecah['jumlah']; ?></td>
            <td><?php echo $pecah['harga_produk']*$pecah['jumlah']; ?></td>
        </tr>
        <?php $angka++; ?>
        <?php } ?>
    </tbody>
</table>
<div class="flex justify-end">
    <a href="index.php?halaman=pembelian" class="btn btn-default">Kembali</a>
</div>