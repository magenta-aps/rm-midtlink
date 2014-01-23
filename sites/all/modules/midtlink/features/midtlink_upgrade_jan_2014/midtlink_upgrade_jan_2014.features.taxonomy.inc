<?php
/**
 * @file
 * midtlink_upgrade_jan_2014.features.taxonomy.inc
 */

/**
 * Implements hook_taxonomy_default_vocabularies().
 */
function midtlink_upgrade_jan_2014_taxonomy_default_vocabularies() {
  return array(
    'category' => array(
      'name' => 'Emneord',
      'machine_name' => 'category',
      'description' => '',
      'hierarchy' => 0,
      'module' => 'taxonomy',
      'weight' => 0,
    ),
    'units' => array(
      'name' => 'Afdelinger',
      'machine_name' => 'units',
      'description' => '',
      'hierarchy' => 0,
      'module' => 'taxonomy',
      'weight' => 0,
    ),
  );
}
