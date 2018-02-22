<?php

namespace Tyme\TymeAdmin\Admin\Themes;
use Tyme\TymeAdmin\Admin\Styles\Tyme_Styles as TymeStyles;

class Tyme_Themes extends TymeStyles {

  protected $active_theme;

  public function __construct() {
    $this->active_theme = $this->get_active_theme();
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
    include_once(TYME_INC . 'partials/stylesheet.css.php');
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
