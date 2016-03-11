<?php

/**
 * Implements theme_preprocess_html().
 */
function fki_preprocess_html(&$variables) {
  $theme_path = path_to_theme();

  // Add conditional stylesheets
  drupal_add_css($theme_path . '/dist/css/stylesheet.css', array(
    'group' => CSS_THEME,
  ));
  drupal_add_js($theme_path . '/dist/js/modernizr.js', array(
    'group' => JS_LIBRARY,
  ));
  drupal_add_js($theme_path . '/dist/js/app.js', array(
    'group' => JS_THEME,
  ));
  drupal_add_js($theme_path . '/dist/js/ie9.js', array(
    'group' => JS_THEME,
    'browsers' => array('IE' => 'lte IE 9', '!IE' => FALSE),
  ));

  // Add out fonts from Google Fonts API.
  drupal_add_html_head(array(
    '#tag' => 'link',
    '#attributes' => array(
      'href' => 'https://fonts.googleapis.com/css?family=Raleway:300,400,600,700',
      'rel' => 'stylesheet',
      'type' => 'text/css',
    ),
  ), 'google_font_fki');

  // Footer
  if (theme_get_setting('footer_attached')) {
    $variables['classes_array'][] = 'footer-attached';
  }
  if (theme_get_setting('footer_below')) {
    $variables['classes_array'][] = 'footer-below';
  }

  // Body classes
  $variables['classes_array'][] = 'simple-navigation-enabled-xs';
  $variables['classes_array'][] = 'simple-navigation-sticky';

  $variables['classes_array'][] = 'main-navigation-enabled-md';
  $variables['classes_array'][] = 'main-navigation-enabled-lg';

  // Load jQuery UI
  drupal_add_library('system', 'ui');
}

/*
 * Implements theme_preprocess_page().
 */
function fki_preprocess_page(&$variables) {

  // Tabs
  $variables['tabs_primary'] = $variables['tabs'];
  $variables['tabs_secondary'] = $variables['tabs'];
  unset($variables['tabs_primary']['#secondary']);
  unset($variables['tabs_secondary']['#primary']);
}

/**
 * Implements template_preprocess_node.
 */
function fki_preprocess_node(&$variables) {
  $node = $variables['node'];

  // Optionally, run node-type-specific preprocess functions, like
  // foo_preprocess_node_page() or foo_preprocess_node_story().
  $function_node_type = __FUNCTION__ . '__' . $node->type;
  $function_view_mode = __FUNCTION__ . '__' . $variables['view_mode'];
  if (function_exists($function_node_type)) {
    $function_node_type($variables);
  }
  if (function_exists($function_view_mode)) {
    $function_view_mode($variables);
  }

  // Patient
  if ($patient_information = _patient_get_raw_information($node->nid)) {

    if (isset($patient_information['full_name'])) {
      $variables['patient_full_name'] = $patient_information['full_name'];
    }
  }
}

/*
 * Implements template_preprocess_comment().
 */
function fki_preprocess_comment(&$variables) {

  // Author
  if ($author_information = bellcom_user_get_raw_information($variables['comment']->uid)) {

    if (isset($author_information['full_name'])) {
      $variables['author_full_name'] = $author_information['full_name'];
    }
  }
}

/*
 * Implements template_node_view_alter().
 */
function fki_node_view_alter(&$build) {
}

/*
 * Full node
 * Implements hook_preprocess_node().
 */
function fki_preprocess_node__full(&$variables) {
}

/*
 * Implements template_preprocess_taxonomy_term().
 */
function fki_preprocess_taxonomy_term(&$variables) {
  $term = $variables['term'];

  // Add taxonomy-term--view_mode.tpl.php suggestions.
  $variables['theme_hook_suggestions'][] = 'taxonomy_term__' . $variables['view_mode'];

  // Make "taxonomy-term--TERMTYPE--VIEWMODE.tpl.php" templates available for terms.
  $variables['theme_hook_suggestions'][] = 'taxonomy_term__' . $variables['vocabulary_machine_name'] . '__' . $variables['view_mode'];

  // Add a class for the view mode.
  $variables['classes_array'][] = 'view-mode-' . $variables['view_mode'];

  // Optionally, run node-type-specific preprocess functions, like
  // foo_preprocess_taxonomy_term_page() or foo_preprocess_taxonomy_term_story().
  $function_taxonomy_term_type = __FUNCTION__ . '__' . $variables['vocabulary_machine_name'];
  $function_view_mode = __FUNCTION__ . '__' . $variables['view_mode'];
  if (function_exists($function_taxonomy_term_type)) {
    $function_taxonomy_term_type($variables);
  }
  if (function_exists($function_view_mode)) {
    $function_view_mode($variables);
  }
}

/*
 * Implements hook_form_alter().
 */
function fki_form_alter(&$form, &$form_state, $form_id) {

  switch ($form_id)  {

    // User login
    case 'user_login':
      break;

    // User registration
    case 'user_register_form':
      break;

    // Measurement
    case 'measurement_node_form':
      break;

    // Patient
    case 'patient_node_form':
      break;
  }
}

/*
 * Implements template_preprocess_button().
 */
function fki_preprocess_button(&$variables) {
  $element = &$variables['element'];

  // Add the base Bootstrap button class.
  $element['#attributes']['class'][] = 'btn-loader';

  // Ensure that all classes are unique, no need for duplicates.
  $element['#attributes']['class'] = array_unique($element['#attributes']['class']);
}

/*
 * Implements template_preprocess_field().
 */
function fki_preprocess_field(&$variables, $hook) {
  $element = $variables['element'];

  if (isset($element['#field_name'])) {

    if ($element['#field_name'] == 'field_profile_image') {
      $variables['classes_array'][] = 'os2-profile-image';

      // Default
      if ($image_style = $element[0]['#image_style']) {

        // Default
        if ($image_style == 'profile_image_default') {
          $variables['classes_array'][] = 'os2-profile-image-default';
        }

        // Mini
        if ($image_style == 'profile_image_mini') {
          $variables['classes_array'][] = 'os2-profile-image-mini';
        }

        // Small
        if ($image_style == 'profile_image_small') {
          $variables['classes_array'][] = 'os2-profile-image-small';
        }

        // Large
        if ($image_style == 'profile_image_large') {
          $variables['classes_array'][] = 'os2-profile-image-large';
        }
      }
    }
  }
}

/*
 * Implements template_form_views_exposed_form_alter().
 */
function fki_form_views_exposed_form_alter(&$form, &$form_state) {
  $view = $form_state['view'];

  // Measurings - table
  if ($view->name == 'measurings' && $view->current_display == 'table') {

    // Blood glucose
    $form['field_blood_glucose_value']['#type'] = 'container';
    $form['field_blood_glucose_value']['#attributes'] = array('class' => array('row'));
    $form['field_blood_glucose_value']['min'] = array(
      '#type' => 'numberfield',
      '#number_type' => 'decimal',
      '#step' => 0.1,
      '#min' => 0,
      '#max' => 39.9,
      '#field_suffix' => 'mmol.',
      '#default_value' => 0,
      '#prefix' => '<div class="col-xs-6">',
      '#suffix' => '</div>',
    );
    $form['field_blood_glucose_value']['max'] = array(
      '#type' => 'numberfield',
      '#number_type' => 'decimal',
      '#step' => 0.1,
      '#min' => 0,
      '#max' => 39.9,
      '#field_suffix' => 'mmol.',
      '#default_value' => 39.9,
      '#prefix' => '<div class="col-xs-6">',
      '#suffix' => '</div>',
    );

    // Ingested carbohydrate
    $form['field_ingested_carbohydrate_value']['#type'] = 'container';
    $form['field_ingested_carbohydrate_value']['#attributes'] = array('class' => array('row'));
    $form['field_ingested_carbohydrate_value']['min'] = array(
      '#type' => 'numberfield',
      '#number_type' => 'decimal',
      '#input_group' => TRUE,
      '#step' => 0.1,
      '#min' => 0,
      '#max' => 500,
      '#field_suffix' => 'kh.',
      '#default_value' => 0,
      '#prefix' => '<div class="col-xs-6">',
      '#suffix' => '</div>',
    );
    $form['field_ingested_carbohydrate_value']['max'] = array(
      '#type' => 'numberfield',
      '#number_type' => 'decimal',
      '#input_group' => TRUE,
      '#step' => 0.1,
      '#min' => 0,
      '#max' => 500,
      '#field_suffix' => 'kh.',
      '#default_value' => 500,
      '#prefix' => '<div class="col-xs-6">',
      '#suffix' => '</div>',
    );

    // Insulin dose
    $form['field_insulin_dose_value']['#type'] = 'container';
    $form['field_insulin_dose_value']['#attributes'] = array('class' => array('row'));
    $form['field_insulin_dose_value']['min'] = array(
      '#type' => 'numberfield',
      '#number_type' => 'decimal',
      '#input_group' => TRUE,
      '#step' => 0.1,
      '#min' => 0,
      '#max' => 500,
      '#field_suffix' => 'i.e.',
      '#default_value' => 0,
      '#prefix' => '<div class="col-xs-6">',
      '#suffix' => '</div>',
    );
    $form['field_insulin_dose_value']['max'] = array(
      '#type' => 'numberfield',
      '#number_type' => 'decimal',
      '#input_group' => TRUE,
      '#step' => 0.1,
      '#min' => 0,
      '#max' => 500,
      '#field_suffix' => 'i.e.',
      '#default_value' => 39.9,
      '#prefix' => '<div class="col-xs-6">',
      '#suffix' => '</div>',
    );

    // Long acting insulin
    $form['field_long_acting_insulin_value']['#type'] = 'radios';
    $form['field_long_acting_insulin_value']['#prefix'] = '<div class="radio-inline">';
    $form['field_long_acting_insulin_value']['#suffix'] = '</div>';
    unset($form['field_long_acting_insulin_value']['#size']);
  }
}

function fki_menu_local_action($variables) {
  $link = $variables['element']['#link'];

  $options = isset($link['localized_options']) ? $link['localized_options'] : array();

  // If the title is not HTML, sanitize it.
  if (empty($options['html'])) {
    $link['title'] = check_plain($link['title']);
  }

  $icon = _bootstrap_iconize_text($link['title']);

  // Format the action link.
  $output = '';
  if (isset($link['href'])) {
    // Turn link into a mini-button and colorize based on title.
    if (!isset($options['attributes']['class'])) {
      $options['attributes']['class'] = array();
    }
    $string = is_string($options['attributes']['class']);
    if ($string) {
      $options['attributes']['class'] = explode(' ', $options['attributes']['class']);
    }
    $options['attributes']['class'][] = 'btn';
    $options['attributes']['class'][] = 'btn-tertiary';
    $options['attributes']['class'][] = 'btn-loader';
    if ($string) {
      $options['attributes']['class'] = implode(' ', $options['attributes']['class']);
    }
    // Force HTML so we can render any icon that may have been added.
    $options['html'] = !empty($options['html']) || !empty($icon) ? TRUE : FALSE;
    $output .= l($icon . $link['title'], $link['href'], $options);
  }
  else {
    $output .= $icon . $link['title'];
  }

  return $output;
}

/*
 * Implements theme_preprocess_node().
 */
function fki_preprocess_patient_summary(&$variables) {
}

function fki_date_combo($variables) {
  return theme('form_element', $variables);
}
