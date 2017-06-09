<?php  
 require_once './koneksi.php'; 

 $id_ustadz = $_POST['id_ustadz'];
 $id_user = $_POST['id_user'];

 $materi = $_POST['materi']; 
 $alamat = $_POST['alamat']; 
 $jadwal = $_POST['jadwal']; 

 $query = "INSERT INTO mengajukan (id_user,id_ustadz,materi, alamat,jadwal, status)
                            VALUE ('$id_user','$id_ustadz','$materi','$alamat','$jadwal','pending')";


 if ($db->query($query) === TRUE) { 
  $pesan['kode'] = 1; 
  $pesan['pesan'] = "Success"; 
 }else{ 
  $pesan['kode'] = 0; 
  $pesan['pesan'] = "Fail"; 
 } 

 echo json_encode($pesan); 
 ?>