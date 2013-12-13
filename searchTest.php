<?php
define('DRUPAL_ROOT', getcwd());

require_once DRUPAL_ROOT . '/includes/bootstrap.inc';
drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);

$searchConditions = apachesolr_search_conditions();
$results = apachesolr_search_search_results('diagnose',$searchConditions);

var_dump($results);
