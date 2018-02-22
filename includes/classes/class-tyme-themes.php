<?php

namespace Tyme\TymeAdmin\Admin\Themes;
use Tyme\TymeAdmin\Admin\Styles\Tyme_Styles as TymeStyles;

class Tyme_Themes extends TymeStyles {

  protected static $active_theme;

  public function __construct() {
    self::$active_theme = $this->get_active_theme();
  }

  /**
   * Get the styles from the wp options
   *
   * @return array array of styles
   */
  public function get_theme_styles() {
    return $this->build_theme_styles();
  }

  /**
   * Includes the admin theme stylesheet
   */
  public static function set_admin_theme() {
    if(self::$active_theme === 'custom' || self::$active_theme === 'default') {
      include_once(TYME_INC . 'themes/custom.css.php');
    } else {
      include_once(TYME_INC . 'themes/' . self::$active_theme . '.css.php');
    }
  }

  /**
   * Get the currently active theme
   *
   * @return void
   */
  private function get_active_theme() {
    return get_option('tyme-theme');
  }
}
