<?php
require "../../connection/conn.php";



if(isset($_POST["action"])){
    $action = $_POST["action"];
    switch($action){

        case "addDataUser" :
            try {
                
                // Set data
                $username = $_POST["username"];
                $password = $_POST["password"];
                $nama = $_POST["nama"];
                $telp = $_POST["telp"];
                $email = $_POST["email"];
                $alamat = $_POST["alamat"];
                $statusakun = $_POST["statusakun"];
                $role = $_POST["role"];

                // Query insert to table admin
                $queryIns = "insert into tb_admin (user_adm,pass_adm,nama_adm,alamat_adm,tlp_adm,email_adm,sts_akun_adm,role_adm)
                values ('$username', '$password', '$nama', '$alamat', '$telp', '$email', $statusakun, '$role')";
                $execQ = mysqli_query($koneksi, $queryIns);

                // Inser to role menu access
                $roleInsert = "insert into tb_menu_access (admin_id,pembayaran,konfig_user,dt_siswa_aktif,td_siswa_nonaktif,rombel_prodi,kat_pembayaran,catatan_pemasukan,catatan_pengeluaran,rekap_keuangan,rekap_pembayaran) values ";
                $id_user = mysqli_insert_id($koneksi);
                if($role == "kepsek"){
                    $roleInsert .= "($id_user, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1)";
                }elseif($role == "bendahara"){
                    $roleInsert .= "($id_user, 0, 0, 0, 0, 0, 1, 1, 1, 1, 1)";
                }elseif($role == "tu"){
                    $roleInsert .= "($id_user, 1, 0, 0, 0, 0, 0, 1, 1, 0, 0)";
                }else{
                    $roleInsert .= "($id_user, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1)";
                }
                $execRole = mysqli_query($koneksi, $roleInsert);

                echo json_encode([
                    "status" => "success",
                    "info" => "Data pengguna berhasil ditambahkan"
                ]);

            } catch (\Throwable $th) {
                echo json_encode([
                    "status" => "error",
                    "info" => $th->getMessage()
                ]);
            }
        break;

        case "editDataUser" :
            try {
                
                // Set data
                $iduser = $_POST["iduser"];
                $username = $_POST["username"];
                $password = $_POST["password"];
                $nama = $_POST["nama"];
                $telp = $_POST["telp"];
                $email = $_POST["email"];
                $alamat = $_POST["alamat"];
                $statusakun = $_POST["statusakun"];
                $role = $_POST["role"];

                $updateQuery = "update tb_admin set
                user_adm = '$username',
                pass_adm = '$password',
                nama_adm = '$nama',
                alamat_adm = '$alamat',
                tlp_adm = '$telp',
                email_adm = '$email',
                sts_akun_adm = $statusakun,
                role_adm = '$role' where id_adm = $iduser";
                
                mysqli_query($koneksi, $updateQuery);

                echo json_encode([
                    "status" => "success",
                    "info" => "Update data pengguna berhasil"
                ]);

            } catch (\Throwable $th) {
                echo json_encode([
                    "status" => "error",
                    "info" => $th->getMessage()
                ]);
            }
        break;

        case "deleteDataUser" :
            try {
                
                $iduser = $_POST["iduser"];

                $delQuery = "delete from tb_admin where id_adm = ". $iduser;
                mysqli_query($koneksi, $delQuery);

                // Hapus config role menu
                $delMenu = "delete from tb_menu_access where admin_id = ". $iduser;
                mysqli_query($koneksi, $delMenu);

                echo json_encode([
                    "status" => "success",
                    "info" => "Hapus data pengguna berhasil"
                ]);

            } catch (\Throwable $th) {
                echo json_encode([
                    "status" => "error",
                    "info" => $th->getMessage()
                ]);
            }
        break;

        case "configUserMenu" :
            try {
                
                $menus = $_POST["dataconfig"];

                $updateConfig = "
                update tb_menu_access set 
                pembayaran = ". $menus["pembayaran"] .",
                konfig_user = ". $menus["config_user"] .",
                dt_siswa_aktif = ". $menus["siswa_aktif"] .",
                td_siswa_nonaktif = ". $menus["siswa_non"] .",
                rombel_prodi = ". $menus["prodi_rombel"] .",
                kat_pembayaran = ". $menus["katg_pem"] .",
                catatan_pemasukan = ". $menus["catatan_pem"] .",
                catatan_pengeluaran = ". $menus["catatan_peng"] .",
                rekap_keuangan = ". $menus["rekap_keuangan"] .",
                rekap_pembayaran = ". $menus["rekap_pem"] ."
                where admin_id = ". $menus["iduser"];
                $exec = mysqli_query($koneksi, $updateConfig);

                $status = "";
                if($exec == "1"){
                    $status = "success";
                }else{
                    $status = "error";
                }

                echo json_encode([
                    "status" => $status,
                    "info" => "Update config role menu ". $status
                ]);

            } catch (\Throwable $th) {
                echo json_encode([
                    "status" => "success",
                    "info" => $th->getMessage()
                ]);
            }
        break;
    }

}

