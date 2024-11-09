$(document).ready(function () {
    $("#generate").click(function (e) {
        const csrf_token = $(this).data("csrf");
        const text = $("#text").val();
        if (text === "") {
            Swal.fire({
                title: "upss",
                text: "text tidak boleh kosong!",
                icon: "error"
            });
        } else {
            generateQr(text, csrf_token);
        }
    });

    $("#text").on("input", function (e) {
        var maxLength = 537;
        var currentLength = $(this).val().length;
        var remaining = maxLength - currentLength;
        $("#charCount").show();
        $("#charCount").text(remaining + " karakter tersisa");

        if (currentLength == maxLength) {
            $("#charCount")
                .css({
                    "color": "orange",
                    "font-weight": "600"
                })
                .addClass("fa-fade");
        } else {
            $("#charCount")
                .css({
                    "color": "white",
                })
                .removeClass("fa-fade");
        }
    });
    function generateQr(text, csrf_token) {
        $("#qrHasil").html("");
        $("#text").val("");
        $(".text-btn").addClass("fa-fade");
        $("#generate").html(
            '<i class="fa fa-spin fa-refresh"></i> Generate...'
        );
        $.ajax({
            url: "proses_data/genereteQr.php",
            type: "POST",
            dataType: "json",
            data: {
                text: text,
                csrf: csrf_token
            },
            success: function (data) {
                $("#body").css({
                    "height": "auto"
                });
                $("#notData").remove();
                $("#qrHasil").append(
                    `
              <div class="row justify-content-center qrGenerate">
                <div class="col-md-8">
                  <h3 class="font-oswald pt-3 pb-2">Qr Berhasil di buat🥳</h3>
                </div>
              </div>
              <div class="row mt-3 justify-content-center qrGenerate">
                <div class="row justify-content-center">
                  <div class="col-md-8">
                    <div class="row justify-content-center">
                      <div class="col-md-4 col-6">
                        <img src="` +
                        data.tmp_file +
                        `" width="100%" alt="">
                      </div>
                      <div class="col-6 ">
                        <p>
                          yeyyy, Qr berhasil di buat nih. Silahkan kamu bisa unduh
                          sekarang!
                          <a class="text-decoration-none" href="proses_data/download_file.php?file=` +
                        data.name_file +
                        `">
                            <button class="fa-bounce btn-submit w-100" ><li class="fa fa-download"></li> Unduh Qr </button>
                          </a>
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            `
                );
            },
            error: function (xhr, status, error) {
                Swal.fire({
                    title: "upss",
                    text: error,
                    icon: "error"
                });
            },
            complete: function () {
                $(".text-btn").removeClass("fa-fade");
                $("#generate").html(
                    '<span class="text-btn"><li class="fa fa-wand-magic-sparkles"></li> Ganerate Qr </span>'
                );
                $("#charCount").hide();
            }
        });
    }
});
