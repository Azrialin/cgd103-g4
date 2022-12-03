$(function scroll(){
    $(window).on('scroll', function (){
        if( $(window).scrollTop() > 0){
            $('#test').addClass('js-hd-shadow');
        }
        else{
            $('#test').removeClass('js-hd-shadow');
        }
    });
});

// click 事件
$(function click(){
    $('#test').click(function(){
        $(this).toggleClass('on');
    });
});