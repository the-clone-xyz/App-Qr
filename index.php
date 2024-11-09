<?php
session_start();
include "proses_data/fungsi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/fontawesome-free/css/all.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <title>App Qr code</title>
</head>
<body id="body">
  <section id="header">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <h1 class="font-oswald pt-3 pb-2">App Qr Code Generator <i class="fa fa-qrcode"></i></h1>
          <div id="formData">
            <label class="my-2" for="text">Masukkan text yang ingin di buat Qr</label>
            <textarea maxlength="537" id="text" class="form-control" type="text"></textarea>
            <span id="charCount"></span>
          <button id="generate" class="btn-submit" data-csrf="<?= unique_id_form(); ?>">
              <span class="text-btn"><li class="fa fa-wand-magic-sparkles"></li> Ganerate Qr </span>
            </button>
          </div>
        </div>
      </div>
      <div id="qrHasil"></div>
      <div id="notData" class=" row justify-content-center">
        <div class="col-md-8">
          <h3 class="font-oswald pt-3 pb-2 text-center ">Belum ada data Qr</h3>
        </div>
      </div>
    </div>
  </section>
  <section>
    <div class="container">
      <div class="row justify-content-center mt-5">
        <div class="col-md-8">
          Ini adalah web untuk mengubah text menjadi kode Qr dengan sangat mudah
          dan gratis. Web ini tidak mengandung iklan sedikit pun untuk
          memberikan pengalamaan yang baik bagi pengguna.
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-md-8">
          <p class="my-3 p-2 text-center font-oswald">
            &copy;2024 <i class="fa fa-beat-fade fa-heart text-danger"></i> yogi syahputra || Tik tok <i class="fa fa-beat-fade fa-heart text-danger"></i> Ruang belajar html
          </p>
        </div>
      </div>
    </div>
  </section>

</body>
<script src="assets/bootstrap/js/bootstrap.js"></script>
<script src="assets/jquery/jquery.min.js"></script>
<script src="assets/sweetalert2/sweetalert2.all.min.js"></script>
<script src="assets/js/script.js"></script>
</html>