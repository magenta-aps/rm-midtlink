<?php
/**
 * block_categories.inc.php
 */

global $activeMainTID;
?>

<div class="content">
  <h2>Læs mere om...</h2>
  <ul class="reset">
    <?php
    $categories = midtlink_get_global_keywords();
    midtlink_display_category_links($categories);
    ?>
  </ul>
  <?php

  global $show_only_global_categories;
  // Don't show in footer
  if (!isset($show_only_global_categories)) {
    $term = taxonomy_term_load($activeMainTID);
    if ($term):
      $mainUnitName = $term->name;
      $local_categories = midtlink_get_keywords_by_unit($mainUnitName);
      $mainUnitDisplayName = $term->field_shortname ? $term->field_shortname[LANGUAGE_NONE][0]['safe_value'] : $mainUnitName;
      if (!empty($local_categories)):
        ?>
        <h2 style="clear: both;">Netværk og services på <?php echo $mainUnitDisplayName  ; ?></h2>
        <ul class="reset local-categories">
          <?php

          midtlink_display_category_links($local_categories);
          ?>
        </ul>
      <?php endif;
    endif;
  }
  ?>
</div><!-- /.content -->

<?php /* EOF */ ?>
