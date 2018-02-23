<?php

namespace Tyme\TymeAdmin\Admin\Themes;

class Tyme_Themes {

  protected static $active_theme;

  public function __construct() {
    self::$active_theme = $this->get_active_theme();
  }

  /**
   * Includes the admin theme stylesheet
   */
  public static function set_admin_theme() {
    include(TYME_INC . 'themes/custom.css.php');
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
