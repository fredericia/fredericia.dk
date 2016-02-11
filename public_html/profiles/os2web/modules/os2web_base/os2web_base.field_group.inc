<?php
/**
 * @file
 * os2web_base.field_group.inc
 */

/**
 * Implements hook_field_group_info().
 */
function os2web_base_field_group_info() {
  $export = array();

  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_indstillinger|taxonomy_term|os2web_base_tax_site_structure|form';
  $field_group->group_name = 'group_indstillinger';
  $field_group->entity_type = 'taxonomy_term';
  $field_group->bundle = 'os2web_base_tax_site_structure';
  $field_group->mode = 'form';
  $field_group->parent_name = 'group_term';
  $field_group->data = array(
    'label' => 'Indstillinger',
    'weight' => '18',
    'children' => array(
      0 => 'field_alternative_display',
      1 => 'field_list_as_spotboks',
      2 => 'field_os2web_base_field_contact',
      3 => 'field_os2web_base_field_ext_link',
      4 => 'field_os2web_base_field_hidlinks',
      5 => 'field_os2web_base_field_related',
      6 => 'field_svendborg_hide_sidebar',
      7 => 'field_os2web_base_hide_sidebar',
    ),
    'format_type' => 'htab',
    'format_settings' => array(
      'formatter' => 'closed',
      'instance_settings' => array(
        'description' => '',
        'classes' => 'group-indstillinger field-group-htab',
        'required_fields' => 1,
        'id' => '',
      ),
    ),
  );
  $export['group_indstillinger|taxonomy_term|os2web_base_tax_site_structure|form'] = $field_group;

  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_os2web_base_group_taxono|node|os2web_base_iframe|form';
  $field_group->group_name = 'group_os2web_base_group_taxono';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'os2web_base_iframe';
  $field_group->mode = 'form';
  $field_group->parent_name = '';
  $field_group->data = array(
    'label' => 'Taksonomi',
    'weight' => '8',
    'children' => array(
      0 => 'field_os2web_base_field_kle_ref',
      1 => 'field_os2web_base_field_edi_tags',
      2 => 'field_os2web_base_field_organiz',
      3 => 'field_os2web_base_field_loca_ref',
      4 => 'field_os2web_base_field_politics',
    ),
    'format_type' => 'fieldset',
    'format_settings' => array(
      'formatter' => 'collapsible',
      'instance_settings' => array(
        'description' => '',
        'classes' => '',
        'required_fields' => 1,
      ),
    ),
  );
  $export['group_os2web_base_group_taxono|node|os2web_base_iframe|form'] = $field_group;

  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_selvbetjening|taxonomy_term|os2web_base_tax_site_structure|form';
  $field_group->group_name = 'group_selvbetjening';
  $field_group->entity_type = 'taxonomy_term';
  $field_group->bundle = 'os2web_base_tax_site_structure';
  $field_group->mode = 'form';
  $field_group->parent_name = 'group_term';
  $field_group->data = array(
    'label' => 'Selvbetjeningslinks',
    'weight' => '16',
    'children' => array(
      0 => 'field_os2web_base_field_selfserv',
    ),
    'format_type' => 'htab',
    'format_settings' => array(
      'formatter' => 'closed',
      'instance_settings' => array(
        'description' => '',
        'classes' => 'group-selvbetjening field-group-htab',
        'required_fields' => 1,
        'id' => '',
      ),
    ),
  );
  $export['group_selvbetjening|taxonomy_term|os2web_base_tax_site_structure|form'] = $field_group;

  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_spotbokse|taxonomy_term|os2web_base_tax_site_structure|form';
  $field_group->group_name = 'group_spotbokse';
  $field_group->entity_type = 'taxonomy_term';
  $field_group->bundle = 'os2web_base_tax_site_structure';
  $field_group->mode = 'form';
  $field_group->parent_name = 'group_term';
  $field_group->data = array(
    'label' => 'Spotbokse',
    'weight' => '15',
    'children' => array(
      0 => 'field_os2web_base_field_spotbox',
    ),
    'format_type' => 'htab',
    'format_settings' => array(
      'formatter' => 'closed',
      'instance_settings' => array(
        'description' => '',
        'classes' => 'group-spotbokse field-group-htab',
        'required_fields' => 1,
        'id' => '',
      ),
    ),
  );
  $export['group_spotbokse|taxonomy_term|os2web_base_tax_site_structure|form'] = $field_group;

  return $export;
}
