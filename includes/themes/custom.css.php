<?php
namespace Tyme\TymeAdmin\Admin\Themes;
use \Tyme\TymeAdmin\Core\Tyme_Settings as Settings;

$styles = Settings::get_tyme_options();
$defaults = Settings::$tyme_options;
?>

<style>

/** ADMIN BODY **/
body {
  background: <?php echo $styles['background']; ?>;
  color: <?php echo $styles['body-font']['color']; ?>;
  font-family: <?php echo $styles['body-font']['font-family']; ?>;
  font-size: <?php echo $styles['body-font']['font-size']; ?>;
}

/** FONT STYLES **/
p,
p.description {
  color: <?php echo $styles['body-font']['color']; ?>;
  font-family: <?php echo $styles['body-font']['font-family']; ?>;
  font-size: <?php echo $styles['body-font']['font-size']; ?>;
}

div.postbox p,
div.options-container p {
  color: #000;
}

.wrap > h1,
.wrap > h2,
.wrap > h3 {
  color: <?php echo $styles['header-font']['color']; ?>;
  font-family: <?php echo $styles['header-font']['font-family']; ?>;
}

#wpcontent a:not(.nav-tab):not(.button):not(.ab-item):not(.page-title-action),
#wpfooter a {
  color: <?php echo $styles['link-color']; ?>;
  text-decoration: <?php echo $styles['link-text-decoration'];  ?>;
}

#wpcontent a:not(.nav-tab):not(.ab-item):not(.button):not(.page-title-action):focus,
#wpfooter a:focus,
#wpcontent a:not(.nav-tab):not(.ab-item):not(.button):not(.page-title-action):hover,
#wpfooter a:hover,
#wpcontent a:not(.nav-tab):not(.ab-item):not(.button):not(.page-title-action):active,
#wpfooter a:active, {
  color: <?php echo adjust_color($styles['link-color'], 20); ?>;
}

#wpadminbar {
  background-color: <?php echo $styles['admin-bar-background']; ?>;
}

#wpadminbar .ab-item:before,
#wpadminbar .ab-icon:before {
  color: <?php echo $styles['admin-bar-font']['color']; ?>;
}

#wpadminbar a.ab-item,
#wpadminbar > #wp-toolbar span.ab-label {
  color: <?php echo $styles['admin-bar-font']['color']; ?>;
  font-family: <?php echo $styles['admin-bar-font']['font-family']; ?>;
}

/** ADMIN MENUS **/
#adminmenu,
#adminmenuback,
#adminmenuwrap,
#adminmenu .wp-submenu {
    background: <?php echo $styles['nav-background']; ?>;
}

#adminmenu .wp-submenu li.current,
#adminmenu .wp-submenu li:hover {
    background-color: <?php echo adjust_color($styles['nav-background'], 20); ?>;
}

a,
input,
select {
    transition: none !important;
}


a:focus {
    -webkit-box-shadow: none;
    box-shadow: none !important;
}

#adminmenu a,
#adminmenu .wp-submenu a {
    color: <?php echo $styles['nav-font']['color']; ?>;
    font-family: <?php echo $styles['nav-font']['font-family']; ?>;
}

#adminmenu .wp-has-current-submenu .wp-submenu,
#adminmenu .wp-has-current-submenu.opensub .wp-submenu,
#adminmenu .wp-submenu,
#adminmenu a.wp-has-current-submenu:focus+.wp-submenu,
.folded #adminmenu .wp-has-current-submenu .wp-submenu,
#wpadminbar .menupop .ab-sub-wrapper,
#wpadminbar .shortlink-input {
    background: <?php echo adjust_color($styles['nav-background'], 20); ?>;
}

#adminmenu div.wp-menu-image:before {
    color: <?php echo adjust_color($styles['nav-font']['color'], 20); ?>;
    transition: none !important;
}

#adminmenu li.menu-top:hover,
#adminmenu li.opensub>a.menu-top,
#adminmenu li>a.menu-top:focus,
#adminmenu .wp-submenu a:focus,
#adminmenu .wp-submenu a:hover,
#adminmenu a:hover,
#adminmenu li.menu-top>a:focus,
#adminmenu .wp-submenu li.current a,
#adminmenu .wp-submenu li.current a:focus,
#adminmenu .wp-submenu li.current a:hover {
    color: <?php echo $styles['nav-link-active-color']; ?>;
}

#adminmenu .current div.wp-menu-image:before,
#adminmenu .wp-has-current-submenu div.wp-menu-image:before,
#adminmenu li.menu-top:hover div.wp-menu-image:before,
#adminmenu li.opensub>a.menu-top div.wp-menu-image:before,
#adminmenu li a:focus div.wp-menu-image:before,
#adminmenu li.opensub div.wp-menu-image:before,
#adminmenu li:hover div.wp-menu-image:before {
    color: <?php echo $styles['nav-link-active-color']; ?>;
}

#adminmenu li.current a.menu-top,
#adminmenu li.wp-has-current-submenu .wp-submenu .wp-submenu-head,
#adminmenu li.wp-has-current-submenu a.wp-has-current-submenu,
.folded #adminmenu li.current.menu-top,
#adminmenu li.menu-top:hover,
#adminmenu li.opensub>a.menu-top,
#adminmenu li>a.menu-top:focus {
    color: <?php echo $styles['nav-link-active-color']; ?> ;
    background: <?php echo adjust_color($styles['nav-background'], 20); ?>;
}
</style>
