<?php

  global $activeMainTID;

  $links = midtlink_utils_get_links($activeMainTID);

  foreach($links as $r) {
    ?>
    <li>
      <a href="<?php echo $r->url; ?>"><?php echo $r->title; ?></a>
      <p class="small"><?php echo $r->link_desc; ?></p>
    </li>
  <?php
  }
  ?>