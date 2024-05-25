<?php
require "../../connection/conn.php";

$action = $_POST["action"];

if(isset($action)){
    switch($action){

        case "loadRombel" :
            try {
                
                $getRombel = "select * from tb_rombel_siswa order by kelas_rbl,nama_rbl asc";
                $exec = mysqli_query($koneksi, $getRombel);
                $dataRombel = [];
                while($row = mysqli_fetch_assoc($exec)){
                    $dataRombel[] = $row;
                }

                echo json_encode([
                    "status" => "success",
                    "datarombel" => $dataRombel
                ]);

            } catch (Exception $th) {
                echo json_encode([
                    "status" => "error",
                    "info" => json_encode($th)
                ]);
            }
        break;

        case "loadSingleRombel" :
            try {
                
                $id = $_POST["idrombel"];
                
                $getSingleRombel = "
                select c.id, c.nama_siswa, c.nis_siswa, c.nisn_siswa, c.kls_siswa from tb_rombel_siswa_stg a
                left join tb_rombel_siswa b on b.id_rbl = a.id_rbl 
                left join tb_siswa c on c.id = a.id_siswa
                where a.id_rbl = ". $id ." order by c.nama_siswa asc";

                $exec_sgrbl = mysqli_query($koneksi, $getSingleRombel);
                $listDataRombel = [];
                while($row = mysqli_fetch_assoc($exec_sgrbl)){
                    $listDataRombel[] = $row;
                }

                echo json_encode([
                    "status" => "success",
                    "datarbl" => $listDataRombel
                ]);

            } catch (Exception $th) {
                echo json_encode([
                    "status" => "error",
                    "info" => json_encode($th)
                ]);
            }
        break;
        
        case "editLoadSingleRombel" :
            try {
                
                $idrombel = $_POST["idrombel"];

                // Load data Rombel
                $getRombel = "select * from tb_rombel_siswa where id_rbl = ". $idrombel;
                $exec_rbl = mysqli_query($koneksi, $getRombel);
                $rombel = mysqli_fetch_assoc($exec_rbl);

                // Load data Siswa
                $getSiswa = "
                select a.id, a.nama_siswa, a.nis_siswa, a.nisn_siswa, a.kls_siswa, b.id_siswa from tb_siswa a
                left join tb_rombel_siswa_stg b on a.id = b.id_siswa
                where a.kls_siswa = '". $rombel["kelas_rbl"] ."' and a.tp_siswa = '". explode(" ", $rombel["tp_rbl"])[0] ."' and b.id_siswa is null
                order by a.nama_siswa asc";
                $exec_siswa = mysqli_query($koneksi, $getSiswa);
                $data_siswa = [];
                while($row = mysqli_fetch_assoc($exec_siswa)){
                    $data_siswa[] = $row;
                }

                echo json_encode([
                    "status" => "success",
                    "listsiswa" => $data_siswa
                ]);

            } catch (Exception $th) {
                echo json_encode([
                    "status" => "error",
                    "info" => json_encode($th)
                ]);
            }
        break;

    }
}