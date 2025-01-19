<?php
require "../../connection/conn.php";

$action = $_POST["action"];
if(isset($action)){
    switch($action){

        case "addLaporanPengeluaran" :
            try {
                $laporan = $_POST["namelap"];
                $desc = $_POST["desclap"];

                $SQLinsertLap = "insert into tb_master_lap_pengeluaran
                (create_tgl, nama_lap, desc_lap, status_lap, create_by)
                values (now(), '$laporan', '$desc', 'created', 'admin')";
                error_log($SQLinsertLap);
                $exec = mysqli_query($koneksi, $SQLinsertLap);

                echo json_encode([
                    "status" => $exec == true ? "success" : "error",
                    "info" => $exec == true ? "Laporan berhasil ditambah" : "Laporan gagal ditambah",
                    "note" => mysqli_error($koneksi)
                ]);

            } catch (Exception $th) {
                echo json_encode([
                    "status" => "error",
                    "info" => $th
                ]);
            }
        break;

        case "editLaporanPengeluaran" :
            try {
                // Load before edit
                if(isset($_POST["edited"])){
                    $getSingleLoad = "select * from tb_master_lap_pengeluaran where id = ". $_POST["idlaporan"];
                    error_log($getSingleLoad);
                    $exec = mysqli_query($koneksi, $getSingleLoad);
                    $loadEditdata = mysqli_fetch_assoc($exec);

                    echo json_encode([
                        "status" => "success",
                        "dataedit" => $loadEditdata
                    ]);
                    exit;
                }

                $data = json_decode($_POST["data"], true);
                $sqlEditLaporan = "update tb_master_lap_pengeluaran set nama_lap = '". $data["namelap"] ."', desc_lap = '". $data["desclap"] ."' where id = ". $data["idlaporan"];
                error_log($sqlEditLaporan);
                $exec = mysqli_query($koneksi, $sqlEditLaporan);

                echo json_encode([
                    "status" => $exec == true ? "success" : "error",
                    "info" => "laporan ". ($exec == true ? "berhasil" : "gagal") ." diubah",
                    "note" => mysqli_error($koneksi)
                ]);
                
            } catch (Exception $er) {
                echo json_encode([
                    "status" => "error",
                    "info" => $er
                ]);
            }
        break;

        case "delLaporanPengeluaran" :
            try {
                $idlap = $_POST["idlap"];
                $SQLdel = "delete from tb_master_lap_pengeluaran where id = ". $idlap;
                $exec = mysqli_query($koneksi, $SQLdel);

                echo json_encode([
                    "status" => $exec == true ? "success" : "error",
                    "info" => "Laporan ". ($exec == true ? "berhasil" : "gagal") ." dihapus",
                    "note" => mysqli_error($koneksi)
                ]);

            } catch (Exception $th) {
                echo json_encode([
                    "status" => "error",
                    "info" => $th
                ]);
            }
        break;

        case "addSubLaporanPengeluaran" :
            try {
                $idlaporan = $_POST["idlaporan"];
                $kategori = $_POST["kategori"];
                $nama_pengeluaran = $_POST["nama_pengeluaran"];
                $qty = $_POST["qty"];
                $satuan = $_POST["satuan"];
                $total =  $satuan * $qty;
                $ket = $_POST["ket"];

                $insertLaporan = "insert into tb_lap_pengeluaran values (null, $idlaporan, '$kategori', '$nama_pengeluaran', $qty, $satuan, $total, '$ket', now())";
                error_log("=======". $insertLaporan);
                $procIns = mysqli_query($koneksi, $insertLaporan);

                if($procIns == true){
                    $status = "success";
                    $info = "<span class='text-success'><i class='fas fa-check'></i> sub laporan berhasil ditambah</span>";
                }else{
                    $status = "error";
                    $info = "<span class='text-danger'><i class='fas fa-times'></i> sub laporan gagal ditambah</span>";
                }

                echo json_encode([
                    "status" => $status,
                    "info" => $info
                ]);

            } catch (Exception $th) {
                echo json_encode([
                    "status" => "error",
                    "info" => "<span class='text-danger'><i class='fas fa-times'></i> ".$th->getMessage()."</span>"
                ]);
            }
        break;

        case "delSubLaporanPengeluaran" :
            try {
                $idsub = $_POST["idsublaporan"];

                $SQLdelSubLaporan = "delete from tb_lap_pengeluaran where id = ". $idsub;
                $execDelSub = mysqli_query($koneksi, $SQLdelSubLaporan);

                if($execDelSub == true){
                    $status = "success";
                    $info  = "<span class='text-success'><i class='fas fa-check'></i> sub laporan berhasil dihapus</span>";
                }else{
                    $status = "error";
                    $info  = "<span class='text-red'><i class='fas fa-times'></i> sub laporan gagal dihapus</span>";
                }

                echo json_encode([
                    "status" => $status,
                    "info" => $info
                ]);

            } catch (Exception $th) {
                echo json_encode([
                    "status" => "error",
                    "info" => "<span class='text-red'><i class='fas fa-times></i> ".json_encode($th)."</span>"
                ]);
            }
        break;

        case "commitLaporanPengeluaran" :
            try {
                $idlaporan = $_POST["idlaporan"];

                $updateStatus = "update tb_master_lap_pengeluaran set adj_tgl = now(), adj_by = 'admin', status_lap = 'commited' where id = ". $idlaporan;
                $execUpdt = mysqli_query($koneksi, $updateStatus);

                if($execUpdt == true){
                    $status = "success";
                    $info = "laporan berhasil Commit";
                }else{
                    $status = "error";
                    $info = "laporan gagal Commit";
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
    }
}

?>