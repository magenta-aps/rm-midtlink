<?php

/**
* Plugin that filters active items.
*/
class MidtLinkFacetapiFilterHideGlobal extends FacetapiFilter {

  /**
   * Filters facet items.
   */
  public function execute(array $build) {
    // Exclude item if its markup is 'Global'
    // Expand its children
    $filtered_build = array();
    foreach ($build as $key => $item) {
      if ($item['#markup'] == 'Global') {
        foreach ($item['#item_children'] as $child_key => $child) {
          $filtered_build[$child_key] = $child;
        }
      } else {
        $filtered_build[$key] = $item;
      }
    }

    return $filtered_build;
  }

}
