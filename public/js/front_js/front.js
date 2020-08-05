//Bootsshop-----------------------//
$(document).ready(function(){
	/* carousel of home page animation */
	$('#myCarousel').carousel({
	  interval: 4000
	})
	 $('#featured').carousel({
	  interval: 4000
	})
	$(function() {
		$('#gallery a').lightBox();
	});
	
	$('.subMenu > a').click(function(e)
	{
		e.preventDefault();
		var subMenu = $(this).siblings('ul');
		var li = $(this).parents('li');
		var subMenus = $('#sidebar li.subMenu ul');
		var subMenus_parents = $('#sidebar li.subMenu');
		if(li.hasClass('open'))
		{
			if(($(window).width() > 768) || ($(window).width() < 479)) {
				subMenu.slideUp();
			} else {
				subMenu.fadeOut(250);
			}
			li.removeClass('open');
		} else 
		{
			if(($(window).width() > 768) || ($(window).width() < 479)) {
				subMenus.slideUp();			
				subMenu.slideDown();
			} else {
				subMenus.fadeOut(250);			
				subMenu.fadeIn(250);
			}
			subMenus_parents.removeClass('open');		
			li.addClass('open');	
		}
	});
	var ul = $('#sidebar > ul');
	$('#sidebar > a').click(function(e)
	{
		e.preventDefault();
		var sidebar = $('#sidebar');
		if(sidebar.hasClass('open'))
		{
			sidebar.removeClass('open');
			ul.slideUp(250);
		} else 
		{
			sidebar.addClass('open');
			ul.slideDown(250);
		}
	});

});


// Myfront Js script Started with here (Craeted My self js)

$(document).ready(function(){

	// Onchange Size product GetProduct Stock in product details page
	$("#selSize").change(function(){
		var idSize = $(this).val();
		if(idSize == ""){
			return false;
		} 
		$.ajax({
			type:'get',
			url:'/get-product-stock',
			data:{idSize:idSize},
			success:function(resp){
				$("#getStock").html(resp +" Items in Stock");
			},error:function(){
				alert('Error');
			}
		});
	});

	// Onchange Size product GetProduct Price in product details page
	$("#selSize").change(function(){
		var idSize = $(this).val();
		if(idSize == ""){
			return false;
		}  
		$.ajax({
			type:'get',
			url:'/get-product-price',
			data:{idSize:idSize},
			success:function(resp){
				$("#getPrice").html("Rs. "+resp);
			},error:function(){
				alert('Error');
			}
		});
	});
	
});