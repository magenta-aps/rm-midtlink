<?php 
  /**
   * main_navigation.inc.php
   */
  
  $homeActive = '';
  $forumActive = '';
  $docuActive = '';
  $obsActive = '';
  
  if($is_front) { $homeActive = ' active'; }
  if(arg(0) == 'obssheet' || arg(0) == 'create_observation') { $obsActive = ' active'; }
  if(isset($node) && $node->type == 'post') { $forumActive = ' active'; }
  if(arg(0) == 'forum' || arg(0) == 'browse_categories') { $forumActive = ' active'; }
  if(arg(0) == 'dokumentation') { $docuActive = ' active'; }
  if(isset($node) && $node->type == 'knowlegde') { $docuActive = ' active'; }
?>

  <ul class="reset">
    <li class="home<?php echo $homeActive; ?>"><a href="<?php echo url(''); ?>">Forside<span>&nbsp;</span></a></li>
    <li class="forum<?php echo $forumActive; ?>"><a href="<?php echo url('forum'); ?>">Forum<span>&nbsp;</span></a></li>
    <li class="documentation<?php echo $docuActive; ?>"><a href="<?php echo url('dokumentation'); ?>">Vejledninger<span>&nbsp;</span></a></li>
    <li class="obsark<?php echo $obsActive; ?>"><a href="<?php echo url('obssheet'); ?>">Oversigter<span>&nbsp;</span></a></li>
  </ul>

<?php /* EOF */ ?>
