<?php
include "koneksi.php";
    
  session_start();
  
  if(!isset($_SESSION['id_admin'])){
	header("location:index.php");
  }

$id = $_GET['id'];

$sql_delete = "DELETE from ustadz WHERE id='$id'";
mysqli_query ($con,$sql_delete);

header ("location:aturustadz.php");
?>