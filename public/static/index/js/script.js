//下拉菜单 例调用：Nav('#nav');
function Nav(id){
	var oNav = $(id);
	var aLi = oNav.find('li');
	
	aLi.hover(function (){
        $(this).addClass('on');
       $(this).find('.subNav').addClass('flipInY');
       //$(this).find('.subNav').removClass('flipOutY');
        //$(this).css('z-index','9999');
	},function (){
        $(this).removeClass('on');
        $(this).find('.subNav').removeClass('flipInY');
       //$(this).find('.subNav').addClass('flipOutY');
        //$(this).css('z-index','999');
	})	
};
//移动端主导航 
function mobideMenu(){
	$(".mobile-inner-header .mobile-inner-header-icon").click(function(){
	  	$(this).toggleClass("mobile-inner-header-icon-click mobile-inner-header-icon-out");

	  	$(".mobile-inner-nav").slideToggle(250);
	  	// if($(this).hasClass('mobile-inner-header-icon-click')){
	  	// 	$(this).html('&times;')
	  	// }else{
	  	// 	$(this).html('+')
	  	// }
	  });
	  $(".mobile-inner-nav a").each(function( index ) {
	  	$( this ).css({'animation-delay': (index/20)+'s'});
	  });
	  $('.mobile-inner-nav li strong').click(function(){
	  	$(this).next('dl').slideToggle(500);
	  	$(this).toggleClass('on');
	  	if($(this).hasClass('on')){
	  		$(this).html("&times;")
	  	}else{
	  		$(this).html("+")
	  	}
	  })

}

//移动端顶部点击弹出下拉菜单
function Menu(menu,main){
		$(menu).click(function(){
	  	$(this).toggleClass("mobile-inner-header-icon-click mobile-inner-header-icon-out");
	  	$(".sub_navm").slideToggle(250);
		$('.sub_navm').find('.phone_toggle').click(function(){
			$(this).next('dl').slideToggle(500);
			$(this).toggleClass('on');
			if($(this).hasClass('on')){
				$(this).html("&times;")
			}else{
				$(this).html("+")
			}
			})
	  });
};
function subLeft(){
	$('.subLeft').find('.toggles').click(function(){
		$(this).next('.second_nav').slideToggle(500);
		$(this).parent('li').toggleClass('active')
		})
	}
/*回到顶部*/
$('.goTop').click(function(){

	$('body,html').stop().animate({scrollTop:0});

	return false;

});


$(window).resize(function(){
		subBanner()//二级banner图片

	})

//大图切换高度问题
function ImgHeight(){
	function ImgHeight02(){
		var iWSon = document.documentElement.clientWidth;
	 	if(iWSon>=1920){
	    	$('.banner').css('height', 575+'px');
	    	$('.banner .slides > li').css('height', 575+'px');
	    	

	    }else{
	    	$('.banner').css('height',iWSon * (575/1920)+'px');
	    	$('.banner .slides > li').css('height', iWSon * (575/1920)+'px');
	    }
	}
	ImgHeight02();
	    $(window).resize(function(){
	    	
	    	ImgHeight02();
	    })
		
}
//二级页面大图高度问题
function subBanner(){
	var iWSon = document.documentElement.clientWidth;
 	if(iWSon>=1920){
    	$('.subBanner').css('height', 350+'px');

    }else{
    	$('.subBanner').css('height',iWSon * (350/1920)+'px');
    }
}
$(function(){
	var sWSon = document.documentElement.clientWidth;
	var sHeight = document.documentElement.clientHeight;
	var bodyHeight = document.body.scrollHeight;
		if(bodyHeight > sHeight+117){
			if(sWSon>1024){
				$(window).scroll(function(){
				var scrollTop = $(window).scrollTop();
				if(scrollTop > 117){
					$('.header').css('position','fixed');
					$('.header').addClass('currents')
					$('.logo_bg').slideUp(200);

					}
				else{
					$('.header').css('position','relative');
					$('.header').removeClass('currents')
					$('.logo_bg').slideDown(200);

					}
			});
			}
			
		}

	})
function menuToggle(){
	$('.menu_btn').click(function(){
		$(this).next('.system_list').slideToggle(500)
		})
	}
