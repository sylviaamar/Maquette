<?php
/**
 * Template Name: Fiche team
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
			if ( have_posts() ) :
				// Start the Loop.
				while ( have_posts() ) : the_post();

					/*
					 * Include the post format-specific template for the content. If you want to
					 * use this in a child theme, then include a file called called content-___.php
					 * (where ___ is the post format) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );
				
				//champs rajoutés dans Magic fields
				// get_group we return an array with all groups and fields of the group
				// the parameter to this function is the name of the group
				$resumes = get_group('resume');
				// to see how this made the arrangement can use pr($resumes);
				// the way this arrangement is made
				// [index of the group] [field name] [index of the field]
				// for fields image type level but in accordance with the letter "o" to the original image or "t" for thumbnail
				foreach($resumes as $resume){
					echo "<p>";
			        echo $resume['resume_pseudo'][1]."<br />";
					echo $resume['resume_nom'][1]."<br />";
					echo $resume['resume_photo'][1]."<br />";
					echo $resume['resume_nationalite'][1]."<br />";
					echo $resume['resume_age'][1]."<br />";
					echo $resume['resume_descriptif'][1]."<br />";
					if (!empty($resume['resume_lien_blog'][1])) { echo $resume['resume_lien_blog'][1]."<br />";}
					if (!empty($resume['resume_lien_facebook'][1])) { echo $resume['resume_lien_facebook'][1]."<br />";}
					if (!empty($resume['resume_lien_twitter'][1])) { echo $resume['resume_lien_twitter'][1]."<br />";}
					echo $resume['resume_lien_fiche_joueur'][1]."<br />";
					echo "</p>";
				  }
				
				// Boutons sociaux
					$social_sharing_toolkit = new MR_Social_Sharing_Toolkit();
					echo $social_sharing_toolkit->create_bookmarks();	
				
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