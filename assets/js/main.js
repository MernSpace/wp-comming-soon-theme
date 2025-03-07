;(function ($) {

	'use strict';

	var isMobile = {
		Android: function() {
			return navigator.userAgent.match(/Android/i);
		},
			BlackBerry: function() {
			return navigator.userAgent.match(/BlackBerry/i);
		},
			iOS: function() {
			return navigator.userAgent.match(/iPhone|iPad|iPod/i);
		},
			Opera: function() {
			return navigator.userAgent.match(/Opera Mini/i);
		},
			Windows: function() {
			return navigator.userAgent.match(/IEMobile/i);
		},
			any: function() {
			return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
		}
	};


	var contentWayPoint = function() {
		var i = 0;

		// Destroy existing waypoints
		$('.animate-box').each(function() {
			var waypoint = $(this).data('waypoint');
			if (waypoint) {
				waypoint.destroy();
			}
		});

		// Create new waypoints
		$('.animate-box').waypoint(function(direction) {
			if (direction === 'down' && !$(this.element).hasClass('animated-fast')) {
				i++;
				$(this.element).addClass('item-animate');

				// Use a timeout to stagger animations
				setTimeout(() => {
					$('body .animate-box.item-animate').each(function(k) {
						var el = $(this);
						setTimeout(() => {
							var effect = el.data('animate-effect');
							// Apply the appropriate animation effect
							switch (effect) {
								case 'fadeIn':
									el.addClass('fadeIn animated-fast');
									break;
								case 'fadeInLeft':
									el.addClass('fadeInLeft animated-fast');
									break;
								case 'fadeInRight':
									el.addClass('fadeInRight animated-fast');
									break;
								default:
									el.addClass('fadeInUp animated-fast');
							}

							el.removeClass('item-animate');
						}, k * 100);
					});
				}, 100);
			}
		}, {
			offset: '85%'
		});
	};

// Initialize the Waypoint function
	$(document).ready(function() {
		contentWayPoint();
	});




	// Loading page
	var loaderPage = function() {
		$(".fh5co-loader").fadeOut("slow");
	};


	var screenHeight = function() {

		if ( $(window).width() > 768 && !isMobile.any() ) {
			$('.js-dt, .js-dtc').css('min-height', $(window).height());
		} else {
			$('.js-dt, .js-dtc').css('min-height', '');
		}
		$(window).resize(function(){
			if ( $(window).width() > 768 && !isMobile.any() ) {
				$('.js-dt, .js-dtc').css('min-height', $(window).height());
			} else {
				$('.js-dt, .js-dtc').css('min-height', '');
			}
		});

	};

	var countDown = function() {

		simplyCountdown('.simply-countdown-one', {
			year: "2025",
			month: "05",
			day: "30"
		});

	};



	$(function(){
		contentWayPoint();
		loaderPage();
		screenHeight();
		countDown();
	});



}(jQuery));