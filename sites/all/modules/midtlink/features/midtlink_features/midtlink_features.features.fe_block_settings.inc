<?php
/**
 * @file
 * midtlink_features.features.fe_block_settings.inc
 */

/**
 * Implements hook_default_fe_block_settings().
 */
function midtlink_features_default_fe_block_settings() {
  $export = array();

  $export['version'] = '2.0';

  $export['block-midtlink_above_login_form'] = array(
    'cache' => -1,
    'css_class' => '',
    'custom' => 0,
    'machine_name' => 'midtlink_above_login_form',
    'midtlink_unit' => '',
    'module' => 'block',
    'node_types' => array(),
    'pages' => '',
    'roles' => array(),
    'themes' => array(
      'midtlink' => array(
        'region' => 'loginpage_above_form',
        'status' => 1,
        'theme' => 'midtlink',
        'weight' => 0,
      ),
    ),
    'title' => '',
    'visibility' => 0,
  );

  $export['block-midtlink_below_login_form'] = array(
    'cache' => -1,
    'css_class' => '',
    'custom' => 0,
    'machine_name' => 'midtlink_below_login_form',
    'midtlink_unit' => '',
    'module' => 'block',
    'node_types' => array(),
    'pages' => '',
    'roles' => array(),
    'themes' => array(
      'midtlink' => array(
        'region' => 'loginpage_below_form',
        'status' => 1,
        'theme' => 'midtlink',
        'weight' => 0,
      ),
    ),
    'title' => '',
    'visibility' => 0,
  );

  $export['block-midtlink_betingelser'] = array(
    'cache' => -1,
    'css_class' => '',
    'custom' => 0,
    'machine_name' => 'midtlink_betingelser',
    'midtlink_unit' => '',
    'module' => 'block',
    'node_types' => array(),
    'pages' => '',
    'roles' => array(),
    'themes' => array(
      'midtlink' => array(
        'region' => 'betingelser',
        'status' => 1,
        'theme' => 'midtlink',
        'weight' => 0,
      ),
    ),
    'title' => 'Brugerbetingelser for MidtLink',
    'visibility' => 0,
  );

  $export['block-midtlink_footer_block_1'] = array(
    'cache' => -1,
    'css_class' => 'documentation',
    'custom' => 0,
    'machine_name' => 'midtlink_footer_block_1',
    'midtlink_unit' => '',
    'module' => 'block',
    'node_types' => array(),
    'pages' => '',
    'roles' => array(),
    'themes' => array(
      'midtlink' => array(
        'region' => 'footer_block_center',
        'status' => 1,
        'theme' => 'midtlink',
        'weight' => -18,
      ),
    ),
    'title' => 'Vejledninger',
    'visibility' => 0,
  );

  $export['block-midtlink_footer_block_3'] = array(
    'cache' => -1,
    'css_class' => 'hotline',
    'custom' => 0,
    'machine_name' => 'midtlink_footer_block_3',
    'midtlink_unit' => '',
    'module' => 'block',
    'node_types' => array(),
    'pages' => '',
    'roles' => array(),
    'themes' => array(
      'midtlink' => array(
        'region' => 'footer_block_right',
        'status' => 1,
        'theme' => 'midtlink',
        'weight' => -18,
      ),
    ),
    'title' => 'Service Desk',
    'visibility' => 0,
  );

  $export['block-midtlink_footer_block_auh_1'] = array(
    'cache' => -1,
    'css_class' => '',
    'custom' => 0,
    'machine_name' => 'midtlink_footer_block_auh_1',
    'midtlink_unit' => 300,
    'module' => 'block',
    'node_types' => array(),
    'pages' => '',
    'roles' => array(),
    'themes' => array(
      'midtlink' => array(
        'region' => 'footer_block_center',
        'status' => 1,
        'theme' => 'midtlink',
        'weight' => -19,
      ),
    ),
    'title' => '',
    'visibility' => 0,
  );

  $export['block-midtlink_footer_main_unit_auh'] = array(
    'cache' => -1,
    'css_class' => '',
    'custom' => 0,
    'machine_name' => 'midtlink_footer_main_unit_auh',
    'midtlink_unit' => 300,
    'module' => 'block',
    'node_types' => array(),
    'pages' => '',
    'roles' => array(),
    'themes' => array(
      'midtlink' => array(
        'region' => 'footer_block_right',
        'status' => 1,
        'theme' => 'midtlink',
        'weight' => -19,
      ),
    ),
    'title' => 'Om MidtLink',
    'visibility' => 0,
  );

  $export['block-midtlink_frontpage_maintext_heh'] = array(
    'cache' => -1,
    'css_class' => 'description',
    'custom' => 0,
    'machine_name' => 'midtlink_frontpage_maintext_heh',
    'midtlink_unit' => 301,
    'module' => 'block',
    'node_types' => array(),
    'pages' => '',
    'roles' => array(),
    'themes' => array(
      'midtlink' => array(
        'region' => 'front_text',
        'status' => 1,
        'theme' => 'midtlink',
        'weight' => 0,
      ),
    ),
    'title' => 'Om MidtLink',
    'visibility' => 0,
  );

  $export['block-midtlink_frontpage_sidebar'] = array(
    'cache' => -1,
    'css_class' => '',
    'custom' => 0,
    'machine_name' => 'midtlink_frontpage_sidebar',
    'midtlink_unit' => '',
    'module' => 'block',
    'node_types' => array(),
    'pages' => '',
    'roles' => array(),
    'themes' => array(
      'midtlink' => array(
        'region' => 'front_sidebar',
        'status' => 1,
        'theme' => 'midtlink',
        'weight' => -14,
      ),
    ),
    'title' => '',
    'visibility' => 0,
  );

  $export['block-midtlink_frontpage_sidebar_about'] = array(
    'cache' => -1,
    'css_class' => 'description',
    'custom' => 0,
    'machine_name' => 'midtlink_frontpage_sidebar_about',
    'midtlink_unit' => '',
    'module' => 'block',
    'node_types' => array(),
    'pages' => '<front>',
    'roles' => array(),
    'themes' => array(
      'midtlink' => array(
        'region' => 'front_sidebar_about',
        'status' => 1,
        'theme' => 'midtlink',
        'weight' => -13,
      ),
    ),
    'title' => 'Om MidtLink',
    'visibility' => 1,
  );

  $export['block-midtlink_frontpage_text'] = array(
    'cache' => -1,
    'css_class' => 'description',
    'custom' => 0,
    'machine_name' => 'midtlink_frontpage_text',
    'midtlink_unit' => '',
    'module' => 'block',
    'node_types' => array(),
    'pages' => '<front>',
    'roles' => array(),
    'themes' => array(
      'midtlink' => array(
        'region' => 'front_text',
        'status' => 1,
        'theme' => 'midtlink',
        'weight' => -14,
      ),
    ),
    'title' => 'Sammen bli\'r vi bedre',
    'visibility' => 1,
  );

  return $export;
}
