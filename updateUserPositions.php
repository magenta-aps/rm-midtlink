<?php
define('DRUPAL_ROOT', getcwd());
require_once DRUPAL_ROOT . '/includes/bootstrap.inc';
drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);

//Only updates from the last 30 hours

$sql = "SELECT u.name, u.uid, b.position FROM users u
	INNER JOIN {bsk_user_data} b ON b.user_id = u.name AND b.position != ''
	WHERE u.status = 1 AND b.updated >= ".(time()-108000);
$res = db_query($sql)->fetchAll();

foreach($res as $r) {
	$sql = "UPDATE {field_data_field_position} SET field_position_value = :position
		WHERE entity_id = :uid AND bundle = 'user' AND entity_type = 'user'";
	db_query($sql,array(':position'=>$r->position,':uid'=>$r->uid));
	
	echo 'UPDATE '.$r->name.': '.$r->position."\n";
}

// Update user's full names (from all time), ONLY if it is changed

$sql = "SELECT u.name, u.uid, b.display_name FROM users u
        INNER JOIN {bsk_user_data} b ON b.user_id = u.name INNER JOIN
        {field_data_field_fullname} f ON f.entity_id = u.uid AND f.bundle = 'user'
        AND b.display_name != '' AND b.display_name != f.field_fullname_value
        WHERE u.status = 1";  // AND b.updated >= ".(time()-108000);
$res = db_query($sql)->fetchAll();

foreach($res as $r) {
  $sql = "UPDATE {field_data_field_fullname} SET field_fullname_value = :fullname
                WHERE entity_id = :uid AND bundle = 'user' AND entity_type = 'user'";
  db_query($sql,array(':fullname'=>$r->display_name,':uid'=>$r->uid));
  echo 'UPDATE '.$r->name.': '.$r->display_name."\n";
}
