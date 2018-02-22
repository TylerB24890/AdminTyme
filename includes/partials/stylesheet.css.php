<?php
namespace Tyme\TymeAdmin\Admin\Styles;
$styles = Tyme_Styles::get_theme_styles();
?>

<style>
body {
  background: <?php echo $styles['body']['background']; ?>;
  color: <?php echo $styles['body']['color']; ?>;
  font-family: <?php echo $styles['body']['font-family']; ?>;
  font-size: <?php echo $styles['body']['font-size']; ?>;
}

h1,
h2,
h3 {
  color: <?php echo $styles['headers']['color']; ?>;
}

a {
  color: <?php echo $styles['links']['color']; ?>;
  text-decoration: <?php echo $styles['links']['text-decoration']; ?>;
}
a:active,
a:hover {
  color: <?php echo $styles['links']['hover']['color']; ?>;
  text-decoration: <?php echo $styles['links']['hover']['text-decoration']; ?>;
}

#adminmenu,
#adminmenu .wp-submenu,
#adminmenuback,
#adminmenuwrap {
  background-color: <?php echo $styles['nav']['background']; ?>;
  width: <?php echo $styles['nav']['width']; ?>;
}

#adminmenu a {
  color: <?php echo $styles['nav']['nav_links']['color']; ?>;
}

#adminmenu li.wp-has-current-submenu a.wp-has-current-submenu {
  background: <?php echo $styles['nav']['nav_links']['active']['background']; ?>;
  color: <?php echo $styles['nav']['nav_links']['active']['color']; ?>;
}

#adminmenu .wp-has-current-submenu .wp-submenu,
#adminmenu .wp-submenu {
  background-color: <?php echo $styles['nav']['subnav']['background']; ?>;
}
#adminmenu .wp-has-current-submenu .wp-submenu a,
#adminmenu .wp-submenu a {
  color: <?php echo $styles['nav']['subnav']['nav_links']['color']; ?>;
}
#adminmenu .wp-has-current-submenu .wp-submenu li.current a,
#adminmenu .wp-submenu li.current a {
  color: <?php echo $styles['nav']['subnav']['nav_links']['active']['color']; ?>;
}

/*
.plugins,
.plugins tr,
.plugins td,
table.widefat {
  background: <?php echo $styles['tables']['background']; ?>;
  border-color: <?php echo $styles['tables']['border-color']; ?>;
  color: <?php echo $styles['tables']['color']; ?>;
}
table.widefat thead tr th,
.widefat p {
  color: <?php echo $styles['tables']['color']; ?>;
}
*/
</style>
