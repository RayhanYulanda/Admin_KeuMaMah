<?php

    require_once "koneksi.php";

    $email_user = $_POST['email_user'];
    $password_user = $_POST['password_user'];

    $sql = "SELECT count(*) AS jumlah FROM user WHERE email_user='$email_user' AND password_user='$password_user'";
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