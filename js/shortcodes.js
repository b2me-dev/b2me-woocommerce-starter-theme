(function() {

	var shortcode = {
		initialize: function() {
			this.homepageSlideshow();
			this.partners();
			this.customSelect();
		},
		homepageSlideshow: function() {
			var slider = jQuery('.b2-hp-banner-slide'),
				autoplay = jQuery('.b2-hp-banner-slide').data('autoplay'),
				autoplay_settings = false,
				speed = jQuery('.b2-hp-banner-slide').data('speed'),
				speed_settings = speed + '000',
				fade = jQuery('.b2-hp-banner-slide').data('fade'),
				fade_settings = false,
				dots = jQuery('.b2-hp-banner-slide').data('dots'),
				dots_settings = false,
				arrows = jQuery('.b2-hp-banner-slide').data('arrows'),
				arrows_settings = false;

			// Check if arrows is added
			if (arrows == 'yes') {
				arrows_settings = true;
			} else {
				jQuery('.b2-hp-banner-arrows').addClass('b2-hidden');
			}

			// Check if dots is added
			if (dots == 'yes') dots_settings = true;

			// Check if fade is added
			if (fade == 'yes') fade_settings = true;

			// Check if autoplay is added
			if (autoplay == 'yes') autoplay_settings = true;
			
			// Create slider
            slider.not('.slick-initialized').slick({
                infinite: true,
                slidesToShow: 1,
                slidesToScroll: 1,
				fade: fade_settings,
                arrows: arrows_settings,
                prevArrow: '.b2-hp-banner-arrows .prev',
                nextArrow: '.b2-hp-banner-arrows .next',
				autoplay: autoplay_settings,
				autoplaySpeed: speed_settings,
				dots: dots_settings,
				appendDots: '.b2-hp-banner-dots',
				pauseOnHover: false,
            });
		},
		partners: function() {
			var slider = jQuery('.b2-partners-slide'),
				autoplay = jQuery('.b2-partners-slide').data('autoplay'),
				autoplay_settings = false,
				speed = jQuery('.b2-partners-slide').data('speed'),
				speed_settings = speed + '000',
				slides_to_show = jQuery('.b2-partners-slide').data('slides-to-show');

			// Check if autoplay is added
			if (autoplay == 'yes') autoplay_settings = true;
			
			// Create slider
            slider.not('.slick-initialized').slick({
                infinite: true,
                slidesToShow: slides_to_show,
                slidesToScroll: 1,
				fade: false,
                arrows: false,
				autoplay: autoplay_settings,
				autoplaySpeed: speed_settings,
				pauseOnHover: false,
				responsive: [
                    {
                        breakpoint: 992,
                        settings: {
                            slidesToShow: 2,
                        }
                    },
                ]
            });
		},
		customSelect: function() {
			var custom_select = jQuery('.b2-custom-select-container p');

			jQuery(document).on('click', function(event) {
				if (!custom_select.is(event.target) && custom_select.has(event.target).length === 0) {
					custom_select.parent().find('i').removeClass('fa-angle-up').addClass('fa-angle-down');
					custom_select.parent().find('ul').hide();
				}
			});
			
			custom_select.click(function() {
				custom_select.parent().find('i').removeClass('fa-angle-up').addClass('fa-angle-down');
				custom_select.parent().find('ul').hide();

				jQuery(this).parent().find('i').addClass('fa-angle-up').removeClass('fa-angle-down');
				jQuery(this).parent().find('ul').show();
			});

			jQuery(document).on('click', '.b2-custom-select-container ul li', function() {
				var value = jQuery(this).data('value');
				jQuery(this).parent().parent().parent().find('select').val(value).change();
				jQuery(this).parent().parent().find('p').html(value);
				jQuery(this).parent().parent().find('ul').hide();
				jQuery(this).parent().parent().find('i').removeClass('fa-angle-up').addClass('fa-angle-down');
			});
		}
	}

	jQuery(document).ready(function() {
		shortcode.initialize();
	});

}());