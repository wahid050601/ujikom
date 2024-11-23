<?php
require "../../connection/conn.php";

if(isset($_POST["action"])){
    $action = $_POST["action"];
    switch($action){

        case "getCountCard":
            try {
                
                //data siswa
                $get_datasiswa = "select count(1) as jml_siswa from tb_siswa";
                $ex_datasiswa = mysqli_query($koneksi,$get_datasiswa);
                $count_datasiswa = mysqli_fetch_assoc($ex_datasiswa);

                //rombel
                $get_rombel = "select count(1) as jml_rombel from tb_rombel_siswa";
                $ex_rombel = mysqli_query($koneksi, $get_rombel);
                $count_rombel = mysqli_fetch_assoc($ex_rombel);
                
                //pemasukan
                $get_pemasukan = "select coalesce(sum(nom_pem), 0) as jml_pem from vw_administrasi_pemasukan where cast(tgl_pem as date) = cast(now() as date)";
                $ex_pemasukan = mysqli_query($koneksi, $get_pemasukan);
                $count_pemasukan = mysqli_fetch_assoc($ex_pemasukan);
                $count_pemasukan = number_format($count_pemasukan["jml_pem"]);

                //pengeluaran
                $get_pengeluaran = "select coalesce(sum(total), 0) as jml_peng from tb_lap_pengeluaran where cast(tgl_sub_lap as date) = cast(now() as date)";
                $ex_pengeluaran = mysqli_query($koneksi, $get_pengeluaran);
                $count_pengeluaran = mysqli_fetch_assoc($ex_pengeluaran);
                $count_pengeluaran = number_format($count_pengeluaran["jml_peng"]);

                // =========================== GRAFIK ===========================
                $getGrafikPem = "
                select month(tgl_pem) as month, sum(nom_pem) as value from vw_administrasi_pemasukan 
                where year(tgl_pem) = year(now())
                group by month(tgl_pem) order by month(tgl_pem) asc";
                $ex_grafik_pem = mysqli_query($koneksi, $getGrafikPem);
                $graf_pemasukan = [];
                while($row = mysqli_fetch_assoc($ex_grafik_pem)){$graf_pemasukan[] = $row;}


                $getGrafikPeng = "
                select month(tgl_sub_lap) as month, sum(total) as value from tb_lap_pengeluaran
                where year(tgl_sub_lap) = year(now())
                group by month(tgl_sub_lap) order by month(tgl_sub_lap) asc";
                $ex_grafik_peng = mysqli_query($koneksi, $getGrafikPeng);
                $graf_pengeluaran = [];
                while($row = mysqli_fetch_assoc($ex_grafik_peng)){$graf_pengeluaran[] = $row;}

                echo json_encode([
                    "status" => "success",
                    "info" => "berhasil get data dashboard",
                    "data_siswa" => $count_datasiswa,
                    "rombel" => $count_rombel,
                    "pemasukan" => $count_pemasukan,
                    "pengeluaran" => $count_pengeluaran,
                    "grafik_pemasukan" => $graf_pemasukan,
                    "grafik_pengeluaran" => $graf_pengeluaran
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