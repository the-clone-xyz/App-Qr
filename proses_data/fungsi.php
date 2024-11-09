<?php

function setAlert($title = '', $text = '', $type = '', $buttons = '') {
  $_SESSION["pesan"] = [
    "title" => $title,
    "text" => $text,
    "type" => $type,
    "buttons" => $buttons
  ];
}

if (isset($_SESSION['pesan'])) {
  $title = $_SESSION["pesan"]["title"];
  $text = $_SESSION["pesan"]["text"];
  $type = $_SESSION["pesan"]["type"];
  $buttons = $_SESSION["pesan"]["buttons"]; // Belum digunakan dalam SweetAlert

  echo "
        <div id='msg' data-title='{$title}' data-type='{$type}' data-text='{$text}' data-buttons='{$buttons}'></div>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                let title = $('#msg').data('title');
                let type = $('#msg').data('type');
                let text = $('#msg').data('text');
                let buttons = $('#msg').data('buttons'); // Not used in SweetAlert

                if (text !== '' && type !== '' && title !== '') {
                    Swal.fire({
                        title: title,
                        text: text,
                        icon: type,
                        // buttons can be integrated here if required
                    });
                }
            });
        </script>
    ";

  unset($_SESSION["pesan"]);
}
function unique_id_form() {
  $key = uniqid();
  $_SESSION["unique_id"] = $key;
  return md5($key);
}



