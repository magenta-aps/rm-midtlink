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

  return $permissions;
}
