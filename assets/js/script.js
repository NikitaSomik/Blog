var pattern = /^[a-z0-9][a-z0-9\._-]*[a-z0-9]*@([a-z0-9]+([a-z0-9-]*[a-z0-9]+)*\.)+[a-z]+/i;
var name = $('input[name=name]');
var mail = $('input[name=email]');
var symb = /[*&&%%$$£”]/;

// var href = window.location.href;
// var url = href.split("err=")[1]

// console.log(url);
//
// switch(url*1) {
//
//     case 0:
//         $('.name').next().children().text('The name must be correct.');
//         $('.fg1').addClass('has-error');
//         $('#register').attr('disabled', true);
//         break;
//     case 1:
//         $('.email').next().children().text('The email must be correct.');
//         $('.fg2').addClass('has-error');
//         $('#register').attr('disabled', true);
//         break;
//     case 2:
//         $('.email').next().children().text('Already registered such user.');
//         $('.fg2').addClass('has-error');
//         $('#register').attr('disabled', true);
//         break;
//     case 3:
//         $('.email').next().children().text('The email must be a valid email address.');
//         $('.fg2').addClass('has-error');
//         $('#register').attr('disabled', true);
//         break;
//     case 4:
//         $('.password').next().children().text('The password must be at least 6 characters.');
//         $('.fg3').addClass('has-error');
//         $('#register').attr('disabled', true);
//         break;
// }

$('input').focusout(function(){

    if($(this).hasClass('name')){

        if ($(this).val() == '' || !$(this).val()) {
            $(this ).next().children().text('The name must be correct.');
            $(this).parent().parent().addClass('has-error');
            $('#register').attr('disabled', true);
            //console.log(0);
        }
        else if ($(this).val() != '') {

            if (symb.test($(this).val())) {
                //console.log(3);
                $(this).next().children().text('The name must be correct.');
                $(this).parent().parent().addClass('has-error');
                $('#register').attr('disabled', true);
            }
            else {
                $(this ).next().children().text('');
                $(this).parent().parent().removeClass('has-error').addClass('has-success');
                $('#register').attr('disabled', false);
            }
        }

    }
    if($(this).hasClass('email')){

        if ($(this).val() == '' || !$(this).val()) {
            $(this ).next().children().text('The email must be correct.');
            $(this).parent().parent().addClass('has-error');
            $('#register').attr('disabled', true);
            //console.log(0);
        }
        else if($(this).val() != ''){
            if (mail.val().search(pattern) == 0) {

                $('#register').attr('disabled', false);
                var email = $('.email').val();
                $.ajax({

                    url: "check_email",
                    type: "POST",
                    dataType: "json",
                    data: {
                        email: email
                    },
                    //dataType: "html",
                    success: function(data){

                        if(data == 'error'){
                            $('.email').next().children().text('Already registered such user');
                            $('.email').parent().parent().addClass('has-error');
                            $('#register').attr('disabled', true);
                        }
                        else{
                            $('.email').next().children().text('Email is free.');
                            $('.email').parent().parent().removeClass('has-error').addClass('has-success');
                            if ($('.fg1').hasClass('has-success') && $('.fg3').hasClass('has-success')) {
                                $('#register').attr('disabled', false);
                            }
                        }

                    },
                    error: function(r){
                        console.log(r+'111');
                    }

                });
            }
            else{
                //Выводим сообщение об ошибке
                // console.log(2);
                $(this ).next().children().text('The email must be a valid email address.');
                $(this).parent().parent().addClass('has-error');
                $('#register').attr('disabled', true);
            }
        }
    }
    if($(this ).hasClass('password')) {
        if ($(this).val() == '' || !$(this).val()) {
            $(this ).next().children().text('The password must be correct.');
            $(this).parent().parent().addClass('has-error');
            $('#register').attr('disabled', true);

        }
        else if($(this).val() != ''){
            if ($(this ).val().length < 6) {
                //Выводим сообщение об ошибке
                $(this ).next().children().text('The password must be at least 6 characters.');
                $(this).parent().parent().addClass('has-error');
                $('#register').attr('disabled', true);
            }
            else {
                // Убираем сообщение об ошибке
                $(this ).next().children().text('');
                $(this).parent().parent().removeClass('has-error').addClass('has-success');
                $('#register').attr('disabled', false);
            }
        }
    }

});

$('input').focusout(function(){

    if ($('.fg1').hasClass('has-error') || $('.fg2').hasClass('has-error') || $('.fg3').hasClass('has-error')) {

        $('#register').attr('disabled', true);
    }
    else if($('.fg1').hasClass('has-success') && $('.fg2').hasClass('has-success') && $('.fg3').hasClass('has-success')){
        $('#register').attr('disabled', false);

    }

});






