<?php
if(arg(0) == 'dokumentation' || (isset($node) && ($node->type == 'news' || $node->type == 'knowlegde'))) {
?>
	<div id="categories" class="block clearfix" style="margin-bottom:10px;">
		<?php include('block_categories_documentation.inc.php'); ?>
		
	</div>
	
<div id="links" class="block solid">
	<h2>Nyttige links</h2>
	<div class="content">
		<ul class="reset">
      <?php include('block_links.inc.php'); ?>
	</div>
</div>
<!--
<div id="news" class="block solid">
	<h2>Nyheder</h2>
	<div class="content">
		<ul class="reset">
			<?php
			$sql = "SELECT nid FROM node WHERE status = 1 AND type = 'news' ORDER BY created DESC";
			$res = db_query($sql);
			foreach($res as $r) {
				?>
				<li class="clearfix">
					<?php echo render(node_view(node_load($r->nid), 'teaser')); ?>
				</li>	
				<?php
			}
			?>
		</ul>
	</div>
</div>
-->
	
<?php
}
else {
?>
	<div id="categories" class="block clearfix" style="margin-bottom:10px;">
		<?php /* Block: Categories */ include('block_categories.inc.php'); ?>
	</div>
	
	<div id="links" class="block solid">
		<h2>Nyttige links</h2>
		<div class="content">
			<ul class="reset">

      <?php include('block_links.inc.php'); ?>
				
		</div>
	</div>
<?php
}
?>
