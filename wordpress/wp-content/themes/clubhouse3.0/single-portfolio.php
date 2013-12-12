<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	<section class="container">
		<div class="intro">
			<?php the_excerpt(); ?>
		</div>
		<aside class="project-details">
			<h2>Project Details</h2>
			<ul>
				<?php 
					$url = get_post_meta($post->ID, 'dbt_url', true);
					$secondary_headline = get_post_meta($post->ID, 'dbt_secondary_headline', true);
					$client_name = get_post_meta($post->ID, 'dbt_client_name', true);
					$designers = get_post_meta($post->ID, 'dbt_designers', true);
					$photographers = get_post_meta($post->ID, 'dbt_photographers', true);
					
					echo "<li>Project Lead:";
					the_author_posts_link();
					echo "</li>";
					
					if ($designers) {
						echo "<li>Designers: $designers</li>";
					}
					
					if ($photographers) {
						echo "<li>Photographers: $photographers</li>";
					}
	    	
					if ($url) { 
						echo "<li>Client: <a href='$url' target='_blank'>$client_name</a></li>"; 
					} else {
						echo "<li>Client: $client_name</li>";
					}
				?>
				<li>Year: <?php the_date('Y'); ?></li>
				<li>&mdash;</li>
				<li><?php $terms = the_terms($post->ID, 'project_type'); echo $term->name; ?></li>
			</ul>
		</aside>
	</section>
	<section class="project-images">
		<div class="container">
			<?php the_content(); ?>
		</div>
		</
	<footer class="project-footer">
		<div class="container">
			<div class="prev">
				<?php previous_post('&laquo; &laquo; %', '', 'yes'); ?>
			</div>
			<div class="all-work">
				<i class="work"><a href="<?php print bloginfo('url'); ?>/our-work">View All Work</a></i>
			</div>	
			<div class="next">
				<?php next_post('% &raquo; &raquo; ', '', 'yes'); ?>
			</div>
		</div>
	</footer>
	
<?php endwhile; ?>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>