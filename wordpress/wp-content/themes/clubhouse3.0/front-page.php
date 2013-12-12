<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<section class="recent">
<?php 
	if ( get_query_var('paged') ) $paged = get_query_var('paged');  
	if ( get_query_var('page') ) $paged = get_query_var('page');
	 
	$query = new WP_Query( array( 'post_type' => 'portfolio', 'posts_per_page'=> 5, 'paged' => $paged ) );
	 
	if ( $query->have_posts() ) : ?>
		
	<ul class="slider">
		
	<?php while ( $query->have_posts() ) : $query->the_post(); ?>	
		<?php 
			$float = get_post_meta($post->ID, 'dbt_float', 'right'); 
		?>		
		
		<?php if ($float) { 
			echo '<li class="container recent-work float_right">';
		} else {
			echo '<li class="container recent-work">';
		} ?>
			<div class="left">
				<h2 class="title"><?php the_title(); ?></h2>
				<a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark"><button class="view small">View Project</button></a>
			</div>
			<div class="right">
				<?php 

					if (class_exists('MultiPostThumbnails')) : 
					
					echo "<span data-picture data-alt='Recent Work'>";
					
					echo "<span data-src='" . MultiPostThumbnails::get_post_thumbnail_url('portfolio', 'recent-work-image', NULL, 'small') . "'></span>";
					
				    echo "<span data-src='" . MultiPostThumbnails::get_post_thumbnail_url('portfolio', 'recent-work-image', NULL, 'medium') . "' data-media='(min-width: 48em)'></span>";
				    
				    echo "<span data-src='" . MultiPostThumbnails::get_post_thumbnail_url('portfolio', 'recent-work-image', NULL, 'large') . "' data-media='(min-width: 60em)'></span>";
				
				    echo" <noscript><span data-src='" . MultiPostThumbnails::get_post_thumbnail_url('portfolio', 'recent-work-image', NULL, 'large') . "' data-media='(min-width: 36em)'></span></noscript></span>";
					
					endif;
					
				?>
				
				

		</li>
	<?php endwhile; wp_reset_postdata(); ?>
	</ul>
<?php endif; ?>
	
</section>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer') ); ?>