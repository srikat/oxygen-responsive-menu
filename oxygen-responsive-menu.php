<?php
/*
Plugin Name:	Oxygen Responsive Menu
Plugin URI:		https://wpdevdesign.com/oxygen-responsive-menu/
Description:	Implements Genesis Responsive Menu in Oxygen.
Version:		1.0.1
Author:			Sridhar Katakam
Author URI:		https://wpdevdesign.com
License:		GPL-2.0+
License URI:	http://www.gnu.org/licenses/gpl-2.0.txt

This plugin is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

This plugin is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with This plugin. If not, see {URI to Plugin License}.
*/

if ( ! defined( 'WPINC' ) ) {
	die;
}

add_action( 'wp_enqueue_scripts', 'orm_enqueue_files' );
/**
 * Load Superfish and other assets.
 */
function orm_enqueue_files() {

	wp_enqueue_style( 'dashicons' );

	wp_enqueue_style( 'oxygen-responsive-menu', plugin_dir_url( __FILE__ ) . 'assets/css/main.css' );

	wp_enqueue_script( 'superfish', plugin_dir_url( __FILE__ ) . 'assets/js/superfish.min.js', array( 'jquery', 'hoverIntent' ), '1.7.10', true );
	wp_enqueue_script( 'superfish-args', plugin_dir_url( __FILE__ ) . 'assets/js/superfish.args.min.js', array( 'superfish' ), CT_VERSION, true );

	// add keyboard accessibility to a dropdown menu.
	wp_enqueue_script( 'dropdown-menu', plugin_dir_url( __FILE__ ) . 'assets/js/dropdown-menu.min.js', array( 'jquery' ), CT_VERSION, true );

	wp_enqueue_script(
		'genesis-responsive-menu',
		plugin_dir_url( __FILE__ ) . 'assets/js/responsive-menus.min.js',
		array( 'jquery' ),
		CT_VERSION,
		true
	);
	wp_localize_script(
		'genesis-responsive-menu',
		'genesis_responsive_menu',
		genesis_responsive_menu_settings()
	);

}

/**
 * Defines responsive menu settings.
 */
function genesis_responsive_menu_settings() {

	$settings = array(
		// 'mainMenu'         => __( 'Menu', 'genesis-sample' ),
		'mainMenu'         => sprintf( '<span class="hamburger-box"><span class="hamburger-inner"></span></span><span class="hamburger-label">%s</span>', __( 'Menu', 'genesis-sample' ) ),
		// 'menuIconClass'    => 'dashicons-before dashicons-menu',
		'menuIconClass'    => 'hamburger hamburger--slider',
		'subMenu'          => __( 'Submenu', 'genesis-sample' ),
		'subMenuIconClass' => 'dashicons-before dashicons-arrow-down-alt2',
		'menuClasses'      => array(
			'combine' => array(
				'.nav-primary',
			),
			'others'  => array(),
		),
	);

	return $settings;

}

add_shortcode( 'oxygen-responsive-menu', 'orm_oxygen_responsive_menu' );
/**
 * Register a custom shortcode to output the responsive menu.
 *
 * @param array $atts Array of attributes.
 * @return string HTML markup.
 */
function orm_oxygen_responsive_menu( $atts ) {
	$a = shortcode_atts( array(
		'menu' => 'Main Menu',
	), $atts );

	ob_start();
		echo '<nav class="nav-primary genesis-responsive-menu" aria-label="Main" itemscope="" itemtype="https://schema.org/SiteNavigationElement" id="genesis-nav-primary">';

		wp_nav_menu( array(
			'menu'           => $a['menu'],
			'menu_class'     => 'menu genesis-nav-menu menu-primary js-superfish',
			'container'		 => '',
		) );

		echo '</nav>';
	$nav_menu_output = ob_get_clean();

	return $nav_menu_output;

}
