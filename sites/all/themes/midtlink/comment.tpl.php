<?php
//$approval = midtlink_utils_comment_approved($comment->cid);
$notArchived = midtlink_utils_comment_archived($comment->cid);
?>
<div class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
  
  <div class="picture-container">
		<?php print $picture; ?>
		<div class="unitinfo">
			<big><?php echo $node->authorunit['shortname']; ?></big>
		</div>
	</div>

	
  <div class="comment-wrapper<?php if($notArchived !== false) { echo ' archived'; } ?> clearfix">
    <div class="user-pointer image-replacement">Pointer</div>
      <div class="submitted">
        <div class="name"><?php echo $author; ?> <span>(<?php echo $comment->authorinfo; ?>)</span></div>
        <div class="meta small"><?php echo format_date($comment->created,'long'); ?></div>
      </div>

    <div class="content"<?php print $content_attributes; ?>>
      <?php
        hide($content['links']);
        print render($content);
      ?>
      <?php if($notArchived !== false) { ?>
      	<p class="small approval">Dette svar er arkiveret d. <?php echo format_date($notArchived,'long'); ?></p>
      <?php } ?>
      
      <?php print render($content['links']) ?>
      <?php print flag_create_link('answer_helped', $comment->cid); ?>
      
        <?php
        $flags = flag_get_content_flags('comment', $comment->cid, 'answer_helped');
        $tooltip = midtlink_get_who_flagged($flags);
        ?>
        <span class="flag-tooltip-contents" style="display: none;">
          <?php echo $tooltip; ?>
        </span>
        <?php print flag_create_link('archive_comment', $comment->cid); ?>
    </div>
  </div>
</div>
