<?php

require '../../vendor/autoload.php';
require '../../connection/conn.php';

use PhpOffice\PhpSpreadsheet\IOFactory;

if (isset($_POST['import'])) {
    $file = $_FILES['file']['tmp_name'];

    $spreadsheet = IOFactory::load($file);
    $sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

    // Cek apakah data terbaca dari Excel


    foreach ($sheetData as $index => $row) {
        if ($index == 1) continue; // Lewati header
        
        // Ambil data dari kolom Excel
        $nis_siswa = $row['A'] ?? '';
        $nisn_siswa = $row['B'] ?? '';
        $nama_siswa = $row['C'] ?? '';
        $jk_siswa = $row['D'] ?? '';
        $kls_siswa = $row['E'] ?? '';
        $prod_siswa = $row['F'] ?? '';
        $tp_siswa = $row['G'] ?? '';
        $tplahir_siswa = $row['H'] ?? '';
        // Konversi tanggal jika format masih dari Excel
if (is_numeric($row['I'])) {
    $tglahir_siswa = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['I'])->format('Y-m-d');
} else {
    // Jika format bukan tanggal Excel, tetap gunakan inputnya
    $tglahir_siswa = date('Y-m-d', strtotime($row['I']));
}
        $alamat_siswa = $row['J'] ?? '';
        $ibu_siswa = $row['K'] ?? '';
        $ayah_siswa = $row['L'] ?? '';
        $tlp_siswa = $row['M'] ?? '';
        $email_siswa = $row['N'] ?? '';
        $status_siswa = $row['O'] ?? '';

        // Tampilkan data sebelum insert
        echo "Memasukkan data siswa: $nis_siswa, $nama_siswa<br>";

        // Cek data wajib
        if (empty($nis_siswa) || empty($nama_siswa) || empty($jk_siswa)) {
            echo "Data wajib kosong di baris $index, data dilewati.<br>";
            continue;
        }

        // Query untuk memasukkan data
        $query = "INSERT INTO tb_siswa (nis_siswa, nisn_siswa, nama_siswa, jk_siswa, kls_siswa, prod_siswa, tp_siswa,
                  tplahir_siswa, tglahir_siswa, alamat_siswa, ibu_siswa, ayah_siswa, tlp_siswa, email_siswa, status_siswa)
                  VALUES ('$nis_siswa', '$nisn_siswa', '$nama_siswa', '$jk_siswa', '$kls_siswa', '$prod_siswa', '$tp_siswa',
                  '$tplahir_siswa', '$tglahir_siswa', '$alamat_siswa', '$ibu_siswa', '$ayah_siswa', '$tlp_siswa', '$email_siswa', '$status_siswa')";

        if (mysqli_query($koneksi, $query)) {
            echo "Data berhasil dimasukkan untuk NIS: $nis_siswa<br>";
        } else {
            echo "Gagal memasukkan data untuk NIS: $nis_siswa. Error: " . mysqli_error($koneksi) . "<br>";
        }
    }
}
?>
