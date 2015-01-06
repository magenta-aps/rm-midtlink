<?php
  /**
   * user_menu.inc.php
   */
?>

<div id="user-menu">
    
    <?php /* If the user is logged in */ if($user->uid > 0): ?>
    
      <!-- Notifications -->    
      <dl style="" class="notifications dropdown">
        <dt><a id="linkglobal" style="cursor:pointer;"><b><?php echo midtlink_notification_get_teaserbox_num(); ?></b>Notifikationer</a></dt>
        <dd>
					<?php echo midtlink_notification_get_teaserbox(); ?> 
        </dd>
      </dl>
      
      <!-- User profile menu -->
      <dl style="" class="user-profile dropdown">
        <dt><a id="linkg" style="cursor:pointer;">Mig (<?php echo $user->name; ?>)</a></dt>
        <dd>
          <ul id="ulg" class="reset">
          <li class="profile"><?php print l("Profil og aktivitet", "user");
            ?></li>
          <!--<li class="settings"><a href="#">Indstillinger</a></li>-->
          <li class="logout"><?php print l("Log ud", "user/logout"); ?></li>
          </ul>
        </dd>
      </dl>
      
      <!-- Create post -->
      <!--<dl style="" class="new-node dropdown"><a href="<?php echo url('node/add/post'); ?>">Opret indlæg</a></dl>-->
      <dl style="" class="new-node dropdown"><a href="<?php echo url('create_observation'); ?>">Opret indlæg</a></dl>
    
    <?php /* If the user is NOT logged in */ else: ?>
    <?php endif; ?>

</div><!-- /#user-menu -->

<?php /* EOF */ ?>
