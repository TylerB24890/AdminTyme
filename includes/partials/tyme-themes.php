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
<div id="<?php echo TYME_SLUG; ?>" class="admin themes">
  <div class="wrap">
    <h1>
      <?php _e(Tyme::$tyme_name . ' - Default Themes', TYME_SLUG); ?>
    </h1>

    <div class="overview">
      <h3>
        <?php _e('Enable one of our beautiful pre-built themes and then customize it through the <a href="?page=' . TYME_SLUG . '-customizer">Admin Tyme Customizer</a>.', TYME_SLUG); ?>
      </h3>
    </div>

    <div class="errors">
      <?php settings_errors(); ?>
    </div>

    <div class="tyme-container">
      <form method="post" action="options.php">
        <?php

        //settings_fields( 'tyme-theme-choice' );
        //do_settings_sections( 'tyme-theme-section' );

        submit_button();

        ?>
      </form>
    </div>
  </div>
</div>
