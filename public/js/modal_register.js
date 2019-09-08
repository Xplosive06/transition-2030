$(function () {


    $('#register').click(function () {
        $('#myModal').modal();
    });

    $(document).on('submit', '#formRegister', function (e) {
        e.preventDefault();

        $('input+small').text('');
        $('input').parent().removeClass('has-error');

        let formData = jQuery(this).serializeArray();

        $.ajax({
            method: $(this).attr('method'),
            type: "POST",
            url: $(this).attr('action'),
            data: formData,
        })
            .done(function (data) {
                $('#myModal').modal('hide');
            })
            .fail(function (data) {
                $.each(data.responseJSON.errors, function (key, value) {

                    let input = '#formRegister input[name=' + key + ']';
                    $(input + '+small').text(value);
                    $(input).addClass('is-invalid');
                });
            });
    });

});


