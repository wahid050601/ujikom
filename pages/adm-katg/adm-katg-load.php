<?php
    // Connection DB
    require "../../connection/conn.php";

    $type = $_POST["type"];
    
    if(isset($type)) {

        switch($type) {

            case "groupKatg" :
                try{
                    
                    $query="select * from tb_katg_pem";
                    $execquery = mysqli_query($koneksi, $query);
                    $datakatPem = [];

                    $nomer = 1;
                    while($rows = mysqli_fetch_assoc($execquery)){
                        $datakatPem[] = $rows;
                    }
                    
                    $kategori = array_values($datakatPem);
                    echo json_encode([
                        "status" => "success",
                        "data" => $kategori
                    ]);


                }catch(Exception $e){
                    echo json_encode(["status" => $e]);
                }
            break;

            case "groupPem" :
                $katg = $_POST["idkatg"];
                try{
                    
                    $query="select * from tb_jns_pem where jns_katg = '$katg'";
                    $execqueryJns = mysqli_query($koneksi, $query);

                    $nomer = 1;
                    $dataJnsPem = [];
                    while($rows = mysqli_fetch_assoc($execqueryJns)){
                        // $dataJnsPem[] = $rows["id_jns"];
                        $dataJnsPem[] = [
                            "num" => $nomer++,
                            "id" => $rows["id_jns"],
                            "pem" => $rows["jns_pem"],
                            "katg" => $rows["jns_katg"],
                            "nominal" => number_format($rows["jns_val"]),
                            "cicil" => $rows["jns_ccl"],
                            "tp" => $rows["jns_tp"],
                            "smtr" => $rows["smtr"],
                            "ket" => $rows["jns_ket"]
                        ];
                    }

                    if($dataJnsPem == null){
                        echo json_encode([
                            "status" => "warning",
                            "info" => "data pembayaran ".$katg." kosong, silahkan tambah data",
                        ]);
                    }else{
                        $jenispem = array_values($dataJnsPem);
                        echo json_encode([
                            "status" => "success",
                            "data" => $jenispem,
                        ]);
                    }

                }catch(Exception $e){
                    echo json_encode(["status" => $e]);
                }
            break;
        }

    }
?>