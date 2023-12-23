<?php
    // Connection DB
    require "../../connection/conn.php";

    $action = $_POST["action"];

    if(isset($action)){

        switch($action) {

            // ADD PEMBAYARAN SPP
            case "addpemSpp" :
                $bulan = $_POST["bulan-spp"];
                $tkj = $_POST["tkjpem-spp"];
                $akl = $_POST["aklpem-spp"];
                $bdp = $_POST["bdppem-spp"];
                $tp = $_POST["tp-spp"];
                $smtr = $_POST["smtr-spp"];

                //VALIDASI DUPLICATE
                $query="select * from tb_jns_pem where jns_pem like '%$bulan%' and jns_tp = '$tp'";
                $data = mysqli_query($koneksi, $query);
                $check = mysqli_fetch_row($data);
                // echo json_encode($check);
                if($check == null){

                    // PROCESS PEMBAYARAN
                    $query = "
                    insert into tb_jns_pem values 
                    (null, concat('SPP Bulan $bulan ', year(NOW())), 'spp', $tkj, 1, '$tp', '$smtr', 'TKJ'), 
                    (null, concat('SPP Bulan $bulan ', year(NOW())), 'spp', $akl, 1, '$tp', '$smtr', 'AKL'), 
                    (null, concat('SPP Bulan $bulan ', year(NOW())), 'spp', $bdp, 1, '$tp', '$smtr', 'BDP')
                    ";

                    if(mysqli_query($koneksi, $query)) {
                        echo json_encode([
                            "status" => "success",
                            "info" => "Pembayaran SPP",
                            "text" => ' <br><strong>Pembayaran BERHASIL ditambah</strong>',
                            "katPem" => "spp"
                        ]);
                    }else{
                        echo json_encode([
                            "status" => "error",
                            "info" => "Pembayaran SPP",
                            "text" => "<br><strong>Pembayaran GAGAL ditambah</strong>",
                            "katPem" => "spp"
                        ]);
                    }
                    
                }else{
                    echo json_encode([
                        "status" => "warning",
                        "info" => "data pembayaran bulan $bulan tahun pelajaran $tp sudah tersedia",
                        "text" => "",
                    ]);
                }
            break;

            // DELETE PEMBAYARAN SPP
            case "delpemSpp":
                // $katg = $_POST["katg"];

                // Validasi Hapus Pembayaran
                $status = "";
                $jnspem = [];
                if(isset($_POST["jns"]) && isset($_POST["tp"]) && isset($_POST["smtr"])){
                    $jns = $_POST["jns"];
                    $tp = $_POST["tp"];
                    $smtr = $_POST["smtr"];
                    $query1 = "select * from tb_jns_pem where jns_pem like '%$jns%' and jns_tp = '$tp' and smtr = '$smtr' and jns_katg = 'spp'";
                    $prep = mysqli_query($koneksi, $query1);
                    $jnsid = [];
                    while($row = mysqli_fetch_assoc($prep)){
                        $jnsid[] = $row["id_jns"];
                    }

                    // CHECK KETERSEDIAAN JENIS PEMBAYARAN
                    if($jnsid != null){
                        $query_ck = "select * from tb_pem_spp where id_spp = ".$jnsid[0]." or id_spp = ".$jnsid[1]." or id_spp = ".$jnsid[2];
                        $prep_ck = mysqli_query($koneksi, $query_ck);
                        $stspem = [];
                        while($row = mysqli_fetch_assoc($prep_ck)){
                            $stspem[] = $row;
                        }

                        // CHECK STATUS KETERSEDIAAN HAPUS PEMBAYARAN
                        if($stspem != null){
                            $query_sts = "select tb_siswa.nama_siswa as siswa, tb_jns_pem.jns_pem as pembayaran, tb_pem_spp.tgl_pem as tgl, tb_pem_spp.sts_pem as status 
                            from tb_pem_spp left join tb_siswa on tb_pem_spp.id_siswa = tb_siswa.id left join tb_jns_pem  on tb_pem_spp.id_spp  = tb_jns_pem.id_jns 
                            where id_spp = ".$jnsid[0]." or id_spp = ".$jnsid[1]." or id_spp = ".$jnsid[2];
                            $prep_sts = mysqli_query($koneksi ,$query_sts);
                            while($row = mysqli_fetch_assoc($prep_sts)){
                                $jnspem[] = $row;
                            }
                            $status = "notready";
                        }else{
                            $prep_sts = mysqli_query($koneksi, $query1);
                            while($row = mysqli_fetch_assoc($prep_sts)){
                                $jnspem[] = $row;
                            }
                            $status = "ready";
                        }
                    }else{
                        $status = "";
                        $jnspem[] = $jnsid;
                    }
                }

                // ACTION DELETE PEMBAYARAN
                $stsdel = "";
                $info = "";
                $text = "";
                if(isset($_POST["trigger"])){
                    $bulan = $_POST["bulan"];
                    $tp = $_POST["tp"];
                    $smtr = $_POST["smtr"];

                    $query = "delete from tb_jns_pem where jns_pem like '%$bulan%' and jns_tp = '$tp' and smtr = '$smtr' and jns_katg = 'spp'";
                    $prep = mysqli_query($koneksi, $query);
                    if($prep){
                        $stsdel = "success";
                        // $info = "data pembayaran bulan ".$bulan." tahun pelajaran ".$tp." semester ".$smtr." berhasil di hapus";
                        $info = "Pembayaran SPP";
                        $text = '<br><strong>Pembayaran BERHASIL dihapus</strong>';
                    }else{
                        $stsdel = "error";
                        $info = "Pembayaran SPP";
                        $text = "<br><strong>Pembayaran GAGAL dihapus</strong>";
                    }
                }

                // Get Tahun Pelajaran Pembayaran
                $jnstp = [];
                if(isset($_POST["katg"])){
                    $query1 = "select jns_tp from tb_jns_pem where jns_katg = '" .$_POST["katg"]. "' group by jns_tp";
                    $execQueryTp = mysqli_query($koneksi, $query1);
                    while($row = mysqli_fetch_assoc($execQueryTp)){
                        $jnstp[] = $row;
                    }
                }
                    
                echo json_encode([
                    "status" => $status,
                    "jnspem" => $jnspem,
                    "jnstp" => $jnstp,
                    "statusDel" => [
                        "stsdel" => $stsdel,
                        "info" => $info,
                        "text" => $text,
                        "katPem" => "spp"
                    ]
                ]);
            break;

            case "addpemUjian":
                // Array penampung
                $values_query = [];

                $pembayaran_ujian = $_POST["ujian-pem"];
                $kelas_pem_ujian = $_POST["kelas-pem-ujian"];
                $tp_pem_ujian = $_POST["tp-pem-ujian"];
                $smtr_pem_ujian = $_POST["smtr-pem-ujian"];

                // Check nominal umum
                if(preg_match("/undefined/i", $_POST["umum"])  == 0){
                    $ujian = $pembayaran_ujian. "-Kelas " .$kelas_pem_ujian; //desc
                    $exp_pem = explode("-", $_POST["umum"]);
                    $umum = "(null, '$ujian', 'ujian', $exp_pem[0], $exp_pem[1], '$tp_pem_ujian', '$smtr_pem_ujian', 'UMUM')";
                    array_push($values_query, $umum);
                }

                // Check nominal TKJ
                if(preg_match("/undefined/i", $_POST["tkj"])  == 0){
                    $ujian = $pembayaran_ujian. "-Kelas " .$kelas_pem_ujian. " TKJ"; //desc
                    $exp_pem = explode("-", $_POST["tkj"]);
                    $tkj = "(null, '$ujian', 'ujian', $exp_pem[0], $exp_pem[1], '$tp_pem_ujian', '$smtr_pem_ujian', 'TKJ')";
                    array_push($values_query, $tkj);
                }
                
                // Check nominal AKL
                if(preg_match("/undefined/i", $_POST["akl"])  == 0){
                    $ujian = $pembayaran_ujian. "-Kelas " .$kelas_pem_ujian. " AKL"; //desc
                    $exp_pem = explode("-", $_POST["akl"]);
                    $akl = "(null, '$ujian', 'ujian', $exp_pem[0], $exp_pem[1], '$tp_pem_ujian', '$smtr_pem_ujian', 'AKL')";
                    array_push($values_query, $akl);
                }
                
                // Check nominal BDP
                if(preg_match("/undefined/i", $_POST["bdp"])  == 0){
                    $ujian = $pembayaran_ujian. "-Kelas " .$kelas_pem_ujian. " BDP"; //desc
                    $exp_pem = explode("-", $_POST["bdp"]);
                    $bdp = "(null, '$ujian', 'ujian', $exp_pem[0], $exp_pem[1], '$tp_pem_ujian', '$smtr_pem_ujian', 'BDP')";
                    array_push($values_query, $bdp);
                }
                $imp_query = implode("," ,$values_query );

                // Insert Pembayaran
                $query = "insert into tb_jns_pem values ";
                $query .= $imp_query;
                $exec = mysqli_query($koneksi, $query);
                if($exec){
                    echo json_encode([
                        "status" => "success",
                        "info" => "Pembayaran UJIAN",
                        "text" => ' <br><strong>Pembayaran BERHASIL ditambah</strong>',
                        "katPem" => "ujian"
                    ]);
                }else{
                    echo json_encode([
                        "status" => "success",
                        "info" => "Pembayaran UJIAN",
                        "text" => ' <br><strong>Pembayaran GAGAL ditambah</strong>',
                        "katPem" => "ujian"
                    ]);
                }
            break;

            case "dellpemUjian" :
                // Ceck validasi ketersediaan hapus data
                if(isset($_POST["id_pem"])){
                    $id = $_POST["id_pem"];

                    $query = 'select tb_siswa.nama_siswa as nama, tb_pem_ujian.sts_pem_u as status from tb_pem_ujian 
                    left join tb_jns_pem on tb_pem_ujian.id_pem_u = tb_jns_pem.id_jns 
                    left join tb_siswa on tb_siswa.id = tb_pem_ujian.id_siswa 
                    where tb_pem_ujian.id_ujian = ' . $id;
                    $exec = mysqli_query($koneksi, $query);
                    $data_del = [];
                    while($rows = mysqli_fetch_assoc($exec)){
                        $data_del[] = $rows;
                    }
                    if($data_del != null){
                        echo json_encode([
                            "status" => "not-ready",
                            "info" => "",
                            "data" => $data_del
                        ]);
                    }else{
                        echo json_encode([
                            "status" => "ready",
                            "info" => "data pembayaran dapat di hapus"
                        ]);
                    }
                }


                // Process hapus data 
                if(isset($_POST["triger"])){
                    $id = $_POST["idn"];
                    $query = "delete from tb_jns_pem where id_jns = $id";
                    $exec = mysqli_query($koneksi, $query);

                    if($exec){
                        echo json_encode([
                            "status" => "success",
                            "info" => "Pembayaran UJIAN",
                            "text" => ' <br><strong>Pembayaran BERHASIL dihapus</strong>',
                            "katPem" => "ujian"
                        ]);
                    }else{
                        echo json_encode([
                            "status" => "success",
                            "info" => "Pembayaran UJIAN",
                            "text" => ' <br><strong>Pembayaran GAGAL dihapus</strong>',
                            "katPem" => "ujian"
                        ]);
                    }
                }
            break;

            case "addpemKegiatan" :
                // Variable Data
                $pem_kegiatan = $_POST["kegiatan-pem"];
                $kls_kegiatan = $_POST["kls-kegiatan-pem"];
                $prodi_kegiatan = $_POST["prodi-kegiatan-pem"];
                $nom_kegiatan = $_POST["nom-kegiatan-pem"];
                $ccl_kegiatan = $_POST["ccl-kegiatan-pem"];
                $tp_kegiatan = $_POST["tp-kegiatan-pem"];
                $smtr_kegiatan = $_POST["smtr-kegiatan-pem"];

                // Validasi tambah data
                $kelas_label = $kls_kegiatan == 'umum' ? "" : "-Kelas ".$kls_kegiatan." ";
                $prodi_label = $_POST["prodi-kegiatan-pem"] == 'UMUM' ? "" : $_POST["prodi-kegiatan-pem"];
                $val_data = $pem_kegiatan."".$kelas_label."".$prodi_label;
                $query = "select * from tb_jns_pem where jns_pem = '$val_data'";
                $checkVal = mysqli_query($koneksi, $query);
                $checkSts = mysqli_fetch_row($checkVal);

                if($checkSts == null){
                    $query1 = "insert into tb_jns_pem values (null, '$val_data', 'kegiatan', $nom_kegiatan, $ccl_kegiatan, '$tp_kegiatan', '$smtr_kegiatan', '$prodi_kegiatan')";
                    $execQ = mysqli_query($koneksi, $query1);
                    if($execQ){
                        echo json_encode([
                            "status" => "success",
                            "info" => "Pembayaran KEGIATAN",
                            "text" => ' <br><strong>Pembayaran BERHASIL ditambah</strong>',
                            "katPem" => "kegiatan"
                        ]);
                    }else{
                        echo json_encode([
                            "status" => "error",
                            "info" => "Pembayaran KEGIATAN",
                            "text" => ' <br><strong>Pembayaran GAGAL ditambah</strong>',
                            "katPem" => "kegiatan"
                        ]);
                    }
                }else{
                    echo json_encode([
                        "status" => "warning",
                        "info" => "data pembayaran ".$val_data." sudah tersedia",
                        "text" => ''
                    ]);
                }
            break;

            case "delpemKegiatan" :
                // Validasi hapus data
                if(isset($_POST["idkegiatan"])){
                    $id_kegiatan = $_POST["idkegiatan"];
                    
                    $queryValdel = "select * from tb_pem_kegiatan where id_pem_keg = $id_kegiatan";
                    $checkValdel = mysqli_query($koneksi, $queryValdel);
            
                    if(mysqli_fetch_row($checkValdel) != null){
                        $queryValdel1 = "select b.nama_siswa as siswa, a.sts_pem_keg as status from tb_pem_kegiatan a 
                        left join tb_siswa b on a.id_siswa = b.id where a.id_pem_keg = $id_kegiatan";
                        $execVal = mysqli_query($koneksi, $queryValdel1);
                        $data_valDel = [];
                        while($rows = mysqli_fetch_assoc($execVal)){
                            $data_valDel[] = $rows;
                        }
    
                        echo json_encode([
                            "status" => "not-ready",
                            "info" => "",
                            "data" => $data_valDel
                        ]);
                    }else{
                        echo json_encode([
                            "status" => "ready",
                            "info" => "data pembayaran dapat di hapus",
                            "text" => ""
                        ]);
                    }
                }

                // Proses hapus Data
                if(isset($_POST["triger"])){
                    $queryrundel = "delete from tb_jns_pem where id_jns = " . $_POST["iddelkeg"];
                    $exec = mysqli_query($koneksi, $queryrundel);
                    if($exec){
                        echo json_encode([
                            "status" => "success",
                            "info" => "data pembayaran berhasil di hapus",
                            "text" => '<br> silahkan tekan tombol <button class="btn label btn-primary"><i class="fas fa-sync-alt"></i></button> untuk <strong>merefresh</strong> data'
                        ]);
                    }else{
                        echo json_encode([
                            "status" => "error",
                            "info" => "data pembayaran gagal di hapus",
                            "text" => ''
                        ]);
                    }
                }
            break;

        }

    }
?>