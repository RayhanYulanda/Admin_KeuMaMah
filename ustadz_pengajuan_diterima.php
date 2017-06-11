<?php  
 require_once './koneksi.php'; 

 $id_ajuan = $_POST['id_ajuan'];
 $komentar = $_POST['komentar'];
 

 $query = "UPDATE mengajukan SET status='Terima', komentar='$komentar' WHERE id_ajuan='$id_ajuan' ";


 if ($con->query($query) === TRUE) { 
  $pesan['kode'] = 1; 
  $pesan['pesan'] = "Success"; 
 }else{ 
  $pesan['kode'] = 0; 
  $pesan['pesan'] = "Fail"; 
 } 

 echo json_encode($pesan); 
 ?>