<?php

namespace Tyme\TymeAdmin\Admin\Styles;

class Tyme_Styles {

  /**
   * Default wp-admin styles
   * @var array
   */
  public static $default_styles;

  public function __construct() {
    /*
    self::$default_styles = array(
      'body' => array(
        'background' => '#f1f1f1',
        'color' => '#444',
        'font-family' => '-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen-Sans,Ubuntu,Cantarell,"Helvetica Neue",sans-serif',
        'font-size' => '13px',
        'line-height' => '1.4em',
        'min-width' => '600px'
      ),
      'headers' => array(
        'color' => '#23282d'
      ),
      'links' => array(
        'color' => '#0073aa',
        'text-decoration' => 'none',
        'hover' => array(
          'color' => '#00a0d2',
          'text-decoration' => 'none'
        )
      ),
      'nav' => array(
        'width' => '160px',
        'background' => '#23282d',
        'nav_links' => array(
          'color' => '#eee',
          'active' => array(
            'color' => '#FFF',
            'background' => '#0073aa'
          )
        ),
        'subnav' => array(
          'background' => '#32373c',
          'nav_links' => array(
            'color' => 'rgba(240,245,250,.7)',

            'active' => array(
              'color' => '#FFF'
            )
          )
        ),
        'icons' => array(
          'color' => 'rgba(240,245,250,.6)',
          'active' => array(
            'color' => '#FFF'
          )
        )
      ),
      'tables' => array(
        'background' => '#FFF',
        'border-color' => '#e5e5e5',
        'color' => '#32373c'
      ),
    );
    */

    self::$default_styles = array(
      'body' => array(
        'background' => '#333',
        'color' => '#F8F8F8',
        'font-family' => 'Arial,sans-serif',
        'font-size' => '13px',
        'line-height' => '1.4em',
        'min-width' => '600px'
      ),
      'headers' => array(
        'color' => '#FFF'
      ),
      'links' => array(
        'color' => 'red',
        'text-decoration' => 'underline',
        'hover' => array(
          'color' => 'blue',
          'text-decoration' => 'dotted'
        )
      ),
      'nav' => array(
        'width' => '160px',
        'background' => '#CCC',
        'nav_links' => array(
          'color' => '#333',
          'active' => array(
            'color' => '#000',
            'background' => '#F8F8F8'
          )
        ),
        'subnav' => array(
          'background' => '#DDD',
          'nav_links' => array(
            'color' => '#333',

            'active' => array(
              'color' => '#000'
            )
          )
        ),
        'icons' => array(
          'color' => 'rgba(240,245,250,.6)',
          'active' => array(
            'color' => '#FFF'
          )
        )
      ),
      'tables' => array(
        'background' => '#FFF',
        'border-color' => '#e5e5e5',
        'color' => '#32373c'
      ),
    );
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
    $styles = array(
      'body' => array(
        'background' => get_option('tyme-background'),
        'color' => get_option('tyme-font-color'),
        'font-family' => get_option('tyme-font-family'),
        'font-size' => get_option('tyme-font-size')
      ),
      'headers' => array(
        'color' => get_option('tyme-headers-color'),
      ),
      'links' => array(
        'color' => get_option('tyme-links-color'),
        'text-decoration' => get_option('tyme-links-text-decoration'),
        'hover' => array(
          'color' => get_option('tyme-links-hover-color'),
          'text-decoration' => get_option('tyme-links-hover-text-decoration')
        )
      ),
      'nav' => array(
        'background' => get_option('tyme-nav-background'),
        'width' => get_option('tyme-nav-width'),
        'nav_links' => array(
          'color' => get_option('tyme-nav-link-color'),
          'active' => array(
            'color' => get_option('tyme-nav-link-active-color'),
            'background' => get_option('tyme-nav-link-active-background')
          )
        ),
        'subnav' => array(
          'background' => get_option('tyme-nav-subnav-background'),
          'nav_links' => array(
            'color' => get_option('tyme-nav-subnav-link-color'),
            'active' => array(
              'color' => get_option('tyme-nav-subnav-active-link-color')
            )
          )
        ),
        'icons' => array(
          'color' => get_option('tyme-nav-icon-color'),
          'active' => array(
            'color' => get_option('tyme-nav-icon-active-color')
          )
        )
      ),
      /*
      'tables' => array(
        'background' => get_option('tyme-table-background'),
        'border-color' => get_option('tyme-table-border-color'),
        'color' => get_option('tyme-table-color')
      )*/
    );

    return $styles;
  }
}
