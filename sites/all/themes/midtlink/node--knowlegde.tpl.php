<?php
$categories = array();
if(isset($node->field_category['und'])) {
	foreach($node->field_category['und'] as $kw) {
		if(empty($kw['taxonomy_term']->name)) { continue; }
    $unit_tid = $node->field_unit['und'][0]['tid']; $class = '';
    $parentUnitTerm = midtlink_get_main_unit_from_local_keyword($kw['taxonomy_term']->tid);                
    if ($parentUnitTerm) {
      $unit_tid = $parentUnitTerm->tid;
      $class = 'local';
    }
		$categories[] = array('tid'=>$kw['taxonomy_term']->tid,'name'=>$kw['taxonomy_term']->name, 'unit_tid' => $unit_tid, 'class' => $class);
	}
}

$author = $node->uid;

// Display author as the Owner field if it is not empty
if (isset($node->field_owner['und'])) {
  $author = $node->field_owner['und'][0]['target_id'];
}

$authorUser = user_load($author);

$authorinfo = midtlink_utils_get_author_info($author);

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
      
      <div class="submitted">
        <div class="title"><h2><a href="<?php echo $node_url; ?>"><?php echo $title; ?></a></h2></div>
        <div class="name small"><?php echo theme('username', array('account' => $authorUser)); ?><?php if(!$miniTeaser) { ?> <span>(<?php echo $authorinfo['info']; ?>)</span><?php } ?></div>
        <div class="meta small">Oprettet d. <?php echo format_date($node->created,'long'); ?></div>
      </div>
      
    	<div class="body">
				<?php echo render($content['field_knowlegde_content']); ?>
				<a href="<?php echo $node_url; ?>">Læs mere</a>
			</div>
			<ul class="categories reset">
    		<?php foreach($categories as $c) { ?>
					<li><a href="<?php echo url('dokumentation/'.$c['unit_tid'].'/'.$c['tid']); ?>"<?php echo ' class="' . $c['class'] . '"';?>><?php echo $c['name']; ?></a></li>
				<?php } ?>
    	</ul>
      <?php if($node->comment_count > 0) { ?>
			<div class="post-indicator comments image-replacement tooltip" original-title="Der er blevet kommenteret på vejledningen <?php echo $node->comment_count.' '.($node->comment_count == 1 ? 'gang' : 'gange'); ?>"><?php echo $node->comment_count; ?></div>
			<?php } ?>
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
<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> node-post documentation clearfix"<?php print $attributes; ?>>
  <div class="picture-container">
		<?php print theme('user_picture', array('account' => $authorUser)); ?>
		<div class="unitinfo">
			<small>Tilknyttet</small>
			<big><?php echo $authorinfo['shortname']; ?></big>
		</div>
  </div>
	<div class="content post clearfix"><div class="post-wrapper documentation">
    <h1><?php echo $title; ?></h1>
    <div class="submitted">
        <div class="name"><?php echo theme('username', array('account' => user_load($author))); ?><?php if(!$miniTeaser) { ?> <span>(<?php echo $authorinfo['info']; ?>)</span><?php } ?></div>
        <div class="meta small">Oprettet d. <?php echo format_date($node->created,'long'); ?></div>
    </div>
		<div class="taxonomies">
			<div class="categories">
				<ul class="reset">
					<?php
					foreach($categories as $c) {
						echo '<li><a href="'.url('dokumentation/'.$c['unit_tid'].'/'.$c['tid']).'"'.' class="' . $c['class'] . '"'.'>'.$c['name'].'<span>&nbsp;</span></a></li>';
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
			hide($content['field_unit']);
      hide($content['field_owner']);
			print render($content);
      ?>
      <div class="field field-name-field-unit field-type-list-text field-label-above"><div class="field-label">Vejledning gyldig for:&nbsp;</div><div class="field-items">
      <?php
      foreach ($content['field_unit']['#items'] as $i) {
        $term = taxonomy_term_load($i['tid']);
        echo '<div class="field-item even">' . l($term->name, 'dokumentation/' . $i['tid']) . '</div>';
      }
      ?>
      </div></div>
      <?php
			?>
		</div>
    <?php if((integer)$node->comment_count > 0) { ?>
				<div class="post-indicator comments image-replacement tooltip" original-title="Der er blevet kommenteret på vejledningen <?php echo $node->comment_count.' '.($node->comment_count == 1 ? 'gang' : 'gange'); ?>"><?php echo $node->comment_count; ?></div>
    <?php } ?>
	</div>
  </div>
  <div class="clearfix" style="clear:both;">
    <?php print render($content['comments']); ?>
  </div>
</div>
<?php } ?>
