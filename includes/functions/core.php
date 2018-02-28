<?php
namespace Tyme\TymeAdmin;

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

	load_dependencies();

	add_action( 'init', $n( 'i18n' ) );
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
	// First load the init scripts in case any rewrite functionality is being loaded
	flush_rewrite_rules();
}

/**
 * Deactivate the plugin
 *
 * @return void
 */
function deactivate() {
	// Testing purposes only
	delete_option('tyme_options');
}

/**
 * Load the plugin dependencies
 *
 * @return void
 */
function load_dependencies() {
	require_once TYME_INC . 'functions/helpers.php';
	require_once TYME_INC . 'classes/class-tyme-base.php';
}
