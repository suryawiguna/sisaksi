function readURL(input) {
  if (input.files && input.files[0]) {

    var reader = new FileReader();

    reader.onload = function(e) {
      $('#file-upload .image-upload-wrap').hide();

      $('#file-upload .file-upload-content').show();
      $('#file-upload .file-upload-content .file-upload-image').attr('src', e.target.result);
      $('#file-upload .file-upload-content .image-title').html(input.files[0].name);
    };

    reader.readAsDataURL(input.files[0]);

  } else {
    removeUpload();
  }
}

function removeUpload() {
  $('#file-upload .image-upload-wrap .file-upload-input').val('');
  $('#file-upload .file-upload-content').hide();
  $('#file-upload .image-upload-wrap').show();
}
$('#file-upload .image-upload-wrap').bind('dragover', function () {
        $('#file-upload .image-upload-wrap').addClass('image-dropping');
    });
    $('.image-upload-wrap').bind('dragleave', function () {
        $('#file-upload .image-upload-wrap').removeClass('image-dropping');
});


function readURL2(input) {
  if (input.files && input.files[0]) {

    var reader = new FileReader();

    reader.onload = function(e) {
      $('#file-upload2 .image-upload-wrap').hide();

      $('#file-upload2 .file-upload-content').show();
      $('#file-upload2 .file-upload-content .file-upload-image').attr('src', e.target.result);
      $('#file-upload2 .file-upload-content .image-title').html(input.files[0].name);
    };

    reader.readAsDataURL(input.files[0]);

  } else {
    removeUpload();
  }
}

function removeUpload2() {
  $('#file-upload2 .image-upload-wrap .file-upload-input').val('');
  $('#file-upload2 .file-upload-content').hide();
  $('#file-upload2 .image-upload-wrap').show();
}
$('#file-upload2 .image-upload-wrap').bind('dragover', function () {
        $('#file-upload2 .image-upload-wrap').addClass('image-dropping');
    });
    $('#file-upload2 .image-upload-wrap').bind('dragleave', function () {
        $('#file-upload2 .image-upload-wrap').removeClass('image-dropping');
});
