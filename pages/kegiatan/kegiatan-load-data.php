<?php
    // Connection Database
    require "../../connection/conn.php";

    $action = $_POST["action"];

    if(isset($action)){
        switch($action){

            case "loadSlSiswa" :
                try {
                    $kelas = $_POST["kelas"];
                    $prodi = $_POST["prodi"];

                    $querygetsiswa = "select * from tb_siswa where kls_siswa = '$kelas' and prod_siswa = '$prodi'";
                    $execQuery = mysqli_query($koneksi, $querygetsiswa);
                    $dataSiswa = [];
                    while($row = mysqli_fetch_assoc($execQuery)){
                        $dataSiswa[] = $row;
                    }

                    echo json_encode([
                        "status" => "success",
                        "datasiswa" => $dataSiswa
                    ]);

                } catch (Exception $e) {
                    echo json_encode([
                        "status" => "error",
                        "info" => $e
                    ]);
                }
                break;

            case "loadDetailPemkegiatan" :
                try {
                    $idsiswa = $_POST["idsiswa"];

                    // VAR
                    $status = "";
                    $sts_info = "";
                    $info = "";
                    $data = null;

                    if($_POST["trigger"] == "multiDetail"){

                        $sts_info = "multi";

                        // get data information siswa
                        $qgetinfopem = "select b.jns_val, b.jns_ccl, count(*) as jml_pem, sum(a.nom_pem) as total_pem, a.id_jns, a.jns_pem from vw_sts_kegiatan_siswa a
                        left join tb_jns_pem b on a.id_jns = b.id_jns where a.id = ". $idsiswa ." group by id_jns";
                        $execDetailM = mysqli_query($koneksi, $qgetinfopem);
                        

                        $status = $execDetailM == true ? "success" : "error";
                        $info = $execDetailM == true ? "null" : mysqli_error($koneksi);

                        $datadetailmulti = [];
                        while($row = mysqli_fetch_assoc($execDetailM)){
                            $datadetailmulti[] = $row;
                        }

                        $data = $datadetailmulti;

                    }elseif($_POST["trigger"] == "singleDetail"){
                        $idpem = $_POST["idpem"];

                        $sts_info = "single";
                        $qgetinfodetailpem = "select * from vw_sts_kegiatan_siswa where id = ". $idsiswa ." and id_jns = ". $idpem;
                        $execDetailS = mysqli_query($koneksi, $qgetinfodetailpem);

                        $status = $execDetailS == true ? "success" : "error";
                        $info = $execDetailS == true ? "null" : mysqli_error($koneksi);

                        $datadetailsingle = [];
                        while($row = mysqli_fetch_assoc($execDetailS)){
                            $datadetailsingle[] = $row;
                        }

                        $data = $datadetailsingle;

                    }

                    echo json_encode([
                        "status" => $status,
                        "sts_info" => $sts_info,
                        "info" => $info,
                        "data" => $data
                    ]);

                } catch (Exception $th) {
                    echo json_encode([
                        "status" => "error",
                        "info" => $th
                    ]);
                }
                break;

            case "loadPemkegiatan" :
                try {
                    $idSiswa = explode('-', $_POST["dataload"])[0];
                    $kelas = explode('-', $_POST["dataload"])[1];
                    $prodiSl = explode('-', $_POST["dataload"])[2];
                    
                    if($prodiSl == 'Teknik Komputer dan Jaringan'){
                        $prodi = 'TKJ';
                    }elseif($prodiSl == 'Akuntansi Keuangan dan Lembaga'){
                        $prodi = "AKL";
                    }elseif($prodiSl == 'Bisnis Daring dan Pemasaran'){
                        $prodi = 'BDP';
                    }

                    $queryGetPem = "
                    select * from tb_jns_pem 
                    where kelas_pem in ('$kelas','UMUM') 
                    and jns_ket in ('$prodi','UMUM')  
                    and jns_katg = 'kegiatan'";

                    $execQueryPem = mysqli_query($koneksi, $queryGetPem);
                    $dataPemUjian = [];
                    while($row = mysqli_fetch_assoc($execQueryPem)){
                        $dataPemUjian[] = $row;
                    }

                    echo json_encode([
                        "status" => "success",
                        "datapem" =>$dataPemUjian,
                    ]);

                } catch (Exception $e) {
                    echo json_encode([
                        "status" => "error",
                        "info" => $e
                    ]);
                }
                break;
            
            case "loadInfoPem" :
                try {
                    $idpem = $_POST["idpem"];
                    // $idsiswa = $_POST["idsiswa"];

                    // get info pembayaran
                    $qSelectPem = "select * from tb_jns_pem where id_jns = " . $idpem;
                    $execqSelectPem = mysqli_query($koneksi, $qSelectPem);
                    $infoPem = [];
                    while($row = mysqli_fetch_assoc($execqSelectPem)){
                        $infoPem[] = $row;
                    }

                    echo json_encode([
                        "status" => "success",
                        "infopem" => $infoPem,
                        
                    ]);
                } catch (Exception $th) {
                    echo json_encode([
                        "status" => "success",
                        "infopem" => $th
                    ]);
                }
                break;

            case "loadpemKW":
                try {
                    $idpem = $_POST["idpem"];
                    $idsiswa = $_POST["idsiswa"];

                    $active_load = 'false';
                    $active_pay = 'false';

                    $histpaymentload = [];
                    $checklunas = '';
                    $histpayment = [];

                    if($_POST["trigger"] == 'load'){
                        // GET DATA
                        $active_load = 'true';
                        $qgethistload = "select b.kls_siswa, a.* from vw_sts_kegiatan_siswa a
                        left join tb_siswa b on b.id = a.id where a.id = ". $idsiswa ." and a.id_jns = ". $idpem;
                        $exechistload = mysqli_query($koneksi,$qgethistload);
                        while($row = mysqli_fetch_assoc($exechistload)){
                            $histpaymentload[] = $row;
                        }

                        // CHECK PEM
                        $qcheckpem = "select sum(nom_pem) as sum, jns_val from vw_sts_kegiatan_siswa where id = ". $idsiswa ." and id_jns = ". $idpem ." group by id_jns";
                        $execcheckpem = mysqli_query($koneksi,$qcheckpem);
                        $checkdatapem = mysqli_fetch_assoc($execcheckpem);

                        if($checkdatapem == null){
                            $checklunas = 'null';
                        }else{
                            $checklunas = $checkdatapem["sum"] == $checkdatapem["jns_val"] ? 'true' : 'false';
                        }

                    }elseif($_POST["trigger"] == 'pay'){
                        // GET DATA
                        $active_pay = 'true';
                        $qgethistpay = "select * from vw_sts_kegiatan_siswa where id = ". $idsiswa ." and id_jns = ". $idpem;
                        $exechistpay = mysqli_query($koneksi,$qgethistpay);
                        while($row = mysqli_fetch_assoc($exechistpay)){
                            $histpayment[] = $row;
                        }

                    }

                    echo json_encode([
                        "status" => "success",
                        "load" => [
                            "active" => $active_load,
                            "load_ketlunas" => $checklunas,
                            "load_datapem" => $histpaymentload
                        ],
                        "pay" => [
                            "active" => $active_pay,
                            "pay_datapem" => $histpayment == null ? null : end($histpayment)
                        ]
                    ]);
                    
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