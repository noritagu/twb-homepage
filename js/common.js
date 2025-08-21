//アコーディオンメニュー
$(function(){
        var guide_li =$('.guide_list>li');
        var guide_li_inner =$('.guide_list>li .guide_content');
        var guide_li_inner_first =$('.guide_list>li:first-child .guide_content');
        var guide_ttl_wrap = $('.guide_ttl_wrap');


        guide_li_inner.hide();

        guide_li.removeClass('active');

        guide_ttl_wrap.on('click',function(){
            if($(this).hasClass('active')){
                $(this).removeClass('active');
                $(this).next('.guide_content').slideUp(500);
                return false;
            }else{
                $(this).addClass('active');
                $(this).next('.guide_content').slideDown(500);
                return false;
            }
        });
});


//FAQ
$(function() {
	function demo01() {
		$(this).next().slideToggle(300);
	}
	$(".simple .toggle").click(demo01);

	function demo02() {
		$(this).toggleClass("active").next().slideToggle(300);
	}
	$(".switch .toggle").click(demo02);
});



//画像ホバー切り替え
jQuery(function($){
	 $('a img').hover(function(){
		$(this).attr('src', $(this).attr('src').replace('_off', '_on'));
		  }, function(){
			 if (!$(this).hasClass('currentPage')) {
			 $(this).attr('src', $(this).attr('src').replace('_on', '_off'));
		}
	});
});


//SPサイト
$(function(){
  var $panel = $('#js-popout-panel'); //パネル
  var DURATION = 200; //アニメーションのスピード
  //メニューボタンのイベント
  $('#js-popout').on('click', function(){
    $panel.fadeIn(DURATION);
  });
  //閉じるボタンのイベント
  $('#js-popout-close, .nav-item').on('click', function(){
    $panel.fadeOut(DURATION);
  });
});





//SP　PC画像切り替え
$(function(){
    var $setElem = $('.switch'),
    pcName = '_pc',
    spName = '_sp',
    replaceWidth = 641;
 
    $setElem.each(function(){
        var $this = $(this);
        function imgSize(){
            if(window.innerWidth > replaceWidth) {
                $this.attr('src',$this.attr('src').replace(spName,pcName)).css({visibility:'visible'});
            } else {
                $this.attr('src',$this.attr('src').replace(pcName,spName)).css({visibility:'visible'});
            }
        }
        $(window).resize(function(){imgSize();});
        imgSize();
    });
});


//タブ
$(function() {
    $(".tab li").click(function() {
        var num = $(".tab li").index(this);
        $(".tabContent").removeClass('active');
        $(".tabContent").eq(num).addClass('active');
        $(".tab li").removeClass('active');
        $(this).addClass('active')
    });
});




