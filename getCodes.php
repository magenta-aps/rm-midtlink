<?php
set_time_limit(0);
define('DRUPAL_ROOT', getcwd());

require_once DRUPAL_ROOT . '/includes/bootstrap.inc';
drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);

$codes = array();

$sql = "SELECT region_id, code FROM accesscodes ORDER BY id";
$res = db_query($sql);

foreach($res as $r) {
	echo $r->region_id.';'.$r->code."\n";
}
