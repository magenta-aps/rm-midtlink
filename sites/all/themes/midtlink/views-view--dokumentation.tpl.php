	<div class="documentation actions" style="height:80px;">
    <?php //if (user_access('create knowlegde content')) {
        //echo '<p><a href="' . url('node/add/knowlegde/') . '">Opret Vejledning</a></p>';
      //}; ?>
    
    <?php include('includes/unit_tabs.inc.php'); ?>		
		<div class="sort">
			<form action="#">
			<label for="select-choice">Vis kun</label>
			<select name="select-choice" id="select-choice" onchange="location.href=this.options[this.selectedIndex].value">
				<option value="/dokumentation">- Alle -</option>
				<?php
        
        $current_tid = arg(1);
        $local_term = taxonomy_term_load($current_tid);
        if ($local_term) {
  				$categories = midtlink_get_local_and_global_keywords($local_term->name);
        } else {
          $categories = midtlink_get_global_keywords();
        }
        
				foreach($categories as $i) {
					echo '<option value="/dokumentation/'.arg(1).'/'.$i->tid.'"'.($i->tid == arg(1) ? ' selected="selected"' : '').'>'.$i->name.'</option>'."\n";
				}
				?>
			</select>
			</form>
		</div>
	</div>
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
