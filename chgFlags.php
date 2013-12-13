<?php
exit;set_time_limit(0);
define('DRUPAL_ROOT', getcwd());
require_once DRUPAL_ROOT . '/includes/bootstrap.inc';
drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);
$acc = user_load(36817);
$f = flag_get_flag('answer_helped');
$sql = "SELECT content_id FROM flag_content WHERE fid = 7";
$res = db_query($sql);
//var_dump($acc);
//var_dump($f);
foreach($res as $r) {
	echo "Flagging ".$r->content_id."<br />";
	$f->flag('flag',$r->content_id,$acc);
}

