$(document).ready(function() {

  // MODAL
  $('.alert-modal').modal('show');

  // TOGGLE SIDEBAR NAV
  $('#btn-sidenav').on('click', function() {
    $('#side-nav, #main').toggleClass("showHideNav");
    if ($('#side-nav').hasClass("showHideNav")) {
      $("#overlay").show();
    }
    else {
      $("#overlay").hide();
    }
    return false;
  });
  $('#overlay').on('click', function() {
    $('#side-nav, #main').removeClass("showHideNav");
    $("#overlay").hide();
  });

  // Tampilkan gambar foto yang dipilih saat isi data
  function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#fotoKtpPreview').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
  }
  $("#fotoktp").change(function(){
      readURL(this);
  });

  function readURL2(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();

          reader.onload = function (e) {
              $('#fotoDiriPreview').attr('src', e.target.result);
          }
          reader.readAsDataURL(input.files[0]);
      }
  }
  $("#fotodiri").change(function(){
      readURL2(this);
  });

    $(".custom-file-input").change(function() {
        $(this).next().text($(this).val().split('\\').pop());
    })

});