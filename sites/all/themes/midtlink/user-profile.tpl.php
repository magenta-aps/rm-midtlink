<?php
$a = user_load(arg(1));
?>
<div class="profile"<?php print $attributes; ?>>
  
  <div class="main-info">
    <div class="grid-2 alpha">
      <?php print render($user_profile['user_picture']); ?>
    </div>
    
    <div class="grid-6 omega">
      <h1><?php echo check_plain($a->field_fullname['und'][0]['value']); ?></h1>
      
      <ul class="reset">
				<?php
				if(isset($a->field_position['und'][0]['value'])) {
					?> 
					<li>
                      <b>Titel:</b>
                      <span class="val">
                        <?php echo check_plain($a->field_position['und'][0]['value']); ?>
                      </span>
                    </li>
					<?php
        }

				if(isset($a->field_other_job_functions['und'][0]['value'])) {
                  ?>
                  <li>
                    <b>Jobfunktioner:</b>
                    <span class="val">
                      <?php echo check_plain($a->field_other_job_functions['und'][0]['value']);?>
                    </span>
                  </li>
                  <?php
                }

        if(isset($a->field_unit['und'][0]['taxonomy_term'])) {
					?>
					<li>
                      <b>Afdeling:</b>
                      <span class="val">
                        <?php echo check_plain($a->field_unit['und'][0]['taxonomy_term']->name);?>
                      </span>
                    </li>
					<?php
					$mainUnit = midtlink_get_main_unit($a->field_unit['und'][0]['taxonomy_term']->tid);
					if($mainUnit->tid != $a->field_unit['und'][0]['taxonomy_term']->tid) {
						?>
						<li>
                          <b>Hospital:</b>
                          <span class="val">
                            <?php echo check_plain($mainUnit->name);
                            ?>
                          </span>
                        </li>
						<?php
					}
        }
        ?>
      </ul>
    </div>
  </div>

  <div>
    <?php
    if (arg(1) == $user->uid) {
      $title = 'Min aktivitet';
    } else {
      $title = $a->field_fullname['und'][0]['value'] . 's aktivitet';
    }
    ?>
    <h2><?php echo $title; ?></h2>
    <?php
      echo views_embed_view('recent_user_posts', 'default', arg(1));
    ?>
  </div>
  
</div>
