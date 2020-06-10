$(function () {

    $('#contact-form').submit(function(e) {
        
        e.preventDefault();
        $('.comments').empty();
        var postdata = $('#contact-form').serialize();

        $.ajax({
            type: 'POST',
            url: 'php/contact.php',
            data: postdata,
            dataType: 'json',
            success: function(result) {

                if (result.isSuccess) {
                    $('#contact-form').append("<p class='thank-you'>Votre message a bien été envoyé. Merci de m'avoir contacté :)</p>");
                    $('#contact-form')[0].reset();
                } else {
                    $('#firstName + .comments').html(result.firstNameError);
                    $('#lastName + .comments').html(result.lastNameError);
                    $('#email + .comments').html(result.emailError);
                    $('#phoneNumber + .comments').html(result.phoneNumberError);
                    $('#message + .comments').html(result.messageError);
                }

            }
        });
        
    });

});