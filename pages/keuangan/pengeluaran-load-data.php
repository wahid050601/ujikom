<?php
require "../../connection/conn.php";

$action = $_POST["action"];
if(isset($action)){
    switch($action){

        case "loadLaporan" :
            try {
                $getLaporan = "select * from tb_master_lap_pengeluaran";
                $exec = mysqli_query($koneksi, $getLaporan);
                $laporanPeng = [];
                while($row = mysqli_fetch_assoc($exec)){
                    $laporanPeng[] = $row;
                }

                echo json_encode([
                    "status" => "success",
                    "datalap" => $laporanPeng,
                    "info" => ""
                ]);

            } catch (Exception $th) {
                echo json_encode([
                    "status" => "error",
                    "info" => $th
                ]);
            }
        break;

        case "loadProcessLaporan" :
            try {
                $idlap = $_POST["idlaporan"];

                // Get master laporan
                $getMasterLaporan = "select * from tb_master_lap_pengeluaran where id = ". $idlap;
                $execMasterLap = mysqli_query($koneksi, $getMasterLaporan);
                $masterLaporan = mysqli_fetch_assoc($execMasterLap);

                // Get Detail Laporan
                $getDetailLaporan = "select * from tb_lap_pengeluaran where id_ms_lap = ". $idlap;
                $execDetailLap = mysqli_query($koneksi, $getDetailLaporan);
                $detailLaporan = [];
                while($row = mysqli_fetch_assoc($execDetailLap)){$detailLaporan[] = $row;}

                echo json_encode([
                    "status" => "success",
                    "master" => $masterLaporan,
                    "detail" => $detailLaporan
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


?>