	<!--div class="documentation actions" style="height:80px;">
    <?php //if (user_access('create knowlegde content')) {
        //echo '<p><a href="' . url('node/add/knowlegde/') . '">Opret Vejledning</a></p>';
      //}; ?>
    
    
	</div-->
  <?php include('includes/unit_tabs.inc.php'); ?>		
	<?php
  if(arg(2) != '') {
		$term = taxonomy_term_load(arg(2));
		echo '<h1 class="greenbuttonstyle">'.$term->name.'</h1>';
		if($term->description!='') {
			echo '<div class="categorydescription">';
			if(strpos($term->description,'<p>')===false) {
				echo '<p>'.$term->description.'</p>';	
			}
			else {
				echo $term->description;
			}
			echo '</div>';
		}
	}
	?>
	
  <?php if ($rows): ?>
    <div class="list-item"><div class="section">
      <?php print $rows; ?>
    </div></div>
  <?php elseif ($empty): ?>
    <div class="view-empty">
      Der blev ikke fundet nogen artikle i denne kategori.
    </div>
  <?php endif; ?>

  <?php if ($pager): ?>
    <?php print $pager; ?>
  <?php endif; ?>
