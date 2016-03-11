<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function fredericia_form_system_theme_settings_alter(&$form, &$form_state) {
 $form['fredericia_setting'] = array(
    '#type' => 'fieldset',
    '#title' => t('Svendborg subsitetheme Settings'),
    '#collapsible' => FALSE,
    '#collapsed' => FALSE,
  );
  $form['fredericia_setting']['menu_location'] = array(
    '#type'          => 'fieldset',
    '#title' => 'Menu position',
    '#weight' => -3,
    '#description' => t('Vælg en menu placering'),
  );
  $form['fredericia_setting']['menu_location']['menu_location_setting'] = array(
    '#type' => 'select',
    '#title' => t('Selected'),
    '#options' => array(
         0 => t('Left'),
         1 => t('Top'),
       ),
    '#default_value' => theme_get_setting('menu_location_setting', 'fredericia'),
  );

$form['fredericia_setting']['socialicon'] = array(
    '#type' => 'fieldset',
    '#title' => t('Social Icon'),
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
  );
 
 $form['fredericia_setting']['socialicon']['twitter_url'] = array(
    '#type' => 'textfield',
    '#title' => t('Twitter Profile URL'),
    '#default_value' => theme_get_setting('twitter_url', 'fredericia'),
    '#description'   => t("Enter your Twitter Profile URL. Leave blank to hide."),
  );
  $form['fredericia_setting']['socialicon']['facebook_url'] = array(
    '#type' => 'textfield',
    '#title' => t('Facebook Profile URL'),
    '#default_value' => theme_get_setting('facebook_url', 'fredericia'),
    '#description'   => t("Enter your Facebook Profile URL. Leave blank to hide."),
  );
  $form['fredericia_setting']['socialicon']['linkedin_url'] = array(
    '#type' => 'textfield',
    '#title' => t('Linkedin Address'),
    '#default_value' => theme_get_setting('linkedin_url', 'fredericia'),
    '#description'   => t("Enter your Linkedin URL. Leave blank to hide."),
  );
  $form['fredericia_setting']['socialicon']['youtube_url'] = array(
    '#type' => 'textfield',
    '#title' => t('Youtube Address'),
    '#default_value' => theme_get_setting('youtube_url', 'fredericia'),
    '#description'   => t("Enter your Youtube URL. Leave blank to hide."),
  );
 $form['fredericia_setting']['footer-contact'] = array(
    '#type' => 'fieldset',
    '#title' => t('Footer contact info'),
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
  );
 $form['fredericia_setting']['footer-contact']['company-name'] = array(
    '#type' => 'textfield',
    '#title' => t('Company name'),
    '#default_value' => theme_get_setting('company-name', 'fredericia'),
    '#description'   => t("Enter your company. Leave blank to hide."),
  );
 $form['fredericia_setting']['footer-contact']['address'] = array(
    '#type' => 'textfield',
    '#title' => t('Address'),
    '#default_value' => theme_get_setting('address', 'fredericia'),
    '#description'   => t("Enter your address. Leave blank to hide."),
  );
 $form['fredericia_setting']['footer-contact']['city'] = array(
    '#type' => 'textfield',
    '#title' => t('City'),
    '#default_value' => theme_get_setting('city', 'fredericia'),
    '#description'   => t("Enter your city. Leave blank to hide."),
  );
  $form['fredericia_setting']['footer-contact']['index'] = array(
    '#type' => 'textfield',
    '#title' => t('ZIP code'),
    '#default_value' => theme_get_setting('index', 'fredericia'),
    '#description'   => t("Enter your Zip code. Leave blank to hide."),
  );
  $form['fredericia_setting']['footer-contact']['phone'] = array(
    '#type' => 'textfield',
    '#title' => t('Phone number'),
    '#default_value' => theme_get_setting('phone', 'fredericia'),
    '#description'   => t("Enter your phone number. Leave blank to hide."),
  );
  $form['fredericia_setting']['footer-contact']['email'] = array(
    '#type' => 'textfield',
    '#title' => t('Email'),
    '#default_value' => theme_get_setting('email', 'fredericia'),
    '#description'   => t("Enter your email. Leave blank to hide."),
  );

$form['#submit'][] = 'fredericia_settings_form_submit';
$themes = list_themes();

$active_theme = $GLOBALS['theme_key'];

$form_state['build_info']['files'][] = str_replace("/$active_theme.info", '', $themes[$active_theme]->filename) . '/theme-settings.php';
}

function fredericia_settings_form_submit(&$form, $form_state) {

}

