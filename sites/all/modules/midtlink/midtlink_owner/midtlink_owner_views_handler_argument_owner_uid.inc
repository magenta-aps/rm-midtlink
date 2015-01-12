<?php

/**
 * Filter handler to accept a user id to check for nodes that
 * user is owner or author of.
 */
class midtlink_owner_views_handler_argument_owner_uid extends views_handler_argument_comment_user_uid {
  function query($group_by = FALSE) {
    $node_table_alias = $this->query->ensure_table('node');

    $placeholder = $this->placeholder();

    // TODO: This is ugly but does the job

    // Basically, if the node was created by the user and there is no owner
    // set, then the node is included.
    // If there is an owner, then the node is included if the owner is the user
    $this->query->add_where_expression(0, "($node_table_alias.uid =
    $placeholder AND
    (SELECT COUNT(*) FROM {field_data_field_owner} fo WHERE fo.entity_id =
    $node_table_alias.nid AND fo.entity_type = 'node' AND fo.bundle =
    $node_table_alias.type) = 0)
    OR
    (SELECT COUNT(*) FROM {field_data_field_owner} fo WHERE fo.entity_id =
    $node_table_alias.nid AND fo.entity_type = 'node' AND fo.bundle =
    $node_table_alias.type AND fo.field_owner_target_id = $placeholder) > 0",
      array($placeholder => $this->argument));
  }
}
