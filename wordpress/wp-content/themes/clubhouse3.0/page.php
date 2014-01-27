<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts()
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<section class="padded">
	<div class="container">
		<div class="lead large">
			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
					
				<?php the_content(); ?>
	  
			<?php endwhile; ?>
		</div>
	</div>
</section>
<?php if(is_page(7)) :?>
	<section class="padded">
		<div class="container">
			<?php 
				if ( get_query_var('paged') ) $paged = get_query_var('paged');  
				 
				$query = new WP_Query( array( 'post_type' => 'team', 'paged' => $paged ) );
				 
				if ( $query->have_posts() ) : ?>
				<ul class="team-members">
					<?php while ( $query->have_posts() ) : $query->the_post(); ?>	
					
						<li class="team-member">
							
							<div class="top">
								<?php the_post_thumbnail(); ?>
							</div>
							<div class="bottom">
								<h3><?php the_title(); ?></h3>
								<?php 
									$title = get_post_meta($post->ID, 'dbt_title', true);
									$location = get_post_meta($post->ID, 'dbt_Location', true);
									$twitter = get_post_meta($post->ID, 'dbt_twitter', true);
									$linkedin = get_post_meta($post->ID, 'dbt_linkedin', true);
									$insta = get_post_meta($post->ID, 'dbt_instagram', true);
									$dribbble = get_post_meta($post->ID, 'dbt_dribbble', true);
									$email = get_post_meta($post->ID, 'dbt_email', true);
								?>									
									
								<?php
									echo '<p class="team-title">' . $title . '</p>';
									echo '<p class="team-location"><i class="icon-location"></i> ' . $location . '</p>';
									echo '<ul class="icons">';
										if($twitter){
											echo '<li><a href="' . $twitter . '" title="Twitter" target="blank"><i class="icon-twitter"></i></a></li>';
										}
										if($linkedin){
											echo '<li><a href="' . $linkedin . '" title="LinkedIn" target="blank"><i class="icon-linkedin"></i></a></li>';
										}
										if($insta){
											echo '<li><a href="' . $insta . '" title="Instagram" target="blank"><i class="icon-instagram"></i></a></li>';
										}
										if($dribbble){
											echo '<li><a href="' . $dribbble . '" title="Dribbble" target="blank"><i class="icon-dribbble"></i></a></li>';
										}
										echo '<li><a href="mailto:' . $email . '" title="Email"><i class="icon-mail"></i></a></li>';
									echo '</ul>';
								?>
								<a href="<?php echo get_bloginfo(url); ?>/team/<?php global $post; echo $post->post_name; ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark"><button class="view small">View Profile</button></a>
							</div>
						</li>
					
					<?php endwhile; wp_reset_postdata(); ?>
				</ul>
			<?php endif; ?>
		</div>
		<div class="container">
			<div class="lead">
				<h2>Our Team</h2>
				<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
						
					<?php the_excerpt(); ?>
		  
				<?php endwhile; ?>
			</div>
		</div>
	</section>
<?php endif; ?>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>