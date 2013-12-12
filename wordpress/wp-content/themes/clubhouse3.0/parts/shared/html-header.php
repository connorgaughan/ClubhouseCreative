<!DOCTYPE HTML>
<!--[if IEMobile 7 ]><html class="no-js iem7" manifest="default.appcache?v=1"><![endif]--> 
<!--[if lt IE 7 ]><html class="no-js ie6" lang="en"><![endif]--> 
<!--[if IE 7 ]><html class="no-js ie7" lang="en"><![endif]--> 
<!--[if IE 8 ]><html class="no-js ie8" lang="en"><![endif]--> 
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!--><html class="no-js" lang="en"><!--<![endif]-->
	<head>
		<title><?php bloginfo( 'name' ); ?><?php wp_title( '|' ); ?></title>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
	  	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<script type="text/javascript" src="//use.typekit.net/teh4ghd.js"></script>
		<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
		<?php wp_head(); ?>
		<?php
			if (has_post_thumbnail()) {
			
				$imgID = get_post_thumbnail_id($post->ID);
				
				$full = wp_get_attachment_image_src($imgID, 'full' );
				$fullURL = $full['0'];
				
				$large = wp_get_attachment_image_src($imgID, 'large' );
				$largeURL = $large['0'];
				
				$medium = wp_get_attachment_image_src($imgID, 'medium' );
				$mediumURL = $medium['0'];
				
				$small = wp_get_attachment_image_src($imgID, 'small' );
				$smallURL = $small['0'];
				
				$thumbnail = wp_get_attachment_image_src($imgID, 'thumb' );
				$thumbnailURL = $thumbnail[0];
				
				$full2x = wp_get_attachment_image_src($imgID, 'full@2' );
				$full2xURL = $full2x['0'];
				
				$large2x = wp_get_attachment_image_src($imgID, 'large@2' );
				$large2xURL = $large2x['0'];
				
				$medium2x = wp_get_attachment_image_src($imgID, 'medium@2' );
				$medium2xURL = $medium2x['0'];
				
				$small2x = wp_get_attachment_image_src($imgID, 'small@2' );
				$small2xURL = $small2x['0'];
				
				$thumbnail2x = wp_get_attachment_image_src($imgID, 'thumb@2' );
				$thumbnail2xURL = $thumbnail2x[0];
			
				?>
				<style type="text/css">
			    	.hero { background-image: url(<?php echo $thumbnailURL ?>); padding-top:3em; padding-bottom:2em; background-size:cover; background-repeat:none; background-position:top center; }
					@media screen and (min-width: 36em){ .hero{ background-image: url(<?php echo $smallURL ?>); padding-top:6em; padding-bottom:6em; } }
					@media screen and (min-width: 48em){ .hero{ background-image: url(<?php echo $mediumURL ?>); padding-top:9em; padding-bottom:9em; } }
					@media screen and (min-width: 60em){ .hero{ background-image: url(<?php echo $largeURL ?>); padding-top:12em; padding-bottom:12em; } }
					@media screen and (min-width: 80em){ .hero{ background-image: url(<?php echo $fullURL ?>); padding-top:15em; padding-bottom:15em; } }
				</style>
			
			  <?php
			}//end if
		?>
	</head>
	<body <?php body_class(); ?>>
