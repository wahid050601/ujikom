<?php
require "../../connection/conn.php";

$action = $_POST["action"];

if(isset($action)){
    switch($action){

        case "addRombel" :
            try {
                $rombel = $_POST["rombel"];
                $kelas = $_POST["kelas"];
                $prodi = $_POST["prodi"];
                $tp = $_POST["tp"];
                $smtr = $_POST["smtr"];


                $insRombel = "insert into tb_rombel_siswa (id_rbl,nama_rbl,kelas_rbl,prodi_rbl,tp_rbl,status_rbl)
                values (null, '$rombel', '$kelas', '$prodi', '$tp $smtr', 'aktif')";
                error_log($insRombel);
                $exec_rombel = mysqli_query($koneksi, $insRombel);

                $status = $exec_rombel == true ? "success" : "error";

                echo json_encode([
                    "status" => $status,
                    "info" => $exec_rombel == true ? "rombel berhasil ditambah" : "rombel gagal ditambah"
                ]);

            } catch (Exception $th) {
                echo json_encode([
                    "status" => "error",
                    "info" => json_encode($th)
                ]);
            }
        break;

        case "regRombelSiswa" :
            try {
                
                $idSiswa = json_decode($_POST["idsiswa"], true);
                $idrombel = $_POST["idrombel"];

                foreach($idSiswa as $id){
                    $insRombelStg = "insert into tb_rombel_siswa_stg (id_stg,id_rbl,id_siswa) values (null, $idrombel, $id)";
                    $execStg_rombel = mysqli_query($koneksi, $insRombelStg);
                }

                echo json_encode([
                    "status" => "success",
                    "info" => ""
                ]);

            } catch (Exception $th) {
                echo json_encode([
                    "status" => "error",
                    "info" => json_encode($th)
                ]);
            }
        break;

        case "unregRombelSiswa" :
            try {
                
                $idSiswa = json_decode($_POST["idsiswa"], true);
                $idrombel = $_POST["idrombel"];

                foreach($idSiswa as $id){
                    $delRombelStg = "delete from tb_rombel_siswa_stg where id_siswa = $id";
                    $execStg_rombel = mysqli_query($koneksi, $delRombelStg);
                }

                echo json_encode([
                    "status" => "success",
                    "info" => ""
                ]);

            } catch (Exception $th) {
                echo json_encode([
                    "status" => "error",
                    "info" => json_encode($th)
                ]);
            }
        break;

        case "naikKelasRombel" :
            try {
                
                $idrombel = $_POST["idrombel"];
                $smtr = $_POST["smtr"];
                $tp = $_POST["tp"];

                $status = "";
                $info = "";

                if($smtr == "ganjil"){
                    $updateRombel = "update tb_rombel_siswa set tp_rbl = replace(tp_rbl, 'ganjil', 'genap') where tp_rbl like '%ganjil' and id_rbl = $idrombel";
                    $execUpRombel = mysqli_query($koneksi, $updateRombel);

                    $status = $execUpRombel == true ? "success" : "error";
                    $info = $execUpRombel == true ? " berada pada semester GENAP Tp.$tp" : "Error System";
                }elseif($smtr == "genap"){
                    $tp_new = explode("/", $tp)[1];
                    $tp_new = $tp_new ."/". $tp_new + 1;

                    // Get Id Siswa
                    $getIdSiswa = "
                    select a.kelas_rbl,b.id_rbl,b.id_siswa from tb_rombel_siswa a
                    left join tb_rombel_siswa_stg b on a.id_rbl = b.id_rbl where a.id_rbl = $idrombel";
                    error_log($getIdSiswa);
                    $execIdSiswa = mysqli_query($koneksi, $getIdSiswa);
                    $idSiswaUpd = [];
                    while($row = mysqli_fetch_assoc($execIdSiswa)){
                        $idSiswaUpd[] = $row;
                    }

                    // Update Rombel
                    $kelas_rombel = "";
                    if($idSiswaUpd[0]["kelas_rbl"] == "X"){$kelas_rombel = "XI";}elseif($idSiswaUpd[0]["kelas_rbl"] == "XI"){$kelas_rombel = "XII";}else{$kelas_rombel = "XII-lulus";}
                    $updateRombel = "update tb_rombel_siswa set tp_rbl = '$tp_new ganjil', kelas_rbl = '$kelas_rombel' where id_rbl = $idrombel";
                    error_log($updateRombel);
                    $execUpRombel = mysqli_query($koneksi, $updateRombel);

                    // Update Siswa
                    foreach($idSiswaUpd as $siswa) {
                        $kelas = "";
                        if($siswa["kelas_rbl"] == "X"){$kelas = "XI";}elseif($siswa["kelas_rbl"] == "XI"){$kelas = "XII";}else{$kelas = "XII-lulus";}

                        $updateSiswa = "update tb_siswa set kls_siswa = '$kelas', tp_siswa = '$tp_new' where id = ". $siswa["id_siswa"];
                        error_log($updateSiswa);
                        $execUpSiswa = mysqli_query($koneksi, $updateSiswa);
                    }

                    $status = "success";
                    $info = " berada di jenjang kelas $kelas_rombel semester GANJIL Tp.$tp_new";
                }

                echo json_encode([
                    "status" => $status,
                    "info" => $info
                ]);

            } catch (Exception $th) {
                echo json_encode([
                    "status" => "error",
                    "info" => json_encode($th)
                ]);
            }
        break;

        case "editNamaRombel" :
            try {
                $idrombel = $_POST["idrombel"];
                $namaRbl = $_POST["nmrombel"];
                
                $updtNmRombel = "update tb_rombel_siswa set nama_rbl = '$namaRbl' where id_rbl = $idrombel";
                $exec = mysqli_query($koneksi, $updtNmRombel);

                echo json_encode([
                    "status" => "success"
                ]);

            } catch (Exception $th) {
                echo json_encode([
                    "status" => "error",
                    "info" => json_encode($th)
                ]);
            }
        break;

        case "delRombel" :
            try {
                
                $idrombel = $_POST["idrombel"];

                $checkRombel = "select count(1) as ttl from tb_rombel_siswa_stg where id_rbl = ". $idrombel;
                $execCheck = mysqli_query($koneksi, $checkRombel);
                $countRombel = mysqli_fetch_assoc($execCheck);

                // Check Rombel Proccess
                $status = "";
                $info = "";
                if($countRombel["ttl"] != 0){
                    $status = "warning";
                    $info = "terdapat ". $countRombel["ttl"] ." siswa aktif pada rombel tersebut. mohon kosongkan rombel terlebih dahulu untuk menghapus rombel";
                
                }else{
                    $delRombel = "delete from tb_rombel_siswa where id_rbl = ". $idrombel;
                    $execDel = mysqli_query($koneksi, $delRombel);

                    $status = "success";
                    $info = "Rombel berhasil dihapus";

                }

                echo json_encode([
                    "status" => $status,
                    "info" => $info
                ]);

            } catch (Exception $th) {
                echo json_encode([
                    "status" => "error",
                    "info" => json_encode($th)
                ]);
            }
        break;

        case "addProdi" :
            try {
                $kode_prodi = $_POST["kode-prodi"];
                $nama_prodi = $_POST["nama-prodi"];
                $kaprodi = $_POST["kaprodi"];


                $insProdi = "insert into tb_prodi (code_prodi,nama_prodi,kaprodi)
                values ('$kode_prodi', '$nama_prodi', '$kaprodi')";
                error_log($insProdi);
                $exec_prodi = mysqli_query($koneksi, $insProdi);

                $status = $exec_prodi == true ? "success" : "error";

                echo json_encode([
                    "status" => $status,
                    "info" => $exec_prodi == true ? "prodi berhasil ditambah" : "prodi gagal ditambah"
                ]);

            } catch (Exception $th) {
                echo json_encode([
                    "status" => "error",
                    "info" => $th->getMessage()
                ]);
            }
        break;

        case "deleteProdi" :
            try {
                $idprodi = $_POST["code"];

                // Query Delete
                $query = "DELETE FROM tb_prodi WHERE code_prodi = '$idprodi'";

                //Process
                if(mysqli_query($koneksi, $query)){
                    $alert = "success";
                    $text = "Prodi berhasil dihapus";
                }else{
                    $alert = "error";
                    $text = "Prodi gagal dihapus";
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

        case "editProdi" :
            try {
                    
                // Ambil data dari Form Update
                $oldProdiCode = htmlspecialchars($_POST["code-old-prodi"]);
                $code_prodi = htmlspecialchars($_POST["kode-prodi-edit"]);
                $nama_prodi = htmlspecialchars($_POST["nama-prodi-edit"]);
                $kaprodi = htmlspecialchars($_POST["kaprodi-edit"]);

                // Query Update
                $query = "UPDATE tb_prodi SET 
                    code_prodi = '$code_prodi', 
                    nama_prodi = '$nama_prodi', 
                    kaprodi = '$kaprodi'
                    where code_prodi = '$oldProdiCode'";
                
                //Process
                if (mysqli_query($koneksi, $query)) {
                    $alert = "success";
                    $text = "Data Prodi berhasil diupdate";
                }else{
                    $alert = "error";
                    $text = "Data Prodi gagal diupdate";
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