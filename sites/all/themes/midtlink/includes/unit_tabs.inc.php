  <div class="mini-tabs">
		<ul>
    <?php
      include 'current_tab.inc.php';

      global $activeMainTID;
      global $activeTermTID;

      $units = midtlink_get_unit_tree(FALSE);
      foreach ($units as $tid => $unit):
          if ($unit['name'] == 'Andre') {
              continue;
          }
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
            $url = url('forum/');
          } else {
            $url = url('forum/' . arg(1));
          }
      ?>
			<li<?php if ($active) { echo ' class="active"'; } ?>>
        <a href="<?php echo $url; ?>?tid=<?php echo $tid; ?>"><?php echo $unit['name']; ?></a>
      </li>
      <?php endforeach; ?>
		</ul>
  </div>