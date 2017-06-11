<?php  
 require_once './koneksi.php'; 

 $id_ustadz = $_POST['id_ustadz'];
 $email_user = $_POST['email_user'];

 $materi = $_POST['materi']; 
 $alamat = $_POST['alamat']; 
 $tanggal = $_POST['tanggal']; 
 $waktu = $_POST['waktu']; 

$query_profile="SELECT id_user FROM user WHERE email_user='$email_user' LIMIT 1";
$data_profile = $con->query($query_profile)->fetch_assoc();


 $query = "INSERT INTO mengajukan (id_user,id_ustadz,materi, alamat, tanggal, waktu, status)
                            VALUE ('$data_profile[id_user]','$id_ustadz','$materi','$alamat','$tanggal','$waktu','Pending')";


 if ($con->query($query) === TRUE) { 
  $pesan['kode'] = 1; 
  $pesan['pesan'] = "Sukses tambah pengajuan"; 
 }else{ 
  $pesan['kode'] = 0; 
  $pesan['pesan'] = "Gagal tambah pengajuan"; 
 } 

 echo json_encode($pesan); 
 ?>