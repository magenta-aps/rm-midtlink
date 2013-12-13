<?php
set_time_limit(0);
/**
 * @file
 * The PHP page that serves all page requests on a Drupal installation.
 *
 * The routines here dispatch control to the appropriate handler, which then
 * prints the appropriate page.
 *
 * All Drupal code is released under the GNU General Public License.
 * See COPYRIGHT.txt and LICENSE.txt.
 */

/**
 * Root directory of Drupal installation.
 */
define('DRUPAL_ROOT', getcwd());

require_once DRUPAL_ROOT . '/includes/bootstrap.inc';
drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);

$users = file('./users2.txt');
foreach($users as $ux) {
	$u = explode(';',$ux);
	
	$mail = trim($u[2]);
	if(trim($mail)=='') {
		$mail='noemail-'.$u[0].'@midtlink.invalid';
	}
	
	$new_user = array(
      'name' => $u[0],
      'pass' => user_password(),
      'mail' => $mail,
      'init' => $mail,
      'field_fullname' => array(LANGUAGE_NONE => array(array('value' => $u[1]))),
      'field_position' => array(LANGUAGE_NONE => array(array('value' => $u[3]))),
      'status' => 1,
      'access' => REQUEST_TIME,
      'roles' => array(DRUPAL_AUTHENTICATED_RID => TRUE),
		);
	$account = user_save(null, $new_user);
}
