<?php
	require_once './koneksi.php';

    $tanggal = $_POST['tanggal'];
	
	$query ="SELECT * FROM ustadz WHERE id_ustadz NOT IN (SELECT id_ustadz FROM mengajukan WHERE tanggal='$tanggal' AND status='Terima')";
			
	$data_ust = $con->query($query);
	
	$hasil = array("tanggal" => []);
	
	if($data_ust->num_rows > 0){
		while($baris = $data_ust->fetch_assoc()){
			$ubahIndex = array (
				"nama_ustadz" => $baris["nama_ustadz"],
                "foto_ustadz" => $baris["foto_ustadz"],
                "nohp_ustadz" => $baris["nohp_ustadz"]
           
                );
                
            $hasil["tanggal"][] = $ubahIndex;
		}
	}
	
	
	echo json_encode($hasil);
?>