<?php
	require_once './koneksi.php';
	
    $id_ustadz=$_POST['id_ustadz'];
    
    $query_profile="SELECT * FROM ustadz WHERE id_ustadz='$id_ustadz' LIMIT 1";
    $data_profile = $con->query($query_profile)->fetch_assoc();

    $hasil = array(
        "profilUstadz" => [],
        "pengajuanUstadz" => []);

    $ubahIndex = array (
                "nama_ustadz" => $data_profile["nama_ustadz"],
                "email_ustadz" => $data_profile["email_ustadz"],
                "nohp_ustadz" => $data_profile["nohp_ustadz"],
                "foto_ustadz" => $data_profile["foto_ustadz"],
                "id_ustadz" => $data_profile["id_ustadz"]
                );

    $hasil["profilUstadz"] = $ubahIndex;
    
    
    $query = "SELECT mengajukan.id_ajuan, user.instansi_user, user.nohp_user, mengajukan.materi, mengajukan.waktu, 
                    mengajukan.tanggal, mengajukan.alamat
                FROM mengajukan
                LEFT JOIN user ON user.id_user = mengajukan.id_user
                WHERE mengajukan.id_ustadz =$data_profile[id_ustadz]
                AND mengajukan.status =  'Terima' ORDER BY mengajukan.tanggal DESC";
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
                
            $hasil["pengajuanUstadz"][] = $ubahIndex;
		}
	}
	
	echo json_encode($hasil);
?>