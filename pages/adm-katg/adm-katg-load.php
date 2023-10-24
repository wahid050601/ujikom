<?php
    // Connection DB
    require "../../connection/conn.php";

    $type = $_POST["type"];
    
    if(isset($type)) {

        switch($type) {

            case "groupKatg" :
                try{
                    
                    $query="select * from tb_katg_pem";
                    $prep = $koneksi->prepare($query);
                    $prep->execute();
                    $rest = $prep->get_result();

                    // $kategori = [];
                    $i = 1;
                    $nomer = 1;
                    while($rows = $rest->fetch_assoc()){
                        // array_push($kategori, $rows);
                        $data[$i]["num"] = $nomer++;
                        $data[$i]["id"] = $rows["id_katg"];
                        $data[$i]["katg"] = $rows["katg_pem"];
                        $data[$i]["action"] = "
                            <span id='btnKatg' data-idkatg=".$rows["katg_pem"]." class='label btn-primary'><i class='fas fa-sync-alt'></i></span>
                            <span id='btnKatg' data-idkatg=".$rows["katg_pem"]." class='label btn-danger'><i class='fas fa-angle-double-right'></i></span>

                        ";
                        $data[$i]["ket"] = $rows["katg_ket"];

                        $i++;
                    }
                    
                    $kategori = array_values($data);
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
                    $prep = $koneksi->prepare($query);
                    $prep->execute();
                    $rest = $prep->get_result();

                    $i = 1;
                    $nomer = 1;
                    $data = '';
                    while($rows = $rest->fetch_assoc()){
                        // array_push($kategori, $rows);

                        $data[$i]["num"] = $nomer++;
                        $data[$i]["id"] = $rows["id_jns"];
                        $data[$i]["pem"] = $rows["jns_pem"];
                        $data[$i]["katg"] = $rows["jns_katg"];
                        $data[$i]["nominal"] = number_format($rows["jns_val"]);
                        $data[$i]["cicil"] = $rows["jsn_ccl"];
                        $data[$i]["tp"] = $rows["jns_tp"];
                        $data[$i]["smtr"] = $rows["smtr"];
                        $data[$i]["ket"] = $rows["jns_ket"];

                        $i++;
                    }

                    if($data == null){
                        echo json_encode([
                            "status" => "warning",
                            "info" => "data pembayaran ".$katg." kosong, silahkan tambah data",
                        ]);
                    }else{
                        $jenispem = array_values($data);
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