<?php
    // Connection
    require "../../connection/conn.php";

    // Defind Database
    // define('HOST', $host);
    // define('USER', $user);
    // define('PASS', $pass);
    // define('DEBE', $debe);


    // Get Type of Data
    if(isset($_POST["type"]) and isset($_POST["keyId"])) {

        $type = $_POST["type"];
        $keyId = $_POST["keyId"];


        // Defind Variable
        // $koneksi = new mysqli(HOST, USER, PASS, DEBE);
        $i = 1;

        switch ($type) {

            // Case Group
            case 'group':

                try{
                    $num = 1;

                    $query = "SELECT * FROM tb_siswa ORDER BY nama_siswa ASC";
                    $prep = $koneksi->prepare($query);
                    $prep->execute();
                    $rest = $prep->get_result();
    
    
                    //Utility
                    $btnEdit = "<span class='label btn-primary rounded' id='btnEdit'><i class='fas fa-pencil-alt'></i></span>";
                    $btnDell = "<span class='label btn-danger rounded' id='btnDell'><i class='fas fa-trash'></i></span>";
    
                    // Loop Data
                    while($row = $rest->fetch_assoc()) {
                        $data[$i]['num'] = $num++;
                        $data[$i]['btn'] = 
                            "
                                <span class='label btn-primary rounded' id='btnEdit' data-id='". $row['id'] ."'><i class='fas fa-pencil-alt'></i></span>
                                <span class='label btn-danger rounded' id='btnDell' data-id='". $row['id'] ."'><i class='fas fa-trash'></i></span>
                            ";
                        $data[$i]['id'] = $row['id'];
                        $data[$i]['nis'] = $row['nis_siswa'];
                        $data[$i]['nisn'] = $row['nisn_siswa'];
                        $data[$i]['nama'] = $row['nama_siswa'];
                        $data[$i]['jk'] = "<span class='label label-success'>" . $row['jk_siswa'] . "</span>";
                        $data[$i]['tplahir'] = $row['tplahir_siswa'];
                        $data[$i]['tglahir'] = $row['tglahir_siswa'];
                        $data[$i]['alamat'] = $row['alamat_siswa'];
                        $data[$i]['ibu'] = $row['ibu_siswa'];
                        $data[$i]['ayah'] = $row['ayah_siswa'];
                        $data[$i]['tlp'] = $row['tlp_siswa'];
                        $data[$i]['email'] = $row['email_siswa'];
                
                        $i++;
                    }
    
                    $out = array_values($data);
                    echo json_encode($out);
                }catch(Exception $e){
                    echo json_encode(["status" => $e]);
                }

            break;


            // Case Single
            case 'single':

                $query = "SELECT * FROM tb_siswa WHERE id= $keyId";
                $prep = $koneksi->prepare($query);
                $prep->execute();
                $rest = $prep->get_result();

                // Loop Data
                while($row = $rest->fetch_assoc()) {
                    $data[$i]['id'] = $row['id'];
                    $data[$i]['nis'] = $row['nis_siswa'];
                    $data[$i]['nisn'] = $row['nisn_siswa'];
                    $data[$i]['nama'] = $row['nama_siswa'];
                    $data[$i]['jk'] = $row['jk_siswa'];
                    $data[$i]['tplahir'] = $row['tplahir_siswa'];
                    $data[$i]['tglahir'] = $row['tglahir_siswa'];
                    $data[$i]['alamat'] = $row['alamat_siswa'];
                    $data[$i]['ibu'] = $row['ibu_siswa'];
                    $data[$i]['ayah'] = $row['ayah_siswa'];
                    $data[$i]['tlp'] = $row['tlp_siswa'];
                    $data[$i]['email'] = $row['email_siswa'];

                    $i++;
                }

                $out = array_values($data);
                echo json_encode($out);
            break;

        }
    }