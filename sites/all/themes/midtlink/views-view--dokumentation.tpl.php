	<div class="documentation actions" style="height:80px;">
		<div class="mini-tabs">
			<ul>
				<li<?php if(arg(1) == '300') { echo ' class="active"'; } ?>><a href="<?php echo url('dokumentation/300'); ?>">Aarhus Universitetshospital</a></li>
				<li<?php if(arg(1) == '301') { echo ' class="active"'; } ?>><a href="<?php echo url('dokumentation/301'); ?>">Hospitalsenhed Horsens</a></li>
			</ul>
    </div>
    		
		<div class="sort">
			<form action="#">
			<label for="select-choice">Vis kun</label>
			<select name="select-choice" id="select-choice" onchange="location.href=this.options[this.selectedIndex].value">
				<option value="/dokumentation">- Alle -</option>
				<?php
				$categories = taxonomy_get_tree(3);
				foreach($categories as $i) {
					echo '<option value="/dokumentation/'.arg(1).'/'.$i->tid.'"'.($i->tid == arg(1) ? ' selected="selected"' : '').'>'.$i->name.'</option>'."\n";
				}
				?>
			</select>
			</form>
		</div>
	</div>
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
