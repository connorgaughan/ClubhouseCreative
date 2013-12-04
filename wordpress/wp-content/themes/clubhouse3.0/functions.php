<?php

	// Required external files
	require_once( 'external/starkers-utilities.php' );


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
				'post_type' => 'portfolio'
			)
		);
		new MultiPostThumbnails(
			array(
				'label' => 'Thumbnail Image',
				'id' => 'thumbnail-image',
				'post_type' => 'portfolio'
			)
		);
	}
	
	
	
	// Scripts
	function starkers_script_enqueuer() {
		wp_register_script( 'site', get_template_directory_uri().'/js/site.js', array( 'jquery' ) );
		wp_enqueue_script( 'site' );

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