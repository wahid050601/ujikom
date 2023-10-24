<?php
    // Connection Database
    include "connection/conn.php";

    $dataset = "wahid";

    if(isset($dataset)){
        echo json_encode(["status" => "success"]);
    }else{
        echo json_encode(["status" => "error"]);
    }


?>