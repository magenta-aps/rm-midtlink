<?php
/**
 * @file
 * midtlink_upgrade_jan_2014.features.user_permission.inc
 */

/**
 * Implements hook_user_default_permissions().
 */
function midtlink_upgrade_jan_2014_user_default_permissions() {
  $permissions = array();

  // Exported permission: 'access draggableviews'.
  $permissions['access draggableviews'] = array(
    'name' => 'access draggableviews',
    'roles' => array(
      'Administrator' => 'Administrator',
    ),
    'module' => 'draggableviews',
  );

  // Exported permission: 'administer block classes'.
  $permissions['administer block classes'] = array(
    'name' => 'administer block classes',
    'roles' => array(
      'Administrator' => 'Administrator',
    ),
    'module' => 'block_class',
  );

  // Exported permission: 'administer blocks'.
  $permissions['administer blocks'] = array(
    'name' => 'administer blocks',
    'roles' => array(
      'Administrator' => 'Administrator',
    ),
    'module' => 'block',
  );

  // Exported permission: 'delete own post content'.
  $permissions['delete own post content'] = array(
    'name' => 'delete own post content',
    'roles' => array(
      'Administrator' => 'Administrator',
      'EPJ-konsulenter' => 'EPJ-konsulenter',
      'SundhedsIT' => 'SundhedsIT',
      'authenticated user' => 'authenticated user',
    ),
    'module' => 'node',
  );

  // Exported permission: 'use text format filtered_html'.
  $permissions['use text format filtered_html'] = array(
    'name' => 'use text format filtered_html',
    'roles' => array(
      'Administrator' => 'Administrator',
      'EPJ-ansvarlig' => 'EPJ-ansvarlig',
      'EPJ-konsulenter' => 'EPJ-konsulenter',
      'EPJ-superbruger' => 'EPJ-superbruger',
      'SundhedsIT' => 'SundhedsIT',
      'authenticated user' => 'authenticated user',
    ),
    'module' => 'filter',
  );

  // Exported permission: 'use text format html_wysiwyg'.
  $permissions['use text format html_wysiwyg'] = array(
    'name' => 'use text format html_wysiwyg',
    'roles' => array(
      'Administrator' => 'Administrator',
    ),
    'module' => 'filter',
  );

  return $permissions;
}
