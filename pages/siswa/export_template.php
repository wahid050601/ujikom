<?php
require 'C:\Program Files\XAMPP\htdocs\myApps\vendor\autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Membuat spreadsheet baru
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Header kolom sesuai dengan tabel tb_siswa
$headers = [
    'NIS', 'NISN', 'Nama', 'Jenis Kelamin', 'Kelas', 'Program Studi', 'Tahun Pelajaran', 
    'Tempat Lahir', 'Tanggal Lahir (YYYY-MM-DD)', 'Alamat', 
    'Nama Ibu', 'Nama Ayah', 'Telepon', 'Email', 'Status'
];

// Mengatur header di kolom Excel
$col = 'A';
foreach ($headers as $header) {
    $sheet->setCellValue($col . '1', $header);
    $col++;
}

// Mengatur file untuk diunduh
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="template_siswa.xlsx"');
header('Cache-Control: max-age=0');

$writer = new Xlsx($spreadsheet);
$writer->save('php://output');
exit;
