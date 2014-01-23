<?php
/**
 * @file
 * midtlink_upgrade_jan_2014.features.filter.inc
 */

/**
 * Implements hook_filter_default_formats().
 */
function midtlink_upgrade_jan_2014_filter_default_formats() {
  $formats = array();

  // Exported format: HTML (WYSIWYG).
  $formats['html_wysiwyg'] = array(
    'format' => 'html_wysiwyg',
    'name' => 'HTML (WYSIWYG)',
    'cache' => 1,
    'status' => 1,
    'weight' => 0,
    'filters' => array(
      'filter_htmlcorrector' => array(
        'weight' => 10,
        'status' => 1,
        'settings' => array(),
      ),
    ),
  );

  return $formats;
}
