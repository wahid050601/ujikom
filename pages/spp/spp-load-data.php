<?php
    // Connection
    require "../../connection/conn.php";


    $type = $_POST["type"];

    if(isset($type)){
        
        switch($type){
            case "siswa" :
                try{
                    
                    $query="select * from tb_siswa" ;
                    $prep = $koneksi->prepare($query);
                    $prep->execute();
                    $rest = $prep->get_result();

                    $data_siswa = [];
                    while($rows = $rest->fetch_assoc()){
                        array_push($data_siswa, $rows);
                    }

                    echo json_encode([
                        "status" => "success",
                        "data" => $data_siswa
                    ]);


                }catch(Exception $e){
                    echo json_encode(["status" => $e]);
                }
            break;

            case "spp" :

                $valspp = $_POST['valspp'];
                $parsing = explode("-", $valspp);

                $idsiswa = $parsing[0];

                if($parsing[1] == "Teknik Komputer dan Jaringan"){
                    $idprod = "TKJ";
                }elseif($parsing[1] == "Akuntansi Keuangan dan Lembaga"){
                    $idprod = "AKL";
                }elseif($parsing[1] == "Bisnis Daring dan Pemasaran"){
                    $idprod = "BDP";
                }
                
                try{
                    
                    $query="select * from tb_jns_pem where jns_katg = 'spp' and jns_ket = '$idprod'" ;
                    $prep = $koneksi->prepare($query);
                    $prep->execute();
                    $rest = $prep->get_result();

                    $data_spp = [];
                    while($rows = $rest->fetch_assoc()){
                        array_push($data_spp, $rows);
                    }

                    echo json_encode([
                        "status" => "success",
                        "data" => $data_spp,
                        "paramp" => $idsiswa
                    ]);


                }catch(Exception $e){
                    echo json_encode(["status" => $e]);
                }
            break;

            case "dtlSppSiswa" : 
                $parsing = explode("-", $_POST["idsiswa"]);
                $idsiswa = $parsing[0];

                try{
                    
                    $query="select * from vw_sts_spp_siswa where id = $idsiswa" ;
                    $prep = $koneksi->prepare($query);
                    $prep->execute();
                    $rest = $prep->get_result();

                    $dtl_spp = [];
                    while($rows = $rest->fetch_assoc()){
                        array_push($dtl_spp, $rows);
                    }

                    echo json_encode([
                        "status" => "success",
                        "data" => $dtl_spp,
                    ]);


                }catch(Exception $e){
                    echo json_encode(["status" => $e]);
                }
            break;

            case "showSppSiswa" : 
                $idspp = $_POST["idspp"];

                try{
                    
                    $query="select * from vw_sts_spp_siswa where id_jns = $idspp" ;
                    $prep = $koneksi->prepare($query);
                    $prep->execute();
                    $rest = $prep->get_result();

                    $show_spp = [];
                    while($rows = $rest->fetch_assoc()){
                        array_push($show_spp, $rows);
                    }

                    echo json_encode([
                        "status" => "success",
                        "data" => $show_spp,
                    ]);


                }catch(Exception $e){
                    echo json_encode(["status" => $e]);
                }
            break;

        }
    }
?>