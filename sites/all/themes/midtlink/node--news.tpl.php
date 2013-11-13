<?php
if(!$page) {
	?>
	<h3><a href="<?php echo $node_url; ?>"><?php echo $title;?></a></h3>
	<div class="submitted">
		<div class="meta small"><?php echo format_date($node->created,'long'); ?></div>	
	</div>
	<div class="body">
		<?php echo render($content['field_news_content']); ?>
	</div>
	<?php
}
else {
?>
<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> node-post clearfix"<?php print $attributes; ?>>
	<div class="content clearfix"><div class="post-wrapper">
		<div class="submitted">
			<div class="meta small">Oprettet d. <?php echo format_date($node->created,'long'); ?></div>
		</div>
		<h2><?php echo $title; ?></h2>
		<div class="post-body">
			<?php
			hide($content['comments']);
			hide($content['links']);
			hide($content['field_category']);
			hide($content['field_keywords']);
			print render($content);
			?>
		</div>
	</div></div>
</div>
<?php } ?>
