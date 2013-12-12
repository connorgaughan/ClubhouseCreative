<?php

	// remove junk from head
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wp_generator');
	remove_action('wp_head', 'feed_links', 2);
	remove_action('wp_head', 'index_rel_link');
	remove_action('wp_head', 'wlwmanifest_link');
	remove_action('wp_head', 'feed_links_extra', 3);
	remove_action('wp_head', 'start_post_rel_link', 10, 0);
	remove_action('wp_head', 'parent_post_rel_link', 10, 0);
	remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);

	// add google analytics to footer
	function add_google_analytics() {
		echo '<script src="http://www.google-analytics.com/ga.js" type="text/javascript"></script>';
		echo '<script type="text/javascript">';
		echo 'var pageTracker = _gat._getTracker("UA-XXXXX-X");';
		echo 'pageTracker._trackPageview();';
		echo '</script>';
	}
	add_action('wp_footer', 'add_google_analytics');


	// Required external files
	require_once( 'external/starkers-utilities.php' );


	// Thumbnails
	add_theme_support('post-thumbnails');
	add_image_size( 'full@2', 1600, 9999 );
	add_image_size( 'large@2', 1400, 9999 );
	add_image_size( 'medium@2', 1000, 9999 );
	add_image_size( 'small@2', 800, 9999 );
	add_image_size( 'thumb@2', 600, 9999 );
	
	add_image_size( 'full', 1200, 9999 );
	add_image_size( 'large', 1000, 9999 );
	add_image_size( 'medium', 800, 9999 );
	add_image_size( 'small', 600, 9999 );
	add_image_size( 'thumb', 450, 9999 );


	// Theme specific settings
	add_theme_support('post-thumbnails');
	
	
	// Register Nav Menu
	register_nav_menus(array('primary' => 'Primary Navigation'));

	
	// Actions and Filters
	add_action( 'wp_enqueue_scripts', 'starkers_script_enqueuer' );
	add_filter( 'body_class', array( 'Starkers_Utilities', 'add_slug_to_body_class' ) );


	// Custom Post Types
	require_once( 'custom-functions/meta_secondary-headline.php' );
	require_once( 'custom-functions/post-type_projects.php' );
	
	
	// Multiple Post Thumbnails
	if (class_exists('MultiPostThumbnails')) {
		new MultiPostThumbnails(
			array(
				'label' => 'Hero Image',
				'id' => 'hero-image',
			)
		);
		new MultiPostThumbnails(
			array(
				'label' => 'Thumbnail Image',
				'id' => 'thumbnail-image',
				'post_type' => 'portfolio'
			)
		);
		new MultiPostThumbnails(
			array(
				'label' => 'Featured Work Image',
				'id' => 'featured-work-image',
				'post_type' => 'portfolio'
			)
		);
		new MultiPostThumbnails(
			array(
				'label' => 'Recent Work Image',
				'id' => 'recent-work-image',
				'post_type' => 'portfolio'
			)
		);
	}
	
	
	// Scripts
	function starkers_script_enqueuer() {
		wp_register_script( 'site', get_template_directory_uri().'/js/site.js', array( 'jquery' ) );
		wp_enqueue_script( 'site' );
		
		wp_register_script( 'picturefill', get_template_directory_uri().'/js/picturefill.js', array( 'jquery' ) );
		wp_enqueue_script( 'picturefill' );

		wp_register_style( 'screen', get_stylesheet_directory_uri().'/css/style.css', '', '', 'screen' );
        wp_enqueue_style( 'screen' );
	}	


	// Comments
	function starkers_comment( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment; 
		?>
		<?php if ( $comment->comment_approved == '1' ): ?>	
		<li>
			<article id="comment-<?php comment_ID() ?>">
				<?php echo get_avatar( $comment ); ?>
				<h4><?php comment_author_link() ?></h4>
				<time><a href="#comment-<?php comment_ID() ?>" pubdate><?php comment_date() ?> at <?php comment_time() ?></a></time>
				<?php comment_text() ?>
			</article>
		<?php endif;
	}