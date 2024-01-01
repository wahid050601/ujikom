<?php

    // GET CONNECTION
    require "../../connection/conn.php";

    $action = $_POST["action"];

    if(isset($action)){
        switch($action){

            case "checkPemUjian" :
                try {
                    $idpem = $_POST["idpem"];

                    $queryGetPem = "select * from tb_jns_pem where id_jns = ". $idpem;
                    $execQuerygetpem = mysqli_query($koneksi, $queryGetPem);
                    $dataPem = [];
                    while($row = mysqli_fetch_assoc($execQuerygetpem)){
                        $dataPem[] = $row;
                    }

                    echo json_encode([
                        "status" => "success",
                        "datapem" => $dataPem,
                    ]);

                } catch (Exception $e) {
                    echo json_encode([
                        "status" => "error",
                        "datapem" => ""
                    ]);
                }
                break;

        }
    }





?>