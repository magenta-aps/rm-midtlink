<?php

class EntityReferenceSelectFullname extends EntityReference_SelectionHandler_Generic {

  /**
   * Implements EntityReferenceHandler::getInstance().
   */
  public static function getInstance($field, $instance = NULL, $entity_type = NULL, $entity = NULL) {
    $target_entity_type = $field['settings']['target_type'];

    // Check if the entity type does exist and has a base table.
    $entity_info = entity_get_info($target_entity_type);
    if (empty($entity_info['base table'])) {
      return EntityReference_SelectionHandler_Broken::getInstance($field, $instance);
    }

    if (class_exists($class_name = 'EntityReferenceSelectFullname_' . $target_entity_type)) {
      return new $class_name($field, $instance, $entity_type, $entity);
    }
    else {
      return new EntityReferenceSelectFullname($field, $instance, $entity_type, $entity);
    }
  }
}

/**
 * Override for the User type.
 */
class EntityReferenceSelectFullname_user extends EntityReferenceSelectFullname {
  public function buildEntityFieldQuery($match = NULL, $match_operator = 'CONTAINS') {
    $query = parent::buildEntityFieldQuery($match, $match_operator);

    // Match based on the fullname field.
    if (isset($match)) {
      $query->fieldCondition('field_fullname', 'value', $match, $match_operator);
    }

    // Adding the 'user_access' tag is sadly insufficient for users: core
    // requires us to also know about the concept of 'blocked' and
    // 'active'.
    if (!user_access('administer users')) {
      $query->propertyCondition('status', 1);
    }
    return $query;
  }

}