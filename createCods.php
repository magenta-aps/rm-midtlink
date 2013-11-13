<?php
set_time_limit(0);
define('DRUPAL_ROOT', getcwd());

require_once DRUPAL_ROOT . '/includes/bootstrap.inc';
drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);

$codes = array();

$sql = "SELECT uid, name FROM users WHERE uid > 33 AND status = 1";
$res = db_query($sql);
foreach($res as $r) {
	for($i=0;$i<10;$i++) {
		$uniq = false;
		do {
			$c = createCode();
			if(empty($codes[$c])) { $uniq = true; }
		}
		while(!$uniq);
		$codes[$c] = array('region_id'=>$r->name,'code'=>$c);
	}
}

for($y=1;$y<=100;$y++) {
	for($i=0;$i<10;$i++) {
		$uniq = false;
		do {
			$c = createCode();
			if(empty($codes[$c])) { $uniq = true; }
		}
		while(!$uniq);
		$codes[$c] = array('region_id'=>'UNKNWON_'.$y,'code'=>$c);
	}
}

foreach($codes as $cx) {
	$sql = "INSERT INTO accesscodes (region_id,code) VALUES ('".$cx['region_id']."','".$cx['code']."')";
	//db_query($sql);
	//echo $cx['region_id'].";".$cx['code']."\n";
	echo $sql.";\n";
}


function createCode() {
	$chars = "123456789ABCDEFGHIJKLMNPQRSTUVWXYZ";
	$res = "";
	for ($i = 0; $i < 5; $i++) {
		$res .= $chars[mt_rand(0, strlen($chars)-1)];
	}
	return $res;
}
