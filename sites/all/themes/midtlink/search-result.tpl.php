<?php

/**
 * @file
 * Default theme implementation for displaying a single search result.
 *
 * This template renders a single search result and is collected into
 * search-results.tpl.php. This and the parent template are
 * dependent to one another sharing the markup for definition lists.
 *
 * Available variables:
 * - $url: URL of the result.
 * - $title: Title of the result.
 * - $snippet: A small preview of the result. Does not apply to user searches.
 * - $info: String of all the meta information ready for print. Does not apply
 *   to user searches.
 * - $info_split: Contains same data as $info, split into a keyed array.
 * - $module: The machine-readable name of the module (tab) being searched, such
 *   as "node" or "user".
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 *
 * Default keys within $info_split:
 * - $info_split['type']: Node type (or item type string supplied by module).
 * - $info_split['user']: Author of the node linked to users profile. Depends
 *   on permission.
 * - $info_split['date']: Last update of the node. Short formatted.
 * - $info_split['comment']: Number of comments output as "% comments", %
 *   being the count. Depends on comment.module.
 *
 * Other variables:
 * - $classes_array: Array of HTML class attribute values. It is flattened
 *   into a string within the variable $classes.
 * - $title_attributes_array: Array of HTML attributes for the title. It is
 *   flattened into a string within the variable $title_attributes.
 * - $content_attributes_array: Array of HTML attributes for the content. It is
 *   flattened into a string within the variable $content_attributes.
 *
 * Since $info_split is keyed, a direct print of the item is possible.
 * This array does not apply to user searches so it is recommended to check
 * for its existence before printing. The default keys of 'type', 'user' and
 * 'date' always exist for node searches. Modules may provide other data.
 * @code
 *   <?php if (isset($info_split['comment'])): ?>
 *     <span class="info-comment">
 *       <?php print $info_split['comment']; ?>
 *     </span>
 *   <?php endif; ?>
 * @endcode
 *
 * To check for all available data within $info_split, use the code below.
 * @code
 *   <?php print '<pre>'. check_plain(print_r($info_split, 1)) .'</pre>'; ?>
 * @endcode
 *
 * @see template_preprocess()
 * @see template_preprocess_search_result()
 * @see template_process()
 */

if($result['bundle'] == 'post') {
	 
	$userinfo = midtlink_utils_get_author_info($extra_info['uid']);
	?>

	<div class="list-item forum">
			<div class="section">
				<div class="picture-container">
					<?php echo theme('user_picture',array('account'=>user_load($extra_info['uid']))); ?>
					<div class="unitinfo">
						<big><?php echo $userinfo['shortname']; ?></big>
					</div>
				</div>
				
				<div class="item-content">
					<div class="content-wrapper">
						<div class="user-pointer image-replacement">Pointer</div>
            <div class="node-type forum"><a href="<?php echo $url; ?>">Forum-indlæg</a></div>
						
						<div class="submitted">
              <div class="title"><h2><a href="<?php print $url; ?>"><?php echo $title; ?></a></h2></div>
							<div class="name small"><?php echo $info_split['user']; ?> (<span><?php echo $userinfo['info']; ?></span>)</div>
							<div class="meta small">Oprettet d. <?php echo format_date($extra_info['created'],'long'); ?></div>
						</div>
						<div class="body">
							<?php print $snippet; ?>
							<a href="<?php print $url; ?>">Læs mere</a>
						</div>
					
						<ul class="categories reset">
							<li></li>
						</ul>
					</div>
				</div>
				<?php if($extra_info['comment_count'] > 0) { ?>
					<div class="post-indicator comments image-replacement"><?php echo $extra_info['comment_count']; ?></div>
				<?php } ?>
			</div>
		</div>
<?php
}
else {
  
  $node = node_load($result['fields']['entity_id']);
  
  $author = $node->uid;
  
  // Display author as the Owner field if it is not empty
  if (isset($node->field_owner['und'])) {
    $author = $node->field_owner['und'][0]['target_id'];
  }

  $authorUser = user_load($author);

  $userinfo = midtlink_utils_get_author_info($author);

    
  $icon_url = $url;
  //  $open_icon_link_in_new_window = false;
  $open_icon_link_in_new_window = true;
  
  // Icon should directly link to first file attachment if it exists.
  if (isset($node->field_knowlegde_file['und'][0])) {
    $furl = file_create_url($node->field_knowlegde_file['und'][0]['uri']);
    $furl = parse_url($furl);
    $icon_url = $furl['path'];
    $open_icon_link_in_new_window = true;
  }
	?>
	<div class="list-item documentation">
    <div class="section">
      <div class="picture-container">
        <?php echo theme('user_picture',array('account'=>$authorUser)); ?>
        <div class="unitinfo">
          <big><?php echo $userinfo['shortname']; ?></big>
        </div>
      </div>
      
      <div class="item-content documentation">  
        <div class="user-pointer image-replacement">Pointer</div>
        <div class="content-wrapper">
          <div class="node-type documentation"><a href="<?php echo $icon_url; ?>"<?php if ($open_icon_link_in_new_window) { echo ' class="open-in-new-window"';} ?>>Vejledning</a></div>

          <div class="submitted">
            <div class="title"><h2><a href="<?php print $url; ?>"><?php echo $title; ?></a></h2></div>
            <div class="name small"><?php echo theme('username', array('account' => $authorUser)); ?> (<span><?php echo $userinfo['info']; ?></span>)</div>
            <div class="meta small">Oprettet d. <?php echo format_date($extra_info['created'],'long'); ?></div>
          </div>

          <div class="body">
            <?php echo $snippet; ?>
            <a href="<?php echo $url; ?>">Læs mere</a>
          </div>
          <ul class="categories reset">
            <li></li>
          </ul>
        </div>
      </div>
      <?php if($extra_info['comment_count'] > 0) { ?>
        <div class="post-indicator comments image-replacement"><?php echo $extra_info['comment_count']; ?></div>
      <?php } ?>
    </div>
  </div>
	<?php
}
