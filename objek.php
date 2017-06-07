<?php

class biodata_ustadz{
	public $id;
    public $password;
    public $email;
	public $nama;
	public $nohp;
	public $foto;

	public function __construct($id)
	{
		$host = "localhost:8080";
		$username = "root";
		$password = "";
		$nama_database = "project_pbm";

		//koneksi ke host
		$con =mysqli_connect($host, $username, $password, $nama_database) or die ("Maaf server mati");
		$this->id=$id;
		$sql_ustadz = "SELECT * FROM ustadz WHERE id_ustadz='$this->id'";
		$resultt = mysqli_query($con,$sql_ustadz);
									
		if($resultt === FALSE) { 
			die(mysql_error()); // error handling
		}
		
		$roww = mysqli_fetch_array ($resultt);

			$this->nama = $roww['nama_ustadz'];
            $this->email = $roww['email_ustadz'];
            $this->password = $roww['password_ustadz'];
			$this->nohp = $roww['nohp_ustadz'];
			$this->foto = $roww['foto_ustadz'];
			
	}
	
	public function __destruct()
	{
	}
}
?>