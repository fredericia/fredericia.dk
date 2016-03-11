<?php if ($view_mode == 'teaser'): ?>
  <!-- node--patient--teaser.tpl.php -->
  <!-- Begin - teaser -->
  <article id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> os2-node-teaser os2-box"<?php print $attributes; ?>>

    <!-- Begin - body -->
    <div class="os2-node-teaser-body os2-box-body">
      <div class="row">

        <div class="col-xs-12 text-center-xs-only col-sm-8">

          <?php if (isset($content['field_profile_image'])): ?>
            <!-- Begin - image -->
            <div class="os2-node-teaser-profile-image">
              <?php print render($content['field_profile_image']); ?>
            </div>
            <!-- End - image -->
          <?php endif; ?>

          <?php if (isset($patient_full_name)): ?>
            <!-- Begin - patient -->
            <div class="os2-node-teaser-patient">

              <!-- Begin - full name -->
              <div class="os2-node-teaser-full-name">
                <?php print l($patient_full_name, $node_url); ?>
              </div>
              <!-- End - full name -->

              <?php if (isset($content['field_treatment_center'])): ?>
                <!-- Begin - treatment center -->
                <div class="os2-node-teaser-treatment-center">
                  <?php print render($content['field_treatment_center']); ?>
                </div>
                <!-- End - treatment center -->
              <?php endif; ?>

              <?php if (isset($content['field_diabetes_type'])): ?>
                <!-- Begin - diabetes type -->
                <div class="os2-node-teaser-diabetes-type">
                  <?php print render($content['field_diabetes_type']); ?>
                </div>
                <!-- End - diabetes type -->
              <?php endif; ?>

            </div>
            <!-- End - patient -->
          <?php endif ?>

        </div>
        <div class="col-xs-12 col-sm-4 text-center-xs-only text-right">

          <!-- Begin - action -->
          <div class="os2-node-teaser-action">
            <?php print l(t('Show measurings <span class="icon fa fa-arrow-circle-right"></span>'), 'node/' . $node->nid . '/maalinger', array('html' => TRUE, 'attributes' => array('class' => 'btn btn-primary btn-sm btn-loader'))); ?>
          </div>
          <!-- End - action -->

        </div>
      </div>

    </div>
    <!-- End - body -->

  </article>
  <!-- End - teaser -->

<?php endif; ?>
