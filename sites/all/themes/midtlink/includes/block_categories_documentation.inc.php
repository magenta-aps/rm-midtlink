<?php
  /**
   * block_categories.inc.php
   */

      
  if(arg(0) == 'dokumentation') {
    $mainTID = arg(1);
  }
  else {
    global $user;
    $mainTID = $user->mainUnitTID;
  }


?>

  <div class="content">

    <h2>Emner</h2>
    <ul class="reset">
	  <?php
	  $categories = midtlink_get_global_keywords();
	  $c = 0;
	  foreach($categories as $i) {
		  $c++;
		  echo '<li class="'.($c%2==0 ? 'even' : 'odd').'">'.l($i->name,'dokumentation/'.$mainTID.'/'.$i->tid).'</li>'."\n";
	  }
	  ?>
    </ul>
    <?php
    
    global $show_only_global_categories;
    // Don't show in footer
    if (!isset($show_only_global_categories)) {
      $term = taxonomy_term_load($mainTID);
      if ($term):
        $mainUnitName = $term->name;
        $local_categories = midtlink_get_keywords_by_unit($mainUnitName);
        if (!empty($local_categories)):
    ?>
    <h2 style="clear: both;">Lokale emner</h2>
    <ul class="reset local-categories">
    <?php
    
	  $c = 0;
	  foreach($local_categories as $i) {
		  $c++;
		  echo '<li class="'.($c%2==0 ? 'even' : 'odd').'">'.l($i->name,'dokumentation/'.$mainTID.'/'.$i->tid).'</li>'."\n";
	  }
	  ?>
    </ul>
      <?php endif;
      endif;
    }
      ?>
  </div><!-- /.content -->

<?php /* EOF */ ?>
