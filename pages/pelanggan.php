<?php
    session_start();


    if (!isset($_SESSION["islogin"])) {
        header ("Location: ../login.php");
        exit;
    }


    require "../connection/function-pelanggan.php";
    require "../connection/db.php";

    // Connection
    $conn = mysqli_connect($host, $user, $pass, $db);

    $query = "SELECT * FROM pelanggan";
    $data_pelanggan = getPelanggan($query);

    // Add Data
    if(isset($_POST["btninput"])) {
        
        $nama = $_POST['pelanggan'];
        $tlp = $_POST['tlp'];
        $alamat = $_POST['alamat'];

        $queryadd = "INSERT INTO pelanggan VALUES ('', '$nama', '$tlp', '$alamat')";

        if(mysqli_query($conn, $queryadd)) {
            echo "<script>alert('tambah data pelanggan BERHASIL'); document.location.href='pelanggan.php'</script>";
        }else{
            echo "<script>alert('tambah data pelanggan GAGAL'); document.location.href='pelanggan.php'</script>";
        }



    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LONDRE | Pelanggan</title>

    <!-- CSS -->
    <!-- <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="icon/css/all.css" />
    <link rel="stylesheet" href="css/style.css" /> -->
    <?php require "../connection/header.php"; ?>

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
                <?php require "../connection/menus.php"; ?>
            </div>
        </div>

        <!-- BODY -->
        <div class="body-main">
            <div class="header-body">
                <div class="component text-white">
                    <div class="user-log">
                        <a href="../logout.php"><i class="fas fa-power-off"></i></a>
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
                        <span><i class="fas fa-user"></i>&nbsp; Data Pelanggan</span>
                        <hr>
                    </div>

                    <div class="main-data">
                        <!-- <div class="button mb-3">
                            <button class="btn btn-success" data-toggle="modal" data-target="#tambahpelanggan">ADD</button>
                        </div> -->
                        <div class="row mr-1">
                            <!-- Table -->
                            <div class="col-lg-9">
                                <table class="table table-bordered table-hover table-sm">
                                    <thead class="bg-success text-white">
                                        <tr class="text-center">
                                            <th scope="coll">No.</th>
                                            <th scope="coll">Nama Pelanggan</th>
                                            <th scope="coll">No.Tlp</th>
                                            <th scope="coll">Alamat</th>
                                            <th scope="coll">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $nomor = 1; ?>
                                        <?php foreach($data_pelanggan as $dp) : ?>
                                        
                                        <tr>
                                            <th class="text-center"><?= $nomor; ?></th>
                                            <td><?= $dp["pelanggan_nama"]; ?></td>
                                            <td class="text-center"><?= $dp["pelanggan_hp"]; ?></td>
                                            <td><?= $dp["pelanggan_alamat"]; ?></td>
                                            <td class="text-center">
                                                <a href="#" class="badge badge-info" id="edit"><i class="fas fa-pencil-alt"></i></a>
                                                <a href="#" class="badge badge-danger"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        <?php $nomor++; ?>
                                        <?php endforeach;  ?>
                                    </tbody>
                                </table>
                            </div>

                            <!-- FORM -->
                            <div class="col-lg-3 bg-white">
                                <div class="head-form text-center mt-2">
                                    <span><i class="fas fa-user-plus" id="headform"></i> Tambah Data Pelanggan</span>
                                    <hr>
                                </div>

                                <form action="" method="post">
                                    <input type="hidden" name="idpel" id="idpel">

                                    <div class="form-group">
                                        <label for="">Nama Pelanggan</label>
                                        <input type="text" name="pelanggan" id="pelanggan" class="form-control" require>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Nomor Telpon</label>
                                        <input type="text" name="tlp" id="tlp" class="form-control" require>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Alamat</label>
                                        <input type="text" name="alamat" id="alamat" class="form-control" require>
                                    </div>

                                    <button type="submit" class="btn btn-primary mb-2 sub" name="btninput"><i class="fas fa-check"></i>&nbsp; Submit</button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    
    <!-- Modal Tambah Data-->
    <div class="modal fade bd-example-modal-lg" id="tambahpelanggan" tabindex="-1" role="dialog" aria-labelledby="tambahpelangganLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahpelangganLabel"><i class="fas fa-user"></i> Tambah Data Pelanggan</h5>
                </div>
                <div class="modal-body">
                    <form action="" method="POST">
                    <!-- Form input data -->
                        <div class="form-group">
                            <label for="">Nama Pelanggan</label>
                            <input type="text" class="form-control" name="pelanggan" id="pelanggan" require>
                        </div>
                        <div class="form-group">
                            <label for="">Nomor Telpon</label>
                            <input type="text" class="form-control" name="tlp" id="tlp" require>
                        </div>
                        <div class="form-group">
                            <label for="">Alamat</label>
                            <input type="text" name="alamat" id="alamat" class="form-control" require>
                        </div>

                        <button type="button" name="btninput" id="btninput" class="btn btn-primary btn-sm"><i class="fas fa-check"></i> Submit</button>
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><i class="fas fa-times-circle"></i> Batal</button>
                    </form>
                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>




</body>


<!-- JS -->
<?php require "../connection/footer.php"; ?>

<script>
    $('#edit').on('click', function() {
        $('.pelanggan').val($(''))
    });
</script>


</html>