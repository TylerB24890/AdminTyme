<?php

namespace Tyme\TymeAdmin\Admin;

class Tyme_Admin_Init {

  public function __construct() {
    add_action('admin_init', array($this, 'load_admin_files'));
    add_action('admin_menu', array($this, 'add_menu_items'));
    add_action('admin_enqueue_scripts', array($this, 'enqueue_styles'));
    add_action('admin_enqueue_scripts', array($this, 'enqueue_scripts'));
  }

  public function load_admin_files() {
    require TYME_INC . 'classes/class-tyme-themes.php';
    require TYME_INC . 'classes/class-tyme-customizer.php';
    
    new Themes\Tyme_Themes;
    new Customizer\Tyme_Customizer;
  }

  /**
   * Enqueue the Admin Tyme CSS files
   *
   * @uses wp_enqueue_style
   *
   * @return void
   */
  public function enqueue_styles() {
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_style( TYME_SLUG, TYME_URL . 'assets/css/tyme-admin.css', array(), TYME_VERSION );
  }

  /**
   * Enqueue the Admin Tyme JS file
   *
   * @uses wp_enqueue_script
   *
   * @return void
   */
  public function enqueue_scripts() {
    wp_enqueue_script( TYME_SLUG, TYME_URL . 'assets/js/src/tyme-admin.js', array('jquery', 'wp-color-picker'), TYME_VERSION, false );
  }

  /**
	 * Adds the wp-admin menu pages
	 *
	 * @since		1.0.0
	 */
	public function add_menu_items() {
		add_menu_page(
			__('Tyme Admin', TYME_SLUG),
			__('Tyme Admin', TYME_SLUG),
			'administrator',
			'tyme',
			array($this, 'render_tyme')
		);

		add_submenu_page(
        TYME_SLUG,
        __('Tyme Admin', TYME_SLUG),
        __('Overview', TYME_SLUG),
        'administrator',
        'tyme',
        ''
    );

		add_submenu_page(
        TYME_SLUG,
        __('Tyme Admin | Default Themes', TYME_SLUG),
        __('Default Themes', TYME_SLUG),
        'administrator',
        'tyme-themes',
        array($this, 'render_tyme_themes')
    );

		add_submenu_page(
        TYME_SLUG,
        __('Tyme Admin | Customize', TYME_SLUG),
        __('Customizer', TYME_SLUG),
        'administrator',
        'tyme-customizer',
        array($this, 'render_tyme_customize')
    );
	}

	/**
	 * Renders the Tyme Admin landing page
	 * @return script
	 * @since	 1.0.0
	 */
	public function render_tyme() {
		include_once(TYME_INC . 'partials/' . TYME_SLUG . '-landing.php');
	}

	/**
	 * Renders the Tyme Admin Customizer page
	 * @return script
	 * @since	 1.0.0
	 */
	public function render_tyme_themes() {
		include_once(TYME_INC . 'partials/' . TYME_SLUG . '-themes.php');
	}

	/**
	 * Renders the Tyme Admin Customizer page
	 * @return script
	 * @since	 1.0.0
	 */
	public function render_tyme_customize() {
		include_once(TYME_INC . 'partials/' . TYME_SLUG . '-customizer.php');
	}
}
