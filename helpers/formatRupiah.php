<?php
function f_idr($harga) {
    $rupiah = number_format($harga, 0, ',', '.');
    return 'Rp ' . $rupiah;
}
?>