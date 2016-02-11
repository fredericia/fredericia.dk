<?php
/**
 * @file
 * region--sidebar.tpl.php
 *
 * Default theme implementation to display the "sidebar_first" and
 * "sidebar_second" regions.
 *
 * Available variables:
 * - $content: The content for this region, typically blocks.
 * - $attributes: String of attributes that contain things like classes and ids.
 * - $content_attributes: The attributes used to wrap the content. If empty,
 *   the content will not be wrapped.
 * - $region: The name of the region variable as defined in the theme's .info
 *   file.
 * - $page: The page variables from bootstrap_process_page().
 *
 * Helper variables:
 * - $is_admin: Flags true when the current user is an administrator.
 * - $is_front: Flags true when presented in the front page.
 * - $logged_in: Flags true when the current user is a logged-in member.
 *
 * @see bootstrap_preprocess_region().
 * @see bootstrap_process_page().
 *
 * @ingroup themeable
 */
?>
  <footer class="region region_footer lcontainer-fluid">
    <div class="lcontainer-fluid clearfix"  id="footer-menu">
      <div class="container footer-menu">
        <div class="row">

      <?php if ($content_attributes): ?><div<?php print $content_attributes; ?>><?php endif; ?>
      <?php print $content; ?>
      <?php if ($content_attributes): ?></div><?php endif; ?>
      </div>
      </div>
    </div>
    <!-- footer contacts social-icons -->
    <div class="lcontainer-fluid clearfix" id="footer-contacts">
      <div class="container">
        <div class="row">
        <div class="col-md-3 col-xs-12 col-sm-6 col-md-push-9 col-sm-push-6 social-icons">

        </div>
        <div class="col-md-9 col-sm-6 col-xs-12 col-md-pull-3 col-sm-pull-6">
          <div class='footer-logo'>
            <img id="footer-logo" src="/<?php print drupal_get_path('theme','fredericia'); ?>/images/fredericia_logo.png" title="<?php print $page['site_name'] ?>" />

          </div>
        </div>
        <div class="col-md-12 col-sm-12 col-xs-12 footer-address">
          <span>Gothersgade 20 ∙ 5700 Fredericia Kommune ∙ Telefon  7210 7000 ∙ Mail <a href="mailto:kommunen@fredericia.dk" target="_blank">Mail: kommunen@fredericia.dk</a></span>
          <a href="/kontakt" title="Kontakt kommunen">Se kontakt og åbningstider her</a>
        </div>
        </div>
      </div>
    </div>
    <!-- footer bg-image -->
    <div class="lcontainer-fluid clearfix footer-bg-image">

    </div>
  </footer>
