<?php

    require "db.php";
    $conn = mysqli_connect($host, $user, $pass, $db);


    // Ambil data pelanggan
    function getPelanggan($data) {

        global $conn;

        $result = mysqli_query($conn, $data);
        $rows = [];

        while ($row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }

        return $rows;

    }

    //Tambah Data Pelanggan
    function addPelanggan($dataPel) {

        global $conn;

        $nama = $dataPel['pelanggan'];
        $tlp = $dataPel['tlp'];
        $alamat = $dataPel['alamat'];

        $query = "INSERT INTO pelanggan VALUES ('', '$nama', '$tlp', '$alamat')";
        mysqli_query($conn, $query);
        echo $query;

        return mysqli_affected_rows($conn);
    }





?>