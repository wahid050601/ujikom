<?php
require "../../connection/conn.php";

// Get Action
$action = $_POST["action"];

if(isset($action)){
    switch($action){

        case "loadDataPemasukan" :
            try {

                // Set Periode
                $periode = "";
                if($_POST["fperiode"] != "" && $_POST["lperiode"] != ""){
                    $periode .= "where date(tanggal_pem) between '". $_POST["fperiode"] ."' and '". $_POST["lperiode"] ."'";
                }

                $getListData = "select * from vw_pemasukan_list $periode order by tanggal_pem asc";
                error_log($getListData);
                $execData = mysqli_query($koneksi, $getListData);
                $listDataPem = [];
                while($row = mysqli_fetch_assoc($execData)){
                    $listDataPem[] = $row;
                }

                // Get realtime
                $getNRTlistpem = "select * from vw_pemasukan_list where date(tanggal_pem) = date(now()) order by tanggal_pem asc";
                $execNRT = mysqli_query($koneksi, $getNRTlistpem);
                $nrtList = [];
                while($row = mysqli_fetch_assoc($execNRT)){
                    $nrtList[] = $row;
                }

                echo json_encode([
                    "status" => "success",
                    "dataPem" => $listDataPem,
                    "nrt" => $nrtList
                ]);
                exit;

            } catch (Exception $th) {
                echo json_encode([
                    "status" => "error",
                    "info" => $th
                ]);
                exit;
            }
        break;

        case "loadDataPemasukanNRT" :
            try {
                
                // Get realtime
                $getNRTlistpem = "select * from vw_pemasukan_list where date(tanggal_pem) = date(now()) order by tanggal_pem asc";
                $execNRT = mysqli_query($koneksi, $getNRTlistpem);
                $nrtList = [];
                while($row = mysqli_fetch_assoc($execNRT)){
                    $nrtList[] = $row;
                }

                echo json_encode([
                    "status" => "success",
                    "nrt" => $nrtList
                ]);
                exit;

            } catch (Exception $th) {
                echo json_encode([
                    "status" => "success",
                    "info" => $th
                ]);
                exit;
            }
        break;

    }
}



?>