<?php

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
