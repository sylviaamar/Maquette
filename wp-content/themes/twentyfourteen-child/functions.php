<?php
/**
 * Twenty Fourteen child functions and definitions
 *
 *
 */
 
 
//rajout jquery
function twentyfourteen_enqueue_scripts() {
	wp_enqueue_script('jquery');
}
add_action('wp_enqueue_scripts', 'twentyfourteen_enqueue_scripts');


