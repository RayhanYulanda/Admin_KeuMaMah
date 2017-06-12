<?php
	require_once './koneksi.php';

    $tanggal = $_POST['tanggal'];

	$query = "SELECT mengajukan.id_ajuan, ustadz.foto_ustadz, ustadz.nama_ustadz, mengajukan.materi, mengajukan.waktu, 
	mengajukan.tanggal, mengajukan.alamat, mengajukan.status, mengajukan.komentar
	FROM mengajukan	LEFT JOIN ustadz ON ustadz.id_ustadz = mengajukan.id_ustadz
	WHERE mengajukan.tanggal ='$tanggal' AND mengajukan.status = 'Terima' ORDER BY mengajukan.waktu DESC";
			
	$data_ust = $con->query($query);
	
	$hasil = array("ustadzlistsada" => []);
	
	if($data_ust->num_rows > 0){
		while($baris = $data_ust->fetch_assoc()){
			$ubahIndex = array (
				"nama_ustadz" => $baris["nama_ustadz"],
                "foto_ustadz" => $baris["foto_ustadz"],
                "materi" => $baris["materi"],
                "tanggal" => $baris["tanggal"],
                "waktu" => $baris["waktu"],
                "alamat" => $baris["alamat"]
           
                );
                
            $hasil["ustadzlistsada"][] = $ubahIndex;
		}
	}
	
	
	echo json_encode($hasil);
?>