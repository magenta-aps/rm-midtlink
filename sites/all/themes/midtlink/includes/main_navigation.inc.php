<?php 
  /**
   * main_navigation.inc.php
   */
  
  $homeActive = '';
  $forumActive = '';
  $docuActive = '';
  $obsActive = '';
  
  if($is_front) { $homeActive = ' active'; }
  if(arg(0) == 'obssheet') { $obsActive = ' active'; }
  if(isset($node) && $node->type == 'post') { $forumActive = ' active'; }
  if(arg(0) == 'forum' || arg(0) == 'browse_categories' || arg(0) == 'taxonomy'
    || arg(0) == 'create_observation') { $forumActive = ' active'; }
  if(arg(0) == 'dokumentation') { $docuActive = ' active'; }
  if(isset($node) && $node->type == 'knowlegde') { $docuActive = ' active'; }
  
  // For searches, set active tab based on current bundle being searched
  if (arg(0) == 'search') {
    $filters = $_GET['f'];
    foreach ($filters as $f) {
      if (preg_match('/bundle:(.+)/', $f, $matches)) {
        if ($matches[1] == 'post') {
          $forumActive = ' active';
        } else if ($matches[1] == 'knowlegde') {
          $docuActive = ' active';
        }
      }
    }
  }
  
 include_once 'current_tab.inc.php';
?>

  <ul class="reset">
    <li class="home<?php echo $homeActive; ?>"><a href="<?php echo url(''); ?>">Forside<span>&nbsp;</span></a></li>
    <li class="forum<?php echo $forumActive; ?>"><a href="<?php echo url('forum'); ?>">Forum<span>&nbsp;</span></a></li>
    <li class="documentation<?php echo $docuActive; ?>"><a href="<?php echo url('dokumentation'); ?>">Vejledninger<span>&nbsp;</span></a></li>
    <li class="obsark<?php echo $obsActive; ?>"><a href="<?php echo url('obssheet'); ?>">Oversigter<span>&nbsp;</span></a></li>
  </ul>

<?php /* EOF */ ?>
