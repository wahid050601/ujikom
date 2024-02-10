<?php

    // GET CONNECTION
    require "../../connection/conn.php";

    $action = $_POST["action"];

    if(isset($action)){
        switch($action){

            case "checkPemUjian" :
                try {

                    if($_POST["trigger"] == "cicilan"){
                        $idpem = $_POST["idpem"];
                        $idsiswa = $_POST["idsiswa"];
    
                        // get information
                        $queryGetPem = "select * from tb_jns_pem where id_jns = ". $idpem;
                        $execQuerygetpem = mysqli_query($koneksi, $queryGetPem);
                        $infopem = mysqli_fetch_assoc($execQuerygetpem);
    
                        // get status pembayaran
                        $getstatuspem = "select * from tb_pem_ujian where id_siswa = ". $idsiswa ." and id_ujian = ". $idpem;
                        $execgetstatuspem = mysqli_query($koneksi,$getstatuspem);
                        $datastatuspemsiswa = [];
                        while($row = mysqli_fetch_assoc($execgetstatuspem)){
                            $datastatuspemsiswa[] = $row;
                        }
    
                        echo json_encode([
                            "status" => "success",
                            "infopem" => $infopem,
                            "datapem" => $datastatuspemsiswa
                        ]);

                    }elseif($_POST["trigger"] == "lunas"){
                        $idpem = $_POST["idpem"];
                        $idsiswa = $_POST["idsiswa"];

                        $checkpemsiswa = "select ifnull(sum(nom_pem),0) as ex_pem from tb_pem_ujian where id_siswa = ". $idsiswa ." and id_ujian = ". $idpem;
                        $execcheckpemsiswa = mysqli_query($koneksi,$checkpemsiswa);
                        $datapem = mysqli_fetch_assoc($execcheckpemsiswa);

                        $checknompem = "select jns_val from tb_jns_pem where id_jns = ". $idpem;
                        $execcheckpem = mysqli_query($koneksi,$checknompem);
                        $nompem = mysqli_fetch_assoc($execcheckpem);

                        
                        echo json_encode([
                            "status" => "success",
                            "infopem" => $nompem["jns_val"]-$datapem["ex_pem"],
                            // "datapem" => $datastatuspemsiswa
                        ]);

                    }

                } catch (Exception $e) {
                    echo json_encode([
                        "status" => "error",
                        "datapem" => ""
                    ]);
                }
                break;


            case "valPemUjian" :
                try {
                    $idsiswa = $_POST["idsiswa"];
                    $idpem = $_POST["idpem"];
                    $nompem = $_POST["nompem"];

                    // Check pembayaran
                    $jenisPem = "select * from tb_jns_pem where id_jns = ". $idpem;
                    $execjenisPem = mysqli_query($koneksi,$jenisPem);
                    $infoPem = mysqli_fetch_assoc($execjenisPem);

                    // $statusCicilan = 
                    


                    // echo json_encode();
                    

                } catch (Exception $th) {
                    
                }
                break;
        }
    }





?>