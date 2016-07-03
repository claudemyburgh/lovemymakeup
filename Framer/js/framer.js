if( typeof Object.create !== 'function' ){
	Object.create = function(){
		function F(){}
		F.prototype = obj;
		return new F();
	};
}


(function($, window, document, Modernizr, undefined){
	'use strict';


	window.requestAnimFrame = function(){
	    return (
	      window.requestAnimationFrame       ||
	      window.webkitRequestAnimationFrame ||
	      window.mozRequestAnimationFrame    ||
	      window.oRequestAnimationFrame      ||
	      window.msRequestAnimationFrame     ||
	      function(/* function */ callback){
	        window.setTimeout(callback, 1000 / 60);
	      }
	    );
	  }();

	window.cancelAnimFrame = function(){
	    return (
	      window.cancelAnimationFrame       ||
	      window.webkitCancelAnimationFrame ||
	      window.mozCancelAnimationFrame    ||
	      window.oCancelAnimationFrame      ||
	      window.msCancelAnimationFrame     ||
	      function(id){
	        window.clearTimeout(id);
	      }
	    );
	  }();



	$.fn.smoothMouseScroll = function(options){
		var opt;
		opt = $.extend({
			'speed':    200,
			'distance': 100,
			'easing':   'swing'
		}, options);
				if (window.addEventListener) window.addEventListener('DOMMouseScroll', wheel, false);
				window.onmousewheel = document.onmousewheel = wheel;
				function wheel(event) {
						var delta = 0;
						if (event.wheelDelta) delta = event.wheelDelta / 120;
						else if (event.detail) delta = -event.detail / 3;
						handle(delta);
				}
				function handle(delta) {
						var time = opt.speed; // delay time
						var distance = opt.distance; // delta point
						// Dom where it will apply
						$('html, body').stop().animate({
								scrollTop: $(window).scrollTop() - (distance * delta)
						}, time, opt.easing );
				}
		return $(this);
	};

	$.fn.accordion = function(options){
		var opt,
				container = $(this),
				trigger = container.find('.accordion-trigger');

		opt = $.extend({
			'open': true,
			'speed': 'normal',
			'easing': 'swing'
		},options);

		trigger.next().hide();
		if(opt.open === true ){
			trigger.eq(0)
				.addClass('accordion-trigger-open')
				.next()
				.show();
		}
		trigger.on('click', function(e){
			e.preventDefault();
			var self = $(this);
			if(!self.hasClass('accordion-trigger-open')){
				trigger.removeClass('accordion-trigger-open')
					.next().slideUp(opt.speed, opt.easing);
				self
					.addClass('accordion-trigger-open')
					.next().slideDown(opt.speed, opt.easing);
			}else{
				self
					.removeClass('accordion-trigger-open')
					.next()
					.slideUp(opt.speed, opt.easing);
			}
		});
		return container;
	};




	$.fn.equelHeight = function(options){
		var opt,
				tallestHeight,
				self = $(this),
				$col,
				wWidth,
				elHeight;

		opt = $.extend({
			'equel': '.equel',
			'maxWidth': 767
		}, options);
		$col = self.find(opt.equel);
		$col.css({
			'transition': 'all 0.5s ease'
		});

		var fun = function(){
			tallestHeight = 0;
			wWidth = $(window).width();
			if(wWidth >= opt.maxWidth){
				$col.each(function(i,el){
					elHeight = $(el).outerHeight();
					if(elHeight > tallestHeight){
						tallestHeight = elHeight;
					}
				});
				$col.css({
					'min-height': tallestHeight + 'px'
				});
			}else{
				$col.css({
					'min-height': ''
				});
				}
		};

		$(window).load(fun);
		$(window).resize(fun);
		return $col;
	};

	// Parralax
	$.fn.parallax = function(options){
		var opt,
				self = $(this),
				i,	par, top,	offset,	scroll,	hi,	dHeight, wWidth,
		transform, offsets,	render,	winSize, windowWidth,	fullScreen;
		opt = $.extend({
			'parallaxOuter':  '.parallax-outer',
			'parallaxInner': '.parallax-inner'
		}, options);


		var parallax = self,
		parallaxBg = parallax.find(opt.parallaxInner),
		win = $(window),
		FrameHeight = parallaxBg.eq(0).closest(opt.parallaxOuter).height(),
		DiffInHeight = parallaxBg.eq(0).height() - (FrameHeight + 20),
		FrameCount = parallaxBg.length;

		offsets = parallaxBg.get().map(function(div){
			return $(div).offset();
		});


		render = function(){
			top = win.scrollTop();
			wWidth = $(window).width();
			// Parralax effect
			for( i = 0; i < FrameCount; i++ ){
				par = parallaxBg[i];
				offset = top - offsets[i].top;
				if(wWidth > 600){
					scroll = ~~(offset / FrameHeight * DiffInHeight);
				}
				transform = 'translate3d(0px,'+ scroll  +'px, 0px)';
				par.style.webkitTransform = transform;
				par.style.MozTransform = transform;
				par.style.msTransform = transform;
				par.style.OTransform = transform;
				par.style.transform = transform;
			}// end for loop
		};

		$(window).on('scroll', function(){
			requestAnimFrame(render);
		});

		$(window).resize( function(){
			requestAnimFrame(render);
		});


		return self;
	}; //end of plugin

	var framer = {
		settings: {
			toTop: {
				'speed': 1000
			}
		},
		init: function(){

			this.keyframeLooper();
			this.mobileMenu();
			this.toTop();




		},
		mobileMenu: function(){
      var $self   = $(this),
          navwrap = $('[data-nav="toggle"]');
			$('[data-nav="button"]').on('click', function(e){
				e.preventDefault();
				$(this).parent('.navbar')
					.find(navwrap)
					.slideToggle(200, function(){
						$(this).toggleClass('toggleMenu').css({'display': ''});
					});

			});
			return $self;
		},

		toTop: function(){
			var set = this.settings;
			var scrollToTop = $('.sosial_totop');
			scrollToTop.on('click', function(evt){
				evt.preventDefault();
				$('html, body').stop(false,false).animate({scrollTop: '0px'}, set.toTop.speed);
			});

		},
		hideToTop: function(){
			var scrollToTop = $('.scrollToTop');
			var sp = $(window).scrollTop();
			if(sp > 300){
				scrollToTop.css({
					'opacity': 1,
					'transform': 'translateY(0px)'
				});
			}else{
				scrollToTop.css({
					'opacity': 0,
					'transform': 'translateY(100px)'
				});
			}
		},
		keyframeLooper: function(){
			//this.hideToTop();
			requestAnimFrame(this.keyframeLooper.bind(this));
		}

	};

	$.fn.Framer = function(){
		this.each(function(){
			var Obj = Object.create(framer);
			Obj.init();
		});
		return this;
	};


})(jQuery, window, document, Modernizr);
