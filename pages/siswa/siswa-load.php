<?php
    // Connection
    require "../../connection/conn.php";

    $action = $_POST["action"];
    
    if(isset($_POST["action"])) {
        switch ($action) {

            case 'getDataSiswa':
                try{
                    
                    $query_getsiswa = "SELECT * FROM tb_siswa WHERE status_siswa in ('aktif','pindahan') ORDER BY nama_siswa ASC";
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

        }
    }