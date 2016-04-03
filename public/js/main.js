 
$(document).ready(function() {

     // menu fix
    var menu = $("#menu");
    var header = $('.js-header-block');

    $(window).scroll(function(){
        var height = header.height();
        if ( $(this).scrollTop() > height && menu.hasClass("relative") ){
            menu.removeClass("relative").addClass("fixed");
            $("#main-logo").css( { marginBottom : "0", height : "50px", width:"102px"  } );
        } else if($(this).scrollTop() <= height && menu.hasClass("fixed")) {
            menu.removeClass("fixed").addClass("relative");
            $("#main-logo").css( { marginBottom : "-43px", height : "82px", width:"130px" } );
        }
    });

    //soft scrolling
    $('a[href^="#"]').click(function () {
        var el = $(this).attr('href');
        $('body').animate({
            scrollTop: $(el).offset().top}, 2000);
        return false;
    });


    $('#price td i').addClass('glyphicon glyphicon-ok');

    //ширина для наклонных блоков
    var w = $(window).width();
    $('.triangle-box.top').css('border-left-width', w);
    $('.triangle-box.bottom').css('border-right-width', w);
    $(window).resize(function(){
        var w = $(window).width();
        $('.triangle-box.top').css('border-left-width', w);
        $('.triangle-box.bottom').css('border-right-width', w);
    });

    //slider
    $('.slide').slick({
        dots: false,
        arrows: false,
        infinite: true,
        speed: 500,
        fade: true,
        autoplay: true,
        autoplaySpeed: 2000,
        cssEase: 'linear'
    });

    $('.slick').slick({
        dots: false,
        arrows: false,
        autoplay: true,
        autoplaySpeed: 4000
    });

});