<?php
//file koneksi ke database


//$host = "mysql.idhostinger.com";
//$username = "u627280070_admin";
//$password = "rehan5797";
//$nama_database = "u627280070_kmm";

$host = "localhost";
$username = "root";
$password = "";
$nama_database = "project_pbm";

//koneksi ke host
$con =mysqli_connect($host, $username, $password, $nama_database) or die ("Maaf server mati");

?>