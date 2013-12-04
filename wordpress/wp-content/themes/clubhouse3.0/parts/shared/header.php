<?php wp_nav_menu( array( 'container' => 'nav', 'container_class' => 'main-menu', 'theme_location' => 'primary' ) ); ?>
<header>
	<div class="fixed">
		<div class="container">
			<a class="logo" href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a>
			<i class="fa fa-bars menu-click"></i>
		</div>
	</div>
</header>

<div class="hero">
	<h1><?php the_title(); ?></h1>
	<?php if( is_front_page() ) { bloginfo( 'description' ); } ?>	
</div>
