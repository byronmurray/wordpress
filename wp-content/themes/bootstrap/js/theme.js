jQuery.noConflict();
(function( $ ) {
  $(function() {
    	

      $('.product-category').find('mark').hide();



      $('img').removeAttr('width').removeAttr('height');


  		//$('.latest-news').find('img').hide();



  		//$('.latest-news').find('img').hide();

  		$( '.image-wrap' ).mouseenter(function() {

    			$( this ).find('.latest-news-text').addClass('show-text').removeClass('hidden');

  		}).mouseleave(function() {

	    	$( this ).find('.latest-news-text').removeClass('show-text').addClass('hidden');

	  	});


      $('.dropdown').find('.menu-item-has-children').addClass('dropdown-submenu');


      /*add image and class before h tag*/
      $('.sidebar').find('h3').addClass('home-sub-title').prepend('<img src="http://dubzzprojects.co.nz/jpc/wp-content/uploads/2017/03/logo_icon.png">');

      /*<h2 class="home-sub-title"><img src="http://dubzzprojects.co.nz/jpc/wp-content/uploads/2017/03/logo_icon.png" alt="">Events</h2>*/

      $('.products').find('li > .button').removeClass('button').addClass('btn').addClass('btn-danger');

  });
})(jQuery);