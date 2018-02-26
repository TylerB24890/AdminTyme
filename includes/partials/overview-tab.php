<?php
namespace Tyme\TymeAdmin\Core;

/**
 * Return the Admin Tyme 'Overview' tab content
 * @return string output buffer of HTML
 */
function return_overview_tab() {
  ob_start();
?>
  <div class="tyme-container">
    <h1>Admin Tyme</h1>
    <h3>Bring your dashboard to life.</h3>
  </div>
<?php
  return ob_get_clean();
}
