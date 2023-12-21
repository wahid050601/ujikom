<?php
    // Connection Core
    $host = getenv("DB_HOST"); //"172.20.208.1"; 
    $user = getenv("DB_USER"); //"root"; 
    $pass = getenv("DB_PASSWORD"); //"wahid561"; 
    $debe = getenv("DB_DATABASE"); //"fa_addawah";  

    // Defind Database
    // define('HOST', $host);
    // define('USER', $user);
    // define('PASS', $pass);
    // define('DEBE', $debe);

    // $koneksi = new mysqli(HOST, USER, PASS, DEBE);
    $koneksi = mysqli_connect($host, $user, $pass, $debe);

