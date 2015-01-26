<?php
/**
 * block_categories.inc.php
 */

global $activeMainTID;
?>

<div class="content">
  <h2>Regionale emneoversigter</h2>
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
      if (!empty($local_categories)):
        ?>
        <h2 style="clear: both;">Lokale emneoversigter for <?php echo $mainUnitName; ?></h2>
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
