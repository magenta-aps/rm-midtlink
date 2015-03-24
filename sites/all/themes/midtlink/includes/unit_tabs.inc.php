<?php

include 'current_tab.inc.php';

global $activeMainTID;
global $activeTermTID;

if ($activeMainTID && $activeMainTID != 'all') {
?>
  <div class="mini-tabs">
		<ul>
    <?php
      $units = midtlink_get_unit_tree(FALSE);
      foreach ($units as $tid => $unit):
          $active = false;
          if ($activeMainTID == $tid) {
            $active = true;
          }

          $mainUnit = midtlink_get_main_unit_from_local_keyword($activeTermTID);
          if ($mainUnit != null && $mainUnit->tid != $tid) {
            $differentUnitLocalKeywordActive = true;
          } else {
            $differentUnitLocalKeywordActive = false;
          }

          if ($active || $differentUnitLocalKeywordActive) {
            if (arg(0) == 'forum') {
              $url = url('forum/') . '?tid='.$tid;
            } else {
              $url = url('dokumentation/' . $tid);
            }
          } else {
            if (arg(0) == 'forum') {
              $url = url('forum/' . arg(1)) . '?tid='.$tid;;
            } else {
              $url = url('dokumentation/' . $tid . '/' . arg(2));
            }
          }
      ?>
			<li<?php if ($active) { echo ' class="active"'; } ?>>
        <a href="<?php echo $url; ?>"><?php echo $unit['name']; ?></a>
      </li>
      <?php endforeach; ?>
		</ul>
  </div>
<?php } ?>