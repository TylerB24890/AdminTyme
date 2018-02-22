<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://tylerb.me
 * @since      1.0.0
 *
 * @package    Admintyme
 * @subpackage Admintyme/admin/partials
 */

namespace Tyme\TymeAdmin\Admin;
use Tyme\TymeAdmin\Base\Tyme_Base as Tyme;

$active_tab = (isset($_GET['tab']) ? $_GET['tab'] : 'general');
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div id="<?php echo TYME_SLUG; ?>" class="admin customizer">
  <div class="wrap">
    <h1>
      <?php _e(Tyme::$tyme_name . ' - Customizer', TYME_SLUG); ?>
    </h1>

    <div class="overview">
      <h3>
        <?php _e('Change the settings below to your specifications and beautify your WordPress Admin experience.', TYME_SLUG); ?>
      </h3>
    </div>

    <div class="errors">
      <?php settings_errors(); ?>
    </div>

    <h2 class="nav-tab-wrapper">
      <a href="?page=<?php echo TYME_SLUG; ?>-customizer&tab=general" class="nav-tab <?php echo($active_tab === 'general' ? 'nav-tab-active' : ''); ?>"><?php _e('General', TYME_SLUG); ?></a>
      <a href="?page=<?php echo TYME_SLUG; ?>-customizer&tab=dashboard" class="nav-tab <?php echo($active_tab === 'dashboard' ? 'nav-tab-active' : ''); ?>"><?php _e('Dashboard', TYME_SLUG); ?></a>
    </h2>

    <div id="general" class="tyme-container">
    <?php if($active_tab === 'general') : ?>

        <h2><?php _e('Edit Global Admin', TYME_SLUG); ?></h2>

        <form method="post" action="options.php">
          <?php

          settings_fields( 'tyme_custom_general' );
          do_settings_sections( 'tyme_custom_general' );

          submit_button();

          ?>
        </form>

    <?php elseif($active_tab === 'dashboard') : ?>

        <h2><?php _e('Edit Dashboard', TYME_SLUG); ?></h2>

        <form method="post" action="options.php">
          <?php

          settings_fields( 'tyme_custom_dashboard' );
          do_settings_sections( 'tyme_custom_dashboard' );

          submit_button();

          ?>
        </form>

    <?php endif; ?>


  </div>
</div>
