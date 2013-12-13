<?php
set_time_limit(0);
define('DRUPAL_ROOT', getcwd());

require_once DRUPAL_ROOT . '/includes/bootstrap.inc';
drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);

$units = array(300=>'AUH',301=>'HEH');

foreach($units as $unit_id=>$name) {
	$depID = array();
	
	$sql = "SELECT t.tid, t.name FROM taxonomy_term_data t, taxonomy_term_hierarchy h
		WHERE h.parent = ".$unit_id." AND t.tid = h.tid ORDER BY t.weight";
	$res = db_query($sql);
	echo $sql;
	foreach($res as $r) {
		$depID[] = $r->tid;
	}
	
	$sql = "SELECT COUNT(n.nid) FROM node n, field_data_field_unit f WHERE f.entity_id = n.nid AND f.entity_type = 'node'
		AND f.field_unit_tid IN (".implode(',',$depID).")";
	$res = db_query($sql);
	$numEntries = $res->fetchColumn();
	echo '<h1>Antal indlæg fra '.$name.': '.$numEntries.'</h1>';
	
	
		
	$sql = "SELECT COUNT(u.uid) FROM users u, field_data_field_unit f WHERE f.entity_id = u.uid AND f.entity_type = 'user'
		AND f.field_unit_tid IN (".implode(',',$depID).") AND u.status = 1";
	$res = db_query($sql);
	$numEntries = $res->fetchColumn();
	echo '<h1>Antal brugere fra '.$name.': '.$numEntries.'</h1>';
	
}
 
