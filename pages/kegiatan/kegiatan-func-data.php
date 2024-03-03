<?php

    // GET CONNECTION
    require "../../connection/conn.php";

    $action = $_POST["action"];

    if(isset($action)){
        switch($action){

            case "checkPemkegiatan" :
                try {

                    if($_POST["trigger"] == "cicilan"){
                        $idpem = $_POST["idpem"];
                        $idsiswa = $_POST["idsiswa"];
    
                        // get information
                        $queryGetPem = "select * from tb_jns_pem where id_jns = ". $idpem;
                        $execQuerygetpem = mysqli_query($koneksi, $queryGetPem);
                        $infopem = mysqli_fetch_assoc($execQuerygetpem);
    
                        // get status pembayaran
                        $getstatuspem = "select * from tb_pem_kegiatan where id_siswa = ". $idsiswa ." and id_keg = ". $idpem;
                        $execgetstatuspem = mysqli_query($koneksi,$getstatuspem);
                        $datastatuspemsiswa = [];
                        while($row = mysqli_fetch_assoc($execgetstatuspem)){
                            $datastatuspemsiswa[] = $row;
                        }

                        // check sisa pem
                        $checkpemsiswa = "select ifnull(sum(nom_pem),0) as ex_pem from tb_pem_kegiatan where id_siswa = ". $idsiswa ." and id_keg = ". $idpem;
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

                        $checkpemsiswa = "select ifnull(sum(nom_pem),0) as ex_pem from tb_pem_kegiatan where id_siswa = ". $idsiswa ." and id_keg = ". $idpem;
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


            case "valPemkegiatan" :
                try {

                    if($_POST["trigger"] == "validasi"){
                        // Get val info pem
                        $idsiswa = $_POST["idsiswa"];
                        $idpem = $_POST["idpem"];

                        $getvalinfopem = "select * from vw_sts_kegiatan_siswa where id = ". $idsiswa ." and id_jns = ". $idpem;
                        $execvalpem = mysqli_query($koneksi,$getvalinfopem);
                        $datavalpem = [];
                        while($row = mysqli_fetch_assoc($execvalpem)){
                            $datavalpem[] = $row;
                        }

                        // Get info pem
                        $getinfopem = "select * from tb_jns_pem where id_jns = ". $idpem;
                        $execpem = mysqli_query($koneksi, $getinfopem);
                        $datainfopem = mysqli_fetch_assoc($execpem);

                        // Get info pem siswa
                        $getinfopemsiswa = "select coalesce(sum(nom_pem),0) as pem_siswa from tb_pem_kegiatan where id_siswa = ". $idsiswa;
                        $execpemsiswa = mysqli_query($koneksi,$getinfopemsiswa);
                        $datapemsiswa = mysqli_fetch_assoc($execpemsiswa);

                        // Get info siswa
                        $getinfosiswa = "select * from tb_siswa where id = ". $idsiswa;
                        $execinfosiswa = mysqli_query($koneksi, $getinfosiswa);
                        $datasiswa = mysqli_fetch_assoc($execinfosiswa);


                        

                        echo json_encode([
                            "status" => "success",
                            "lastpem" => $datapemsiswa["pem_siswa"],
                            "dataval" => $datavalpem,
                            "datapem" => $datainfopem,
                            "datasiswa" => $datasiswa
                        ]);
                    }


                    elseif($_POST["trigger"] == "procpem"){
                        $idsiswa = $_POST["siswa"];
                        $idpem = $_POST["idpem"];
                        $ketpem = $_POST["ketpem"];
                        $nompem = $_POST["nompem"];
                        $status = $_POST["status"];

                        $qinsDatapem = "insert into tb_pem_kegiatan values (null,".$idsiswa.", ".$idpem.", 1, '".$ketpem."', ".$nompem.", '".$status."', now())";
                        $execqinsDatapem = mysqli_query($koneksi, $qinsDatapem);
                        
                        $status = $execqinsDatapem == true ? "success" : "failed";
                        $alert = $execqinsDatapem == true ? "berhasil" : "gagal";
                        echo json_encode([
                            "status" => $status,
                            "info" => "Pembayaran ". $alert ." di proses"
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