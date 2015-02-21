<?php
/**
 * Template Name: Accueil
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

 ?>
 <!--Appel du style dédié à la page d'accueil-->
 <style type = 'text/css'>
  @import url("http://teamprov3/wp-content/themes/twentyfourteen-child/accueil.css");
</style>

<?php get_header(); ?>

<div id="main-content" class="main-content">

<!--Rajout du slider-->
<div id="slider-container">
	<?php echo do_shortcode("[epsshortcode id=230]"); ?>
</div>

<!--Rajout de la bannière-->
	<div id="banner-container">
	<?php echo get_image('banniere');?>
	</div>	

	<?php
	if ( is_front_page() && twentyfourteen_has_featured_posts() ) {
		// Include the featured content template.
		get_template_part( 'featured-content' );
	}
?>

	<div id="primary" class="content-area">
	
	
	
		
		<div id="content" class="site-content" role="main">

			<?php
				// Start the Loop.
				while ( have_posts() ) : the_post();

					// Include the page content template.
					get_template_part( 'content', 'page' );
					

					//Suppression des commentaires
					// If comments are open or we have at least one comment, load up the comment template.
					//if ( comments_open() || get_comments_number() ) {
					//	comments_template();
					//}
					
				endwhile;
				
			?>
			
		</div><!-- #content -->
		
		<?php get_sidebar( 'content' );?>
	</div><!-- #primary -->
	
	<div style="clear:both;"></div>
</div><!-- #main-content -->

	
<?php
get_sidebar();?>
<?php get_footer();
