$(function scroll(){
    $(window).on('scroll', function (){
        if( $(window).scrollTop() > 0){
            $('.hd').addClass('hd-shadow');
        }
        else{
            $('.hd').removeClass('hd-shadow');
        }
    });
});

// $(function menuClick(){
//     $('.js-click').on('click', function (){
//         $('.js-click').not(this).removeClass('at');
//         $(this).addClass('at');
//     });
// });

// $(function menuClick(){
//     $('.QA_menu h3, .tabs .tab').on('click', function (){
//         $('.QA_menu h3, .tabs .tab').not(this).removeClass('at');
//         $(this).addClass('at');
//         console.log(this);
//     });
// });


// 底線跟隨滑鼠
// function mousemove(event){
//     let line = document.getElementById('move-line');
//     let objW = document.getElementById('move-line-box').offsetWidth;
//     let objT = document.getElementById('move-line-box').offsetTop
//              + document.getElementById('move-line-box').offsetHeight / 2;
//     let lineLeft = (window.innerWidth - objW) / 2;
//     let lineRight = objW + lineLeft;
//     // 線段長 100px，容器有 padding:30px

//     if(event.pageX < lineLeft + 30 && event.pageY < objT){
//         line.style.left = 30 + 'px';
//     }
//     if(event.pageX > lineRight - 30 && event.pageY < objT){
//         line.style.left = objW - 130 + 'px';
//     }
//     if(event.pageX > lineLeft + 80 && event.pageX < lineRight - 80 && event.pageY < objT){
//         line.style.left = event.pageX - lineLeft -50 + 'px';
//     }
// }
// window.addEventListener('mousemove', mousemove);



// /* 站点数据库db.js开始 */
// function initArray(){ 
//     /* 定义数组初始化函数 */
//     this.length=initArray.arguments.length;
//     for(var i=0;i<this.length;i++) this[i]=initArray.arguments[i];
// }
// /* 定义待搜索的页面的标题，没有先后顺序，应将待搜索的页面都列出 */
// var titles=new initArray('页面标题1','页面标题2');
// /* 这些页面的详细说明，位置应该与它们的标题一致 */
// var descriptions=new initArray('详细说明1','详细说明2');
// /* 待搜索页面的地址，建议使用在你站点上的相对地址，位置也应与标题、说明相一致 */
// var URLs=new initArray('url1','url2');
// /* 站点数据库db.js结束 */
// // 第三步，初始化用户输入的搜索字符串，并将它传递给搜索函数，列出结果。
// function goSearch(){
//     var searchStr=document.search.searchStr.value; /* 取得表单中的用户输入的搜索字符 */
//     var string1=searchStr.toLowerCase(); /* 转换为小写，避免大小写敏感 */
//     var length1=string1.length;
//     var string2='';

//     for(var i=0;i<3;i++){
//         /* 取得搜索的字符串的各个关键字的逻辑关系 */
//         if(document.search.select.options[i].selected) logic=i;
//     }
//     if(length1!=0 && string1!=' ' && string1!='　'){
//          /* 滤掉"空"关键字 */
//         for(i=0;i<length1;i++){ 
//             /* 将表单中的用户输入的搜索字符串的空格转换为"+"号 */
//             if(string1.charAt(i)==' ') string2+='+';
//             else string2+=string1.charAt(i);
//         }
//         var search=string2.split('+'); /* 将转换过的搜索字符串以"+"为分割符分割为一个字符串数组 */
//         uptodataSearch(search);
//         outWin=window.open('','',''); doc=outWin.document;

//         if(hitCount!=0){
//              /* 如果检索到符合要求的页面 */
//             doc.write('<p>检索结果：共有'+hitCount+'个页面符合字符串："<b><font color="ff0000">'+string2+'</font></b>":</p><ul>');
//             for(i=0;i<hitCount;i++){
//                 doc.write('<li>');
//                 hrefmaker(titles[index[i]],URLs[index[i]],descriptions[index[i]]); /* 把检索到的数据一一列出，这里调用到的链接生成函数hrefmaker()在下面给出 */
//                 doc.write('</li>');
//             }
//             doc.write('</ul>');
//         }
//         else{
//             doc.write('<p>很抱歉，本站没有关于"<b><font color="ff0000">'+string2+'</font></b>"的内容！</p>')
//         }
//     }
//     else alert('请输入要搜索的关键字!');
// }
// // 第四，编写搜索函数。限于篇幅，给出的函数只有“不包含”的功能（就是输入的多个关键字必须全部满足要求才算符合搜索结果），要实现"或者"、"并且"功能请访问以下链接：http://ctsight.topcool.net/document．/pt_nr2000050902.html。
// var hitCount=0; /* 全局变量hitCount，用于记录符合搜索要求的页数 */
// var index=new Array(); /* 全局变量数组，用于保存符合搜索要求的的页面在"数据库"db.js中的位置 */
// function uptodataSearch(searchStr){ /* 以经过处理的用户输入的搜索字符串为参数的搜索函数 */
//     var tmpCount1=0,tmpCount2=0;
//     var tmpStr='',des='';
//     var length1=searchStr.length,length2=titles.length;

//     for(var i=0;i<length2;i++){
//         /* 检索整个站点资料 */
//         tmpStr=titles[i]+descriptions[i]; /* 将本次循环的站点数据的标题与详细内容合并，作为本次检索的范围*/
//         des=tmpStr.toLowerCase(); /* 同样将它转化为小写 */
//         tmpCount1=tmpCount2;

//         if(logic==2){ /* 如果逻辑关系是"不包括(not，!)" */
//             if(des.indexOf(searchStr[0])!=-1){
//                 //首先必须满足第一个关键字要求
//                 for(j=1;j<length1;j++){ 
//                     //检索其它关键字
//                     if(des.indexOf(searchStr[j])==-1) tmpCount2++;
//                 }
//                 if(tmpCount1==tmpCount2-length1+1){
//                     /* 只有满足第一个关键字要求但不满足其它任何一个关键字的才算符合检索要求 */
//                     index[hitCount]=i; hitCount++;} 
//             } 
//         } 
//     }
// }