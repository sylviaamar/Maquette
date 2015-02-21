<?php
/**
 * Template Name: Actualites
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
get_header(); ?>

<!--Zone grise sous le menu-->
<div id="below-menu"></div>

<div id="main-content" class="main-content">

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
			?>
						
						
				<!--filtre les articles par catégorie-->
				<li id="categories">
					<form action="<?php bloginfo('url'); ?>/" method="get">
					<div>
				<?php
				$select = wp_dropdown_categories('show_option_none=Select category&show_count=1&orderby=name&echo=0');
				$select = preg_replace("#<select([^>]*)>#", "<select$1 onchange='return this.form.submit()'>", $select);
				echo $select;
				?>
					<noscript><div><input type="submit" value="View" /></div></noscript>
					</div></form>
				</li>
				
				<!--Tri chronologique ou anti-chronologique-->
				
				
				<!--Affiche les derniers articles-->
				<?php wp_get_archives( array( 'type' => 'postbypost', 'limit' => 10, 'format' => 'html' ) ); 	?>
			
				
			<?php	
					//Suppression des commentaires
					// If comments are open or we have at least one comment, load up the comment template.
					//if ( comments_open() || get_comments_number() ) {
					//	comments_template();
					//}
				endwhile;
			?>

		</div><!-- #content -->
		<?php get_sidebar( 'content' ); ?>
	</div><!-- #primary -->
	
</div><!-- #main-content -->

<?php
get_sidebar();
get_footer();
