<?php
namespace Tyme\TymeAdmin\Admin\Styles;
$styles = Tyme_Styles::get_theme_styles();
?>

<style>
body {
  background: <?php echo $styles['tyme-background']; ?>;
  color: <?php echo $styles['tyme-font-color']; ?>;
  font-family: <?php echo $styles['tyme-font-family']; ?>;
  font-size: <?php echo $styles['tyme-font-size']; ?>;
}

.wrap > h1 {
  color: <?php echo $styles['tyme-headers-color']; ?>;
}

a {
  color: <?php echo $styles['tyme-links-color']; ?>;
  text-decoration: <?php echo $styles['tyme-links-text-decoration'];  ?>;
}
a:active,
a:hover {
  color: <?php echo $styles['tyme-links-hover-color'];  ?>;
  text-decoration: <?php echo $styles['tyme-links-hover-text-decoration']; ?>;
}

#adminmenu,
#adminmenu .wp-submenu,
#adminmenuback,
#adminmenuwrap {
  background-color: <?php echo $styles['tyme-nav-background']; ?>;
  width: <?php echo $styles['tyme-nav-wdth']; ?>;
}

#adminmenu a {
  color: <?php echo $styles['tyme-nav-link-color']; ?>;
}

#adminmenu li.wp-has-current-submenu a.wp-has-current-submenu {
  background: <?php echo $styles['tyme-nav-link-active-background']; ?>;
  color: <?php echo $styles['tyme-nav-subnav-link-color']; ?>;
}

#adminmenu .wp-has-current-submenu .wp-submenu,
#adminmenu .wp-submenu {
  background-color: <?php echo $styles['tyme-nav-subnav-background']; ?>;
}
#adminmenu .wp-has-current-submenu .wp-submenu a,
#adminmenu .wp-submenu a {
  color: <?php echo $styles['tyme-nav-subnav-link-color']; ?>;
}
#adminmenu .wp-has-current-submenu .wp-submenu li.current a,
#adminmenu .wp-submenu li.current a {
  color: <?php echo $styles['tyme-nav-subnav-active-link-color']; ?>;
}
</style>
