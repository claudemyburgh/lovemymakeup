
(function(){

	$(document).Framer();

	var owl = $('#owl-carousel-div');

  owl.owlCarousel({

      autoPlay: 3000, //Set AutoPlay to 3 seconds
			lazyLoad : true,
      items : 4,
      itemsDesktop : [1199,3],
      itemsDesktopSmall : [979,3],
			pagination: true,
			paginationNumbers: false

  });


	$.fn.myMenu = function(options){

		var self = $(this),opt, snappy, openMenu, overlayPage, closeOverlay, overlay, closeBar;

		opt = $.extend({
			'speed': 500,
			'isOpen': false,
			'overlay': 'overlay',
			'menu': '.woobar',
			'callback' : 'function(){}'

		},options);


		/* Add an overlay layer */

		overlayPage = function(){
			overlay = $('<div/>', {
				class: opt.overlay
			}).appendTo($('body')).on('click', openMenu);

			$('body').addClass('has-overlay');
		};

		/* remove overlay */

		closeOverlay = function(){
			overlay.remove();
			$('body').removeClass('has-overlay');
		};

		$('.closeWoobar').click(function(e){
			e.preventDefault();
			openMenu();
		});

		openMenu = function(){

			var self = $(this);

			if(opt.isOpen){
				$(opt.menu).css({
					'transform': 'translateX(0%)'
				});

				closeOverlay();
				opt.isOpen = false;
			}else{
				$(opt.menu).css({
					'transform': 'translateX(-100%)'
				});

				overlayPage();
				opt.isOpen = true;
			}

		};

		this.on('click', function(e){
			e.preventDefault();
			openMenu();
		});

		return self;

	}; /* end of my  */

	$('.woobutton').myMenu({
	});


/* Form select  */


$('#search-select').on('change', valueCheacher );

$('#search-select').on('focus', function(){
	if(this.value==this.defaultValue){
		this.value='';
	}
} );
// $('#search-select').on('blur', function(){
//
// 	if(this.value === ''){
// 		this.value=this.defaultValue;
// 	}
// });

function valueCheacher(){
		if(this.value !== "default"){
			$('#searchsubmit').attr('disabled', false);
		}else{
			$('#searchsubmit').attr('disabled', true);

		}

}

function menuDropDown(){
	var drop = $('.have-dropdown');

}




})();


/**************************
* Shader Box
**************************/

(function($){
	'use strict';



	var shadeBox = $('.Shader-select-box'),
			link = shadeBox.find('a'),
			out = $('#shader-output');


			link.click(function(e){
				e.preventDefault();
				var self = $(this);
				var before = self.data('image-before');
				var after = self.data('image-after');
				var spray = self.data('image-spray');
				var title = self.data('title');
				var text = self.data('text-box');
				var theRef = self.data('linkto');
				out.find('.the_title').text(title);
				out.find('.content-text').text(text);
				out.find('.spray').attr('src', spray);
				out.find('.view-after img').attr('src', after);
				out.find('.view-before img').attr('src', before);
				out.find('.the_link').attr('href', theRef);
				link.removeClass('sizeUp');
				self.addClass('sizeUp');


			});



})(jQuery);
