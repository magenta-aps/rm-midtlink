<?php
  /**
   * block_categories.inc.php
   */
?>

  <div class="content">

    <h2>Emner</h2>
    <ul class="reset">
	  <?php
	  $categories = taxonomy_get_tree(3);
	  $c = 0;
	  foreach($categories as $i) {
		  $c++;
		  echo '<li class="'.($c%2==0 ? 'even' : 'odd').'">'.l($i->name,'forum/'.$i->tid).'</li>'."\n";
	  }
	  ?>
    </ul>
  </div><!-- /.content -->

<?php /* EOF */ ?>
