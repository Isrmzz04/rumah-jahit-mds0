<h2 class="text-[#222] font-bold text-4xl">DATA PRODUK</h2>

<div class="mt-10">
    <a href="index.php?halaman=tambahproduk" class="btn btn-primary">+ Tambah Data</a>
</div>
<table class="table table-bordered mt-5">
    <thead>
        <tr>
            <th>No</th>
            <th>Kategori</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Foto</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $nomor = 1; ?>
        <?php $ambil = $koneksi->query("SELECT * FROM produk LEFT JOIN kategori ON produk.id_kategori=kategori.id_kategori"); ?>
        <?php while ($pecah = $ambil->fetch_assoc()) { ?>
            <tr>
                <td>
                    <?php echo $nomor; ?>
                </td>
                <td>
                    <?php echo $pecah["nama_kategori"] ?>
                </td>
                <td>
                    <?php echo $pecah['nama_produk']; ?>
                </td>
                <td>
                    <?php echo $pecah['harga_produk']; ?>
                </td>
                <td>
                    <img src="../assets/images/products/<?php echo $pecah['foto_produk']; ?>" width="200">
                </td>
                <td>
                    <a href="index.php?halaman=ubahproduk&id=<?php echo $pecah['id_produk']; ?>"
                        class="btn btn-warning">Update</a>
                    <a href="index.php?halaman=detailproduk&id=<?php echo $pecah['id_produk']; ?>"
                        class="btn btn-info">Detail</a>
                    <a href="index.php?halaman=hapusproduk&id=<?php echo $pecah['id_produk']; ?>"
                        class="btn btn-danger">Delete</a>
                </td>
            </tr>
            <?php $nomor++; ?>
        <?php } ?>
    </tbody>
</table>