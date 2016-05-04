 
$( document ).ready(function() {

     // menu fix
    var menu = $("#menu");
    var header = $('.js-header-block');
    var doc_h = $(window).height();
    //console.log(header.length);
    $(window).scroll(function(){
        var height = header.height();
        if ( $(this).scrollTop() > height && menu.hasClass("relative") ){
            menu.removeClass("relative").addClass("fixed");
        } else if($(this).scrollTop() <= height && menu.hasClass("fixed")) {
            menu.removeClass("fixed").addClass("relative");
        }
    });
    //недоработанная версия фиксации меню снизу(неверно на внутренних)
    //console.log(header.length);
    //if(header.length>0){menu.removeClass("fix-top").addClass("fix-bottom");}
    //
    //$(window).scroll(function(){
    //    var height = header.height();
    //    var scrollTop =  $(this).scrollTop();
    //    if ( scrollTop > height && menu.hasClass("relative") ){
    //        menu.removeClass("relative").addClass("fix-top");
    //    } else if(scrollTop <= height && (scrollTop + doc_h)  >= height && (menu.hasClass("fix-top") || menu.hasClass("fix-bottom"))) {
    //        menu.removeClass("fix-bottom").removeClass("fix-top").addClass("relative");
    //    } else if(scrollTop <= height && (scrollTop + doc_h) < height && menu.hasClass("relative") ) {
    //        menu.removeClass("relative").addClass("fix-bottom");
    //    }
    //});

    //soft scrolling
    $('a[href^="#"].soft').click(function () {
        var el = $(this).attr('href');
        $('body').animate({
            scrollTop: $(el).offset().top}, 2000);
        return false;
    });


    $('#price td i').addClass('glyphicon glyphicon-ok');

    //ширина для наклонных блоков
    /*
    var w = $(window).width();
    $('.triangle-box.top').css('border-left-width', w);
    $('.triangle-box.bottom').css('border-right-width', w);
    $(window).resize(function(){
        var w = $(window).width();
        $('.triangle-box.top').css('border-left-width', w);
        $('.triangle-box.bottom').css('border-right-width', w);
    });
    */

    //Parallax Scrolling animation

    $('article[data-type="background"]').each(function(){
        var $bgobj = $(this);
        $(window).scroll(function() {
            var yPos = -($(window).scrollTop() / $bgobj.data('speed'));
            var coords = 'center '+ yPos + 'px';
            $bgobj.css({ backgroundPosition: coords });
        });
    });

    //Validate form

    //обработчик потери фокуса
    $('input#inputName, input#inputEmail, textarea#inputQuestion').unbind().blur( function(){

        // Для удобства записываем обращения к атрибуту и значению каждого поля в переменные
        var id = $(this).attr('id');
        var val = $(this).val();
        var message_success = '<i class="glyphicon glyphicon-ok"></i>'

        //console.log(id);

        // После того, как поле потеряло фокус, перебираем значения id, совпадающие с id данного поля
        switch(id)
        {
            // Проверка поля "Имя"
            case 'inputName':
                var rv_name = /^[a-zA-Zа-яА-Я]+$/; // используем регулярное выражение
                if(val.length > 2 && val != '' && rv_name.test(val)){
                    console.log('true', $(this).next('.error-box'));
                    $(this).addClass('not_error');
                    $(this).next('.error-box').html(message_success)
                        .addClass('right')
                        .css('color','green')
                        .css('margin','-26px 10px 0 0')
                        .animate({'paddingLeft':'10px'},400)
                        .animate({'paddingLeft':'5px'},400);
                }
                else{
                    $(this).removeClass('not_error').addClass('error');
                    $(this).next('.error-box').html('поле "Имя" обязательно для заполнения,<br> длина имени должна составлять не менее 2 символов,<br> поле должно содержать только русские или латинские буквы')
                        .css('color','red')
                        .animate({'paddingLeft':'10px'},400)
                        .animate({'paddingLeft':'5px'},400);
                }
                break;

            // Проверка email
            case 'inputEmail':
                var rv_email = /^([a-zA-Z0-9_.-])+@([a-zA-Z0-9_.-])+\.([a-zA-Z])+([a-zA-Z])+/;
                if(val != '' && rv_email.test(val)){
                    $(this).addClass('not_error');
                    $(this).next('.error-box').html(message_success)
                        .css('color','green')
                        .addClass('right')
                        .css('margin','-26px 10px 0 0')
                        .animate({'paddingLeft':'10px'},400)
                        .animate({'paddingLeft':'5px'},400);
                }
                else{
                    $(this).removeClass('not_error').addClass('error');
                    $(this).next('.error-box').html('поле "Email" обязательно для заполнения,<br> поле должно содержать правильный email-адрес<br>')
                        .css('color','red')
                        .animate({'paddingLeft':'10px'},400)
                        .animate({'paddingLeft':'5px'},400);
                }
                break;


            // Проверка поля "Сообщение"
            case 'inputQuestion':
                if(val != '' && val.length < 5000){
                    $(this).addClass('not_error');
                    $(this).next('.error-box').html(message_success)
                        .css('color','green')
                        .addClass('right')
                        .css('margin','-26px 10px 0 0')
                        .animate({'paddingLeft':'10px'},400)
                        .animate({'paddingLeft':'5px'},400);
                }
                else{
                    $(this).removeClass('not_error').addClass('error');
                    $(this).next('.error-box').html('поле "Текст письма" обязательно для заполнения')
                        .css('color','red')
                        .animate({'paddingLeft':'10px'},400)
                        .animate({'paddingLeft':'5px'},400);
                }
                break;

        } // end switch(...)
    }); // end blur()


    $('form#js-form-contact').submit(function(e){
        e.preventDefault();
        //console.log($('.not_error').length);

        if($('.not_error').length == 3)
        {
            $.ajax({
                url: '/form-request',
                type: 'post',
                data: $(this).serialize(),

                //beforeSend: function(xhr, textStatus){
                //    //$('form#js-form-contact :input').attr('disabled','disabled');
                //},

                success: function(response){
                    //$('form#js-form-contact :input').removeAttr('disabled');
                    //$('form#js-form-contact :text, textarea').val('').removeClass().next('.error-box').text('');
                    //alert(response);
                    console.log($(this));
                    $('form#js-form-contact').hide();
                    $('form#js-form-contact').next()
                        .html('Ваше сообщение отправлено')
                        .animate({'paddingLeft':'10px'},400)
                        .animate({'paddingLeft':'5px'},400);
                }
            }); // end ajax({...})

        }
        else
        {
            $('form#js-form-contact h3')
                        .html('Проверьте, пожалуйста, заполнение формы')
                        .animate({'paddingLeft':'10px'},400)
                        .animate({'paddingLeft':'5px'},400);
            return false;
        }

    }); // end submit()


});