<?php
namespace Tyme\TymeAdmin\Admin\Themes;
use \Tyme\TymeAdmin\Core\Tyme_Settings as Settings;

$styles = Settings::get_tyme_options();

?>

<style>

body {
  background: <?php echo $styles['background']; ?>;
  color: <?php echo $styles['body-font']['color']; ?>;
  font-family: <?php echo $styles['body-font']['font-family']; ?>;
  font-size: <?php echo $styles['body-font']['font-size']; ?>;
}

p,
p.description {
  color: <?php echo $styles['body-font']['color']; ?>;
  font-family: <?php echo $styles['body-font']['font-family']; ?>;
  font-size: <?php echo $styles['body-font']['font-size']; ?>;
}

.wrap > h1,
.wrap > h2,
.wrap > h3 {
  color: <?php echo $styles['header-font']['color']; ?>;
}

.wrap a {
  color: <?php echo $styles['link-color']; ?>;
  text-decoration: <?php echo $styles['link-text-decoration'];  ?>;
}
.wrap a:active,
.wrap a:hover {
  color: <?php echo $styles['link-hover-color'];  ?>;
  text-decoration: <?php echo $styles['link-hover-text-decoration']; ?>;
}

#wpadminbar {
  background-color: <?php echo $styles['admin-bar-background']; ?>;
}

#adminmenu,
#adminmenu .wp-submenu,
#adminmenuback,
#adminmenuwrap {
  background-color: <?php echo $styles['nav-background']; ?>;
  width: <?php echo $styles['nav-width']; ?>;
}

#adminmenu a {
  color: <?php echo $styles['nav-link-color']; ?>;
}

#adminmenu .wp-submenu li.current {
  background: <?php echo $styles['nav-link-active-background']; ?>;
}

#adminmenu li.wp-has-current-submenu a.wp-has-current-submenu {
  background: <?php echo $styles['nav-link-active-background']; ?>;
  color: <?php echo $styles['nav-subnav-link-color']; ?>;
}

#adminmenu .wp-has-current-submenu .wp-submenu,
#adminmenu .wp-has-current-submenu.opensub .wp-submenu,
#adminmenu a.wp-has-current-submenu:focus+.wp-submenu,
.folded #adminmenu .wp-has-current-submenu .wp-submenu,
#wpadminbar .menupop .ab-sub-wrapper,
#wpadminbar .shortlink-input,
#adminmenu .wp-submenu {
  background-color: <?php echo $styles['nav-subnav-background']; ?>;
}
#adminmenu .wp-has-current-submenu .wp-submenu a,
#adminmenu .wp-submenu a {
  color: <?php echo $styles['nav-subnav-link-color']; ?>;
}
#adminmenu .wp-has-current-submenu .wp-submenu li.current a,
#adminmenu .wp-submenu li.current a {
  color: <?php echo $styles['nav-subnav-active-link-color']; ?>;
}
</style>
