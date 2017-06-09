<?php
 require_once "koneksi.php";
     
  session_start();
  
  if(!isset($_SESSION['id_admin'])){
	header("location:index.php");
  }

 
   
    $id = $_POST['id'];
	$password	= $_POST['password'];
	$nama	= $_POST['nama'];
	$nohp	= $_POST['nohp'];
	$email = $_POST['email'];

	//pengecekan bila foto edit profile
	if($_FILES['foto']['name'] == ""){
		$foto = $_POST['nama_foto'];
	}
	else
	$foto	= $_FILES['foto']['name'];   
   
   move_uploaded_file($_FILES['foto']['tmp_name'], "img/".$_FILES['foto']['name']);
    $sql_edit = "UPDATE ustadz SET password_ustadz ='$password', 
									nama_ustadz = '$nama',
									nohp_ustadz = '$nohp', 
									foto_ustadz = '$foto',
									email_ustadz = '$email'
									WHERE id_ustadz = '$id'";
									
	mysqli_query($con,$sql_edit) or die (mysql_error());
	//header("location:aturustadz.php");
 
?>