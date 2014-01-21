<?php

define('DRUPAL_ROOT', getcwd());
require_once DRUPAL_ROOT . '/includes/bootstrap.inc';
drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);

migrateVejledningUnitToEntityReference();

function migrateVejledningUnitToEntityReference()
{
//    $sql = "SELECT entity_id FROM field_data_field_knowlegde_unit";
  $sql = "select nid from node where type = 'knowlegde';";
    $result = db_query($sql);

    foreach ($result as $n) {
        $ids[] = $n->nid;
    }

    $nodes = node_load_multiple($ids);

    foreach($nodes as $node) {
        $node->field_unit[LANGUAGE_NONE] = array();
        $node->field_unit[LANGUAGE_NONE][]['tid'] = 300; // set to AUH
        
//        $sql = "INSERT INTO field_data_field_knowlegde_unit_ref VALUES (entity_type, bundle, entity_id, revision_id, language, delta, field_data_field_knowlegde_unit_ref_target_id)"
//          . " (:entity_type, :bundle, :entity_id, :revision_id, :language, :delta, :val)";
//        $res = db_query($sql,array(':entity_type' => $node->entity_type, ':bundle' => $node->bundle, ':entity_id' => $node->entity_id,
//          ':revision_id' => 1, ':language' => $node->language, ':delta' => $node->delta,
//          ':val' => $node->field_knowlegde_unit[LANGUAGE_NONE]));

        print_r($node);
        field_attach_update('node', $node);
    }
}

