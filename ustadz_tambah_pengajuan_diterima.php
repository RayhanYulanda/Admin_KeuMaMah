<?php  
 require_once './koneksi.php'; 

 $id_ustadz = $_POST['id_ustadz'];
 $id_user = $_POST['id_user'];

 $materi = $_POST['materi'];
 $jadwal = $_POST['jadwal'];  
 $alamat = $_POST['alamat'];
 $status = $_POST['status'];
 $komentar = $_POST['komentar'];
 

 $query = "INSERT INTO mengajukan (id_user, id_ustadz, materi, jadwal, alamat, status, komentar )
                            VALUE ('$id_user','$id_ustadz','$materi','$jadwal','$alamat','$status','$komentar')";


 if ($con->query($query) === TRUE) { 
  $pesan['kode'] = 1; 
  $pesan['pesan'] = "Success"; 
 }else{ 
  $pesan['kode'] = 0; 
  $pesan['pesan'] = "Fail"; 
 } 

 echo json_encode($pesan); 
 ?>