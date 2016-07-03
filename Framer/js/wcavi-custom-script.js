(function($, document, undefined){
	$( 'body' ).on( 'wc_additional_variation_images_frontend_image_swap_callback wc_additional_variation_images_frontend_ajax_default_image_swap_callback wc_additional_variation_images_frontend_on_reset', function( e, response, o_gallery_images, o_main_images ) {

		// remove items
		$( '#product-img-slider' ).remove();
		$( '#product-img-nav' ).remove();

		// add items back
		$( '.product .images' ).html( '<div id="product-img-slider" class="flexslider"><ul class="slides"></ul></div><div id="product-img-nav" class="flexslider"><ul class="slides"></ul></div>' );

		switch( e.type ) {
			case 'wc_additional_variation_images_frontend_image_swap_callback':
				$( '#product-img-slider ul.slides' ).html( response.main_images );

				$( '#product-img-nav ul.slides' ).html( response.gallery_images );

				var link = [];

				$( '#product-img-slider ul.slides a' ).each( function() {
					// get main image href
					link.push( $( this ).attr( 'href' ) );

					$( this ).find( 'img' ).removeClass().addClass( 'product-slider-image' );
					$( this ).replaceWith( '<li>' + this.innerHTML + '</li>' );
				});

				$( '#product-img-slider ul.slides li' ).each( function( i ) {
					$( this ).find( 'img' ).after( '<a href="' + link[i] + '" class="woocommerce-main-image zoom lightbox" data-rel="ilightbox[product]" alt="" title=""><i class="fa-search-plus"></i></a>' );

					$( this ).find( 'img' ).attr( 'data-zoom-image', link[i] );
				});

				$( '#product-img-nav ul.slides a' ).each( function() {
					$( this ).find( 'img' ).removeClass();
					$( this ).replaceWith( '<li>' + this.innerHTML + '</li>' );
				});

				break;
			case 'wc_additional_variation_images_frontend_ajax_default_image_swap_callback':
				$( '#product-img-slider ul.slides' ).html( o_main_images );

				$( '#product-img-nav ul.slides' ).html( o_gallery_images );

				break;
			case 'wc_additional_variation_images_frontend_on_reset':
				$( '#product-img-slider ul.slides' ).html( o_main_images );

				$( '#product-img-nav ul.slides' ).html( o_gallery_images );

				break;
		}

		SF.flexSlider.init();
		SF.lightbox.init();
		SF.woocommerce.variations();
	});

})(jQuery, document);
