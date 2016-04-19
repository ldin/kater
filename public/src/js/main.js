 
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



});