<?php
	require_once './koneksi.php';

    $tanggal = $_GET['tanggal'];

	$query = "SELECT ustadz.foto, ustadz.nama, mengajukan.materi, mengajukan.tanggal, mengajukan.jam, mengajukan.alamat
			FROM ustadz, mengajukan WHERE mengajukan.tanggal='$tanggal' AND ustadz.id=mengajukan.id_ustadz 
			AND mengajukan.status='terima' ORDER BY mengajukan.tanggal DESC";
			
	$data_ust = $con->query($query);
	
	$hasil = array("data_ust" => []);
	
	if($data_ust->num_rows > 0){
		while($baris = $data_ust->fetch_assoc()){
			$ubahIndex = array (
				"nama" => $baris["nama"],
                "foto" => $baris["foto"],
                "materi" => $baris["materi"],
                "tanggal" => $baris["tanggal"],
                "jam" => $baris["jam"],
                "alamat" => $baris["alamat"]
           
                );
                
            $hasil["data"][] = $ubahIndex;
		}
	}
	
	echo json_encode($hasil);
?>