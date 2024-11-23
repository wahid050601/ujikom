<?php

// Connection
require "../../connection/conn.php";

if(isset($_POST["action"])){

    $action = $_POST["action"];
    switch($action){

        case "loadDataUser" :
            try {
                
                $query = "select * from tb_admin";
                $execQuery = mysqli_query($koneksi, $query);
                
                $data_user = [];
                while($row = mysqli_fetch_assoc($execQuery)){
                    $data_user[] = $row;
                }

                echo json_encode([
                    "status" => "success",
                    "info" => "success get data user",
                    "data_user" => $data_user
                ]);

            } catch (\Throwable $th) {
                
                echo json_encode([
                    "status" => "error",
                    "info" => $th->getMessage()
                ]);
            }
        break;

        case "loadSingleDataUser" :
            try {
                
                $iduser = $_POST["iduser"];
                $query = "select * from tb_admin where id_adm=". $iduser;
                $exQuery = mysqli_query($koneksi, $query);

                $datas_user = null;
                while($row = mysqli_fetch_assoc($exQuery)){
                    $datas_user = $row;
                }

                // get menu access
                $queryMenu = "select * from tb_menu_access where admin_id=". $iduser;
                $exQmenu = mysqli_query($koneksi, $queryMenu);

                $data_menu = null;
                while($row = mysqli_fetch_assoc($exQmenu)){
                    $data_menu = $row;
                }

                echo json_encode([
                    "status" => "success",
                    "info" => "success get single data user",
                    "datas_user" => $datas_user,
                    "data_menu" => $data_menu
                ]);

            } catch (\Throwable $th) {
                
                echo json_encode([
                    "status" => "error",
                    "info" => $th->getMessage()
                ]);
            }
        break;

    }

}else{
    echo json_encode([
        "status" => "error",
        "info" => "method or action not config"
    ]);
}