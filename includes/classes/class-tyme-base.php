<?php

namespace Tyme\TymeAdmin\Base;

class Tyme_Base {

  /**
   * The globally accessed name for the Tyme Admin plugin
   *
   * @var string
   */
  public static $tyme_name, $tyme_options;

  /**
   * Construct the Tyme Admin plugin base
   */
  public function __construct() {
    self::$tyme_name = __('Tyme Admin', TYME_SLUG);

    /*
    self::$tyme_options = array(
    	'tyme-background' => '#f1f1f1',
    	'tyme-font-family' => '-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen-Sans,Ubuntu,Cantarell,"Helvetica Neue",sans-serif',
    	'tyme-font-color' => '#444',
    	'tyme-font-size' => '13px',
    	'tyme-headers-color' => '#23282d',
    	'tyme-links-color' => '#0073aa',
    	'tyme-links-text-decoration' => 'none',
    	'tyme-links-hover-color' => '#00a0d2',
    	'tyme-links-hover-text-decoration' => 'none',
    	'tyme-nav-background' => '#23282d',
    	'tyme-nav-width' => '160px',
    	'tyme-nav-link-color' => '#eee',
    	'tyme-nav-link-active-color' => '#FFF',
    	'tyme-nav-link-active-background' => '#0073aa',
    	'tyme-nav-icon-color' => 'rgba(240,245,250,.6)',
    	'tyme-nav-icon-active-color' => '#FFF',
    	'tyme-nav-subnav-background' => '#32373c',
    	'tyme-nav-subnav-link-color' => 'rgba(240,245,250,.7)',
    	'tyme-nav-subnav-active-link-color' => '#FFF',
    );*/

    self::$tyme_options = array(
    	'tyme-background' => '#333',
    	'tyme-font-family' => '-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen-Sans,Ubuntu,Cantarell,"Helvetica Neue",sans-serif',
    	'tyme-font-color' => '#DDD',
    	'tyme-font-size' => '13px',
    	'tyme-headers-color' => '#FFF',
    	'tyme-links-color' => '#CCC',
    	'tyme-links-text-decoration' => 'none',
    	'tyme-links-hover-color' => '#00a0d2',
    	'tyme-links-hover-text-decoration' => 'none',
    	'tyme-nav-background' => '#CCC',
    	'tyme-nav-width' => '160px',
    	'tyme-nav-link-color' => '#F8F8F8',
    	'tyme-nav-link-active-color' => '#FFF',
    	'tyme-nav-link-active-background' => '#0073aa',
    	'tyme-nav-icon-color' => 'rgba(240,245,250,.6)',
    	'tyme-nav-icon-active-color' => '#FFF',
    	'tyme-nav-subnav-background' => '#32373c',
    	'tyme-nav-subnav-link-color' => 'rgba(240,245,250,.7)',
    	'tyme-nav-subnav-active-link-color' => '#FFF',
    );

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
    new \Tyme\TymeAdmin\Admin\Tyme_Admin_Init;
  }
}

new Tyme_Base;
