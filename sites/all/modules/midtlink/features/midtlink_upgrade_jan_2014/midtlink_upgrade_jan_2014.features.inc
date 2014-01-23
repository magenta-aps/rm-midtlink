<?php
/**
 * @file
 * midtlink_upgrade_jan_2014.features.inc
 */

/**
 * Implements hook_ctools_plugin_api().
 */
function midtlink_upgrade_jan_2014_ctools_plugin_api($module = NULL, $api = NULL) {
  if ($module == "facetapi" && $api == "facetapi_defaults") {
    return array("version" => "1");
  }
}

/**
 * Implements hook_views_api().
 */
function midtlink_upgrade_jan_2014_views_api($module = NULL, $api = NULL) {
  return array("api" => "3.0");
}

/**
 * Implements hook_node_info().
 */
function midtlink_upgrade_jan_2014_node_info() {
  $items = array(
    'knowlegde' => array(
      'name' => t('Vejledning'),
      'base' => 'node_content',
      'description' => t('En hjælpeartikel til "Videns" sektionen.'),
      'has_title' => '1',
      'title_label' => t('Titel'),
      'help' => '',
    ),
    'link' => array(
      'name' => t('Hjælpelink'),
      'base' => 'node_content',
      'description' => t('Link der indsættes i hjælpesektionen'),
      'has_title' => '1',
      'title_label' => t('Administrativ titel'),
      'help' => '',
    ),
    'post' => array(
      'name' => t('Indlæg'),
      'base' => 'node_content',
      'description' => t('Et indlæg, spørgsmål eller observation, hvortil der kan svares.'),
      'has_title' => '1',
      'title_label' => t('Titel'),
      'help' => '',
    ),
  );
  return $items;
}
