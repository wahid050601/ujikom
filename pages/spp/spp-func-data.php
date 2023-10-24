<?php
    // Req Connection
    require "../../connection/conn.php";

    $act = $_POST["act"];

    if(isset($act)) {

        switch($act) {

            case "procSpp" :

                if(isset($_POST["validasi"])){
                    $ex = explode("-", $_POST["idsiswa"]);
                
                    $idsiswa = $ex[0];
                    $idspp = $_POST["idspp"];
                    
                    // Proses Validasi
                    $queryVal = "select * from tb_pem_spp where id_siswa = $idsiswa and id_spp = $idspp";
                    $exec = mysqli_query($koneksi, $queryVal);
                    $datavalidasi = [];
                    while($row = mysqli_fetch_row($exec)){
                        $datavalidasi[] = $row;
                    }
                    if($datavalidasi != null){
                        $query1 = "select * from vw_sts_spp_siswa where id = $idsiswa";
                        $exec = mysqli_query($koneksi, $query1);
                        $rest = [];
                        while($row = mysqli_fetch_assoc($exec)){
                            $rest[] = $row;
                        }

                        echo json_encode([
                            "status" => "notreadypay",
                            "datas" => $rest
                        ]);
                    }else{
                        // DATA SISWA
                        $query="select * from tb_siswa where id = $idsiswa";
                        $prep = $koneksi->prepare($query);
                        $prep->execute();
                        $rest = $prep->get_result();

                        $data_siswa = [];
                        while($rows = $rest->fetch_assoc()){
                            array_push($data_siswa, $rows);
                        }

                        // DATA SPP
                        $query="select * from tb_jns_pem where jns_katg = 'spp' and id_jns = $idspp";
                        $prep = $koneksi->prepare($query);
                        $prep->execute();
                        $rest = $prep->get_result();

                        $data_spp = [];
                        while($rows = $rest->fetch_assoc()){
                            array_push($data_spp, $rows);
                        }

                        echo json_encode([
                            "status" => "readypay",
                            "siswa" => $data_siswa,
                            "spp" => $data_spp
                        ]);
                    }
                }

                if(isset($_POST["actntriger"])){
                    $idsiswa = explode("-", $_POST["idsiswapay"])[0];
                    $idspp = $_POST["idspppay"];
                    $idadmin = $_POST["idadminpay"];

                    // Process
                    $query = "insert into tb_pem_spp values (null, $idsiswa, $idspp, $idadmin, 'lunas', now())";
                    $exec = mysqli_query($koneksi, $query);
                    if($exec){

                        echo json_encode([
                            "status" => "success",
                            "info" => "Pembayaran Berhasil",
                            "text" => "SPP berhasil diproses"
                        ]);
                    }else{
                        echo json_encode([
                            "status" => "error",
                            "info" => "Pembayaran Gagal",
                            "text" => "SPP gagal diproses"
                        ]);
                    }
                }
            break;
        }
    }

?>