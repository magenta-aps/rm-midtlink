<div class="<?php print $classes; ?>">
  <div class="mini-tabs">
		<ul>

			<li<?php if($_GET['tid'] == '528') { echo ' class="active"'; } ?>><a href="<?php echo url($_GET['q']); ?>?tid=528">OLES AFDELING</a></li>
			<li<?php if($_GET['tid'] == '300') { echo ' class="active"'; } ?>><a href="<?php echo url($_GET['q']); ?>?tid=300">Aarhus Universitetshospital</a></li>
			<li<?php if($_GET['tid'] == '301') { echo ' class="active"'; } ?>><a href="<?php echo url($_GET['q']); ?>?tid=301">Hospitalsenhed Horsens</a></li>
		</ul>
  </div>
    
  <?php print render($title_prefix); ?>
  <?php
  if(arg(1) != '') {
		$res = db_query("SELECT name FROM {taxonomy_term_data} WHERE tid = :tid",array(':tid'=>arg(1)));
		$c = $res->fetchColumn();
		echo '<h1>Indlæg under emnet "'.$c.'"</h1>';
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
