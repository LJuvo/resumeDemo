$(function(){
		   //alert(3);
	$('#widgets_nav').load('widgets_nav');	
	
	 
		$('body').append('<div class="scrollto"></div>').find('.scrollto').css({'opacity':0,'display':'block'});
		$(window).bind('scroll',function(){
			if($(window).scrollTop()> $(window).height()){
				//if(!$('.scrollto').is(':animated')){
					$('.scrollto').stop().animate({'opacity':1, 'bottom':20});	
				//}
			}		
			else{
				//if(!$('.scrollto').is(':animated')){
					$('.scrollto').stop().animate({'opacity':0, 'bottom':300});	
				//}	
			}
		})
		
		$('.scrollto').bind('click',function(){
			$('html,body').animate({'scrollTop':0});									 
		})
		
		// make code pretty
    	window.prettyPrint && prettyPrint();
    	
    	
    	$('.docs-taber-head li').click(function(){
    		$('.docs-taber-head li').removeClass('selected').eq($(this).index()).addClass('selected');
    		$('.docs-taber-body').hide().eq($(this).index()).show();
    		return false;
    	})
		
})