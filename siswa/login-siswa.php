<?php
require "../connection/conn.php";


if(isset($_POST["action"])){
    $action = $_POST["action"];
    switch($action){

        case "login" :
            try {
                $nis = $_POST["nis"];
                
                $getSiswa = "select * from tb_siswa where nis_siswa = '$nis'";
                // $getUser = "select * from tb_admin";
                $execU = mysqli_query($koneksi, $getSiswa);
                $siswa = mysqli_fetch_assoc($execU);
                
                if($siswa == null){
                    echo json_encode([
                        "status" => "error",
                        "info" => "Nomor induk tidak ditemukan"
                    ]);
                    exit;
                }
                
                $getPem = "
                select jns_pem as pem from vw_sts_spp_siswa where nis_siswa = '$nis'
                union all
                select jns_pem as pem from vw_sts_ujian_siswa where nis_siswa = '$nis'
                union all
                select jns_pem as pem from vw_sts_kegiatan_siswa where nis_siswa = '$nis'";
                $execPem = mysqli_query($koneksi, $getPem);
                $pembayaran = [];
                while($row = mysqli_fetch_assoc($execPem)){
                    $pembayaran[] = $row;
                }

                echo json_encode([
                    "status" => "success",
                    "info" => "Login berhasil",
                    "siswa" => $siswa,
                    "bayaran" => $pembayaran
                ]);
                
            } catch (\Throwable $th) {
                echo json_encode([
                    "status" => "error",
                    "info" => $th->getMessage()
                ]);
            }
        break;

        case "getmenus" :
            try {
                $id = $_POST["id"];

                $getMenus = "select * from tb_menu_access where admin_id = ".$id;
                $exec = mysqli_query($koneksi, $getMenus);
                $menus = mysqli_fetch_assoc($exec);


                echo json_encode([
                    "status" => "success",
                    "info" => "ok",
                    "menu" => $menus
                ]);

            } catch (\Throwable $th) {
                echo json_encode([
                    "status" => "error",
                    "info" => $th->getMessage()
                ]);
            }
        break;
    }

}

