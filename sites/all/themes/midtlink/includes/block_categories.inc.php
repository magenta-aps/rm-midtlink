<?php
/**
 * block_categories.inc.php
 */

global $activeMainTID;
?>

<div class="content">

  <h2>Emner</h2>
  <ul class="reset">
    <?php
    $categories = midtlink_get_global_keywords();
    $c = 0;
    foreach($categories as $i) {
      $c++;
      echo '<li class="'.($c%2==0 ? 'even' : 'odd').'">'.l($i->name,
          'taxonomy/keyword/'.$i->tid).'</li>'."\n";
    }
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
        <h2 style="clear: both;">Lokale emner for <?php echo $mainUnitName; ?></h2>
        <ul class="reset local-categories">
          <?php

          $c = 0;
          foreach($local_categories as $i) {
            $c++;
            echo '<li class="'.($c%2==0 ? 'even' : 'odd').'">'.l($i->name,
                'taxonomy/keyword/'.$i->tid).'</li>'."\n";
          }
          ?>
        </ul>
      <?php endif;
    endif;
  }
  ?>
</div><!-- /.content -->

<?php /* EOF */ ?>
