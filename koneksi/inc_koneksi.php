<?php 
$host       = "localhost";
$user       = "root";
$pass       = "";
$db         = "dafitosz";

$conn    = mysqli_connect($host,$user,$pass,$db);
if(!$conn){
    die("Gagal terkoneksi");
}