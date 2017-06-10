<?php  
 require_once './koneksi.php'; 

 $id_ustadz = $_POST['id_ustadz'];
 $id_user = $_POST['id_user'];

 $materi = $_POST['materi']; 
 $alamat = $_POST['alamat']; 
 $tanggal = $_POST['tanggal']; 
 $waktu = $_POST['waktu']; 

 $query = "INSERT INTO mengajukan (id_user,id_ustadz,materi, alamat, tanggal, waktu, status)
                            VALUE ('$id_user','$id_ustadz','$materi','$alamat','$tanggal','$waktu',Pending')";


 if ($db->query($query) === TRUE) { 
  $pesan['kode'] = 1; 
  $pesan['pesan'] = "Success"; 
 }else{ 
  $pesan['kode'] = 0; 
  $pesan['pesan'] = "Fail"; 
 } 

 echo json_encode($pesan); 
 ?>