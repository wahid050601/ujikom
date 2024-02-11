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

                        // check sisa pem
                        $checkpemsiswa = "select ifnull(sum(nom_pem),0) as ex_pem from tb_pem_ujian where id_siswa = ". $idsiswa ." and id_ujian = ". $idpem;
                        $execcheckpemsiswa = mysqli_query($koneksi,$checkpemsiswa);
                        $datapem = mysqli_fetch_assoc($execcheckpemsiswa);

                        $checknompem = "select jns_val from tb_jns_pem where id_jns = ". $idpem;
                        $execcheckpem = mysqli_query($koneksi,$checknompem);
                        $nompem = mysqli_fetch_assoc($execcheckpem);
    
                        echo json_encode([
                            "status" => "success",
                            "infopem" => $infopem,
                            "datapem" => $datastatuspemsiswa,
                            "sisapem" => $nompem["jns_val"]-$datapem["ex_pem"]
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
                    // $nompem = $_POST["nompem"];

                    if($_POST["trigger"] == "validasi"){
                        // Get val info pem
                        $getvalinfopem = "select * from vw_sts_ujian_siswa where id = ". $idsiswa ." and id_jns = ". $idpem;
                        $execvalpem = mysqli_query($koneksi,$getvalinfopem);
                        $datavalpem = [];
                        while($row = mysqli_fetch_assoc($execvalpem)){
                            $datavalpem[] = $row;
                        }

                        // Get info pem
                        $getinfopem = "select * from tb_jns_pem where id_jns = ". $idpem;
                        $execpem = mysqli_query($koneksi, $getinfopem);
                        $datainfopem = mysqli_fetch_assoc($execpem);

                        // Get info siswa
                        $getinfosiswa = "select * from tb_siswa where id = ". $idsiswa;
                        $execinfosiswa = mysqli_query($koneksi, $getinfosiswa);
                        $datasiswa = mysqli_fetch_assoc($execinfosiswa);
                        

                        echo json_encode([
                            "status" => "success",
                            "dataval" => $datavalpem,
                            "datapem" => $datainfopem,
                            "datasiswa" => $datasiswa
                        ]);
                    }
                    
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