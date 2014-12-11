<?php
/**
 * @file
 * midtlink_permissions.features.user_permission.inc
 */

/**
 * Implements hook_user_default_permissions().
 */
function midtlink_permissions_user_default_permissions() {
  $permissions = array();

  // Exported permission: 'edit any post content'.
  $permissions['edit any post content'] = array(
    'name' => 'edit any post content',
    'roles' => array(
      'Administrator' => 'Administrator',
      'SundhedsIT' => 'SundhedsIT',
    ),
    'module' => 'node',
  );

  // Exported permission: 'use editablefields'.
  $permissions['use editablefields'] = array(
    'name' => 'use editablefields',
    'roles' => array(
      'authenticated user' => 'authenticated user',
    ),
    'module' => 'editablefields',
  );

  return $permissions;
}
