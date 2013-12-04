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
					$project_lead = get_post_meta($post->ID, 'dbt_project_lead', true);
					$designers = get_post_meta($post->ID, 'dbt_designers', true);
					$photographers = get_post_meta($post->ID, 'dbt_photographers', true);
					
					if ($project_lead) {
						echo "<li>Project Lead: $project_lead</li>";
					}
					
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
	<?php the_content(); ?>
	<h2><?php the_title(); ?></h2>
	
<?php endwhile; ?>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>