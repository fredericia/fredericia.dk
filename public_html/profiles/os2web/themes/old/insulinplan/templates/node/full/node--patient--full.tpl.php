<?php if ($view_mode == 'full'): ?>
  <!-- node--patient--full.tpl.php -->
  <!-- Begin - full node -->
  <div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> os2-node-full"<?php print $attributes; ?>>

    <?php if (isset($content)): ?>
      <!-- Begin - body -->
      <div class="os2-node-full-body">

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

          </div>
          <!-- End - patient -->
        <?php endif ?>

      </div>
      <!-- End - body -->
    <?php endif; ?>

  </div>
  <!-- End - full node -->
<?php endif; ?>
