<?php
	require_once './koneksi.php';
	
    $email_user=$_POST['email_user'];
    
    $query_profile="SELECT * FROM user WHERE email_user='$email_user' LIMIT 1";
    $data_profile = $con->query($query_profile)->fetch_assoc();

    $hasil = array(
        "profilUser" => [],
        "pengajuanUser" => []);

    $ubahIndex = array (
                "nama_user" => $data_profile["nama_user"],
                "email_user" => $data_profile["email_user"],
                "nohp_user" => $data_profile["nohp_user"],
                "foto_user" => $data_profile["foto_user"],
                "instansi_user" => $data_profile["instansi_user"],
                );

    $hasil["profilUser"] = $ubahIndex;
    
    
    $query = "SELECT 
                mengajukan.id_ajuan,ustadz.nohp_ustadz,ustadz.nama_ustadz,
                mengajukan.materi, mengajukan.waktu, mengajukan.tanggal, mengajukan.alamat, mengajukan.status, mengajukan.komentar
                FROM mengajukan 
                LEFT JOIN ustadz ON ustadz.id_ustadz=mengajukan.id_ustadz
                WHERE mengajukan.id_user='$data_profile[id_user]'";
	$data = $con->query($query);
	
	if($data->num_rows > 0){
		while($baris = $data->fetch_assoc()){
			$ubahIndex = array (
                "nama_ustadz" => $baris["nama_ustadz"],
                "nohp_ustadz" => $baris["nohp_ustadz"],
                "materi" => $baris["materi"],
                "tanggal" => $baris["tanggal"],
                "waktu" => $baris["waktu"],
                "alamat" => $baris["alamat"],
                "status" => $baris["status"],
                "komentar" => $baris["komentar"]
                );
                
            $hasil["pengajuanUser"][] = $ubahIndex;
		}
	}
	
	echo json_encode($hasil);
?>