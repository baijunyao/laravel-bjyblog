$(function(){
    // 调整导航条hover的样式
    if($('.b-nav-mobile').css('display')=='block'){
        var widthLeft=getWidthLeft($('.b-nav-active'),false);
        $('.b-nav-mobile').css({
            'width': widthLeft['width'],
            'left': widthLeft['left']
        });
    }

    // 鼠标移入导航条的hover状态
    $('.b-nav-parent li').hover(function() {
        getWidthLeft($(this),true);
    }, function() {
        getWidthLeft($('.b-nav-active'),true);
    });

    // 设置文章页iframe宽度
    $('.b-article iframe').width('95%');
    // 返回顶部
    $(window).scroll(function(e) {
        //若滚动条离顶部大于200元素
        if($(window).scrollTop()>200){
            $('.go-top').show();
            $(".go-top").removeClass('animated rotateOut');
            $(".go-top").addClass('animated rotateIn');
        }else{
            $(".go-top").removeClass('animated rotateIn');
            $(".go-top").addClass('animated rotateOut');
        }
    });

    // 改变导航栏高度
    if(window.innerWidth>=768){
        $(window).scroll(function(e) {
            //若滚动条离顶部大于100元素
            if($(window).scrollTop()>100){
                $('#b-public-nav').stop().animate({'padding-top':'0px','padding-bottom':'0px'},100);
            }else{
                $('#b-public-nav').stop().animate({'padding-top':'5px','padding-bottom':'5px'},100);
            }
        });
    }
    // 为分页类增加响应式class
    $('.b-page .first,.num,.end').addClass('hidden-xs');
    $('.b-page .rows').addClass('hidden-xs');

    // 随言碎语js调整时间轴的高度
    $('.b-chat-middle').height($('.b-chat').height());
    // 随言碎语js调整气泡三角的top
    $('.b-arrows-right1,.b-arrows-right2').each(function(index, el) {
        $(el).css('top', $(el).parent('.b-chat-one').height()/2.5);
    });

    $.each($('.js-head-img'), function(index, val) {
        var img=$(val).attr('_src');
        $(val).attr('src', img);
    });

})

/**
 * 传递对象；获取left值和width
 * @param  {subject}  obj   html对象
 * @param  {Boolean} change  true获取left和宽；false改变left和宽；
 * @return {subject}         获取到的left和宽
 */
function getWidthLeft(obj,change){
    var mobileLeft=obj.position().left;
    var mobileWidth=obj.width();
    var widthLeft={
        'left':mobileLeft,
        'width':mobileWidth
    }
    if(!change){
        return widthLeft;
    }
    $('.b-nav-mobile').stop().animate({'left':mobileLeft,'width':mobileWidth}, 300);
}

// 登录
function login(){
    $('#b-modal-login').modal('show');
    setCookie('this_url',window.location.href);
}

// 退出
function logout(){
    $.post(logoutUrl);
    setTimeout(function(){location.replace(location)},500);
}

// 点击返回顶部
function goTop(){
    $('body,html').animate({scrollTop:0},500);
    return false;
}

/**
 * 设置cookie
 * @param {string} name  键名
 * @param {string} value 键值
 * @param {integer} days cookie周期
 */
function setCookie(name,value,days) {
    if (days) {
        var date = new Date();
        date.setTime(date.getTime()+(days*24*60*60*1000));
        var expires = "; expires="+date.toGMTString();
    }else{
        var expires = "";
    }
    document.cookie = name+"="+value+expires+"; path=/";
}

// 获取cookie
function getCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
}

// 删除cookie
function deleteCookie(name) {
    setCookie(name,"",-1);
}

/**
 * 记录当前选中的分类或者标签
 * @param  {string} category index：首页 cid：分类  tid：标签
 * @param  {integer} id      id
 * @return {boolean}         true 接着跳转
 */
function recordId(category,id){
    // 设置默认值为0
    setCookie('cid',0);
    setCookie('tid',0);
    setCookie('search_word',0);
    // 如果不是首页 则记录当前选中的分类或者标签
    if (category!='index' && category!='/') {
        setCookie(category,id);
    }
    return true;
}

