<?php
/**
 * @file
 * template.php
 */

/**
 * Implements template_preprocess_page().
 */
function fredericia_preprocess_page(&$variables) {
  // Install os2web_theme_helper module.
  if (!module_exists('os2web_theme_helper')) {
    module_enable(array('os2web_theme_helper'));
  }

  // Remove all Taxonomy auto listings here.
  $term = NULL;
  if (arg(0) == 'taxonomy' && arg(1) == 'term' && is_numeric(arg(2))) {
    $term = taxonomy_term_load(arg(2));
    $term_name = $term->vocabulary_machine_name;
    unset($variables['page']['content']['system_main']['no_content']);
    // There will not be nodes and other normal term content on terms
    // "os2web_base_tax_site_structure" pages.
    if ($term_name == "os2web_base_tax_site_structure") {
      unset($variables['page']['content']['system_main']['nodes']);
      unset($variables['page']['content']['system_main']['pager']);
    }
    else {
      $view_rendered = os2web_theme_helper_get_view_content('taxonomy_term', 'block_1', array(arg(2)));
      // On Other term pages, there will be a view with nodes.
      $variables['page']['content']['system_main'] = array(
        '#markup' => '<h1>' . $term->name . '</h1>' . $view_rendered,
      );
    }

    // Variable that defines that this term is the top of the hieraki.
    $term_is_top = os2web_theme_helper_check_term_is_top($term->tid);
    // Get wether this is a top term, and provide a variable for the templates.
    $variables['page']['term_is_top'] = $term_is_top;

    if ($term_is_top && $term->vocabulary_machine_name == "os2web_base_tax_site_structure") {
      $variables['page']['sidebar_first'] = array();
    }
  }

  $node = NULL;
  if (isset($variables['node']) && !empty($variables['node']->nid)) {
    $node = $variables['node'];
  }

  $sidebar_second_hidden = FALSE;
  $sidebar_first_hidden = FALSE;

  // If node has hidden the sidebar, set content to null.
  if (($node && $hide_sidebar_field = field_get_items('node', $node, 'field_os2web_hide_sidebar')) ||
      ($term && $hide_sidebar_field = field_get_items('taxonomy_term', $term, 'field_os2web_hide_sidebar'))) {
    if ($hide_sidebar_field[0]['value']) {
      $variables['page']['sidebar_second'] = array();
      $sidebar_second_hidden = TRUE;
    }
  }

  // Get all the nodes selvbetjeningslinks and give them to the template.
  if ($node || $term) {
    $variables['page']['os2web_selfservicelinks'] = os2web_theme_helper_get_selfservicelinks(NULL, $node, $term);
  }

  // Get borger.dk legislation links and give them to the template.
  if (($node && $item = field_get_items('node', $node, 'field_os2web_borger_dk_legislati'))) {
    $variables['page']['os2web_borger_dk_legislation'] = os2web_theme_helper_get_borger_dk_links($item);
  }

  // Related links.
  $related_links = FALSE;
  if ($node) {
    $related_links = os2web_theme_helper_output_related_links($node, 'node');
  }
  elseif ($term) {
    $related_links = os2web_theme_helper_output_related_links($term, 'taxonomy_term');
  }

  if ($related_links) {
    // Provide the related links to the templates.
    $variables['page']['related_links'] = $related_links;
  }

  // Hack to force the sidebar_second to be rendered if we have anything to put
  // in it.
  if (!$sidebar_second_hidden && empty($variables['page']['sidebar_second'])
      && (!empty($variables['page']['related_links']) || !empty($variables['page']['os2web_selfservicelinks']))) {
    $variables['page']['sidebar_second'] = array(
      '#theme_wrappers' => array('region'),
      '#region' => 'sidebar_second',
      'dummy_content' => array(
        '#markup' => ' ',
      ),
    );
  }

  // On taxonomy pages, add a news list in second sidebar.
  if (!$sidebar_second_hidden && $term) {

    $view_rendered = '';
    $view_rendered = os2web_theme_helper_get_view_content('os2web_news_lists', 'panel_pane_2', array('all', 'Branding', $term->tid), 3);

    if ($view_rendered != '') {
      if (empty($variables['page']['sidebar_second'])) {
        $variables['page']['sidebar_second'] = array(
          '#theme_wrappers' => array('region'),
          '#region' => 'sidebar_second',
        );
      }
      $variables['page']['sidebar_second']['os2web_news_lists'] = array('#markup' => $view_rendered);
    }
  }

  // Spotbox handling. Find all spotboxes for this node, and add them to
  // content_bottom.
  if ($term && $content = os2web_theme_helper_output_spotbox($variables, $node, $term, $term_is_top)) {
    $variables['page']['content']['os2web_spotbox'] = $content;
  }

    // If this is a node with an embedded webform.
  // We need to load it here, in order to get messages loaded.
  if ($node && $webform = field_get_items('node', $node, 'field_os2web_base_field_webform')) {
    $variables['node']->content['os2web_webform'] = array(
      'os2web_webform' => array(
        '#markup' => os2web_theme_helper_get_webform($webform[0]['nid']),
      ),
    );
  }

  // When a node's menu link is deaktivated and has no siblings, menu_block is
  // empty, and then sidebar_first are hidden. We want to force the
  // sidebar_first to still be shown.
  $active_trail = menu_get_active_trail();
  $current_trail = end($active_trail);

  if (isset($current_trail['hidden']) && $current_trail['hidden'] && empty($variables['page']['sidebar_first'])) {
    $variables['page']['sidebar_first'] = array(
      '#theme_wrappers' => array('region'),
      '#region' => 'sidebar_first',
      'dummy_content' => array(
        '#markup' => ' ',
      ),
    );
  }

  // Frontpage content.
  if (drupal_is_front_page()) {

    // Frontpage large carousel. see module os2web_theme_helper.
    $variables['page']['front_large_carousel'] = os2web_theme_helper_get_large_carousel('svendborg_news_view', 'front', TRUE, 'svendborg_content_image');

    // Frontpage small carousel.see module os2web_theme_helper.
    $variables['page']['front_small_carousel'] = os2web_theme_helper_get_front_small_carousel('svendborg_news_view', 'block_3', array('all'), 9, 'svendborg_content_image');
  }

  // Add out fonts from Google Fonts API.
  drupal_add_html_head(array(
    '#tag' => 'link',
    '#attributes' => array(
      'href' => '//fonts.googleapis.com/css?family=Titillium+Web:400,600,700|Open+Sans:400,700',
      'rel' => 'stylesheet',
      'type' => 'text/css',
    ),
  ), 'google_font_fredericia');

  // Add google site verification.
  drupal_add_html_head(
    array(
      '#tag' => 'meta',
      '#type' => 'html_tag',
      '#attributes' => array(
        'name' => 'google-site-verification',
        'content' => 'RERf3yjIX_1JFNkt2dpPZvqH_XeG8eum3P4PHXIpqqM',
      ),
    ),
    'meta_keywords'
  );

  // Pass the theme path to js.
  drupal_add_js('jQuery.extend(Drupal.settings, { "pathToTheme": "' . path_to_theme() . '" });', 'inline');
}

/**
 * Implements template_preprocess_taxonomy_term().
 */
function fredericia_preprocess_taxonomy_term(&$variables) {

  $term = taxonomy_term_load($variables['tid']);
  $variables['term_display_alternative'] = FALSE;
  // Get wether this is a top term, and provide a variable for the templates.
  $term_is_top = os2web_theme_helper_check_term_is_top($term->tid);
  $variables['term_is_top'] = $term_is_top;

  // Provide the spotboxes to Nyheder page or top terms. These pages does not
  // use the right sidebar so we need them in taxonomy-term.tpl
  if (isset($term->tid) && ($term->tid == 6819 || $term_is_top)) {
    $spotboxes = field_get_items('taxonomy_term', $term, 'field_os2web_base_field_spotbox');
    if ($term->tid == 6819) {
      $variables['theme_hook_suggestions'][] = 'taxonomy_term__' . $term->tid;
      $variables['news_term_branding'] = os2web_theme_helper_get_large_carousel('svendborg_news_view', 'front', FALSE, 'svendborg_content_image');
      $variables['news_term_content'] =  os2web_theme_helper_get_view_content('svendborg_news_view', 'block', array('nyhed', 'all'));
      $variables['news_term_right_sidebar'] = os2web_theme_helper_get_term_news_filer_and_quicktabs();
      $variables['os2web_spotboxes'] = ($spotboxes) ? os2web_theme_helper_get_spotboxes($spotboxes, 'col-xs-6 col-sm-6 col-md-6 col-lg-6') : '';
    }
    else {
      $variables['os2web_spotboxes'] = ($spotboxes) ? os2web_theme_helper_get_spotboxes($spotboxes, 'col-xs-6 col-sm-4 col-md-4 col-lg-4') : '';
    }
  }
  if (isset($term->field_alternative_display['und'][0]['value']) &&
        $term->field_alternative_display['und'][0]['value'] == 1) {
    $variables['term_display_alternative'] = TRUE;
  }

}

/**
 * Implements THEME_preprocess_html().
 */
function fredericia_preprocess_html(&$variables) {
  // Add conditional stylesheets for IE.
  drupal_add_css(path_to_theme() . '/css/ie.css', array(
    'group' => CSS_THEME,
    'browsers' => array('IE' => 'lte IE 8', '!IE' => FALSE),
    'preprocess' => FALSE,
    'weight' => 115,
  ));

  if (arg(0) == 'taxonomy' && arg(1) == 'term' && is_numeric(arg(2))) {
    // Add wether the term is top to the classes array.
    $term_is_top = os2web_theme_helper_check_term_is_top(arg(2));

    if ($term_is_top) {
      $variables['classes_array'][] = 'term-is-top';
    }
    else {
      $variables['classes_array'][] = 'term-is-not-top';
    }
  }

  // Setup IE meta tag to force IE rendering mode.
  $meta_ie_render_engine = array(
    '#type' => 'html_tag',
    '#tag' => 'meta',
    '#attributes' => array(
      'http-equiv' => 'X-UA-Compatible',
      'content' => 'IE=8,IE=Edge,chrome=1',
    ),
    '#weight' => '-99999',
  );
  // Add header meta tag for IE to head.
  drupal_add_html_head($meta_ie_render_engine, 'meta_ie_render_engine');
}
/**
 * Implements hook_preprocess_node().
 */
function fredericia_preprocess_node(&$vars) {

  // Add css class "node--NODETYPE--VIEWMODE" to nodes.
  $vars['classes_array'][] = 'node--' . $vars['type'] . '--' . $vars['view_mode'];

  $term_class = os2web_theme_helper_get_the_classes($vars['nid']);
  if ($term_class != '') {
    $vars['classes_array'][] = $vars['top_parent_term'] = $term_class;
  }
  $vars['author_node_info'] = '';
  if (user_is_logged_in()) {
    $vars['author_node_info'] = os2web_theme_helper_get_view_content('redaktoerinfo', 'block', array($vars['nid']));
  }
  // Make "node--NODETYPE--VIEWMODE.tpl.php" templates available for nodes.
  $vars['theme_hook_suggestions'][] = 'node__' . $vars['type'] . '__' . $vars['view_mode'];

  // Borger.dk article content display with settings,
  if ($vars['type'] == 'os2web_borger_dk_article') {
    $content_fields = os2web_theme_helper_get_borger_dk_content($vars['node']);
    foreach ($content_fields as $type => $value) {
      // If field is disabled to display, set $vars field to empty.
      if (empty($value) || !isset($value)) {
        $vars[$type] = '';
      }
    }
    // Microartilce settings.
    $vars['content_body'] = $content_fields['body'];
  }
}

/**
 * Implements theme_breadcrumb().
 *
 * Output breadcrumb as an unorderd list with unique and first/last classes.
 */
function fredericia_breadcrumb($variables) {
  $breadcrumbs = $variables['breadcrumb'];

  if (!empty($breadcrumbs)) {
    // The facets integrate with the breadcrumbs, we don't want this.
    if (arg(0) == 'search' && isset($_GET['f'])) {
      // And since every facet adds a level to the breadcrumb, we do this.
      for ($i = 0; $i < count($_GET['f']); $i++) {
        array_pop($breadcrumbs);
      }
    }

    // Provide a navigational heading to give context for breadcrumb links to
    // screen-reader users. Make the heading invisible with .element-invisible.
    $output = '<h2 class="element-invisible">' . t('You are here') . '</h2>';
    $crumbs = '<ul class="breadcrumb">';

    foreach ($breadcrumbs as $breadcrumb) {
      $classes = array();
      if ($breadcrumb == reset($breadcrumbs)) {
        $classes[] = 'first';
      }
      if ($breadcrumb == end($breadcrumbs)) {
        $classes[] = 'last';
      }
      if (is_array($breadcrumb)) {
        if (isset($breadcrumb['class'])) {
          $classes = array_merge($classes, $breadcrumb['class']);
        }
        if (isset($breadcrumb['data'])) {
          $breadcrumb = $breadcrumb['data'];
        }
      }
      $crumbs .= '<li class="' . implode(' ', $classes) . '"><i></i>'  . $breadcrumb . '</li>';
    }
    $crumbs .= '</ul>';
    return $crumbs;
  }
}

/**
 * Overrides theme_menu_link().
 *
 * Overrides Bootstrap version. Enables to show active trails childrens.
 */
function fredericia_menu_link(array $variables) {
  $element = $variables['element'];
  $sub_menu = '';
  if ($element['#below']) {
    // Prevent dropdown functions from being added to management menu so it
    // does not affect the navbar module.
    if (($element['#original_link']['menu_name'] == 'management') && (module_exists('navbar'))) {
      $sub_menu = drupal_render($element['#below']);
    }
    elseif ($element['#original_link']['in_active_trail']) {
      $sub_menu = drupal_render($element['#below']);
    }
    else {
      $element['#attributes']['class'][] = 'has-children';
    }
  }
  // On primary navigation menu, class 'active' is not set on active menu item.
  // @see https://drupal.org/node/1896674
  if (($element['#href'] == $_GET['q'] || ($element['#href'] == '<front>' && drupal_is_front_page())) && (empty($element['#localized_options']['language']))) {
    $element['#attributes']['class'][] = 'active';
  }
  $output = l($element['#title'], $element['#href'], $element['#localized_options']);
  return '<li' . drupal_attributes($element['#attributes']) . '>' . $output . $sub_menu . "</li>\n";
}

/**
 * Theme function to output tablinks for classic Quicktabs style tabs.
 *
 * @ingroup themeable
 */
function fredericia_qt_quicktabs_tabset($vars) {
  $variables = array(
    'attributes' => array(
      'class' => 'quicktabs-tabs quicktabs-style-' . $vars['tabset']['#options']['style'],
    ),
    'items' => array(),
  );
  foreach (element_children($vars['tabset']['tablinks']) as $key) {
    $item = array();
    if (is_array($vars['tabset']['tablinks'][$key])) {
      $tab = $vars['tabset']['tablinks'][$key];

      $class = "";
      if ($key == (count($vars['tabset']['tablinks']) - 1)) {
        $class = "last";
      }
      if ($key == $vars['tabset']['#options']['active']) {
        $item['class'] = array('active','tab-' . $key, $class);
      }
      else {
        $item['class'] = array('tab-' . $key, $class);
      }
      $item['data'] = "<div><span>" . drupal_render($tab) . "</span></div>";
      $variables['items'][] = $item;
    }
  }
  return theme('item_list', $variables);
}

/**
 * Implements theme_form_element().
 */
function fredericia_form_element(&$variables) {
  // Because the feeds module, puts the upload filechooser in the form
  // element[#description] it is not shown. As bootstrap tries to put all
  // '#description's in tooltips.
  // This workaround puts the the description from file fields in the field
  // suffix.
  // This should probarbly be fixed in the feeds module, but, until then..
  // @see https://www.drupal.org/node/2308343
  if ($variables['element']['#type'] == 'file' && isset($variables['element']['#description'])) {
    $variables['element']['#field_suffix'] = $variables['element']['#description'];
  }
  return bootstrap_form_element($variables);
}


/**
 * Overrides file_link, add target= '_blank', file open in a new window.
 */
function fredericia_file_link($variables) {
  $file = $variables['file'];
  $icon_directory = $variables['icon_directory'];
  $url = file_create_url($file->uri);
  $icon = theme('file_icon', array('file' => $file, 'icon_directory' => $icon_directory));
  // Set options as per anchor format described at
  // http://microformats.org/wiki/file-format-examples
  $options = array(
    'attributes' => array(
      'type' => $file->filemime . '; length=' . $file->filesize,
    ),
  );
  // Use the description as the link text if available.
  if (empty($file->description)) {
    $link_text = $file->filename;
  }
  else {
    $link_text = $file->description;
    $options['attributes']['title'] = check_plain($file->filename);
  }
  // Open files of particular mime types in new window.
  $new_window_mimetypes = array('application/pdf','text/plain');
  if (in_array($file->filemime, $new_window_mimetypes)) {
    $options['attributes']['target'] = '_blank';
  }
  return '<span class="file">' . $icon . ' ' . l($link_text, $url, $options) . '</span>';
}

/**
 * Implements theme_file_formatter_table().
 */
function fredericia_file_formatter_table($variables) {
  $header = array(t('Attachment'));
  $rows = array();
  foreach ($variables['items'] as $delta => $item) {
    $rows[] = array(
      theme('file_link', array('file' => (object) $item)),
    );
  }
  return empty($rows) ? '' : theme('table', array('header' => $header, 'rows' => $rows));
}
