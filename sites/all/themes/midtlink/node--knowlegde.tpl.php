<?php
$categories = array();
if(isset($node->field_category['und'])) {
	foreach($node->field_category['und'] as $kw) {
		if(empty($kw['taxonomy_term']->name)) { continue; }
		$categories[] = array('tid'=>$kw['taxonomy_term']->tid,'name'=>$kw['taxonomy_term']->name);
	}
}

if(!$page) {
  $icon_url = $node_url;
  // Icon should directly link to first file attachment if it exists.
  if (isset($node->field_knowlegde_file['und'][0])) {
    $url = file_create_url($node->field_knowlegde_file['und'][0]['uri']);
    $url = parse_url($url);
    $icon_url = $url['path'];
  }
	?>
	<div class="item-content documentation">  
		<div class="content-wrapper">
			<div class="node-type documentation"><a href="<?php echo $icon_url; ?>">Vejledning</a></div>
    
    	<div class="title"><h2><a href="<?php echo $node_url; ?>"><?php echo $title; ?></a></h2></div>
    	<div class="body">
				<?php echo render($content['field_knowlegde_content']); ?>
				<a href="<?php echo $node_url; ?>">Læs mere</a>
			</div>
			<ul class="categories reset">
    		<?php foreach($categories as $c) { ?>
					<li><a href="<?php echo url('dokumentation/'.arg(1).'/'.$c['tid']); ?>"><?php echo $c['name']; ?></a></li>
				<?php } ?>
    	</ul>
    </div>
  </div>
	<?php
}
else {
	$keywords = array();
	if(isset($node->field_keywords['und'])) {
		foreach($node->field_keywords['und'] as $kw) {
			if(empty($kw['taxonomy_term']->name)) { continue; }
			$keywords[] = array('tid'=>$kw['taxonomy_term']->tid,'name'=>$kw['taxonomy_term']->name);
		}
	}
?>
<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> node-post clearfix"<?php print $attributes; ?>>
	<div class="content clearfix"><div class="post-wrapper">
		<div class="submitted">
			<div class="meta small">Oprettet d. <?php echo format_date($node->created,'long'); ?></div>
		</div>
		<h2><?php echo $title; ?></h2>
		<div class="taxonomies">
			<div class="categories">
				<ul class="reset">
					<?php
					foreach($categories as $c) {
						echo '<li><a href="'.url('dokumentation/'.$node->field_knowlegde_unit_ref['und'][0]['target_id'].'/'.$c['tid']).'">'.$c['name'].'<span>&nbsp;</span></a></li>';
					}
					?>
				</ul>
			</div>
			<!--<div class="tags">
				<h2>N&oslash;gleord:</h2>
				<ul class="reset">
				<?php
				foreach($keywords as $k) {
					echo '<li><a href="'.url('taxonomy/term/'.$k['tid']).'">'.$k['name'].'</a></li>';
				}
				if(sizeof($keywords)<=0) {
					echo '<li class="empty"><em>Ingen nøgleord tilføjet</em></li>';
				}
				?>
				</ul>
			</div>-->
		</div><!--/.taxonomies-->
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
