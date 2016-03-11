<?php if (isset($patient_information['member_since_short'])): ?>
  <!-- Begin - member since -->
  <div class="block-patient-body-member-since">
    <?php print t('Member since'); ?>
    <?php print render($patient_information['member_since_short']); ?>
  </div>
  <!-- End - member since -->
<?php endif; ?>

<?php if (isset($patient_information['patient_since_short'])): ?>
  <!-- Begin - patient since -->
  <div class="block-patient-body-patient-since">
    <?php print t('Patient since'); ?>
    <?php print render($patient_information['patient_since_short']); ?>
  </div>
  <!-- End - patient since -->
<?php endif; ?>

<?php if (isset($patient_information['birthdate_short'])): ?>
  <!-- Begin - birthdate -->
  <div class="block-patient-body-birthdate">
    <?php print t('Birthdate'); ?>
    <?php print render($patient_information['birthdate_short']); ?>
  </div>
  <!-- End - birthdate -->
<?php endif; ?>

<?php if (isset($patient_information['diabetes_type'])): ?>
  <!-- Begin - diabetes type -->
  <div class="block-patient-body-birthdate">
    <?php print t('Diabetes type'); ?>
    <?php print render($patient_information['diabetes_type']); ?>
  </div>
  <!-- End - diabetes type -->
<?php endif; ?>

<?php if (isset($patient_information['number_of_measurements'])): ?>
  <!-- Begin - number of measurements -->
  <div class="block-patient-body-number-of-measurements">
    <?php print t('No. of measurements'); ?>
    <?php print render($patient_information['number_of_measurements']); ?>
  </div>
  <!-- End - number of measurements -->
<?php endif; ?>
