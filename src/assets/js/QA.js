// header 捲動出現影子
$(function scroll(){
    $(window).on('scroll', function (){
        if( $(window).scrollTop() > 0){
            $('.js-click').addClass('js-hd-shadow');
        }
        else{
            $('.js-click').removeClass('js-hd-shadow');
        }
    });
});

// click 事件
$(function click(){
    $('.js-click').on('click', function (){
        $(this).toggleClass('on');

        // MENU樣式改變
        $('.QA_menu>h3').not(this).removeClass('on');
    });
});

// 選單 click
$(function menuClick(){
    $('.QA_menu h3').on('click', function (){
        $('.QA_menu h3 .at').remove();
        $('.at').clone().appendTo(this);
    });
});

// 底線跟隨滑鼠
function mousemove(event){
    let line = document.getElementById('move-line');
    let objW = document.getElementById('move-line-box').offsetWidth;
    let objT = document.getElementById('move-line-box').offsetTop
             + document.getElementById('move-line-box').offsetHeight / 2;
    let lineLeft = (window.innerWidth - objW) / 2;
    let lineRight = objW + lineLeft;
    // 線段長 100px，容器有 padding:30px

    if(event.pageX < lineLeft + 30 && event.pageY < objT){
        line.style.left = 30 + 'px';
    }
    if(event.pageX > lineRight - 30 && event.pageY < objT){
        line.style.left = objW - 130 + 'px';
    }
    if(event.pageX > lineLeft + 80 && event.pageX < lineRight - 80 && event.pageY < objT){
        line.style.left = event.pageX - lineLeft -50 + 'px';
    }
}
window.addEventListener('mousemove', mousemove);