<?php
/**
 * Plugin Name: Tyme Admin
 * Plugin URI:  https://tylerb.me
 * Description: Customize your WordPress Admin with your own color schemes or customize a pre-built theme provided.
 * Version:     0.1.0
 * Author:      Tyler Bailey
 * Author URI:  https://tylerb.me
 * Text Domain: tyme
 * Domain Path: /languages
 * License:     GPL-2.0+
 */

/**
 * Copyright (c) 2018 Tyler Bailey (email : tylerb.media@gmail.com)
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License, version 2 or, at
 * your discretion, any later version, as published by the Free
 * Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */

// Useful global constants
define( 'TYME_VERSION', '0.1.0' );
define( 'TYME_URL',     plugin_dir_url( __FILE__ ) );
define( 'TYME_PATH',    dirname( __FILE__ ) . '/' );
define( 'TYME_INC',     TYME_PATH . 'includes/' );
define( 'TYME_SLUG', 'tyme' );

// Include files
require_once TYME_INC . 'functions/core.php';

// Activation/Deactivation
register_activation_hook( __FILE__, '\Tyme\TymeAdmin\Core\activate' );
register_deactivation_hook( __FILE__, '\Tyme\TymeAdmin\Core\deactivate' );

// Bootstrap
Tyme\TymeAdmin\Core\setup();
