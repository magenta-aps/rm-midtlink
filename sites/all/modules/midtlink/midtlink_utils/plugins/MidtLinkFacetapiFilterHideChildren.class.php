<?php

/**
* Plugin that filters active items.
*/
class MidtLinkFacetapiFilterHideChildren extends FacetapiFilter {

  /**
   * Filters facet items.
   */
  public function execute(array $build) {
    // Exclude item if it is not a parent term
    $filtered_build = array();
    foreach ($build as $key => $item) {
      $item['#item_children'] = array();
      $filtered_build[$key] = $item;
    }
    return $filtered_build;
  }

}
