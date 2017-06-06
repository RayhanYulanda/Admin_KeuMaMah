<?php
include "koneksi.php";
    
  session_start();
  
  if(!isset($_SESSION['id_admin'])){
	header("location:index.php");
  }

$email = $_POST['email'];
$password = $_POST['password'];
$nama = $_POST['nama'];
$nohp = $_POST['nohp'];

$sql_insert = "INSERT
                INTO
                ustadz
                (email,password,nama,nohp,foto) VALUE ('$email','$password','$nama','$nohp','default.jpeg')";

mysqli_query ($con,$sql_insert);


header ("location:aturustadz.php");
?>