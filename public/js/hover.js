$(document).ready(function(){
  // $('#jssor_1').ready(function(){
  //   var w = $('.slide').height(); 
  //   $('.sidebar-top').css('height', w);
  //   if($('body').width() > 1349){
  //     w = w + 12;
  //   }
  //   $('.sidebar .new').css('height', w);
  // });
  $('.wapper').css('width', $('body').width());
	$('.menu ul.navbar-nav > li a').each(function(){	
		$(this).on({
			mouseover: function(){
        if(!$(this).parent().parent().hasClass('child-menu')){
  				$(this).css({'border-bottom': '4px solid #'+ $(this).attr('id'), 'color': '#'+$(this).attr('id')});
  				// $('.top').css('background-color','#'+$(this).attr('id'));
  				$('.menu .navbar li').each(function(){	
  					if($(this).hasClass('active') && !$(this).hasClass('dropdown')){
  						$(this).find('a').css({'border-bottom': 'transparent', 'color': '#333333'});
  					} 	
  				});
        }
      },
      mouseout: function(){
        if(!$(this).parent().parent().hasClass('child-menu')){
        	$(this).css({'border-bottom': 'transparent', 'color': '#333333'});
        	$('.menu .navbar li').each(function(){	
      			if($(this).hasClass('active') && !$(this).hasClass('dropdown')){
      				$(this).find('a').css({'border-bottom': '4px solid #'+ $(this).find('a').attr('id'), 'color': '#'+$(this).find('a').attr('id')});
      				// $('.top').css('background-color','#'+$(this).find('a').attr('id'));
      			} 	
  			  });
        }
      }
		});
	});
	$('.w-content').click(function(){
		$('.top .navbar-form').hide('slow', function(){
			$('.icon-search').show();
		});
	});

  $('.detail-article-img').each(function(){
    var wimg = $(this).find('img').width();
    $(this).find('img').css({'padding-bottom': '5px'});
    $(this).css({'width': wimg, 'background-color': '#eee', 'margin': '20px auto', 'text-align': 'center'});
  });
	$('.menu .navbar-nav li').each(function(){	
		if($(this).hasClass('active')){
			$(this).find('>a').css({'border-bottom': '4px solid #'+ $(this).find('a').attr('id'), 'color': '#'+$(this).find('a').attr('id')});
			$('.top').css('background-color','#'+$(this).find('a').attr('id'));
		} 	
	});
	$('.icon-search').click(function(){
		$(this).hide();
		$('.top .navbar-form').show('slow');
	});
});
$(document).ready(function() {
  var heinew = $('.sidebar .sidebar-top').height();
  $('.slide #owl-demo img').css('height', heinew);
  $("#owl-demo").owlCarousel({
      navigation : true, // Show next and prev buttons
      slideSpeed : 300,
      loop: true,
      paginationSpeed : 400,
      singleItem:true,
      nav:true,
      dots:true,
      // "singleItem:true" is a shortcut for:
       items : 1
      // itemsDesktop : false,
      // itemsDesktopSmall : false,
      // itemsTablet: false,
      // itemsMobile : false
  });
 
});