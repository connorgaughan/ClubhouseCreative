<?php wp_nav_menu( array( 'container' => 'nav', 'container_class' => 'main-menu', 'theme_location' => 'primary' ) ); ?>
<header>
	<div class="fixed">
		<div class="container">
			<?php 
				$logowhite = get_post_meta($post->ID, 'dbt_logo', 'white'); 
			?>

			<a class="logo" href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a>
			<?php if($logowhite) {
				echo "<i class='fa fa-bars menu-click white'></i>";
			} else {
				echo "<i class='fa fa-bars menu-click'></i>";			
			}?>
		</div>
	</div>
</header>
<?php if ( is_page( 'our-work' ) ) : ?>

	<div class="featured-hero">
		<?php 
			if ( get_query_var('paged') ) $paged = get_query_var('paged');  
			if ( get_query_var('page') ) $paged = get_query_var('page');
	 
			$query = new WP_Query( array( 'post_type' => 'portfolio', 'featured' => 'main', 'paged' => $paged ) );
	 
			if ( $query->have_posts() ) : ?>
			<?php while ( $query->have_posts() ) : $query->the_post(); ?>	
			<?php if (has_post_thumbnail()) {
				$imgID = get_post_thumbnail_id($post->ID);
						
				$full = MultiPostThumbnails::get_post_thumbnail_url('portfolio', 'featured-work-image', NULL, 'full');
				$large = MultiPostThumbnails::get_post_thumbnail_url('portfolio', 'featured-work-image', NULL, 'large' );
				$medium = MultiPostThumbnails::get_post_thumbnail_url('portfolio', 'featured-work-image', NULL, 'medium' );
				$small = MultiPostThumbnails::get_post_thumbnail_url('portfolio', 'featured-work-image', NULL, 'small' );
				$thumbnail = MultiPostThumbnails::get_post_thumbnail_url('portfolio', 'featured-work-image', NULL, 'thumb' );
			?>
			<style type="text/css">
				.featured-hero { background-image: url(<?php echo $thumbnail ?>); padding-top:3em; padding-bottom:2em; background-size:cover; background-repeat:none; background-position:top center; }
				@media screen and (min-width: 36em){ .featured-hero{ background-image: url(<?php echo $small ?>); padding-top:6em; padding-bottom:6em; } }
				@media screen and (min-width: 48em){ .featured-hero{ background-image: url(<?php echo $medium ?>); padding-top:9em; padding-bottom:9em; } }
				@media screen and (min-width: 60em){ .featured-hero{ background-image: url(<?php echo $large ?>); padding-top:12em; padding-bottom:12em; } }
				@media screen and (min-width: 80em){ .featured-hero{ background-image: url(<?php echo $full ?>); padding-top:15em; padding-bottom:15em; } }
			</style>
			<?php } ?>
				<h2 class="title"><?php the_title(); ?></h2>
				<a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark"><button class="view">View Project</button></a>
			<?php endwhile; wp_reset_postdata(); ?>
		<?php else : ?>
			<div class="hero">
				<h1><?php the_title(); ?></h1>
				<?php if( is_front_page() ) { bloginfo( 'description' ); } ?>	
			</div>
		<?php endif; ?>
	</div>
<?php else : ?>
	<div class="hero">
		<h1><?php the_title(); ?></h1>
		<?php if( is_front_page() ) { bloginfo( 'description' ); } ?>	
	</div>
<?php endif; ?>
