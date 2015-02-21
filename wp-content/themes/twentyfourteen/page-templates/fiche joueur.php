<?php
/**
 * Template Name: Fiche joueur
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
			    echo "<i> Pseudo : </i>";
			    echo get('pseudo'); 
				echo "<br/><i> Nom : </i>";
				echo get('nom'); 
				echo "<br/>";
				echo get_image('photo'); 
				echo "<br/>	<i> Nationalit&eacute : </i>";
				echo get('nationalite');
				echo "<br/>	<i> Age : </i>";
				echo get('age'); 
				echo "<br/>	<i> Date d&rsquo;arriv&eacutee : </i>";
				echo get('date_darrivee'); 
				echo "<br/>	<i> Introduction : </i>";
				echo get('description'); 
				echo "<br/><i> Palmar&egraves : </i>";
				echo get('palmares'); 
				echo "<br/>";
				if (get('casque_utilise')!="") 
				{	echo "<i> Casque utilis&eacute : </i>" ; 
					echo get('casque_utilise');
					echo "<br/>";} 
				if (get('clavier_utilise')!="") 
				{	echo "<i> Clavier utilis&eacute : </i>" ; 
					echo get('clavier_utilise');
					echo "<br/>";}  
				if (get('souris_utilisee')!="") 
				{	echo "<i> Souris utilis&eacutee : </i>" ; 
					echo get('souris_utilisee');
					echo "<br/>";} 
				if (get('race_jouee_SC2')!="") 
				{	echo "<i> Race jou&eacutee : </i>" ; 
					echo get('race_jouee_SC2');
					echo "<br/>";} 	
				if (get('role_joue_lol')!="") 
				{	echo "<i> R&ocircle jou&eacute : </i>" ; 
					echo get('role_joue_lol');
					echo "<br/>";}
				if (get_image('heros_favori_lol')==TRUE)
				{	echo "<i> H&eacuteros favoris : </i>" ; 
					echo get_image('heros_favori_lol',1,1);
					echo get_image('heros_favori_lol',1,2); 
					echo get_image('heros_favori_lol',1,3); 
					echo "<br/>";}
				if (get('role_cs')!="") 
				{	echo "<i> R&ocircle jou&eacute : </i>" ; 
					echo get_image('role_cs');
					echo "<br/>";}
				if (get('role_cod')!="") 
				{	echo "<i> R&ocircle jou&eacute : </i>" ; 
					echo get_image('role_cod');
					echo "<br/>";}
				if (get('lien_blog')!="") 
				{	echo "<i> Lien blog : </i>" ; 
					echo get('lien blog');
					echo "<br/>";} 
				if (get('lien_twitter')!="") 
				{	echo "<i> Lien twitter : </i>" ; 
					echo get('lien_twitter');
					echo "<br/>";} 
				if (get('lien_facebook')!="") 
				{	echo "<i> Lien facebook : </i>" ; 
					echo get('lien_facebook');
					echo "<br/>";} 
					
										
				
				
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