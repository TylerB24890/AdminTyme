<?php

namespace Tyme\TymeAdmin\Admin\Styles;

class Tyme_Styles {

  public function __construct() {

  }

  /**
   * Includes the admin theme stylesheet
   */
  public static function set_admin_theme() {
    include_once(TYME_INC . 'partials/stylesheet.css.php');
  }

  /**
   * Loads the theme styles from the options table
   *
   * @return array Array of styles/selectors for wp-admin
   */
  public static function get_theme_styles() {

    $styles = array();

  	foreach(\Tyme\TymeAdmin\Base\Tyme_Base::$tyme_options as $option => $value) {
  		$styles[$option] = get_option($option);
  	}

    return $styles;
  }
}
