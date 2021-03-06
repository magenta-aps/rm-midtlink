<div class="<?php print $classes; ?>">
  <?php include('includes/unit_tabs.inc.php'); ?>
  <?php print render($title_prefix); ?>
  <?php
  if(arg(1) != '') {
		$term = taxonomy_term_load(arg(1));
    if (midtlink_is_keyword_local($term->tid)) {
      $class = 'darkbluebuttonstyle';
      $classDesc = 'darkbluedescription';
    } else {
      $class = 'greenbuttonstyle';
      $classDesc = '';
    }
		echo '<h1 class="'.$class.'">'.$term->name.'</h1>';
    if($term->description!='') {
			echo '<div class="categorydescription '.$classDesc.'">';
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
	<?php print render($title_suffix); ?>
  <?php if ($header): ?>
    <div class="view-header">
      <?php print $header; ?>
    </div>
  <?php endif; ?>

  <?php if ($attachment_before): ?>
    <div class="attachment attachment-before">
      <?php print $attachment_before; ?>
    </div>
  <?php endif; ?>

  <?php if ($rows): ?>
    <div class="view-content">
      <?php print $rows; ?>
    </div>
  <?php elseif ($empty): ?>
    <div class="view-empty">
      <?php print $empty; ?>
    </div>
  <?php endif; ?>

  <?php if ($pager): ?>
    <?php print $pager; ?>
  <?php endif; ?>

  <?php if ($attachment_after): ?>
    <div class="attachment attachment-after">
      <?php print $attachment_after; ?>
    </div>
  <?php endif; ?>

  <?php if ($more): ?>
    <?php print $more; ?>
  <?php endif; ?>

  <?php if ($footer): ?>
    <div class="view-footer">
      <?php print $footer; ?>
    </div>
  <?php endif; ?>

  <?php if ($feed_icon): ?>
    <div class="feed-icon">
      <?php print $feed_icon; ?>
    </div>
  <?php endif; ?>

</div><?php /* class view */ ?>
