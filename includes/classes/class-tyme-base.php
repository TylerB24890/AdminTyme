<?php

namespace Tyme\TymeAdmin\Base;

class Tyme_Base {

  /**
   * The globally accessed name for the Tyme Admin plugin
   *
   * @var string
   */
  public static $tyme_name;

  /**
   * Construct the Tyme Admin plugin base
   */
  public function __construct() {
    self::$tyme_name = __('Tyme Admin', TYME_SLUG);

    if(is_admin())
      $this->run_admin();
  }

  /**
   * Require the init class for Tyme Admin
   *
   * @return void
   */
  private function run_admin() {
    require_once(TYME_INC . 'classes/class-tyme-admin-init.php');
  }
}

new Tyme_Base;
