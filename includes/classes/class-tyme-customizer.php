<?php

namespace Tyme\TymeAdmin\Admin\Customizer;

class Tyme_Customizer {

  public function __construct() {
    $this->register_customizer_settings();
  }

  private function register_customizer_settings() {
    require TYME_INC . 'classes/class-tyme-customizer-settings.php';
    new Tyme_Customizer_Settings;
  }

}
