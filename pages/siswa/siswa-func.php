<?php
    // Connection
    require "../../connection/conn.php";

    // Function Start
    if(isset($_POST["action"])) {
        $action = $_POST["action"];


        switch ($action) {

            case "addSiswa" :
                try {
                    // Get data
                    $nis = htmlspecialchars($_POST["nis"]);
                    $nisn = htmlspecialchars($_POST["nisn"]);
                    $nama = htmlspecialchars($_POST["nama"]);
                    $jk = htmlspecialchars($_POST["jk"]);
                    $tplahir = htmlspecialchars($_POST["tplahir"]);
                    $tglahir =htmlspecialchars($_POST["tglahir"]);
                    $alamat = htmlspecialchars($_POST["alamat"]);
                    $ibu = htmlspecialchars($_POST["ibu"]);
                    $ayah = htmlspecialchars($_POST["ayah"]);
                    $tlp = htmlspecialchars($_POST["tlp"]);
                    $email = htmlspecialchars($_POST["email"]);

                    //Query Insert
                    $query = "INSERT INTO tb_siswa (nis_siswa,nisn_siswa,nama_siswa,jk_siswa,tplahir_siswa,tglahir_siswa,alamat_siswa,ibu_siswa,ayah_siswa,tlp_siswa,email_siswa,status_siswa)
                    VALUES ('$nis', '$nisn', '$nama', '$jk', '$tplahir', '$tglahir', '$alamat', '$ibu', '$ayah', '$tlp', '$email', 'aktif')";
                    
                    //Process
                    if (mysqli_query($koneksi, $query)) {
                        $alert = "success";
                        $text = "Data siswa berhasil ditambah";
                    }else{
                        $alert = "error";
                        $text = "Data siswa gagal ditambah";
                    }
                    echo json_encode([
                        "status" => $alert, 
                        "info" => $text
                     ]);

                } catch (Exception $th) {
                    echo json_encode([
                        "status" => "error",
                        "info" => mysqli_error($koneksi)
                    ]);
                }
            break;

            case "editSiswa" :
                try {
                    
                    // Ambil data dari Form Update
                    $idSiswa = htmlspecialchars($_POST["idsiswa"]);
                    $nis = htmlspecialchars($_POST["edit-nis"]);
                    $nisn = htmlspecialchars($_POST["edit-nisn"]);
                    $nama = htmlspecialchars($_POST["edit-nama"]);
                    $jk = htmlspecialchars($_POST["edit-jk"]);
                    $tplahir = htmlspecialchars($_POST["edit-tplahir"]);
                    $tglahir =htmlspecialchars($_POST["edit-tglahir"]);
                    $alamat = htmlspecialchars($_POST["edit-alamat"]);
                    $ibu = htmlspecialchars($_POST["edit-ibu"]);
                    $ayah = htmlspecialchars($_POST["edit-ayah"]);
                    $tlp = htmlspecialchars($_POST["edit-tlp"]);
                    $email = htmlspecialchars($_POST["edit-email"]);

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
                        $text = "Data siswa gagal diupdate";
                    }
                    echo json_encode([
                        "status" => $alert, 
                        "info" => $text
                    ]);

                } catch (Exception $th) {
                    echo json_encode([
                        "status" => "error",
                        "info" => mysqli_error($koneksi)
                    ]);
                }
            break;
            
            case "del" :
                try {
                    $idisiswa = $_POST["id"];

                    // Query Delete
                    $query = "DELETE FROM tb_siswa WHERE id = $idisiswa";

                    //Process
                    if(mysqli_query($koneksi, $query)){
                        $alert = "success";
                        $text = "Data siswa berhasil dihapus";
                    }else{
                        $alert = "error";
                        $text = "Data siswa gagal dihapus";
                    }
                    echo json_encode([
                        "status" => $alert, 
                        "info" => $text
                    ]);

                } catch (Exception $th) {
                    echo json_encode([
                        "status" => "error",
                        "info" => mysqli_error($koneksi)
                    ]);
                }
            break;

        }
    }
    


?>