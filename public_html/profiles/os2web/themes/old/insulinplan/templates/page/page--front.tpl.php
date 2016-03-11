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
                      <h3 class="os2-screen-content-sub-title"><?php print t('Been here before?'); ?></h3>
                      <h1 class="os2-screen-content-title"><?php print t('Sign into your account'); ?></h1>
                    </div>
                    <div class="os2-screen-content-action">
                      <?php print l(t('Sign in now'), 'user/login', array('attributes' => array('class' => array('btn', 'btn-secondary', 'btn-loader')))); ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xs-12 col-sm-6 os2-screen os2-screen-variant-secondary">
            <div class="table">
              <div class="table-row">
                <div class="table-cell">
                  <div class="os2-screen-content os2-screen-content-limited-width">
                    <div class="os2-screen-content-heading">
                      <h3 class="os2-screen-content-sub-title"><?php print t('Want to join?'); ?></h3>
                      <h1 class="os2-screen-content-title"><?php print t('Create a <strong>free</strong> account'); ?></h1>
                    </div>
                    <div class="os2-screen-content-action">
                      <?php print l(t('Create an account'), 'user/register', array('attributes' => array('class' => array('btn', 'btn-primary', 'btn-loader')))); ?>
                    </div>
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
