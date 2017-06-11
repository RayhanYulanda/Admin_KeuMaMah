<?php
	require_once './koneksi.php';

	$email_ustadz=$_POST['email_ustadz'];
	
	$query_profile="SELECT * FROM ustadz WHERE email_ustadz='$email_ustadz' LIMIT 1";
	$data_profile = $con->query($query_profile)->fetch_assoc();
	
	//$query = "SELECT user.instansi_user, user.nohp_user, mengajukan.materi, mengajukan.jadwal, mengajukan.alamat, mengajukan.komentar 
		//	FROM user, mengajukan WHERE user.id_user=mengajukan.id_user AND email_ustadz='$email_ustadz' ORDER BY mengajukan.jadwal DESC";
			
	$query = "SELECT mengajukan.id_ajuan, user.instansi_user, user.nohp_user, mengajukan.materi, mengajukan.tanggal, mengajukan.waktu, 
			mengajukan.alamat, mengajukan.komentar FROM mengajukan LEFT JOIN user ON user.id_user=mengajukan.id_user
            WHERE mengajukan.id_ustadz='$data_profile[id_ustadz]' AND mengajukan.status='Pending' ORDER BY mengajukan.tanggal AND mengajukan.waktu DESC";
			
	$data = $con->query($query);
	$hasil = array("pengajuan" => []);
	
	if($data->num_rows > 0){
		while($baris = $data->fetch_assoc()){
			$ubahIndex = array (
				"id_ajuan" => $baris["id_ajuan"],
                "instansi_user" => $baris["instansi_user"],
                "nohp_user" => $baris["nohp_user"],
                "materi" => $baris["materi"],
				"tanggal" => $baris["tanggal"],
                "waktu" => $baris["waktu"],
                "alamat" => $baris["alamat"],
				"komentar" => $baris["komentar"]
                );
			   
            $hasil["pengajuan"][] = $ubahIndex;
			
		}
	}
	
	echo json_encode($hasil);
?>