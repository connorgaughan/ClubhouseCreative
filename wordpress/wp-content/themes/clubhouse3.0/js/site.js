
	jQuery(document).ready(function($) {

		jQuery('.menu-click').on('click', function(){
			
			jQuery('.main-menu').fadeIn('slow');
			jQuery('.main-menu').on('click', function(){
				jQuery('.main-menu').fadeOut('slow');
			});
			
		});

	});

