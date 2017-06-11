<?php  
 require_once './koneksi.php'; 

 $email_user = $_POST['email_user'];
 $password_user = $_POST['password_user']; 
 $nama_user = $_POST['nama_user']; 
 $nohp_user = $_POST['nohp_user']; 
 $instansi_user = $_POST['instansi_user']; 


$sql = "SELECT * FROM user WHERE email_user='$email_user'";	
	$resultt = mysqli_query($con,$sql);	
    $roww = $resultt->num_rows;
        if( $roww > 0 ){
            $pesan['kode'] = 0;
			$pesan['pesan'] = "Email sudah ada"; 
		}
		else{
            $query = "INSERT INTO user (email_user,password_user,nama_user,nohp_user,instansi_user,foto_user) VALUE ('$email_user','$password_user','$nama_user','$nohp_user','$instansi_user','default.jpeg')";
             if ($con->query($query) === TRUE) { 
                 $pesan['kode'] = 1;
                 $pesan['pesan'] = "Sukses membuat akun"; 
             }else{ 
                 $pesan['kode'] = 0; 
                 $pesan['pesan'] = "Gagal membuat akun"; 
             }
		}

 echo json_encode($pesan); 
 ?>