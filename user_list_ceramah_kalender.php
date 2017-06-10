<?php
	require_once './koneksi.php';
	
    $tanggal = $_POST['tanggal'];
    
    $query = "SELECT
                mengajukan.tanggal,
                mengajukan.waktu,
                ustadz.foto_ustadz,
				ustadz.nama_ustadz,
                mengajukan.materi
                FROM mengajukan 
                LEFT JOIN ustadz
                WHERE mengajukan.tanggal='$tanggal'";
	
    $data = $con->query($query);
    $hasil = array(
        "list_ustadz_kalender" => []);
	
	if($data->num_rows > 0){
		while($baris = $data->fetch_assoc()){
			$ubahIndex = array (
                "foto_ustadz" => $baris["foto_ustadz"],
                "nama_ustadz" => $baris["nama_ustadz"],
                "materi" => $baris["materi"]
                );
                
            $hasil["list_ustadz_kalender"][] = $ubahIndex;
		}
	}
	
	echo json_encode($hasil);
?>