<?php

namespace Tyme\TymeAdmin\Core;

class Tyme_Settings {

  public static $tyme_options, $tyme_themes;

  public function __construct() {
    // Default wp-admin styles
    self::$tyme_options = array(
      'theme' => 'default',
    	'background' => '#f1f1f1',
      'body-font' => array(
        'font-family' => '-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen-Sans,Ubuntu,Cantarell,"Helvetica Neue",sans-serif',
        'color' => '#444',
        'font-size' => '13px'
      ),
      'header-font' => array(
        'font-family' => '-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen-Sans,Ubuntu,Cantarell,"Helvetica Neue",sans-serif',
        'color' => '#23282d',
      ),
    	'link-color' => '#0073aa',
    	'link-text-decoration' => 'none',
    	'link-hover-color' => '#00a0d2',
    	'link-hover-text-decoration' => 'none',
    	'nav-background' => '#23282d',
    	'nav-width' => '160px',
    	'nav-link-color' => '#eee',
    	'nav-link-active-color' => '#FFF',
    	'nav-link-active-background' => '#0073aa',
    	'nav-icon-color' => 'rgba(240,245,250,.6)',
    	'nav-icon-active-color' => '#FFF',
    	'nav-subnav-background' => '#32373c',
    	'nav-subnav-link-color' => 'rgba(240,245,250,.7)',
    	'nav-subnav-active-link-color' => '#FFF',
    );

    self::$tyme_themes = array(
      'default' => __('Default', TYME_SLUG),
      'custom' => __('Custom', TYME_SLUG),
      'material' => __('Material UI', TYME_SLUG),
    );

    add_action( 'tf_create_options', array($this, 'build_admin_pages') );
  }

  /**
   * Get the plugin options (styles)
   *
   * @return array array of user-saved plugin options
   */
  public static function get_tyme_options() {
    $titan = \TitanFramework::getInstance('tyme');
    $styles = array();

  	foreach(self::$tyme_options as $option => $value) {
      $styles[$option] = $titan->getOption($option);
  	}

    if($styles['body-font']['font-family'] === 'inherit') {
      $styles['body-font']['font-family'] = self::$tyme_options['body-font']['font-family'];
    }

    return $styles;
  }

  /**
   * Initialize Titan Framework and create Tyme Admin pages
   *
   * @return void
   */
  public function build_admin_pages() {
    $titan = \TitanFramework::getInstance('tyme');

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

    $styles = self::get_tyme_options();
    $defaults = self::$tyme_options;

    $panel->createOption( array(
      'name' => 'Background Color',
      'id' => 'background',
      'type' => 'color',
      'default' => $defaults['background'],
      'desc' => 'The wp-admin background color',
    ) );

    $panel->createOption( array(
      'name' => 'Headers',
      'id' => 'header-font',
      'type' => 'font',
      'show_font_weight' => false,
      'show_font_style' => false,
      'show_line_height' => false,
      'show_letter_spacing' => false,
      'show_text_transform' => false,
      'show_font_variant' => false,
      'show_text_shadow' => false,
      'show_font_size' => false,
      'show_preview' => false,
      'default' => array(
        'font-family' => $defaults['header-font']['font-family'],
        'line-height' => '1em',
        'color' => $defaults['header-font']['color'],
      ),
      'desc' => 'Header Font Styles',
    ) );

    $panel->createOption( array(
      'name' => 'Body Font',
      'id' => 'body-font',
      'type' => 'font',
      'show_font_weight' => false,
      'show_font_style' => false,
      'show_line_height' => false,
      'show_letter_spacing' => false,
      'show_text_transform' => false,
      'show_font_variant' => false,
      'show_text_shadow' => false,
      'show_preview' => false,
      'default' => array(
        'font-family' => $defaults['body-font']['font-family'],
        'line-height' => '1em',
        'font-size' => $defaults['body-font']['font-size'],
        'color' => $defaults['body-font']['color'],
      ),
      'desc' => 'Body Font Styles',
    ) );

    $panel->createOption( array(
      'name' => 'Link Color',
      'id' => 'link-color',
      'type' => 'color',
      'default' => $defaults['link-color'],
      'desc' => 'Default color for links',
    ) );
    $panel->createOption( array(
      'type' => 'save'
    ) );
  }
}
