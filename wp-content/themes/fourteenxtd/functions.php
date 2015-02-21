<?php
/* ------------------------------------------------------------------------- *
 *  Custom functions
/* ------------------------------------------------------------------------- */
	
	// Add your custom functions here, or overwrite existing ones. Read more how to use:
	// http://codex.wordpress.org/Child_Themes
	
	// Implement Custom Header features.
require get_stylesheet_directory() . '/inc/custom-header.php';

function fourteenxtd_customize_register( $wp_customize ) {
    $wp_customize->add_setting(
       'fourteenxtd_maximum_header_height',
    array(
        'default' => '240',
		'sanitize_callback' => 'absint'
    ));
	
	$wp_customize->add_control(
       'fourteenxtd_maximum_header_height',
    array(
        'label' => __('Set Overall Header max-height (numbers only!) - Default is 240.','fourteenxt'),
        'section' => 'fourteenxt_general_options',
		'priority' => 3,
        'type' => 'text',
    ));
	
	//  Logo Image Upload
    $wp_customize->add_setting('fourteenxtd_logo_image', array(
        'default-image'  => ''
    ));
 
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'fourteenxtd_logo',
            array(
               'label'    => __( 'Upload a logo', 'ridizain' ),
               'section'  => 'title_tagline',
			   'priority' => 11,
               'settings' => 'fourteenxtd_logo_image',
            )
        )
    );
}
add_action( 'customize_register', 'fourteenxtd_customize_register' );