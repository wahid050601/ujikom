<?php
    // Connection
    require "../../connection/conn.php";

    // Defind Database
    define('HOST', $host);
    define('USER', $user);
    define('PASS', $pass);
    define('DEBE', $debe);

    // Connection Database
    $koneksi = new mysqli(HOST, USER, PASS, DEBE);

    // Function Start
    if(isset($_POST["action"])) {
        $action = $_POST["action"];


        switch ($action) {

            case "add" :
                $output = '';

                // Ambil data dari Form Add
                $nis = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["nis"]));
                $nisn = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["nisn"]));
                $nama = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["nama"]));
                $jk = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["jk"]));
                $tplahir = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["tplahir"]));
                $tglahir =htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["tglahir"]));
                $alamat = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["alamat"]));
                $ibu = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["ibu"]));
                $ayah = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["ayah"]));
                $tlp = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["tlp"]));
                $email = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["email"]));

                //Query Insert
                $query = "INSERT INTO tb_siswa VALUES ('', '$nis', '$nisn', '$nama', '$jk', '$tplahir', '$tglahir', '$alamat', '$ibu', '$ayah', '$tlp', '$email', 'aktif')";
                
                //Process
                if (mysqli_query($koneksi, $query)) {
                    $alert = "success";
                    $text = "Data siswa berhasil ditambah";
                }else{
                    $alert = "error";
                    $text = $output .= mysqli_error($koneksi);
                }
                echo $output;
                echo json_encode(["status" => $alert, "text" => $text, "page" => ""]);
            break;

            case "updt" :
                $output = '';

                // Ambil data dari Form Update
                $idSiswa = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["idsiswa"]));
                $nis = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["nis"]));
                $nisn = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["nisn"]));
                $nama = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["nama"]));
                $jk = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["jk"]));
                $tplahir = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["tplahir"]));
                $tglahir =htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["tglahir"]));
                $alamat = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["alamat"]));
                $ibu = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["ibu"]));
                $ayah = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["ayah"]));
                $tlp = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["tlp"]));
                $email = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["email"]));

                // Query Update
                $query = "UPDATE tb_siswa SET 
                    nis_siswa = '$nis', 
                    nisn_siswa = '$nisn', 
                    nama_siswa = '$nama', 
                    jk_siswa = '$jk', 
                    tplahir_siswa = '$tplahir', 
                    tglahir_siswa = '$tglahir', 
                    alamat_siswa = '$alamat', 
                    ibu_siswa = '$ibu', 
                    ayah_siswa = '$ayah', 
                    tlp_siswa = '$tlp', 
                    email_siswa = '$email' where id = $idSiswa";
                
                //Process
                if (mysqli_query($koneksi, $query)) {
                    $alert = "success";
                    $text = "Data siswa berhasil diupdate";
                }else{
                    $alert = "error";
                    $text = $output .= mysqli_error($koneksi);
                }
                echo $output;
                echo json_encode(["status" => $alert, "text" => $text, "page" => '']);
            break;
            
            case "del" :
                $idisiswa = $_POST["id"];

                // Query Delete
                
                $query = "DELETE FROM tb_siswa WHERE id = $idisiswa";

                //Process
                if(mysqli_query($koneksi, $query)){
                    $alert = "success";
                    $text = "Data siswa berhasil dihapus";
                }else{
                    $alert = "error";
                    $text = mysqli_error($koneksi);
                }
                echo json_encode(["status" => $alert, "text" => $text, "page" => '']);
            break;

        }
    }
    


?>