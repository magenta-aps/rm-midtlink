<?php
if(!$page) {
  hide($content['title']);
  if (isset($node->field_link_desc[LANGUAGE_NONE])) {
    $desc = $node->field_link_desc[LANGUAGE_NONE][0]['value'];
  } else {
    $desc = '';
  }
	?>
      <?php echo render($content['field_link']); ?>
      <p class="small"><?php echo $node->field_link_desc[LANGUAGE_NONE][0]['value']; ?></p>
<?php
}
else {
	print render($content);
}

