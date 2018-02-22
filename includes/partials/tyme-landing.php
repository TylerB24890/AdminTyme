<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://tylerb.me
 * @since      1.0.0
 *
 * @package    tyme-admin
 * @subpackage tyme-admin/admin/partials
 */

namespace Tyme\TymeAdmin\Admin;
use Tyme\TymeAdmin\Base\Tyme_Base as Tyme;
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div id="<?php echo TYME_SLUG; ?>" class="admin landing">
  <div class="wrap">
    <h1>
      <?php _e(Tyme::$tyme_name, TYME_SLUG); ?>
    </h1>
    <div class="overview">
      <p>
        <?php _e('Tyme Admin allows you to customize your wp-admin experience to your specifications. Vist the <a href="?page=' . TYME_SLUG . '-customizer">Admin Tyme Customizer</a> to change your admin color schemes, font families, icons and more! Or, enable one of the themes provided for you and customize it to your needs.', TYME_SLUG); ?>
      </p>
    </div>
  </div>
</div>
