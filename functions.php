<?php
/**
 * eightytwo2024 Child Theme functions and definitions
 *
 * @package eightytwo2024Child
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;



/**
 * Removes the parent themes stylesheet and scripts from inc/enqueue.php
 */
function eightytwo2024_remove_scripts() {
	wp_dequeue_style( 'eightytwo2024-styles' );
	wp_deregister_style( 'eightytwo2024-styles' );

	wp_dequeue_script( 'eightytwo2024-scripts' );
	wp_deregister_script( 'eightytwo2024-scripts' );
}
add_action( 'wp_enqueue_scripts', 'eightytwo2024_remove_scripts', 20 );



/**
 * Enqueue our stylesheet and javascript file
 */
function theme_enqueue_styles() {

	// Get the theme data.
	$the_theme = wp_get_theme();

	$suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
	// Grab asset urls.
	$theme_styles  = "/css/child-theme{$suffix}.css";
	$theme_scripts = "/js/child-theme{$suffix}.js";

	wp_enqueue_style( 'child-eightytwo2024-styles', get_stylesheet_directory_uri() . $theme_styles, array(), $the_theme->get( 'Version' ) );
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'child-eightytwo2024-scripts', get_stylesheet_directory_uri() . $theme_scripts, array(), $the_theme->get( 'Version' ), true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );



/**
 * Load the child theme's text domain
 */
function add_child_theme_textdomain() {
	load_child_theme_textdomain( 'eightytwo2024-child', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'add_child_theme_textdomain' );



/**
 * Overrides the theme_mod to default to Bootstrap 5
 *
 * This function uses the `theme_mod_{$name}` hook and
 * can be duplicated to override other theme settings.
 *
 * @return string
 */
function eightytwo2024_default_bootstrap_version() {
	return 'bootstrap5';
}
add_filter( 'theme_mod_eightytwo2024_bootstrap_version', 'eightytwo2024_default_bootstrap_version', 20 );



/**
 * Loads javascript for showing customizer warning dialog.
 */
function eightytwo2024_child_customize_controls_js() {
	wp_enqueue_script(
		'eightytwo2024_child_customizer',
		get_stylesheet_directory_uri() . '/js/customizer-controls.js',
		array( 'customize-preview' ),
		'20130508',
		true
	);
}
add_action( 'customize_controls_enqueue_scripts', 'eightytwo2024_child_customize_controls_js' );
