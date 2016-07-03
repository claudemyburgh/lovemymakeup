(function($){


	$(function(){

		wp.customize( 'lovemymakeup_background_color', function( value ){
			value.bind( function(to){
				$('body').css('background', to);

			});
		});

		wp.customize( 'lovemymakeup_wrapper_width', function( value ){
			value.bind( function(to){
				$('.wrapper').css('width', to + 'px');

			});
		});


		wp.customize( 'lovemymakeup_line_1_text', function( value ){
			value.bind( function(to){
				if('' === to){
					$('.the_dot__heading').text('SUMMER  COLLECTION');
				}else{
					$('.the_dot__heading').text(to);
				}

			});
		});
		wp.customize( 'lovemymakeup_line_2_text', function( value ){
			value.bind( function(to){
				if('' === to){
					$('.the_dot_text_1').text('Now in stores');
				}else{
					$('.the_dot_text_1').text(to);
				}

			});
		});
		wp.customize( 'lovemymakeup_line_3_text', function( value ){
			value.bind( function(to){
				if('' === to){
					$('.the_dot_text_2').text('To get the look​​​ come');
				}else{
					$('.the_dot_text_2').text(to);
				}

			});
		});

		wp.customize( 'lovemymakeup_hide_the_dot', function( value ){
			value.bind( function(to){
				if(to === false){
					$('.the_dot').hide();
				}else{
					$('.the_dot').show();
				}
			});
		});

		wp.customize( 'lovemymakeup_banner_image', function( value ){
			value.bind( function(to){
				$('.hero').css({
					'background-image': 'url('+ to +')',
					'background-size': 'cover',
					'background-position': 'left center',
					'background-repeat': 'no-repeat'
				});

			});
		});


	});

})(jQuery);
