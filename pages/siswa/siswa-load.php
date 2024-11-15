<?php
    // header('Access-Control-Allow-Origin: *');
    // header('Content-Type: application/json');
    // $data = json_decode(file_get_contents('php://input'), true);
    // Connection
    require "../../connection/conn.php";
    
    if(isset($_POST["action"])) {
        $action = $_POST["action"];

        switch ($action) {

            case 'getDataSiswa':
                try{
                    
                    $query_getsiswa = "
                    SELECT a.*, coalesce(c.nama_rbl, '') as nama_rbl , coalesce(substring_index(c.tp_rbl, ' ', -1), '') as smtr  FROM tb_siswa a
                    left join tb_rombel_siswa_stg b on a.id = b.id_siswa
                    left join tb_rombel_siswa c on c.id_rbl = b.id_rbl
                    WHERE status_siswa in ('aktif','pindahan') ORDER BY nama_siswa ASC";
                    $exec_data_siswa = mysqli_query($koneksi, $query_getsiswa);
                    $data_siswa = [];
                    while($row = mysqli_fetch_assoc($exec_data_siswa)) {
                        $row["btn"] = '<span class="label btn-primary rounded" id="btnEdit" data-id="'.$row["id"].'"><i class="fas fa-pencil-alt"></i></span><span class="label btn-danger rounded" id="btnDell" data-id="'.$row["id"].'"><i class="fas fa-trash"></i></span>';
                        $data_siswa[] = $row;
                    }

                    echo json_encode([
                        "status" => "success",
                        "datatable" => [
                            // "columns" => $columns,
                            "data" => $data_siswa
                        ]
                    ]);

                }catch(Exception $e){
                    echo json_encode([
                        "status" => "error",
                        "info" => $e
                    ]);
                }

            break;


            case 'getDataSiswaNonaktif':
                try{
                    
                    $query_getsiswa = "SELECT * FROM tb_siswa WHERE status_siswa = 'non-aktif' ORDER BY nama_siswa ASC";
                    $exec_data_siswa = mysqli_query($koneksi, $query_getsiswa);
                    $data_siswa_non = [];
                    while($row = mysqli_fetch_assoc($exec_data_siswa)) {
                        $data_siswa_non[] = $row;
                    }

                    echo json_encode([
                        "status" => "success",
                        "datasiswa" => $data_siswa_non
                    ]);

                }catch(Exception $e){
                    echo json_encode([
                        "status" => "error",
                        "info" => $e
                    ]);
                }

            break;


            // Case Single
            case 'getDetailSiswa':
                try {
                    
                    $idsiswa = $_POST["idsiswa"];
                    $query = "SELECT * FROM tb_siswa WHERE id = ". $idsiswa;
                    $execDataSiswa = mysqli_query($koneksi, $query);
                    $detailSiswa = [];
                    while($row = mysqli_fetch_assoc($execDataSiswa)){$detailSiswa[] = $row;}

                    echo json_encode([
                        "status" => "success",
                        "datasiswa" => $detailSiswa
                    ]);

                } catch (Exception $th) {
                    echo json_encode([
                        "status" => "error",
                        "info" => $th
                    ]);
                }
            break;


            case "loadProdi" :
                try {
                    
                    $getProdi = "select * from tb_prodi";
                    $execProdi = mysqli_query($koneksi, $getProdi);
                    $prodi = [];
                    while($row = mysqli_fetch_assoc($execProdi)){$prodi[] = $row;}

                    echo json_encode([
                        "status" => "success",
                        "prodi" => $prodi
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