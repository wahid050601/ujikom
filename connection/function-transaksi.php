<?php

    require "db.php";
    $conn = mysqli_connect($host, $user, $pass, $db);


    // Ambil data pelanggan
    function getTransaksi($data) {

        global $conn;

        $result = mysqli_query($conn, $data);
        $rows = [];

        while ($row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }

        return $rows;

    }