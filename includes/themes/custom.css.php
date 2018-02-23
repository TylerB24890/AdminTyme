<?php
namespace Tyme\TymeAdmin\Admin\Themes;

use \Tyme\TymeAdmin\Core\Tyme_Settings as Settings;

$styles = Settings::get_tyme_options();
?>

<style>

body {
  background: <?php echo $styles['admin-tyme_background']; ?>;
  color: <?php echo $styles['admin-tyme_font-color']; ?>;
  font-family: <?php echo $styles['admin-tyme_font-family']; ?>;
  font-size: <?php echo $styles['admin-tyme_font-size']; ?>;
}

.wrap > h1 {
  color: <?php echo $styles['admin-tyme_header-color']; ?>;
}

a {
  color: <?php echo $styles['admin-tyme_link-color']; ?>;
  text-decoration: <?php echo $styles['admin-tyme_link-text-decoration'];  ?>;
}
a:active,
a:hover {
  color: <?php echo $styles['admin-tyme_link-hover-color'];  ?>;
  text-decoration: <?php echo $styles['admin-tyme_link-hover-text-decoration']; ?>;
}

#adminmenu,
#adminmenu .wp-submenu,
#adminmenuback,
#adminmenuwrap {
  background-color: <?php echo $styles['admin-tyme_nav-background']; ?>;
  width: <?php echo $styles['admin-tyme_nav-width']; ?>;
}

#adminmenu a {
  color: <?php echo $styles['admin-tyme_nav-link-color']; ?>;
}

#adminmenu .wp-submenu li.current {
  background: <?php echo $styles['admin-tyme_nav-link-active-background']; ?>;
}

#adminmenu li.wp-has-current-submenu a.wp-has-current-submenu {
  background: <?php echo $styles['admin-tyme_nav-link-active-background']; ?>;
  color: <?php echo $styles['admin-tyme_nav-subnav-link-color']; ?>;
}

#adminmenu .wp-has-current-submenu .wp-submenu,
#adminmenu .wp-has-current-submenu.opensub .wp-submenu,
#adminmenu a.wp-has-current-submenu:focus+.wp-submenu,
.folded #adminmenu .wp-has-current-submenu .wp-submenu,
#wpadminbar .menupop .ab-sub-wrapper,
#wpadminbar .shortlink-input,
#adminmenu .wp-submenu {
  background-color: <?php echo $styles['admin-tyme_nav-subnav-background']; ?>;
}
#adminmenu .wp-has-current-submenu .wp-submenu a,
#adminmenu .wp-submenu a {
  color: <?php echo $styles['admin-tyme_nav-subnav-link-color']; ?>;
}
#adminmenu .wp-has-current-submenu .wp-submenu li.current a,
#adminmenu .wp-submenu li.current a {
  color: <?php echo $styles['admin-tyme_nav-subnav-active-link-color']; ?>;
}
</style>
