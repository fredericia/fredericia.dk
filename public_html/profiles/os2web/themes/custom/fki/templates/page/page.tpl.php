<!-- Begin - outer wrapper -->
<div class="outer-wrapper">

  <!-- Begin - sidebar left -->
  <div class="sidebar sidebar-left">

    <!-- Begin - inner wrapper -->
    <div class="sidebar-inner-wrapper">

      <!-- Begin - logo -->
      <div class="sidebar-logo">
        <a href="<?php echo $front_page; ?>" class="sidebar-logo-link">
          <img src="<?php echo $path_img.'/logo-sidebar-wide.png'; ?>" class="sidebar-logo-image sidebar-logo-image-wide" alt="<?php echo $site_name.t(' logo'); ?>" />
          <img src="<?php echo $path_img.'/logo-sidebar-narrow.png'; ?>" class="sidebar-logo-image sidebar-logo-image-narrow" alt="<?php echo $site_name.t(' logo'); ?>" />
        </a>
      </div>
      <!-- End - logo -->

      <?php if (isset($sidebar_secondary)): ?>
        <!-- Begin - navigation -->
        <?php echo render($sidebar_secondary); ?>
        <!-- End - navigation -->
      <?php endif; ?>

      <?php if (isset($sidebar_primary)): ?>
        <!-- Begin - navigation -->
        <?php echo render($sidebar_primary); ?>
        <!-- End - navigation -->
      <?php endif; ?>

    </div>
    <!-- End - inner wrapper -->

  </div>
  <!-- End - sidebar left -->

  <!-- Begin - inner wrapper -->
  <div class="inner-wrapper" role="document">

    <!-- Begin - simple navigation -->
    <nav class="simple-navigation">

      <!-- Begin - button list -->
      <ul class="simple-navigation-list simple-navigation-list-left">

        <!-- Begin - button -->
        <li class="simple-navigation-button">
          <a href="#" data-sidebar-toggle="left">
            <span class="fa icon fa-bars"></span> </a>
        </li>
        <!-- End - button -->

      </ul>
      <!-- End - button list -->

      <!-- Begin - logo -->
      <a href="<?php echo $front_page; ?>" class="simple-navigation-logo-link">
        <img src="<?php echo $path_img.'/logo-simple-navigation.png'; ?>" class="simple-navigation-logo-image" alt="<?php echo t('intranet.fredericia.dk logo'); ?>" />
      </a>
      <!-- End - logo -->

    </nav>
    <!-- End - simple navigation -->

    <!-- Begin - content -->
    <div class="content">

      <!-- Begin - main navigation -->
      <nav class="main-navigation-wrapper">
        <section class="main-navigation-bar">
          <div class="container">
            <div class="row">

              <!-- Begin - content -->
              <div class="col-md-4 text-center">
                <a href="<?php echo $front_page; ?>" class="main-navigation-logo-link">
                  <img src="<?php echo $path_img; ?>/logo-main-navigation.png" alt="" class="main-navigation-logo-image">
                </a>
              </div>
              <!-- End - content -->

              <?php if (isset($content['field_title'])): ?>
                <!-- Begin - title -->
                <div class="loop-accordion-title">
                  <?php echo render($content['field_title']); ?>
                </div>
                <!-- End - title -->
              <?php endif; ?>

              <!-- Begin - content -->
              <?php if (isset($main_navigation_secondary)): ?>
                <div class="col-md-8 main-navigation-right">

                  <!-- Begin - navigation -->
                  <?php echo render($main_navigation_secondary); ?>
                  <!-- End - navigation -->

                </div>
              <?php endif; ?>
              <!-- End - content -->

            </div>
          </div>
        </section>
      </nav>
      <!-- End - main navigation -->

      <?php if (!empty($page['help'])): ?>
        <?php echo render($page['help']); ?>
      <?php endif; ?>

      <a id="main-content"></a>

      <?php if (!panels_get_current_page_display()): ?>
        <div class="container">
          <div class="os2-box">
            <div class="os2-box-body">
              <?php echo render($page['content']); ?>
            </div>
          </div>
        </div>
      <?php else: ?>
        <?php echo render($page['content']); ?>
      <?php endif; ?>

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
                    <?php echo render($page['footer_top_first']); ?>
                  </div>
                </div>
              <?php endif; ?>

              <?php if (!empty($page['footer_top_second'])): ?>
                <div class="col-xs-12 col-sm-6 col-md-3">
                  <div class="footer-top-content">
                    <?php echo render($page['footer_top_second']); ?>
                  </div>
                </div>
              <?php endif; ?>

              <?php if (!empty($page['footer_top_tertiary'])): ?>
                <div class="col-xs-12 col-sm-6 col-md-3">
                  <div class="footer-top-content">
                    <?php echo render($page['footer_top_tertiary']); ?>
                  </div>
                </div>
              <?php endif; ?>

              <?php if (!empty($page['footer_top_quaternary'])): ?>
                <div class="col-xs-12 col-sm-6 col-md-3">
                  <div class="footer-top-content">
                    <?php echo render($page['footer_top_quaternary']); ?>
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
                <a href="<?php echo $front_page; ?>" class="footer-bottom-logo-link">
                  <img src="<?php echo $path_img; ?>/logo-footer.png" alt="" class="footer-bottom-logo-image">
                </a>
              </div>
            </div>

            <div class="col-xs-12 col-sm-6 text-center text-right-sm">
              <div class="footer-bottom-content">
                <p><?php echo t('Made with love by a father to a diabetes-child'); ?> <span class="icon fa fa-heart"></span></p>
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
