<?php
$server  ="localhost";
$username ="root";
$password ="";
$db_name ="dbs_wisata";

$koneksi = mysqli_connect($server, $username, $password, $db_name);
if(!$koneksi){
   echo "Koneksi gagal";
}else{
   //echo "Koneksi Berhasil";
}