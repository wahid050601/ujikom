<?php

    // req-Database
    require "../../connection/conn.php";

    $idKat = $_POST["idkat"];



    // Process load data
    if(isset($idKat)) {

        switch ($idKat) {
            
            case "loadkat" :
                try{

                    $query="select * from tb_katg_pem" ;
                    $prep = $koneksi->prepare($query);
                    $prep->execute();
                    $rest = $prep->get_result();

                    $kategori = [];
                    while($rows = $rest->fetch_assoc()){
                        array_push($kategori, $rows);
                    }

                    echo json_encode([
                        "status" => "success",
                        "data" => $kategori
                    ]);

                }catch(Exception $e){

                    echo json_encode([
                        "status" => "error",
                        "info" => $e
                    ]);
                }
            break;

            case "loadpath" :
                // get kategori
                $katpem = $_POST["katpem"];
                try{
                    echo json_encode([
                        "status" => "status",
                        "path" => $katpem."/".$katpem.".php"
                    ]);


                }catch(Exception $e){
                    echo json_encode([
                        "status" => "error",
                        "info" => $e
                    ]);

                }
        }
    }

?>