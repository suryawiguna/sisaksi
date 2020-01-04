$('#kel, #koor, #partai, #notps').select2({
    placeholder: 'Pilih...',
    "language": {
        "noResults": function(){
            return "Tidak ada hasil";
        }
    },
});

$('#kel').on('change', function(){
    var kelID = $(this).val();
    
    if(kelID) {
        $.ajax({
            url: '/kel/'+kelID,
            type: "GET",
            dataType: "json",
            success:function(data) {
                $('#koor').empty();
                $.each(data, function(key, value){
                    var newOption = new Option(value, key, false, false);
                    $('#koor').append('<option value="" disabled selected>Pilih...</option>',
                    newOption);
                });
            },
        });
    } else {
        $('#koor').empty();
    }

});