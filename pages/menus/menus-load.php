<?php
require "../../connection/conn.php";

if(isset($_POST["action"])){
    $action = $_POST["action"];
    switch($action){

        case "getLoadMenus" :
            try {
                
                $getMenusAccess = "select * from tb_menu_access where admin_id = ";

            } catch (\Throwable $th) {
                //throw $th;
            }
        break;

    }
}