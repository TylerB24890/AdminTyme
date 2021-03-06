<style>
a,
input,
select {
    transition: none !important;
}

a {
    color: #2980b9;
}

a:hover {
    color: #262626;
    text-decoration: underline
}


a:focus {
    -webkit-box-shadow: none;
    box-shadow: none !important;
}

input[type=number]::-webkit-inner-spin-button,
input[type=number]::-webkit-outer-spin-button {
    opacity: 1;
}

ul,
ol,
dl {
    margin-left: 0;
    margin-bottom: 0;
}


/* admin menus */

#adminmenu,
#adminmenuback,
#adminmenuwrap,
#adminmenu .wp-submenu {
    background: #2c3e50;
    width: 200px;
}

#adminmenu .wp-submenu li.current {
    border-bottom: 1px solid rgba(255, 255, 255, 0.05)
}

#adminmenu .wp-submenu li.current,
#adminmenu .wp-submenu li:hover {
    background-color: rgba(0, 0, 0, 0.25)
}

#wpcontent,
#wpfooter {
    margin-left: 200px
}

#adminmenu .wp-submenu {
    left: 200px
}

#adminmenu a {
    color: white;
}

#adminmenu div.wp-menu-name {
    font-weight: 300;
    font-size: 14px;
}

#adminmenu .wp-has-current-submenu .wp-submenu,
#adminmenu .wp-has-current-submenu.opensub .wp-submenu,
#adminmenu .wp-submenu,
#adminmenu a.wp-has-current-submenu:focus+.wp-submenu,
.folded #adminmenu .wp-has-current-submenu .wp-submenu,
#wpadminbar .menupop .ab-sub-wrapper,
#wpadminbar .shortlink-input {
    background: #1A252F;
    background: rgba(26, 37, 47, 0.88);
}

#adminmenu div.wp-menu-image:before {
    color: #2c3e50;
    text-shadow: -1px -1px 0 #59ABE3, 1px -1px 0 #59ABE3, -1px 1px 0 #59ABE3, 1px 1px 0 #59ABE3;
    transition: none !important;
}

#adminmenu li.menu-top:hover,
#adminmenu li.opensub>a.menu-top,
#adminmenu li>a.menu-top:focus,
#adminmenu .wp-submenu a:focus,
#adminmenu .wp-submenu a:hover,
#adminmenu a:hover,
#adminmenu li.menu-top>a:focus {
    color: #fff !important
}

#adminmenu li.menu-top:hover div.wp-menu-image:before,
#adminmenu li.opensub>a.menu-top div.wp-menu-image:before,
#adminmenu li a:focus div.wp-menu-image:before,
#adminmenu li.opensub div.wp-menu-image:before,
#adminmenu li:hover div.wp-menu-image:before {
    color: white
}

#adminmenu li.current a.menu-top,
#adminmenu li.wp-has-current-submenu .wp-submenu .wp-submenu-head,
#adminmenu li.wp-has-current-submenu a.wp-has-current-submenu,
.folded #adminmenu li.current.menu-top,
#adminmenu li.menu-top:hover,
#adminmenu li.opensub>a.menu-top,
#adminmenu li>a.menu-top:focus {
    color: #fff;
    background: #4183D7;
}

#wpadminbar {
    color: #fff;
    background: #2C3E50;
}

#wp-admin-bar-wp-logo {
    display: none
}


/* plugins */


/* increase contrast */

.plugins .active td,
.plugins .active th,
tr.active + tr.plugin-update-tr .plugin-update,
#contextual-help-back,
.contextual-help-tabs .active,
.contextual-help-tabs .active a,
.contextual-help-tabs .active a:hover,
.theme-overlay .parent-theme {
    background-color: #e3f4f9
}

.alternate,
.striped>tbody>:nth-child(even),
ul.striped>:nth-child(even) {
    background-color: #f0f0f0
}

.alternate,
.striped>tbody>:nth-child(odd),
ul.striped>:nth-child(odd) {
    background-color: #fff
}


/* dashboard */

#rg_forms_dashboard {
    background-color: #728BC5
}

#rg_forms_dashboard a {
    color: white
}

#rg_forms_dashboard a:hover {
    color: white;
    text-decoration: underline;
}

input,
input.small-text,
select {
    padding: 8px;
}

select:focus,
input[type=text]:focus,
input[type=password]:focus,
input[type=email]:focus,
input[type=number]:focus,
input[type=tel]:focus,
input[type=url]:focus,
input[type=search]:focus,
#titlediv #title:focus {
    box-shadow: none;
}

input[type=checkbox]:focus {
    box-shadow: none;
    outline: none;
}

select {
    cursor: pointer;
}

.wp-admin select {
    height: 36px;
    line-height: 36px;
}

.wrap .add-new-h2 {
    background: #ff6669;
    color: white;
}

.wrap .add-new-h2:active {
    background: #333
}

.wrap .add-new-h2:hover {
    background: #ddd
}

.search-box input[name="s"],
.tablenav .search-plugins input[name="s"],
.tagsdiv .newtag {
    height: 36px
}


/* buttons */

.wp-core-ui .button,
.wp-core-ui .button-secondary {
    display: inline-block;
    padding: 10px 20px;
    color: #555;
    text-align: center;
    text-decoration: none;
    border-radius: 4px;
    background: white;
    border: 1px solid #ddd;
    cursor: pointer;
    box-sizing: border-box;
    box-shadow: none !important;
    height: auto;
    line-height: 1;
}

.wp-core-ui .button-primary {
    color: #FFF;
    background-color: #33C3F0;
    border-color: #33C3F0;
    text-shadow: 1px 1px 0 rgba(0, 0, 0, 0.05)
}

.wp-core-ui .welcome-panel .button.button-hero {
    padding: 12px 22px;
}

input#publish {
    border-radius: 150px;
}


/* Spacing
============================================
*/

.tablenav {
    height: auto;
}

</style>
