$(document).ready(function(){

    $('#password, #password_confirmation').on('keyup', function () {
        if ($('#password').val() == $('#password_confirmation').val()) {
        $('#message').html('Matching').css('color', 'white');
        } else 
        $('#message').html('Not Matching').css('color', 'white');
    });

});