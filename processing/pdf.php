<?php
// require_once '../../mpdf/vendor/autoload.php';
require "../connection/conn.php";
include "../plugins/dompdf/vendor/autoload.php";

// Local Variable Set
$idsiswa = $_GET["idsiswa"];
$idjns = $_GET["idjns"];
$idpem = $_GET["idpem"];
$jnspem = $_GET["pem"];
$fieldPem = $_GET["pem"] == 'kegiatan' ? 'keg' : $_GET["pem"];
$status_pem = $jnspem == "spp" ? "status_spp" : "status_pem";


// Get data pem
$SQL_getpem = "select * from vw_sts_". $jnspem ."_siswa where id=". $idsiswa ." and id_jns=". $idjns ." and id_pem_". $fieldPem ."=". $idpem;
$execSQL = mysqli_query($koneksi, $SQL_getpem);
$datapem = mysqli_fetch_assoc($execSQL);
$nominal_pem = $jnspem == "spp" ? number_format($datapem["jns_val"]) : number_format($datapem["nom_pem"]);
// Set data Kwitansi
$numKwitansi = '';
if((int)strlen((string)$datapem["id_pem_".$fieldPem]) < 2){
    $numKwitansi = '00' . $datapem["id_pem_".$fieldPem];
}elseif((int)strlen((string)$datapem["id_pem_".$fieldPem]) == 2){
    $numKwitansi = '0' . $datapem["id_pem_".$fieldPem];
}else{
    $numKwitansi = strlen((string)$datapem["id_pem_".$fieldPem]);
}

$RomanMonth = [
    "01" => "I",
    "02" => "II",
    "03" => "III",
    "04" => "IV",
    "05" => "V",
    "06" => "VI",
    "07" => "VII",
    "08" => "VIII",
    "09" => "IX",
    "10" => "X",
    "11" => "XI",
    "12" => "XII"
];
$month = $RomanMonth[date('m')];


// reference the Dompdf namespace
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();

// Template Kwitansi
$html2 = '
<style>
    .master {
        margin: -30px;
        display: flex;
    }
    .master .container {
        border: 1px solid black;
        height: 250px;
    }
    .master .container .header {
        background-color: lightgrey;
        font-family: sans-serif;
        text-align: center;
        padding: 7px;
    }
    .master .container .header span{
        font-size: 11px;
    }
    .master .container .body {
        font-family: sans-serif;
        font-size: 12px;
        padding-left: 8px;
        padding-right: 8px;
    }
    .master .container .body table tr th,td{
        padding: 4px;
        text-align: left;
    }
    .master .container .footer .ttd {
        position: absolute;
        right: 0;
        font-family: sans-serif;
        font-size: 12px;
    }
    .master .container .footer .ttd .space{
        height: 45px;
    }
    .master .container .footer .ttd b{
        border-bottom: 1px solid black;
        font-style: italic;
    }

    .master .container .footer .jumlah {
        position: absolute;
        left: auto;
        font-family: sans-serif;
        font-size: 16px;
        margin-left: 16px;
        padding-top: 25px;
    }
    .master .container .footer .jumlah span {
        border-top: 1px solid black;
        border-bottom: 1px solid black;
        padding-bottom: 5px;
        padding-top: 5px;
        background-color: lightgrey;
    }
</style>

<div class="master">
    <div class="container">
        <div class="header">
            <b>SMK AD-DA\'WAH</b><br>
            <span>Jl.Raya Duri Kosambi Rt.003/01 Kel.Duri Kosambi kec.Cengkareng Jakarta Barat</span>
        </div>
        <div class="body">
            <table>
                <tr><th>NO.</th><th>:</th><td style="border-bottom: 1px solid black;">'. $numKwitansi .'/SMK-AD/KWT-PEM/'. $month .'/'. date("Y") .'</td></tr>
            </table>
            <table width="100%">
                <tr><th>DITERIMA DARI</th><th>:</th><td style="border-bottom: 1px dotted black;">'. $datapem["nama_siswa"] .' | '. $datapem["nis_siswa"] .' &nbsp;&nbsp;&nbsp;&nbsp; <b>KELAS : </b>'. $datapem["kls_siswa"] .' '. $datapem["prod_siswa"] .'</td></tr>
                <tr><th>SEJUMLAH</th><th>:</th><td style="border-bottom: 1px dotted black;">Rp. '. $nominal_pem .' &nbsp; ('. $datapem[$status_pem] .')</td></tr>
                <tr><th>PEMBAYARAN</th><th>:</th><td width="80%" style="border-bottom: 1px dotted black;">'. $datapem["jns_pem"] .' Rp.'. number_format($datapem["jns_val"]) .'</td></tr>
            </table>
        </div>
        <div class="footer">
            <div class="payment">

            </div>
            <div class="jumlah">
                <span><b>Rp. '. $nominal_pem .'</b></span>
            </div>
            <div class="ttd">
                <div class="tanggal">Jakarta, '. date("d/m/Y", strtotime($datapem["tanggal_pem"])) .'</div>
                <div class="space"></div>
                <b>'. $datapem["nama_adm"] .'</b>
            </div>
        </div>
    </div>
</div>';

// load template
// $html = file_get_contents('kwitansi/temp-pembayaran.php');
$dompdf->loadHtml($html2);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'potrait');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream("codex",array("Attachment"=>0));