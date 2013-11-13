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
			<?php
			$sql = "SELECT fl.field_link_url as url, fl.field_link_title title, fld.field_link_desc_value as link_desc
				FROM node n
				INNER JOIN field_data_field_link fl ON fl.entity_type = 'node' AND fl.bundle = 'link' AND fl.entity_id = n.nid
				LEFT JOIN field_data_field_link_desc fld ON fld.entity_type = 'node' AND fld.bundle = 'link' AND fld.entity_id = n.nid 
				WHERE n.type = 'link' AND n.status = 1";
			$res = db_query($sql);
			foreach($res as $r) {
				?>
				<li>
					<a href="<?php echo $r->url; ?>"><?php echo $r->title; ?></a>
					<p class="small"><?php echo $r->link_desc; ?></p>
				</li>
				<?php
			}
			?>
			
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
	<div id="categories" class="block">
		<?php /* Block: Categories */ include('block_categories.inc.php'); ?>
	</div>
<?php
}
?>
