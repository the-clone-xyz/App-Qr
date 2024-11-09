<?php
session_start();
include "fungsi.php";
$folder = "../assets/img/";
$file = isset($_GET['file']) ? $_GET['file'] : '';

if ($file != '' && file_exists($folder . $file)) {
    // Mendefinisikan header untuk proses download
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="' . basename($file) . '"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($folder . $file));
    
    // Membaca dan mengirim file ke browser
    readfile($folder . $file);
    exit();
} else {
    setAlert("Gagal", "Data gambar gagal di download!", "error");
    header("Location: ../");
    exit();
}
?>