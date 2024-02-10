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

            case "loadPemUjian" :
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

                    $queryGetPem = "select * from tb_jns_pem where jns_pem like '%$kelas%' and jns_ket in ('$prodi','UMUM')";
                    $execQueryPem = mysqli_query($koneksi, $queryGetPem);
                    $dataPemUjian = [];
                    while($row = mysqli_fetch_assoc($execQueryPem)){
                        $dataPemUjian[] = $row;
                    }

                    // $queryGetInfoPem = "select * from vw_sts_ujian_siswa where vw_sts_ujian_siswa.id = ". $idSiswa;
                    $queryGetInfoPem = "
                    select
                    id_jns,
                    jns_pem,
                    SUM(nom_pem) as pem,
                    count(id_pem_ujian) as jml_pem
                    from vw_sts_ujian_siswa where id = ". $idSiswa ." group by id_jns";
                    
                    $execInfoPem = mysqli_query($koneksi, $queryGetInfoPem);
                    $dataInfoPem = [];
                    while($row = mysqli_fetch_assoc($execInfoPem)){
                        $dataInfoPem[] = $row;
                    }

                    echo json_encode([
                        "status" => "success",
                        "datapem" =>$dataPemUjian,
                        "datainfopem" => $dataInfoPem
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
        }
    }
    


?>