var pattern = /^[a-z0-9][a-z0-9\._-]*[a-z0-9]*@([a-z0-9]+([a-z0-9-]*[a-z0-9]+)*\.)+[a-z]+/i;
var mail = $('input[name=email]');


$('input').focusout(function(){

    if($(this).hasClass('email')){

        if ($(this).val() == '' || !$(this).val()) {
            $(this ).next().children().text('The name must be correct.');
            $(this).parent().parent().addClass('has-error');
            $('.login').attr('disabled', true);
            //console.log(0);
        }
        else if($(this).val() != ''){
            if (mail.val().search(pattern) == 0) {
                // Убираем сообщение об ошибке
                //console.log($('.email').val());

                $('.login').attr('disabled', false);
                var email = $('.email').val();

                $.ajax({

                    url: "check_email_auth",
                    type: "POST",
                    dataType: "json",
                    data: {
                        email: email
                    },
                    //dataType: "html",
                    success: function(data){


                        if(data == 'error'){

                            $('.email').next().children().text('These credentials do not match our records.');
                            $('.email').parent().parent().addClass('has-error');
                            $('.login').attr('disabled', true);

                        }
                        else{

                            $('.email').next().children().text('Success!');
                            $('.email').parent().parent().removeClass('has-error').addClass('has-success');
                            if ($('.fg1').hasClass('has-success') && $('.fg3').hasClass('has-success')) {
                                $('.login').attr('disabled', false);

                            }
                        }

                    }
                });
            }
            else{
                //Выводим сообщение об ошибке
                // console.log(2);
                $(this ).next().children().text('These credentials do not match our records.');
                $(this).parent().parent().addClass('has-error');
                $('.login').attr('disabled', true);
            }
        }
    }
    if($(this ).hasClass('password')) {
        if ($(this).val() == '' || !$(this).val()) {
            $(this ).next().children().text('These credentials do not match our records.');
            $(this).parent().parent().addClass('has-error');
            $('.login').attr('disabled', true);
            //console.log(0);
        }
        else if($(this).val() != ''){
            if ($(this ).val().length < 6) {
                //Выводим сообщение об ошибке
                $(this ).next().children().text('The password must be at least 6 characters.');
                $(this).parent().parent().addClass('has-error');
                $('.login').attr('disabled', true);
                //console.log(20);
            }
            else {
                // Убираем сообщение об ошибке
                $(this ).next().children().text('');
                $(this).parent().parent().removeClass('has-error').addClass('has-success');
                $('.login').attr('disabled', false);
                //console.log(25);
            }
        }
    }



});

$('input').focusout(function(){

    if ($('.fg1').hasClass('has-error') || $('.fg2').hasClass('has-error')) {
        $('.login').attr('disabled', true);
    }
    else if($('.fg1').hasClass('has-success') && $('.fg2').hasClass('has-success')){
        $('.login').attr('disabled', false);

    }

});