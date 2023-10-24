<?php

    // require "../connection/db.php";

    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "ujikom";

    $conn = mysqli_connect($host, $user, $pass, $db);

    $nama = htmlspecialchars($_POST["pelanggan"]);
    $tlp = htmlspecialchars($_POST["tlp"]);
    $alamat = htmlspecialchars($_POST["alamat"]);

    $query = "INSERT INTO pelanggan (id, pelanggan_nama, pelanggan_hp, pelangga_alamat) VALUES ('', '$nama', '$tlp', '$alamat')";
    

    if (mysqli_query($conn, $query)) {
        header('location:pelanggan.php');
    }else{
        header('location:pelanggan.php');
    }
    



?>