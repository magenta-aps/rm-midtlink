<?php

/**
 * Implements hook_views_query_alter.
 * @param type $view
 * @param type $query
 */
function midtlink_utils_views_query_alter(&$view, &$query) {
  if ($view->name == 'unit_links' || $view->name == 'reorder_unit_links') {
    // Add an OR clause so that we can pull in global links as well
    // (which have a field_link_unit value of NULL)
    $query->where[0]['type'] = 'OR';
    $query->add_where_expression(
        0,
        'field_data_field_link_unit.field_link_unit_target_id IS NULL'
      );
  }
}