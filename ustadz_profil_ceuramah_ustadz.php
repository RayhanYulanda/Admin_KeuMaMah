<?php
	require_once './koneksi.php';
	
	$email_ustadz=$_POST['email_ustadz'];
    
    $query_profile="SELECT * FROM ustadz WHERE email_ustadz='$email_ustadz' LIMIT 1";
    $data_profile = $con->query($query_profile)->fetch_assoc();

    $hasil = array(
        "profil" => [],
        "pengajuan" => []);
		
		$ubahIndex = array (
                "nama_ustadz" => $data_profile["nama_ustadz"],
                "email_ustadz" => $data_profile["email_ustadz"],
                "nohp_ustadz" => $data_profile["nohp_ustadz"],
				"foto_ustadz" => $data_profile["foto_ustadz"]
                );
				
			$hasil["profil"] = $ubahIndex;
			
			
	
	//$query = "SELECT mengajukan.id_ajuan, user.instansi_user, user.nohp_user, mengajukan.materi, mengajukan.jadwal, mengajukan.alamat 
		//	FROM user, mengajukan WHERE mengajukan.id_ustadz='$data_profile[id_ustadz]' AND user.id_user=mengajukan.id_user AND mengajukan.status='terima'  
			//ORDER BY mengajukan.tanggal DESC";
	
	$query = "SELECT mengajukan.id_ajuan, user.instansi_user, user.nohp_user, mengajukan.materi, mengajukan.tanggal, mengajukan.waktu, mengajukan.alamat 
			FROM mengajukan LEFT JOIN user ON user.id_user=mengajukan.id_user
            WHERE mengajukan.id_ustadz='$data_profile[id_ustadz]' AND mengajukan.status= 'Terima' ORDER BY mengajukan.tanggal DESC";
			
			$data = $con->query($query);
			
	
	if($data->num_rows > 0){
		while($baris = $data->fetch_assoc()){
			$ubahIndex = array (
				"instansi_user" => $baris["instansi_user"],
                "nohp_user" => $baris["nohp_user"],
                "materi" => $baris["materi"],
                "tanggal" => $baris["tanggal"],
                "waktu" => $baris["waktu"],
                "alamat" => $baris["alamat"]
                
                );
                
            $hasil["pengajuan"][] = $ubahIndex;
		}
	}
	
	echo json_encode($hasil);
?>