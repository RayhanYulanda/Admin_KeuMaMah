<?php

    require_once "koneksi.php";

    $email_ustadz = $_POST['email_ustadz'];
    $password_ustadz = $_POST['password_ustadz'];

    $sql = "SELECT count(*) AS jumlah FROM ustadz WHERE email_ustadz='$email_ustadz' AND password_ustadz='$password_ustadz'";
    $data = $con->query($sql);
    $hasil = $data->fetch_assoc();

        if($hasil['jumlah']>0){
            $hasil['kode'] = 1;
            $hasil['pesan'] = "Berhasil Login";
        }
        else{
            $hasil['kode'] = 0;
            $hasil['pesan'] = "Gagal Login";
        }

    echo json_encode($hasil);

?>