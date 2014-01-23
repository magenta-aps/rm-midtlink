<?php
define('DRUPAL_ROOT', getcwd());
require_once DRUPAL_ROOT . '/includes/bootstrap.inc';
drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);


db_set_active('midtlink_bsk');

$sql = "SELECT u.name, u.uid, p.picture_data FROM users u
                INNER JOIN bsk_user_picture p ON p.user_id = u.name AND p.display_picture = 1 AND p.picture_data != ''
                WHERE u.status = 1";
$res = db_query($sql)->fetchAll();

db_set_active();

foreach($res as $r) {
        $data = base64_decode($r->picture_data);
        if ($r->name == '') {
          continue;
        }
        $fn = 'public://profileimg/BSKIMG_'.$r->name.'.jpg';
        echo $fn . "\n";
        $file = file_save_data($data, $fn,FILE_EXISTS_REPLACE);
//        var_dump($file);
        if ($file === FALSE) {
          echo 'Error saving';
          var_dump($file);
          exit;
        }
        
        $file->status = FILE_STATUS_PERMANENT;
        $file->uid = $r->uid;
        file_save($file);

        $sql = "UPDATE users SET picture = :fid WHERE name = :name";
        db_query($sql,array(':fid'=>$file->fid,':name'=>$r->name));
}


