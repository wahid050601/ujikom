<?php
    // Connection Core
    $host = "localhost";
    $user = "root";
    $pass = "";
    $debe = "fa_addawah";

    // Defind Database
    define('HOST', $host);
    define('USER', $user);
    define('PASS', $pass);
    define('DEBE', $debe);

    $koneksi = new mysqli(HOST, USER, PASS, DEBE);


