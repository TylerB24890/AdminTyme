<?php

namespace Tyme\TymeAdmin;

class Tyme_Base {

  /**
   * The globally accessed name for the Tyme Admin plugin
   *
   * @var string
   */
  public static $tyme_name;

  /**
   * Construct the Tyme Admin plugin base
   */
  public function __construct() {
    self::$tyme_name = __('Tyme Admin', TYME_SLUG);

    if(is_admin())
      $this->init_hooks();
  }

  /**
   * Hook plugin functions into WP.
   *
   * Register the Tyme Settings
   *
   * @return void
   */
  private function init_hooks() {
    add_action('admin_init', array($this, 'load_admin_files'));
    add_action('admin_enqueue_scripts', array($this, 'enqueue_styles'));
    add_action('admin_enqueue_scripts', array($this, 'enqueue_scripts'));

    require_once TYME_INC . 'classes/class-tyme-settings.php';
  	new Settings\Tyme_Settings;
  }

  /**
   * Load files required by Tyme Admin
   *
   * @return void
   */
  public function load_admin_files() {
    require TYME_INC . 'classes/class-tyme-themes.php';

    new Themes\Tyme_Themes;
  }

  /**
   * Enqueue the Admin Tyme CSS files
   *
   * @uses wp_enqueue_style
   *
   * @return void
   */
  public function enqueue_styles() {
    wp_enqueue_style( TYME_SLUG, TYME_URL . 'assets/css/tyme-admin.css', array(), TYME_VERSION );

    add_action('admin_head', '\Tyme\TymeAdmin\Themes\Tyme_Themes::set_admin_theme');
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
}

new Tyme_Base;
