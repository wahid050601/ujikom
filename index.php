<?php
    session_start();


    if (!isset($_SESSION["islogin"])) {
        header ("Location: login.php");
        exit;
    }
    


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LONDRE | Dashboard</title>

    <!-- CSS -->
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="icon/css/all.css" />
    <link rel="stylesheet" href="css/style.css" />

</head>
<body>

    <div class="main">
        <!-- MENUS -->
        <div class="menus">
            <div class="header text-center">
                <h2>londre</h2>
                <hr>
            </div>
            <div class="sub-menus ml-3 text-left">
                <a href="index.php" class="item-menu badge badge-light mt-3"><i class="fas fa-cube"></i>&nbsp; Dashboard</a>
                <a href="pages/pelanggan.php" class="item-menu badge badge-light mt-3"><i class="fas fa-user"></i>&nbsp; Pelanggan</a>
                <a href="pages/transaksi.php" class="item-menu badge badge-light mt-3"><i class="fas fa-id-card"></i>&nbsp; Transaksi</a>
                <a href="pages/daf-harga.php" class="item-menu badge badge-light mt-3"><i class="fas fa-list"></i>&nbsp; Daftar Harga</a>
            </div>
        </div>

        <!-- BODY -->
        <div class="body-main">
            <div class="header-body">
                <div class="component text-white">
                    <div class="user-log">
                        <a href="logout.php"><i class="fas fa-power-off"></i></a>
                    </div>
                </div>
            </div>
            <hr>
        </div>

                    <!-- MAIN BODY -->
        <div class="body">
            <div class="continer-fluid">
                <div class="box">
                    <div class="header">
                        <span><i class="fas fa-cubes"></i>&nbsp; Dashboard</span>
                        <hr>
                    </div>

                    <!-- CONTENT -->
                    <h2>APLIKASI LONDRE</h2>

                </div>
            </div>
        </div>
    </div>

</body>


<!-- JS -->
<script src="js/jquery-3.2.1.slim.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="icon/js/all.js"></script>


</html>