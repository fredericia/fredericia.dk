<!-- Begin - outer wrapper -->
<div class="outer-wrapper">

  <!-- Begin - inner wrapper -->
  <div class="inner-wrapper" role="document">

    <!-- Begin - content -->
    <div class="content">

      <!-- Begin - split screen -->
      <div class="os2-split-screen">
        <div class="row">

          <div class="col-xs-12 col-sm-6 os2-screen os2-screen-variant-primary">
            <div class="table">
              <div class="table-row">
                <div class="table-cell">
                  <div class="os2-screen-content os2-screen-content-limited-width">
                    <div class="os2-screen-content-heading">
                      <h1 class="os2-screen-content-title"><?php print t('Absolutely your best friend as a stressed diabethic'); ?></h1>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xs-12 col-sm-6 os2-screen os2-screen-variant-white">
            <div class="table">
              <div class="table-row">
                <div class="table-cell">
                  <div class="os2-screen-content os2-screen-content-limited-width">

                    <a id="main-content"></a>

                    <?php if (!empty($action_links)): ?>
                      <ul class="action-links"><?php print render($action_links); ?></ul>
                    <?php endif; ?>

                    <?php if (!empty($page['help'])): ?>
                      <?php print render($page['help']); ?>
                    <?php endif; ?>

                    <?php print $messages; ?>

                    <div class="os2-screen-content-heading">
                      <h1 class="os2-screen-content-title"><?php print t('Welcome back!'); ?></h1>
                    </div>

                    <!-- Begin - form -->
                    <?php if ($user_login_form = drupal_get_form('user_login')): ?>
                      <?php print render($user_login_form); ?>
                    <?php endif ?>
                    <!-- End - form -->

                    <!-- Begin - sign up -->
                    <?php print l(t('You can also create a new account'), 'user/register'); ?>
                    <!-- End - sign up -->

                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
      <!-- End - split screen -->

    </div>
    <!-- End - content -->

    <!-- Begin - footer -->
    <footer class="footer">

      <?php if (!empty($page['footer_top_first']) || !empty($page['footer_top_second']) || !empty($page['footer_top_tertiary']) || !empty($page['footer_top_quaternary'])): ?>
        <div class="footer-top">
          <div class="container">
            <div class="row">

              <?php if (!empty($page['footer_top_first'])): ?>
                <div class="col-xs-12 col-sm-6 col-md-3">
                  <div class="footer-top-content">
                    <?php print render($page['footer_top_first']); ?>
                  </div>
                </div>
              <?php endif; ?>

              <?php if (!empty($page['footer_top_second'])): ?>
                <div class="col-xs-12 col-sm-6 col-md-3">
                  <div class="footer-top-content">
                    <?php print render($page['footer_top_second']); ?>
                  </div>
                </div>
              <?php endif; ?>

              <?php if (!empty($page['footer_top_tertiary'])): ?>
                <div class="col-xs-12 col-sm-6 col-md-3">
                  <div class="footer-top-content">
                    <?php print render($page['footer_top_tertiary']); ?>
                  </div>
                </div>
              <?php endif; ?>

              <?php if (!empty($page['footer_top_quaternary'])): ?>
                <div class="col-xs-12 col-sm-6 col-md-3">
                  <div class="footer-top-content">
                    <?php print render($page['footer_top_quaternary']); ?>
                  </div>
                </div>
              <?php endif; ?>

            </div>
          </div>
        </div>
      <?php endif; ?>

      <div class="footer-bottom">
        <div class="container">
          <div class="row">

            <div class="col-xs-12 col-sm-6 text-center text-left-sm">
              <div class="footer-bottom-content">
                <a href="#" class="footer-bottom-logo-link">
                  <img src="<?php print $path_img; ?>/logo-footer.png" alt="" class="footer-bottom-logo-image">
                </a>
              </div>
            </div>

            <div class="col-xs-12 col-sm-6 text-center text-right-sm">
              <div class="footer-bottom-content">
                <p><?php print t('Made with love by a father to a diabetes-child'); ?> <span class="icon fa fa-heart"></span></p>
              </div>
            </div>

          </div>
        </div>
      </div>
    </footer>
    <!-- End - footer -->

  </div>
  <!-- End - inner wrapper -->

</div>
<!-- End - outer wrapper -->
