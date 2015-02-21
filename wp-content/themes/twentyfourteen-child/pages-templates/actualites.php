<?php
/**
 * Template Name: Actualites
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
get_header(); ?>

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
			if ( have_posts() ) :
				// Start the Loop.
				while ( have_posts() ) : the_post();
				
					/*
					 * Include the post format-specific template for the content. If you want to
					 * use this in a child theme, then include a file called called content-___.php
					 * (where ___ is the post format) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );
				
				

								?>
				<!--filtre les articles par catégorie et affiche les derniers articles (dernière ligne)-->
				<li id="categories">
					<h2><?php _e('Posts by Category'); ?></h2>
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
				<?php wp_get_archives( array( 'type' => 'postbypost', 'limit' => 10, 'format' => 'html' ) ); 	?>
			
			
				
			<?php									
					endwhile;
				// Previous/next post navigation.
				twentyfourteen_paging_nav();

			else :
				// If no content, include the "No posts found" template.
				get_template_part( 'content', 'none' );

			endif;
		?>

		</div><!-- #content -->
	</div><!-- #primary -->
	<?php get_sidebar( 'content' ); ?>
</div><!-- #main-content -->

<?php
get_sidebar();
get_footer();
