<?php

namespace Tyme\TymeAdmin\Admin\Themes;

class Tyme_Themes {

  public function __construct() {
    $this->register_theme_settings();
  }

  private function register_theme_settings() {
    require TYME_INC . 'classes/class-tyme-themes-settings.php';
    new Tyme_Themes_Settings;
  }
}
