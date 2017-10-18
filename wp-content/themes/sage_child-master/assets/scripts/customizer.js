//导航条可点击问题解决
$(document).ready(function(){
if (window.innerWidth > 800)
{
$(document).off('click.bs.dropdown.data-api');
}
});


$(document).ready(function(){
dropdownOpen();//调用
});
/**
* 鼠标划过就展开子菜单，免得需要点击才能展开
*/
function dropdownOpen() {
if (window.innerWidth > 800)
{
var $dropdownLi = $('li.dropdown');

$dropdownLi.mouseover(function() {
$(this).addClass('open');
}).mouseout(function() {
$(this).removeClass('open');
});
}
}

//“钉”住某个元素的 pin插件启动项
$(".entry-sku").pin({
    containerSelector: "article",
    minWidth: 940
})


//页面加载完成后执行
$(document).ready(function(){
$(".comments #comment,.comments #author").addClass("form-control");// 评论
$(".comments #submit").addClass("btn btn-default");// 评论提交按钮
//$(".navigation .nav-links a").addClass("btn btn-default btn-sm");// 翻页按钮2016年8月1日17:36:06暂时移出因为又觉得这样不好
$(".get-the-tag-list a").addClass("label label-default");// 标签
//$("#menu-menu-1>li:first").addClass("hover-nav-img-1");//  导航增加图片版1
//$("#menu-menu-1>li:eq(1)").addClass("hover-nav-img-2");// 导航增加图片版2
if (window.innerWidth > 800)//浏览器窗口大于800才执行此项（因为手机移动端导航初次点击下拉子类的时候要点两下才行，试试把控制导航的js 限制在只对大屏执行试试，应该可以。实际情况是确实可以。）
{//判断宽度开始
$("#menu-menu-1>li").each(function(hnit){$(this).addClass("hover-nav-img-"+hnit);});//遍历内容页的然后给标签加 class（代替上面两个）

//触发显示0
$(".hover-nav-img-0").hover(
function () {
$(".nav-img-0").stop(true,false).slideDown(200);
},
function () {
$(".nav-img-0").stop(true,false).slideUp(200);
}
);
//移动到此区域隐藏显示区域（移动到 LOGO 和 除尘器配件 之上）
//$(".navbar-brand,#menu-menu-1>li:eq(1)").hover(
//function () {
//$(".nav-img-1").stop(true,false).slideUp(200);
//},
//function () {
//}
//);
//移出到显示区域后隐藏0
$(".nav-img-0").hover(
function () {
$(this).stop(true,false).slideDown(200);
},
function () {
$(this).stop(true,false).slideUp(200);
}
);

//触发显示1
$(".hover-nav-img-1").hover(
function () {$(".nav-img-1").stop(true,false).slideDown(200);},
function () {$(".nav-img-1").stop(true,false).slideUp(200);});
$(".nav-img-1").hover(
function () {$(this).stop(true,false).slideDown(200);},
function () {$(this).stop(true,false).slideUp(200);});
//触发显示2
$(".hover-nav-img-2").hover(
function () {$(".nav-img-2").stop(true,false).slideDown(200);},
function () {$(".nav-img-2").stop(true,false).slideUp(200);});
$(".nav-img-2").hover(
function () {$(this).stop(true,false).slideDown(200);},
function () {$(this).stop(true,false).slideUp(200);});
//触发显示3
$(".hover-nav-img-3").hover(
function () {$(".nav-img-3").stop(true,false).slideDown(200);},
function () {$(".nav-img-3").stop(true,false).slideUp(200);});
$(".nav-img-3").hover(
function () {$(this).stop(true,false).slideDown(200);},
function () {$(this).stop(true,false).slideUp(200);});


//触发滚动条，滚动滚动条后，隐藏导航下拉图
$(window).scroll(function () {
$(".nav-img-0,.nav-img-1,.nav-img-2,.nav-img-3").css('display','none');
});


}//判断宽度结束


//sage_child-js文件-给文档内容页和产品内容页的h2标签加id（暂时移除，替换为 functions.php 文章目录功能）
//给文档内容页和产品内容页的 h2 标签加 id


//如果翻页按钮没有属性，则自动追加空链接，原属性在 footer.php
if($(".nav-links .nav-previous a").length==0){//上一页为空
$(".nav-previous").prepend('<a title="没了" rel="prev"><i class="fa fa-angle-left disabled"></i></a>');
}
if($(".nav-links .nav-next a").length==0){//下一页为空
$(".nav-next").prepend('<a title="没了" rel="next"><i class="fa fa-angle-right disabled"></i></a>');
}


//地址栏链接与a标签链接匹配
var currUrl = window.location.href;
   var currStyle = function (links){
     links.each(function(){
        var url = $(this).attr('href');
        if (currUrl.indexOf(url) != -1){
          $(this).addClass("current");
            return false;
        }
     });
}
$(function(){
  currStyle($(".entry-sku .sku-posts a"));//进一步了解：内页sku 右侧内容导航
  currStyle($(".current-category-next-link a"));// 底部下一篇内容导航
  currStyle($(".current-category-next-link a.current").removeClass('current').next().addClass('current'));//当前的下一个（具体 css样式在 _posts.scss）
    if(!$(".current-category-next-link a").hasClass("current")){
        //如果没有下一篇了，那么就全部不显示了，即可默认显示第一篇（具体样式控制在 _posts.scss）
        $(".current-category-next-link a:first-child").addClass('show');
    }
  currStyle($(".ent-thumbnail a"));//导航划过后下拉的的图
  currStyle($(".ent-title a"));//导航划过后的下拉的文字标题
  $('.ent-thumbnail a.current').parent().parent().addClass('current');//导航划过后的下拉图，向上两级增加控制样式，样式写到了 _header.scss
})


//首页四栏禁用超链接的JS样式，2016年8月1日17:42:42用在了底部全局翻页按钮
//$('.disabled').attr('title','近期推出');//这里的单个添加，替换成了下面的集合
//$('.disabled').attr({
//"data-toggle"    : "tooltip",
//"data-placement" : "top",
//"title"          : "近期推出"
//});
//$('[data-toggle="tooltip"]').tooltip();//bootstrap 提供的触发属性（tooltip.js-工具提示）
$('.disabled').removeAttr('href onclick');//去掉a标签中的href属性，去掉a标签中的onclick事件（规定要移除的一个或多个属性。移除若干个属性，使用空格分隔属性名称。）


//qrcode 首页手机访问，图片二维码
$('.qrcode-home a').removeAttr('href onclick');//去掉a标签中的href属性，去掉a标签中的onclick事件（规定要移除的一个或多个属性。移除若干个属性，使用空格分隔属性名称。）
$(".qrcode-home a").addClass("qrcode-text");//给span加
$(".qrcode-text").after("<img class=\"qrcode-img\" src=\"/wp-content/themes/sage_child/assets/images/qrcode.png\">");
//$(".qrcode-text + img").attr('class','qrcode-img');//一个有效选择器并且紧接着第一个选择器
$(".qrcode-img").after("<span class=\"qrcode-span\">手机扫描二维码快速访问网站</span>");
$(".qrcode-text,.qrcode-img,.qrcode-span").hover(function(){
$(".qrcode-img,.qrcode-span").stop(true,false).fadeToggle("slow","linear");
return false;
});


// 产品导航下 & h1标题上面的右侧的，进一步了解按钮的，分割线样式
$('.sku-posts li').css('border-right','1px solid #eee');//加点颜色（默认的 _posts.scss 里面有透明的当占位符用，因为 js最后加载可能造成短暂错位）
$('.sku-posts li:first-child').css('border-right','1px solid transparent');
$('.sku-posts li:last-child').css('border-right','1px solid transparent');


//footer.php 底部返回顶部按钮
$('.to-up a').removeAttr('href onclick').click(function(){$('html,body').animate({scrollTop:'0px'},300);});


});

