$(document).ready(function() {

/*
----------------------------------------------------------------------------------------------
									ВЕРХНИЙ СЛАЙДЕР
----------------------------------------------------------------------------------------------
*/	


	var p=1, c=$('.slide').length, i=1, s=0, w=750, t=1000, x=true;
	

	while (i<=c) {
		$(".slide_"+i).css({"left":s+"px"});
		s=s+w;
		i++;
	}
	$(".nav_slider_next").click(function() {
	if (x){
	if (p<c){
		p++;
		i=0;
		
		while (i<=c) {
		var e = $(".slide_"+i).css('left');
		e =  parseInt(e) - w
		$(".slide_"+i).animate({left:e+"px"}, t);
		i++;	
		}

	}
	x = false;
	setTimeout(function(){
				x=true;
			},1000)
	}
	})
	$(".nav_slider_prev").click(function() {	
	if (x) {
	if (p>1) {	
		p--;
		i=0;
		while (i<=c) {
		var e = $(".slide_"+i).css('left');
		e =  parseInt(e) + w
		$(".slide_"+i).animate({left:e+"px"}, t);
		i++;
		}
	}	
	x = false;
	setTimeout(function(){
				x=true;
			},1000)
	}
	})

/*
----------------------------------------------------------------------------------------------
									СЛАЙДЕР КАТЕГОРИЙ
----------------------------------------------------------------------------------------------
*/	
	
var cp=6, cc=$('.big_cats_block').length, ci=1, cs=0, cw=193, ct=1000, cx=true;

while (ci<=cc) {
		$(".big_cats_block_"+ci).css({"left":cs+"px"});
		cs=cs+cw;
		ci++;
	}

$(".nav_big_cats_next").click(function() {
	if (x) {
	if (cp<cc){
		cp++;
		ci=0;
		
		while (ci<=cc) {
		var ce = $(".big_cats_block_"+ci).css('left');
		ce =  parseInt(ce) - cw
		$(".big_cats_block_"+ci).animate({left:ce+"px"}, ct);
		ci++;	
		}

	}
	x = false;
	setTimeout(function(){
				x=true;
			},1000)
	}
	

});

while (ci<=cc) {
		$(".big_cats_block_"+ci).css({"left":cs+"px"});
		cs=cs+cw;
		ci++;
	}

$(".nav_big_cats_prev").click(function() {
	if (x) {
	if (cp>6){
		cp--;
		ci=0;
		
		while (ci<=cc) {
		var ce = $(".big_cats_block_"+ci).css('left');
		ce =  parseInt(ce) + cw
		$(".big_cats_block_"+ci).animate({left:ce+"px"}, ct);
		ci++;	
		}

	}
	x = false;
	setTimeout(function(){
				x=true;
			},1000)
	}

});

/*
----------------------------------------------------------------------------------------------
									МОДАЛЬНОЕ ОКНО
----------------------------------------------------------------------------------------------
*/

$('#consul_link').click(function() {
	$('.modal').css({'display':'block'});
	$('.modal_window').animate({'top':'300px'},1000);


})
$('.close_modal').click(function() { 
	$('.modal').css({'display':'none'});

})

/*
----------------------------------------------------------------------------------------------
									AJAX для отдельных категорий
----------------------------------------------------------------------------------------------
*/

	$('.products_block_nav_next').click(function(){
	var metka = $(this).attr('metka');
	var offset = $(this).attr('offset');


	var data = {
		action: 'load_posts',
		metka_val: metka,
		offset_val: offset,
	};

	jQuery.post(ajaxurl, data, function(response){
		var str = $('.products_block_list[metka="'+metka+'"]').html();
		$('.products_block_list[metka="'+metka+'"]').html(response);
		if (str.indexOf('noposts') == -1) {
		offset = parseInt(offset)+4; 
		$('.products_block_nav_next[metka="'+metka+'"]').attr('offset',offset);
		$('.products_block_nav_prev[metka="'+metka+'"]').attr('offset',offset-8);
		}
	})
})

	$('.products_block_nav_prev').click(function(){
	var metka = $(this).attr('metka');
	var offset = $(this).attr('offset');

	if (offset>=0) {
	var data = {
		action: 'load_posts',
		metka_val: metka,
		offset_val: offset,
	};

	jQuery.post(ajaxurl, data, function(response){
		var str = $('.products_block_list[metka="'+metka+'"]').html();
		$('.products_block_list[metka="'+metka+'"]').html(response);
		
		offset = parseInt(offset)-4; 
		$('.products_block_nav_next[metka="'+metka+'"]').attr('offset',offset+8);
		$('.products_block_nav_prev[metka="'+metka+'"]').attr('offset',offset);
		
	})
	}
})

});