$(document).ready(function(){
// Login Ajax:
// Php mysql Ajax,
// Copyright 2015 bloguero-ec.
// Usese cómo mas le convenga no elimine estas líneas (http://www.bloguero-ec.com)
    var timeSlide = 1000;
    //$('#email').focus();
    $('#timer').hide(0);
    $('#timer').css('display','none');
    $('#access').click(function(){
        $('#timer').fadeIn(400);
        $('.box-info, .box-success, .box-alert, .box-error').slideUp(timeSlide);
        setTimeout(function(){
            if ($('#email').val() != "" && $('#password').val() != ""){
              var pass = $('#password').val();
              var p = pass;
                $.ajax({
                    type: 'POST',
                    url: '?pg=login.process',
                    data: 'email=' + $('#email').val() + '&p=' + p,
                    success:function(msg){
                          switch (msg){
                            case '1':
                              window.location = "?pg=login&suc=3";
                            break;
                            case '2':
                              $('#alertBoxes').html('<div class="box-error"></div>');
                              $('.box-success').hide(0).html('Cargando . . .');
                              $('.box-success').slideDown(timeSlide);
                              setTimeout(function(){
                                $('.box-error').hide(0).html('Cuenta temporalmente suspendida por muchos intentos erróneos de logueo. <br>Por favor solicite un nuevo password');
                                $('.box-error').slideDown(timeSlide);
                              },(timeSlide + 500));
                            break;
                            default:
                              $('#alertBoxes').html('<div class="box-error"></div>');
                              $('.box-error').hide(0).html(msg);
                              $('.box-error').slideDown(timeSlide);
                              $('#timer').fadeOut(400);
                            break;
                          }
                      $('#timer').slideUp(1000);
                    },
                    error:function(){
                      $('#timer').fadeOut(400);
                      $('#alertBoxes').html('<div class="box-error"></div>');
                      $('.box-error').hide(0).html('Error de ejecución');
                      $('.box-error').slideDown(timeSlide);
                  }
              }), timeSlide;
              }else{
                $('#alertBoxes').html('<div class="box-error"></div>');
                $('.box-error').hide(0).html('Los campos están vacíos');
                $('.box-error').slideDown(timeSlide);
              }
        },2000);
        $('.box-error').slideUp(1500);
        return false;
    });

    $('#sessionKiller').click(function(){
        $('#timer').fadeIn(300);
        $('#alertBoxes').html('<div class="box-success"></div>');
        $('.box-success').hide(0).html('Procesando...');
        $('.box-success').slideDown(timeSlide);
        setTimeout(function(){
            window.location.href = "index.php?pg=logout";
        },1500);
    });
});
