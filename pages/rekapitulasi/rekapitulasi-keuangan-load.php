<?php
require "../../connection/conn.php";

if(isset($_POST["action"])){
    $action = $_POST["action"];
    switch($action){

        case "getReport" :
            try {
                
                $tgl_awal = $_POST["tgl_awal"];
                $tgl_akhir = $_POST["tgl_akhir"];

                $getReportLap = "
                WITH pemasukan as (
                    select 
                    tgl_pem as tanggal,
                    pembayaran as keterangan,
                    nom_pem as pemasukan,
                    0 as pengeluaran
                    from vw_administrasi_pemasukan
                ), pengeluaran as (
                    select
                    tgl_sub_lap as tanggal,
                    nama_pengeluaran as keterangan,
                    0 as pemasukan,
                    total as pengeluaran
                    from tb_lap_pengeluaran
                ), gabungan as (
                    select * from pemasukan
                    union all
                    select * from pengeluaran
                ), laporan_keuangan as (
                    SELECT 
                    tanggal,
                    keterangan,
                    pemasukan,
                    pengeluaran,
                    SUM(pemasukan - pengeluaran) OVER (ORDER BY tanggal) AS saldo
                    FROM gabungan
                )
                select ROW_NUMBER() OVER (ORDER BY tanggal) AS no,
                tanggal,
                keterangan,
                pemasukan,
                pengeluaran,
                saldo from laporan_keuangan where cast(tanggal as date) BETWEEN '$tgl_awal' and  '$tgl_akhir'  order by tanggal";
                $exLaporan = mysqli_query($koneksi, $getReportLap);
                $rekapitulasi = [];
                while($row = mysqli_fetch_assoc($exLaporan)){$rekapitulasi[] = $row;}


                // Hasil Akhir
                $getRekapAll = "
                with counting as (
                    select 'pemasukan' as keterangan, coalesce(sum(nom_pem), 0) as value from vw_administrasi_pemasukan where cast(tgl_pem as date) BETWEEN '$tgl_awal' and  '$tgl_akhir'
                    union all
                    select 'pengeluaran' as keterangan, coalesce(sum(total), 0) as value from tb_lap_pengeluaran where cast(tgl_sub_lap as date) BETWEEN '$tgl_awal' and  '$tgl_akhir'
                ), saldo_akhir as (
                    select
                    'saldo akhir' as keterangan,
                    coalesce((select value from counting where keterangan = 'pemasukan'), 0) - coalesce((select value from counting where keterangan = 'pengeluaran'), 0) as value
                ), merge_laporan as (
                    select * from counting
                    union all
                    select * from saldo_akhir
                )select * from merge_laporan";
                $exRekap = mysqli_query($koneksi, $getRekapAll);
                $rekapAll = [];
                while($row = mysqli_fetch_assoc($exRekap)){$rekapAll[] = $row;}


                echo json_encode([
                    "status" => "success",
                    "info" => "Rekapitulasi berhasil di ambil",
                    "rekapitulasi" => $rekapitulasi,
                    "rekap_all" => $rekapAll
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