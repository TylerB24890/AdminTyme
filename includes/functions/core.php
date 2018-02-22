<?php
namespace Tyme\TymeAdmin\Core;

/**
 * Default setup routine
 *
 * @uses add_action()
 * @uses do_action()
 *
 * @return void
 */
function setup() {
	$n = function( $function ) {
		return __NAMESPACE__ . "\\$function";
	};

	add_action( 'init', $n( 'i18n' ) );
	add_action( 'init', $n( 'load_dependencies' ) );
}

/**
 * Registers the default textdomain.
 *
 * @uses apply_filters()
 * @uses get_locale()
 * @uses load_textdomain()
 * @uses load_plugin_textdomain()
 * @uses plugin_basename()
 *
 * @return void
 */
function i18n() {
	$locale = apply_filters( 'plugin_locale', get_locale(), TYME_SLUG );
	load_textdomain( TYME_SLUG, WP_LANG_DIR . '/tyme/tyme-' . $locale . '.mo' );
	load_plugin_textdomain( TYME_SLUG, false, plugin_basename( TYME_PATH ) . '/languages/' );
}

/**
 * Activate the plugin
 *
 * @uses flush_rewrite_rules()
 *
 * @return void
 */
function activate() {
	require TYME_INC . 'classes/class-tyme-styles.php';
	$styles = new \Tyme\TymeAdmin\Admin\Styles\Tyme_Styles;

	// Global Body Styles
	update_option('tyme-background', $styles::$default_styles['body']['background']);
	update_option('tyme-font-family', $styles::$default_styles['body']['font-family']);
	update_option('tyme-font-color', $styles::$default_styles['body']['color']);
	update_option('tyme-font-size', $styles::$default_styles['body']['font-size']);

	// Headers
	update_option('tyme-headers-color', $styles::$default_styles['headers']['color']);

	// Global Link Styles
	update_option('tyme-links-color', $styles::$default_styles['links']['color']);
	update_option('tyme-links-text-decoration', $styles::$default_styles['links']['text-decoration']);
	update_option('tyme-links-hover-color', $styles::$default_styles['links']['hover']['color']);
	update_option('tyme-links-hover-text-decoration', $styles::$default_styles['links']['hover']['text-decoration']);

	// Nav Styles
	update_option('tyme-nav-background', $styles::$default_styles['nav']['background']);
	update_option('tyme-nav-width', $styles::$default_styles['nav']['width']);
	update_option('tyme-nav-link-color', $styles::$default_styles['nav']['nav_links']['color']);
	update_option('tyme-nav-link-active-color', $styles::$default_styles['nav']['nav_links']['active']['color']);
	update_option('tyme-nav-link-active-background', $styles::$default_styles['nav']['nav_links']['active']['background']);
	update_option('tyme-nav-icon-color', $styles::$default_styles['nav']['icons']['color']);
	update_option('tyme-nav-icon-active-color', $styles::$default_styles['nav']['icons']['active']['color']);

	update_option('tyme-nav-subnav-background', $styles::$default_styles['nav']['subnav']['background']);
	update_option('tyme-nav-subnav-link-color', $styles::$default_styles['nav']['subnav']['nav_links']['color']);
	update_option('tyme-nav-subnav-active-link-color', $styles::$default_styles['nav']['subnav']['nav_links']['active']['color']);

	// Tables
	//update_option('tyme-table-background', $styles::$default_styles['tables']['background']);
	//update_option('tyme-table-color', $styles::$default_styles['tables']['color']);
	//update_option('tyme-table-border-color', $styles::$default_styles['tables']['border-color']);

	// First load the init scripts in case any rewrite functionality is being loaded
	flush_rewrite_rules();
}

/**
 * Deactivate the plugin
 *
 * Uninstall routines should be in uninstall.php
 *
 * @return void
 */
function deactivate() {
	// Global Body Styles
	delete_option('tyme-background');
	delete_option('tyme-font-family');
	delete_option('tyme-font-color');
	delete_option('tyme-font-size');

	// Nav Styles
	delete_option('tyme-nav-background');
	delete_option('tyme-nav-width');
}

/**
 * Load the plugin dependencies
 *
 * @return void
 */
function load_dependencies() {
	require_once TYME_INC . 'classes/class-tyme-base.php';
}
