<?php
  /**
   * subfooter.inc.php
   */
?>

<div id="subfooter" class="clearfix">
  <div class="container">
    
    <div class="main-navigation grid-8">
      <?php /* Main navigation */ include('main_navigation.inc.php'); ?>
      <div class="termlink"><?php echo l('Brugerbetingelser for MidtLink','betingelser'); ?></div>
    </div>
    
    <div class="search-form grid-4">
      <p class="hint image-replacement">Find svar på dine sp&oslash;rgsm&aring;l</p>
      <?php /* Search form */ include('search.inc.php'); ?>
    </div>
  
  </div>
</div>

<?php /* EOF */ ?>
