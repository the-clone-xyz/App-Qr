<?php
session_start();
include "fungsi.php";
include '../phpqrcode/qrlib.php';
if (!isset($_POST["text"])) {
  setAlert("Upsss", "Hayo lohh mau ngampain? jangan ya dek ya, jangan!", "info");
  header("Location: ../");
  exit();
} else {
  if (md5($_SESSION["unique_id"]) !== $_POST["csrf"]) {
    setAlert("Upsss", "Sepertinya ada kesalahan! coba ulangi peroses pembuatan Qr", "error");
    header("Location: ../");
    exit();
  } else {
    
    $data = $_POST["text"];
    $file_name = uniqid() . ".png";

    function generateQRCode($data, $filename, $tempDir = '../assets/img/', $errorCorrectionLevel = 'L', $matrixPointSize = 10, $margin = 2) {
      $filePath = $tempDir . $filename;
      QRcode::png($data, $filePath, $errorCorrectionLevel, $matrixPointSize, $margin);
      return "assets/img/" . $filename;
    }
   $hasil =  generateQRCode($data, $file_name);
   echo json_encode([
     'status'  => 200,
     'pesan' => 'Qr berhasil di buat',
     'name_file' => $file_name,
     'tmp_file' => $hasil
     ]);
  }
}