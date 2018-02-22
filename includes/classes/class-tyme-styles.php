<?php

namespace Tyme\TymeAdmin\Admin\Styles;

class Tyme_Styles {

  public function __construct() {

  }

  /**
   * Loads the theme styles from the options table
   *
   * @return array Array of styles/selectors for wp-admin
   */
  protected function build_theme_styles() {

    $styles = array();

  	foreach(\Tyme\TymeAdmin\Base\Tyme_Base::$tyme_options as $option => $value) {
      $styles[$option] = get_option($option);
  	}

    return $styles;
  }
}
