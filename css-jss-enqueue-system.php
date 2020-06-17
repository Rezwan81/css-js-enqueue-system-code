<?php

/**
*  css jss enqueue system
*/
add_action( 'wp_enqueue_scripts', 'external_scripts_and_styles' );

function external_scripts_and_styles() {

	wp_enqueue_style( 'owl-carousel', PLUGINS_URL( 'css/owl.carousel.css', __FILE__));

	wp_enqueue_style( 'owl-custom', PLUGINS_URL( 'css/owl.custom.css', __FILE__) );

	wp_enqueue_script( 'owl-carousel', PLUGINS_URL( 'js/owl.carousel.min.js', __FILE__), array( 'jquery' ) );

	wp_enqueue_script( 'owl-custom', PLUGINS_URL( 'js/owl.custom.js', __FILE__), array('jquery' ) );
}

/**
* custom css js link enqueue
*/
add_action( 'admin_enqueue_scripts', 'misha_main_theme_css' );

function misha_main_theme_css() {

	wp_enqueue_script( 'employee_script', PLUGINS_URL( 'js/custom.js', __FILE__), array( 'jquery', 'jquery-ui-tabs' ) );

	wp_enqueue_style( 'employee-custom', PLUGINS_URL( 'css/custom.css', __FILE__) );
}

/**
*  Including the main theme style.css
*/
add_action( 'wp_enqueue_scripts', 'misha_main_theme_css' );
 
function misha_main_theme_css() {
 
	wp_enqueue_script( 'misha-css', get_stylesheet_uri() ); 
}

/**
*  Using Pre-registered Scripts
*/
add_action( 'wp_enqueue_scripts', 'misha_include_jquery' );
 
function misha_include_jquery() {
 
	wp_enqueue_script( 'jquery' ); // you just have to know a script handle 
}

/**
*  Using Pre-registered Scripts
*/
add_action( 'wp_enqueue_scripts', 'misha_include_jquery' );
 
function misha_include_jquery() {
 
	wp_enqueue_script( 'jquery' ); // you just have to know a script handle 
}

add_action( 'wp_enqueue_scripts', 'misha_register_and_enqueue' );
 
function misha_register_and_enqueue() {
 
	wp_register_script( 'some-script', $url );
	wp_enqueue_script( 'some-script' ); 
}

/**
*  Dependencies
*/
add_action( 'wp_enqueue_scripts', 'misha_custom_js_with_dependency' );
 
function misha_custom_js_with_dependency() {
 
	wp_enqueue_script( 
		'misha-script-2', 
		plugin_dir_url( __FILE__ ) . 'assets/script.js',
		array( 'jquery', 'misha-script-1' )
	);
}

/**
*  Deregister Scripts and Stylesheets you Do Not Need
*/
add_action( 'wp_enqueue_scripts', 'misha_remove_contact_form_7_css', 9999 );
 
function misha_remove_contact_form_7_css() {

	wp_deregister_style( 'contact-form-7' );
}

/**
*  How to Add Script on Specific Pages Only
*/
add_action( 'wp_enqueue_scripts', 'misha_js_for_homepage_only' );
 
function misha_js_for_homepage_only() {
 
	if( is_front_page() ) { // if on a website homepage
		wp_enqueue_script( 'homepage-js', $url, 'jquery', null, true );
	}
}

add_action( 'admin_enqueue_scripts', 'misha_admin_js_for_certain_pages' );
 
function misha_admin_js_for_certain_pages( $hook_suffix ) {
 
	// Dashboard, Posts, Pages pages
	if( $hook_suffix == 'index.php' || $hook_suffix == 'edit.php' ) {
		wp_enqueue_script( 'admin-js', $url, false, null, true );
	} 
}







