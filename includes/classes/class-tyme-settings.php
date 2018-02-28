<?php

namespace Tyme\TymeAdmin\Settings;

class Tyme_Settings {

  public static $tyme_options, $tyme_themes;
  private static $default_font;

  public function __construct() {
    // Default wp-admin styles

    self::$default_font = '-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen-Sans,Ubuntu,Cantarell,"Helvetica Neue",sans-serif';

    self::$tyme_options = array(
      'theme' => 'default',
    	'background' => '#f1f1f1',
      'body-font' => array(
        'font-family' => self::$default_font,
        'color' => '#444',
        'font-size' => '13px'
      ),
      'header-font' => array(
        'font-family' => self::$default_font,
        'color' => '#23282d',
      ),
    	'link-color' => '#0073aa',
    	'link-text-decoration' => 'none',
    	'link-hover-color' => '#00a0d2',
    	'link-hover-text-decoration' => 'none',
    	'nav-background' => '#23282d',
    	'nav-width' => '160px',
      'nav-font' => array(
        'font-family' => self::$default_font,
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
        'font-family' => self::$default_font,
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
      $styles['body-font']['font-family'] = self::$default_font;
    }

    if($styles['header-font']['font-family'] === 'inherit') {
      $styles['header-font']['font-family'] = self::$default_font;
    }

    if($styles['nav-font']['font-family'] === 'inherit') {
      $styles['nav-font']['font-family'] = self::$default_font;
    }

    if($styles['admin-bar-font']['font-family'] === 'inherit') {
      $styles['admin-bar-font']['font-family'] = self::$default_font;
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

    include_once(TYME_INC . 'partials/overview-tab.php');

    $tyme_admin = $titan->createAdminPanel(array(
      'name' => __('Admin Tyme', TYME_SLUG),
      'id' => TYME_SLUG,
      'desc' => __('Take control of your dashboard. Choose a theme or customize your own using the Tyme Customizer.', TYME_SLUG)
    ));

    $tyme_overview = $tyme_admin->createTab(array(
      'name' => __('Overview', TYME_SLUG),
      'desc' => return_overview_tab()
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
    $font_args = array(
      'name' => 'Headers',
      'id' => 'header-font',
      'desc' => 'Header Font Styles',
    );
    $panel->createOption(self::_set_default_font_args($font_args));

    // Body Fonts
    $font_args = array(
      'name' => 'Body Font',
      'id' => 'body-font',
      'desc' => 'Body Font Styles',
      'show-font-size' => true,
    );
    $panel->createOption(self::_set_default_font_args($font_args));

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
    $font_args = array(
      'name' => 'Navigation Font',
      'id' => 'nav-font',
      'desc' => 'Navigation Font Styles',
    );
    $panel->createOption(self::_set_default_font_args($font_args));

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
    $font_args = array(
      'name' => 'Admin Bar Font',
      'id' => 'admin-bar-font',
      'desc' => 'Admin Bar Font Styles',
    );
    $panel->createOption(self::_set_default_font_args($font_args));



    // Save Options
    $panel->createOption( array(
      'type' => 'save'
    ) );
  }

  /**
   * Set default Font Selector arguments
   *
   * @param array $arg_defaults Default(optional) arguments passed to font editor
   */
  private static function _set_default_font_args($arg_defaults) {
    $args = array(
      'name' => __($arg_defaults['name'], TYME_SLUG),
      'id' => $arg_defaults['id'],
      'type' => 'font',
      'show_font_weight' => (isset($arg_defaults['show-font-weight']) ? $arg_defaults['show-font-weight'] : false),
      'show_font_style' => (isset($arg_defaults['show-font-style']) ? $arg_defaults['show-font-style'] : false),
      'show_line_height' => (isset($arg_defaults['show-line-height']) ? $arg_defaults['show-line-height'] : false),
      'show_letter_spacing' => (isset($arg_defaults['show-letter-spacing']) ? $arg_defaults['show-letter-spacing'] : false),
      'show_text_transform' => (isset($arg_defaults['show-text-transform']) ? $arg_defaults['show-text-transform'] : false),
      'show_font_variant' => (isset($arg_defaults['show-font-variant']) ? $arg_defaults['show-font-variant'] : false),
      'show_text_shadow' => (isset($arg_defaults['show-text-shadow']) ? $arg_defaults['show-text-shadow'] : false),
      'show_font_size' => (isset($arg_defaults['show-font-size']) ? $arg_defaults['show-font-size'] : false),
      'show_preview' => (isset($arg_defaults['show-preview']) ? $arg_defaults['show-preview'] : false),
      'default' => array(
        'font-family' => (isset($arg_defaults['font-family']) ? $arg_defaults['font-family'] : self::$tyme_options[$arg_defaults['id']]['font-family']),
        'line-height' => '1em',
        'color' => (isset($arg_defaults['color']) ? $arg_defaults['color'] : self::$tyme_options[$arg_defaults['id']]['color']),
        'font-size' => (isset($arg_defaults['font-size']) ? $arg_defaults['font-size'] : (isset($arg_defaults['show-font-size']) && $arg_defaults['show-font-size'] === true ? self::$tyme_options[$arg_defaults['id']]['font-size'] : '')),
      ),
      'desc' => __($arg_defaults['desc'], TYME_SLUG),
    );

    return $args;
  }
}
