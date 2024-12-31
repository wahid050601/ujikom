<?php
require "connection/conn.php";


if(isset($_POST["action"])){
    $action = $_POST["action"];
    switch($action){

        case "login" :
            try {
                $username = $_POST["username"];
                $password = $_POST["password"];
                
                $getUser = "select * from tb_admin where user_adm = '$username' and pass_adm = '$password'";
                // $getUser = "select * from tb_admin";
                $execU = mysqli_query($koneksi, $getUser);
                $users = mysqli_fetch_assoc($execU);
                error_log($getUser);
                error_log("============== ". json_encode($users));
                
                if($users == null){
                    echo json_encode([
                        "status" => "error",
                        "info" => "Username atau Password yang anda masukan salah"
                    ]);
                    exit;
                }
            
                echo json_encode([
                    "status" => "success",
                    "info" => "Login berhasil",
                    "user" => $users
                ]);
                
            } catch (\Throwable $th) {
                echo json_encode([
                    "status" => "error",
                    "info" => $th->getMessage()
                ]);
            }
        break;

        case "getmenus" :
            try {
                $id = $_POST["id"];

                $getMenus = "select * from tb_menu_access where admin_id = ".$id;
                $exec = mysqli_query($koneksi, $getMenus);
                $menus = mysqli_fetch_assoc($exec);


                echo json_encode([
                    "status" => "success",
                    "info" => "ok",
                    "menu" => $menus
                ]);

            } catch (\Throwable $th) {
                echo json_encode([
                    "status" => "error",
                    "info" => $th->getMessage()
                ]);
            }
        break;
    }

}

