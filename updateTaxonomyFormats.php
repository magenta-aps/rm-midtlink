<?php
define('DRUPAL_ROOT', getcwd());
require_once DRUPAL_ROOT . '/includes/bootstrap.inc';
drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);

$new_format = "html_wysiwyg";

$sql = "SELECT * FROM {taxonomy_term_data} WHERE format != '$new_format'";
$res = db_query($sql)->fetchAll();

foreach($res as $r) {
  print_r($r);
        $description = $r->description;
        $description = check_markup($description, $r->format);
        print $description;
        $sql = "UPDATE {taxonomy_term_data} SET description = :description, format = :format
WHERE tid = :tid";
        db_query($sql,array(':description'=>$description, ':format' =>
          $new_format,':tid'=>$r->tid));
}


