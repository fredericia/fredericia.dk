<?php if ($view_mode == 'list'): ?>
  <!-- node--patient--list.tpl.php -->
  <!-- Begin - teaser -->
  <article id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> os2-node-list os2-node-list-patient"<?php print $attributes; ?>>

    <!-- Begin - body -->
    <div class="os2-node-list-body">
      <div class="table">
        <div class="table-row">

          <?php if (isset($content['field_profile_image'])): ?>
            <!-- Begin - image -->
            <div class="table-cell os2-node-list-profile-image">
              <?php print render($content['field_profile_image']); ?>
            </div>
            <!-- End - image -->
          <?php endif; ?>

          <?php if (isset($patient_full_name)): ?>
            <div class="table-cell">

              <!-- Begin - patient -->
              <div class="os2-node-list-patient">

                <!-- Begin - full name -->
                <div class="os2-node-list-full-name">
                  <?php print l($patient_full_name, $node_url); ?>
                </div>
                <!-- End - full name -->

                <?php if (isset($content['field_treatment_center'])): ?>
                  <!-- Begin - treatment center -->
                  <div class="os2-node-list-treatment-center">
                    <?php print render($content['field_treatment_center']); ?>
                  </div>
                  <!-- End - treatment center -->
                <?php endif; ?>

              </div>
              <!-- End - patient -->

            </div>
          <?php endif ?>

        </div>
      </div>
    </div>
    <!-- End - body -->

  </article>
  <!-- End - teaser -->

<?php endif; ?>
