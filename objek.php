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
		$host = "localhost";
		$username = "root";
		$password = "";
		$nama_database = "project_pbm";

		//koneksi ke host
		$con =mysqli_connect($host, $username, $password, $nama_database) or die ("Maaf server mati");
		$this->id=$id;
		$sql_tentor = "SELECT * FROM ustadz WHERE id='$this->id'";
		$resultt = mysqli_query($con,$sql_tentor);
									
		if($resultt === FALSE) { 
			die(mysql_error()); // error handling
		}
		
		$roww = mysqli_fetch_array ($resultt);

			$this->nama = $roww['nama'];
            $this->email = $roww['email'];
            $this->password = $roww['password'];
			$this->nohp = $roww['nohp'];
			$this->foto = $roww['foto'];
			
	}
	
	public function __destruct()
	{
	}
}
?>