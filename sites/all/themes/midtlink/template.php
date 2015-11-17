<?php

function midtlink_form_alter(&$form, &$form_state, $form_id) {
  if ($form_id == 'search_block_form') {
    $placeholder = count($form_state['build_info']['args']) > 1 ?
      $form_state['build_info']['args'][1] : "Søg her";
    $form['search_block_form']['#attributes']['placeholder'] = $placeholder;
    // Search only in specific bundle on Forum and Vejledning tabs.
    if (arg(0) == 'forum') { 
      $searchBundle = 'post';
    } else if (arg(0) == 'dokumentation') {
      $searchBundle = 'knowlegde';
    } else {
      return;
    }
    
    //$form['#action'] .= '?f[0]=' . 'bundle' . '%3A' . $searchBundle;
    $form['f[0]']['#type'] = 'hidden';
    $form['f[0]']['#value'] = 'bundle:' . $searchBundle;

    // We need to add a submit, because the search form redirects to a specific place
    $form['#submit'][] = 'midtlink_search_submit';
  }
}

function midtlink_search_submit($form, &$form_state) {
  //$form_id = $form['form_id']['#value'];
  
  // Form redirect takes a separate query parameter like drupal_goto.
  $form_state['redirect'] = array(
    $form_state['redirect'],
    array(
      'query' =>
      array(
        'f[0]' => $form_state['values']['f[0]'])
      )
    );
}

/**
 * Implements theme_preprocess_block().
 */
function midtlink_preprocess_block(&$vars) {
  $block = $vars['block'];
  // Add "grid-4" class to footer blocks
  if (strpos($block->region, 'footer_block') === 0) {
    $vars['classes_array'] = array_merge($vars['classes_array'], array('grid-4'));
  }
}

/**
 * Returns HTML for who flagged a specific flag.
 * @param array $flags Result from flag_get_content_flags
 * @return string
 */
function midtlink_get_who_flagged ($flags) {
  $tooltip = '';

  if (!empty($flags)) {
    ob_start();
?>    
<div>
  <div class="flag-tooltip-heading" style="text-align: center; margin-bottom: 8px;">Brugerne har markeret dette som et godt svar</div>
<?php
    $flagsInfo = array();
    foreach ($flags as $uid => $flag) {
      $u = user_load($uid);

      $flagInfo = array();

      $flagInfo['name'] = entity_label('user', $u);
      $flagInfo['authorinfo'] = midtlink_utils_get_author_info($uid);
      $flagInfo['uid'] = $uid;
      $flagInfo['user'] = $u;

      $flagsInfo[] = $flagInfo;
    }

    foreach ($flagsInfo as $flag) { 
?>
  <div class="flag-author" style="clear: both;">
    <div style="float:left; width: 25px; margin: 2px;"><?php echo theme('user_picture', array('account' => $flag['user'])); ?></div>
    <div class="name" style="margin-left: 35px; text-align: left"><?php echo theme('username', array('account' => $flag['user'])); ?><br/><span>(<?php echo $flag['authorinfo']['info']; ?>)</span></div>
    <div style="clear: both;"></div>
  </div>
<?php
    }
?>
</div>
<?php
    $tooltip = ob_get_clean();
  }

  return $tooltip;
}


function midtlink_form_comment_form_alter(&$form, &$form_state) {
  // Hide 'Your Name' in comment's form
  $form['author']['#access'] = false;
}

/* Changes the output of the breadcrumb */
function midtlink_breadcrumb($variables) {
  $breadcrumb = $variables['breadcrumb'];

  if (!empty($breadcrumb)) {
    $output = '<h2>' . t('You are here') . ": " . '</h2>';

    $output .= '<div class="breadcrumb">' . implode('&ensp;/&ensp;', $breadcrumb) . '</div>';
    return $output;
  }
}


function midtlink_username_alter(&$name, $account) {
  //Display the user's uid instead of name.
  if (isset($account->uid) && $account->uid != '') {
		$n = '';
		if(isset($account->field_fullname['und'][0]['value']) && $account->field_fullname['und'][0]['value']!= '') {
			$n = $account->field_fullname['und'][0]['value'];
		}
		
		$sql = "SELECT field_fullname_value FROM {field_data_field_fullname}
			WHERE entity_type = 'user' AND bundle = 'user' AND entity_id = :uid";
		$res = db_query($sql,array(':uid'=>$account->uid));
		if($res->rowCount() > 0) {
			$n = $res->fetchColumn();
		}
		
		
		if(empty($n)) { 
			$n = $account->name;
		}
    $name = t($n, array('!uid' => $account->uid));
  }
}

function midtlink_preprocess_username(&$variables) {
  $account = $variables['account'];

  $variables['extra'] = '';
  if (empty($account->uid)) {
    $variables['uid'] = 0;
  }
  else {
    $variables['uid'] = (int) $account->uid;
  }
	$name = $variables['name_raw'] = format_username($account);
  $variables['name'] = check_plain($name);

  $variables['profile_access'] = user_access('access user profiles');
  $variables['link_attributes'] = array();
  // Populate link path and attributes if appropriate.
  if ($variables['uid'] && $variables['profile_access']) {
    // We are linking to a local user.
    $variables['link_attributes'] = array('title' => t('View user profile.'));
    $variables['link_path'] = 'user/' . $variables['uid'];
  }
  elseif (!empty($account->homepage)) {
    // Like the 'class' attribute, the 'rel' attribute can hold a
    // space-separated set of values, so initialize it as an array to make it
    // easier for other preprocess functions to append to it.
    $variables['link_attributes'] = array('rel' => array('nofollow'));
    $variables['link_path'] = $account->homepage;
    $variables['homepage'] = $account->homepage;
  }
  // We do not want the l() function to check_plain() a second time.
  $variables['link_options']['html'] = TRUE;
  // Set a default class.
  $variables['attributes_array'] = array('class' => array('username'));
}

function midtlink_preprocess_search_result(&$vars) {
	$vars['extra_info']['comment_count'] = $vars['result']['fields']['is_comment_count'];
	$vars['extra_info']['uid'] = $vars['result']['fields']['is_uid']; 
	$vars['extra_info']['type'] = $vars['result']['fields']['entity_type']; 
	$vars['extra_info']['created'] = $vars['result']['fields']['created'];
}


function midtlink_preprocess_user_picture(&$variables) {
  $variables['user_picture'] = '';
  if (variable_get('user_pictures', 0)) {
    $account = $variables['account'];
    if (!empty($account->picture)) {
      if (is_numeric($account->picture)) {
        $account->picture = file_load($account->picture);
      }
      if (!empty($account->picture->uri)) {
        $filepath = $account->picture->uri;
      }
    }
    elseif (variable_get('user_picture_default', '')) {
      $filepath = variable_get('user_picture_default', '');
    }
    if (isset($filepath)) {
      $alt = t("@user's picture", array('@user' => format_username($account)));
      // If the image does not have a valid Drupal scheme (for eg. HTTP),
      // don't load image styles.
      if (module_exists('image') && file_valid_uri($filepath) && $style = variable_get('user_picture_style', '')) {
        $variables['user_picture'] = theme('image_style', array('style_name' => $style, 'path' => $filepath, 'alt' => $alt, 'title' => $alt));
      }
      else {
        $variables['user_picture'] = theme('image', array('path' => $filepath, 'alt' => $alt, 'title' => $alt));
      }
      if (!empty($account->uid) && user_access('access user profiles')) {
        $attributes = array(
          'attributes' => array('title' => t('View user profile.')),
          'html' => TRUE,
        );
        
        global $user;
        if($account->uid == $user->uid) {
					$chgProfileImgInfo = '<span>Du kan ændre dit profilbillede på <form action="https://serviceportal.rm.dk/forside/forside.jsf" target="_blank">
          <input type="submit" value="Min profil" class="form-submit">
        </form></span>';
					$variables['user_picture'] = '<div class="tooltip-super">'.$variables['user_picture'].$chgProfileImgInfo.'</div>';
				}
				$variables['user_picture'] = l($variables['user_picture'], "user/$account->uid", $attributes);
      
      }
    }
  }
}

function midtlink_get_category_link($category) {
  global $activeMainTID;
  $i = $category;
  if (arg(0) == 'forum') {
    return l($i->name, 'forum/'.$i->tid, array('query' => array('tid' => $activeMainTID)));
  } else if (arg(0) == 'dokumentation') {
    $tid = $activeMainTID;
    if (!$tid) {
      $tid = 'all';
    }
    return l($i->name, 'dokumentation/'.$tid.'/'.$i->tid);
  } else if (arg(0) == 'obssheet') {
    return l($i->name,$_GET['q'], array('query' => array('filter_category' =>
      $i->tid)));
  } else {
    return l($i->name, 'taxonomy/keyword/'.$i->tid);
  }
}

function midtlink_display_category_links($categories) {
  $c = 0;
  foreach($categories as $i) {
    $c++;
    echo '<li class="'.($c%2==0 ? 'even' : 'odd').'">' .midtlink_get_category_link($i).'</li>'."\n";
  }
}

function midtlink_preprocess_node(&$variables) {
  $node = $variables['node'];
  if ($node->type == 'post' || $node->type == 'knowlegde') {
    // Use the Owner field to load author info if it is not empty
    if (isset($node->field_owner['und'])) {
      $author_uid = $node->field_owner['und'][0]['target_id'];
    } else {
      $author_uid = $node->uid;
    }
    $variables['authorinfo'] = midtlink_utils_get_author_info($author_uid);
  }
}