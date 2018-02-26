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
      'nav-font' => array(
        'font-family' => '-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen-Sans,Ubuntu,Cantarell,"Helvetica Neue",sans-serif',
        'color' => '#eee',
        'font-size' => '14px'
      ),
    	'nav-link-active-color' => '#FFF',
    	'nav-link-active-background' => '#0073aa',
    	'nav-icon-color' => 'rgba(240,245,250,.6)',
    	'nav-icon-active-color' => '#FFF',
    	'nav-subnav-background' => '#32373c',
    	'nav-subnav-link-color' => 'rgba(240,245,250,.7)',
    	'nav-subnav-active-link-color' => '#FFF',
      'admin-bar-background' => '#23282d',
      'admin-bar-font' => array(
        'font-family' => '-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen-Sans,Ubuntu,Cantarell,"Helvetica Neue",sans-serif',
        'color' => '#eee',
      )
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

    if($styles['header-font']['font-family'] === 'inherit') {
      $styles['header-font']['font-family'] = self::$tyme_options['header-font']['font-family'];
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
      'name' => __('Admin Tyme', TYME_SLUG),
      'id' => TYME_SLUG,
      'desc' => __('Take control of your dashboard. Choose a theme or customize your own using the Tyme Customizer.', TYME_SLUG)
    ));

    $tyme_overview = $tyme_admin->createTab(array(
      'name' => __('Overview', TYME_SLUG),
    ));

    $tyme_themes = $tyme_admin->createTab(array(
      'name' => __('Themes', TYME_SLUG),
      'desc' => '<span class="note">' . __('Changes are not saved until click the \'Save\' button.', TYME_SLUG) . '</span>'
    ));

    $tyme_customizer = $tyme_admin->createTab(array(
      'name' => __('Customizer', TYME_SLUG),
      'desc' => '<span class="note">' . __('Changes are not saved until click the \'Save Changes\' button.', TYME_SLUG) . '</span>'
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

    // Background Color
    $panel->createOption( array(
      'name' => __('Background Color', TYME_SLUG),
      'id' => 'background',
      'type' => 'color',
      'default' => $defaults['background'],
      'desc' => __('The wp-admin background color', TYME_SLUG),
    ) );

    // Header Fonts
    $panel->createOption( array(
      'name' => __('Headers', TYME_SLUG),
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
      'desc' => __('Header Font Styles', TYME_SLUG),
    ) );

    // Body Fonts
    $panel->createOption( array(
      'name' => __('Body Font', TYME_SLUG),
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
      'desc' => __('Body Font Styles', TYME_SLUG),
    ) );

    // Body Links
    $panel->createOption( array(
      'name' => __('Body Link Color', TYME_SLUG),
      'id' => 'link-color',
      'type' => 'color',
      'default' => $defaults['link-color'],
      'desc' => __('Default color for links within the body text', TYME_SLUG),
    ) );

    // Navigation Background
    $panel->createOption( array(
      'name' => __('Navigation Background', TYME_SLUG),
      'id' => 'nav-background',
      'type' => 'color',
      'default' => $defaults['nav-background'],
      'desc' => __('Navigation Panel Background Color.', TYME_SLUG) . '<span class="note">' . __('Note: The active and hover states are generated automatically based on your chosen background color. Click \'Save Changes\' to view them.', TYME_SLUG) . '</span>',
    ) );

    // Navigation Font
    $panel->createOption( array(
      'name' => __('Navigation Font', TYME_SLUG),
      'id' => 'nav-font',
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
        'font-family' => $defaults['nav-font']['font-family'],
        'line-height' => '1em',
        'font-size' => $defaults['nav-font']['font-size'],
        'color' => $defaults['nav-font']['color'],
      ),
      'desc' => __('Navigation Font Styles', TYME_SLUG),
    ) );

    // Active Navigation Font
    $panel->createOption( array(
      'name' => __('Active Navigation Color', TYME_SLUG),
      'id' => 'nav-link-active-color',
      'type' => 'color',
      'default' => $defaults['nav-link-active-color'],
      'desc' => __('Active Navigation Link Color', TYME_SLUG) . '<span class="note">' . __('Note: The active navigation link color applies <b>only</b> to the text, not the background.', TYME_SLUG) . '</span>',
    ) );

    // Top Admin Bar Background Color
    $panel->createOption( array(
      'name' => __('Admin Bar Background', TYME_SLUG),
      'id' => 'admin-bar-background',
      'type' => 'color',
      'default' => $defaults['admin-bar-background'],
      'desc' => __('Top Admin Bar Background Color', TYME_SLUG),
    ) );

    // Navigation Font
    $panel->createOption( array(
      'name' => __('Admin Bar Font', TYME_SLUG),
      'id' => 'admin-bar-font',
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
        'font-family' => $defaults['admin-bar-font']['font-family'],
        'line-height' => '1em',
        'color' => $defaults['admin-bar-font']['color'],
      ),
      'desc' => __('Admin Bar Font Styles', TYME_SLUG),
    ) );

    // Save Options
    $panel->createOption( array(
      'type' => 'save'
    ) );
  }
}
