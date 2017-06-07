<?php
include "koneksi.php";
    
  session_start();
  
  if(!isset($_SESSION['id_admin'])){
	header("location:index.php");
  }

$email = $_POST['email_ustadz'];
$password = $_POST['password_ustadz'];
$nama = $_POST['nama_ustadz'];
$nohp = $_POST['nohp_ustadz'];

$sql_insert = "INSERT
                INTO
                ustadz
                (email_ustadz,password_ustadz,nama_ustadz,nohp_ustadz,foto_ustadz) VALUE ('$email','$password','$nama','$nohp','default.jpeg')";

mysqli_query ($con,$sql_insert);


header ("location:aturustadz.php");
?>