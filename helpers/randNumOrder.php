<?php

date_default_timezone_set('Asia/Jakarta');
$get_waktu = substr(date("Ymd"), 2);

function generateRandomCode($length )
{
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $code = '';

    for ($i = 0; $i < $length; $i++) {
        $randomIndex = rand(0, strlen($characters) - 1);
        $code .= $characters[$randomIndex];
    }

    return $code;
}

$randomCode = generateRandomCode(8);
$no_order = $get_waktu.$randomCode;

?>