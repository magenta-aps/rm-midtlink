<?php
$categories = array();
if(isset($node->field_category['und'])) {
	foreach($node->field_category['und'] as $kw) {
		if(empty($kw['taxonomy_term']->name)) { continue; }
    $mainUnit = midtlink_get_main_unit_from_subunit($node->field_unit['und'][0]['tid'])->tid;
    $urlSuffix = '?tid=' . $mainUnit; $class = '';
    $parentUnitTerm = midtlink_get_main_unit_from_local_keyword($kw['taxonomy_term']->tid);
    if ($parentUnitTerm) {
      $urlSuffix = '?tid=' . $parentUnitTerm->tid;
      $class = 'local';
    }
      if (variable_get('midtlink_forum_level', 'unit') == 'all') {
        $urlSuffix = '';
      }
		$categories[] = array('tid'=>$kw['taxonomy_term']->tid,'name'=>$kw['taxonomy_term']->name, 'urlSuffix' => $urlSuffix, 'class' => $class);
	}
}
//$approvedThread = midtlink_utils_post_approved_answer($node->nid);

if(!$page) {
	global $miniTeaser;
	?>
	<div class="list-item forum<?php if($miniTeaser) { ?> miniteaser<?php } ?>">
		<div class="section">
			<div class="picture-container">
				<?php print $user_picture; ?>
				<div class="unitinfo">
					<big><?php echo $authorinfo['shortname']; ?></big>
				</div>
			</div>

			<div class="item-content">
				<div class="content-wrapper">
					<div class="user-pointer image-replacement">Pointer</div>
					<?php if(!$miniTeaser) { ?><div class="node-type forum"><a href="<?php echo $node_url; ?>">Forum-indlæg</a></div><?php } ?>

					<div class="submitted">
            <div class="title"><h2><a href="<?php echo $node_url; ?>"><?php echo $title; ?></a></h2></div>
            <div class="name small"><?php echo $name; ?><?php if(!$miniTeaser) { ?> <span>(<?php echo $authorinfo['info']; ?>)</span><?php } ?></div>
                      <?php if ($node->created == $node->changed &&
                        $node->last_comment_timestamp <= $node->created) { ?>
                        <div class="meta small">Oprettet d. <?php echo format_date($node->created,'long'); ?></div>
                      <?php } else {
                        $last_updated = max($node->changed, $node->last_comment_timestamp);
                        ?>
                        <div class="meta small">Opdateret d. <?php echo
                          format_date($last_updated,'long'); ?></div>
                      <?php } ?>
					</div>


					<?php if(!$miniTeaser) { ?>
						<div class="body">
							<?php echo render($content['field_description']); ?>
							<a href="<?php echo $node_url; ?>">Læs mere</a>
						</div>

						<ul class="categories reset">
							<?php foreach($categories as $c) { ?>
							<li><a href="<?php echo url('forum/'.$c['tid']).$c['urlSuffix']; ?>"<?php echo ' class="' . $c['class'] . '"';?>><?php echo $c['name']; ?></a></li>
							<?php } ?>
						</ul>
					<?php } ?>
				</div>
			</div>


			<?php if($node->comment_count > 0) { ?>
			<div class="post-indicator comments image-replacement tooltip" original-title="Indlægget er blevet besvaret <?php echo $node->comment_count.' '.($node->comment_count == 1 ? 'gang' : 'gange'); ?>"><?php echo $node->comment_count; ?></div>
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

<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>

	<div class="picture-container">
		<?php print $user_picture; ?>
		<div class="unitinfo">
			<small>Tilknyttet</small>
			<big><?php echo $authorinfo['shortname']; ?></big>
		</div>
  </div>

  <div class="content post clearfix"<?php print $content_attributes; ?>>
    <div class="post-wrapper">
      <div class="user-pointer image-replacement">Pointer</div>

      <h1><?php print $title; ?></h1>

      <div class="submitted">
        <div class="name"><?php echo $name; ?> <span>(<?php echo $authorinfo['info']; ?>)</span></div>
        <?php
        //midtlink_get_main_unit
        $mainUnit = midtlink_get_main_unit($node->field_unit['und'][0]['tid']);
        ?>
        <div class="meta small">
					Indlæg tilknyttet
					<?php echo l($content['field_unit'][0]['#options']['entity']->name,'obssheet/unit/'.$content['field_unit'][0]['#options']['entity']->tid); ?>
				</div>
        <div class="meta small">Oprettet d. <?php echo format_date($node->created,'long'); ?></div>
        <?php if (!($node->created == $node->changed &&
          $node->last_comment_timestamp <= $node->created)) {
          $last_updated = max($node->changed, $node->last_comment_timestamp);
          ?>
          <div class="meta small">Opdateret d. <?php echo format_date($last_updated,'long'); ?></div>
        <?php } ?>
      </div>

      <div class="taxonomies">
        <div class="categories">
          <ul class="reset">
						<?php
						foreach($categories as $c) {
							echo '<li><a href="'.url('forum/'.$c['tid']).$c['urlSuffix'].'"'.($c['class'] ? ' class="' . $c['class'].'"' : ''). '>'.$c['name'].'<span>&nbsp;</span></a></li>';
						}
						?>
          </ul>
        </div>

        <div class="tags">
          <h2>N&oslash;gleord:</h2>
          <ul class="reset">
            <?php
						foreach($keywords as $k) {
							echo '<li><a href="'.url('taxonomy/keyword/'.$k['tid']).'">'.$k['name'].'</a></li>';
						}
						if(sizeof($keywords)<=0) {
							echo '<li class="empty"><em>Ingen nøgleord tilføjet</em></li>';
						}
						?>
          </ul>
        </div>
      </div><!--/.taxonomies-->

      <div class="post-body">
        <?php
          hide($content['comments']);
          print render($content['field_description']);
        ?>
			</div>
			<div class="post-body">
					<?php echo render($content['field_responsible']); ?>
					<?php /*echo render($content['field_sdnumber']);*/ ?>
      </div><!--/.post-body-->

      <?php
      $fwdMailMsg = "Hej,

Jeg vil gerne dele dette indlæg fra MidtLink med dig:
".$node->title."
".str_replace('https://','http://',url('node/'.$node->nid,array('absolute'=>true)))."

Tryk på linket for at se det fulde indlæg og deltag endelig i dialogen - også gerne ved at markere med et 'Godt svar', hvis du synes andre har bidraget med værdifuld viden.

";
      ?>
      <a target="_blank" href="/mailto.php?s=<?php echo rawurlencode('Se dette indlæg fra MidtLink: '.$node->title); ?>&b=<?php echo rawurlencode($fwdMailMsg); ?>" class="post-indicator email image-replacement" title="Del dette indl&aelig;g via email"></a>
      <?php if((integer)$node->comment_count > 0) { ?>
				<div class="post-indicator comments image-replacement tooltip" original-title="Indlægget er blevet besvaret <?php echo $node->comment_count.' '.($node->comment_count == 1 ? 'gang' : 'gange'); ?>"><?php echo $node->comment_count; ?></div>
      <?php } ?>
    </div><!--/.post-wrapper-->

    <div class="user-flags clearfix">
      <?php print flag_create_link('same_question', $node->nid); ?>
      <?php print flag_create_link('subscribe', $node->nid); ?>
    </div>

    <div class="admin-flags clearfix">
			<?php print flag_create_link('obssheet_unit', $node->nid); ?>
			<?php print flag_create_link('obssheet_global', $node->nid); ?>
    </div>

  </div><!--/.content-->

  <div class="clearfix" style="clear:both;">
    <?php print render($content['comments']); ?>
  </div>

</div>
<?php
}
?>
