<?php

session_start();
session_destroy();
echo "<script>alert('Berhasil Keluar');</script>";
echo "<script>location='login.php';</script>"
?>