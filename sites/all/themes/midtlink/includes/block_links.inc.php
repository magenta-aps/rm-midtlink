<?php
  global $user;
  $links = midtlink_utils_get_links($user->mainUnitTID);

  foreach($links as $r) {
    ?>
    <li>
      <a href="<?php echo $r->url; ?>"><?php echo $r->title; ?></a>
      <p class="small"><?php echo $r->link_desc; ?></p>
    </li>
  <?php
  }
  ?>