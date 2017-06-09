<?php
	require_once './koneksi.php';
	
	$query = "SELECT * FROM ustadz";
	$data = $con->query($query);
	$hasil = array("data" => []);
	
	if($data->num_rows > 0){
		while($baris = $data->fetch_assoc()){
			$ubahIndex = array (
                "id_ustadz" => $baris["id_ustadz"],
                "email_ustadz" => $baris["email_ustadz"],
                "nohp_ustadz" => $baris["nohp_ustadz"],
                "nama_ustadz" => $baris["nama_ustadz"],
                "foto_ustadz" => $baris["foto_ustadz"]
                );
                
            $hasil["data"][] = $ubahIndex;
		}
	}
	
	echo json_encode($hasil);
?>