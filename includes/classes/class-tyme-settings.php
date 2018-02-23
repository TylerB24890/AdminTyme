<?php

namespace Tyme\TymeAdmin\Core;

class Tyme_Settings {

  public static $tyme_options, $tyme_themes;

  public function __construct() {
    add_action( 'tf_create_options', array($this, 'build_admin_pages') );

    // Default wp-admin styles
    self::$tyme_options = array(
      'admin-tyme_theme' => 'default',
    	'admin-tyme_background' => '#f1f1f1',
    	'admin-tyme_font-family' => '-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen-Sans,Ubuntu,Cantarell,"Helvetica Neue",sans-serif',
    	'admin-tyme_font-color' => '#444',
    	'admin-tyme_font-size' => '13px',
    	'admin-tyme_header-color' => '#23282d',
    	'admin-tyme_link-color' => '#0073aa',
    	'admin-tyme_link-text-decoration' => 'none',
    	'admin-tyme_link-hover-color' => '#00a0d2',
    	'admin-tyme_link-hover-text-decoration' => 'none',
    	'admin-tyme_nav-background' => '#23282d',
    	'admin-tyme_nav-width' => '160px',
    	'admin-tyme_nav-link-color' => '#eee',
    	'admin-tyme_nav-link-active-color' => '#FFF',
    	'admin-tyme_nav-link-active-background' => '#0073aa',
    	'admin-tyme_nav-icon-color' => 'rgba(240,245,250,.6)',
    	'admin-tyme_nav-icon-active-color' => '#FFF',
    	'admin-tyme_nav-subnav-background' => '#32373c',
    	'admin-tyme_nav-subnav-link-color' => 'rgba(240,245,250,.7)',
    	'admin-tyme_nav-subnav-active-link-color' => '#FFF',
    );

    self::$tyme_themes = array(
      'default' => __('Default', TYME_SLUG),
      'custom' => __('Custom', TYME_SLUG),
      'material' => __('Material UI', TYME_SLUG),
    );
  }

  /**
   * Get the plugin options (styles)
   *
   * @return array array of user-saved plugin options
   */
  public static function get_tyme_options() {

    $styles = array();

  	foreach(\Tyme\TymeAdmin\Core\Tyme_Settings::$tyme_options as $option => $value) {
      $styles[$option] = get_option($option);
  	}

    return $styles;
  }

  /**
   * Initialize Titan Framework and create Tyme Admin pages
   *
   * @return void
   */
  public function build_admin_pages() {
    $titan = \TitanFramework::getInstance('admin-tyme');

    $tyme_admin = $titan->createAdminPanel(array(
      'name' => __('Tyme Admin', TYME_SLUG),
      'id' => TYME_SLUG,
      'desc' => __('Tyme Admin allows you to customize your wp-admin experience to your specifications. Vist the Admin Tyme Customizer to change your admin color schemes, font families, icons and more! Or, enable one of the themes provided and customize it to your needs.', TYME_SLUG)
    ));

    $tyme_overview = $tyme_admin->createTab(array(
      'name' => __('Overview', TYME_SLUG),
    ));

    $tyme_themes = $tyme_admin->createTab(array(
      'name' => __('Themes', TYME_SLUG),
    ));

    $tyme_customizer = $tyme_admin->createTab(array(
      'name' => __('Customizer', TYME_SLUG)
    ));

    //$this->register_theme_options($tyme_themes);
    $this->register_customizer_options($tyme_customizer);
  }

  /**
   * Create the Tyme Admin Customizer Options
   *
   * @param  object $panel The Titan object for the admin panel
   * @return void
   */
  private function register_customizer_options($panel) {
    $panel->createOption( array(
      'name' => 'Background Color',
      'id' => 'background',
      'type' => 'color',
      'default' => get_option('admin-tyme_background'),
      'desc' => 'The wp-admin background color',
    ) );

    $panel->createOption( array(
      'name' => 'Link Color',
      'id' => 'link-color',
      'type' => 'color',
      'default' => get_option('admin-tyme_link-color'),
      'desc' => 'Default color for links',
    ) );
    $panel->createOption( array(
      'type' => 'save'
    ) );
  }
}
