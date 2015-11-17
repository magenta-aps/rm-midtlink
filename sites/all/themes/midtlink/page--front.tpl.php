<?php
  /**
   * page--front.tpl.php
   * The front page.
   */
?>

<div id="header">
  <div class="section container">
    <div id="logo" class="grid-2"><a href="<?php global $base_url; print $base_url; ?>" class="image-replacement" alt="MidtLink">MidtLink</a></div>
    <?php include('includes/user_menu.inc.php'); ?>      
  </div><!-- /.section -->
</div><!-- /#header -->
<?php echo midtlink_login_choose_unit(); ?>
<div id="page" class="container clearfix">
    
    <?php /* If the user is logged in */ if($user->uid > 0): ?>
    
      <div id="main-navigation-wrapper" class="grid-12">
        <div class="main-navigation grid-8 alpha">
          <?php /* Main navigation */ include('includes/main_navigation.inc.php'); ?>
        </div>
        
        <div class="search-form grid-4 omega">
          <?php /* Search form */  include('includes/search.inc.php'); ?>
        </div>
      </div><!-- /.grid-12 -->
    
      <div class="grid-12">
        <div id="content" class="grid-8 alpha">
					<div id="add-post" class="block">
            <?php print render($page['front_text']); ?>
						<div class="content">
                          <div class="search-form-2">
                            <?php print render(drupal_get_form('search_block_form', TRUE, 'Søg i MidtLink')); ?>
                          </div>
						</div>
					</div>
					
					
					<div class="grid-4 alpha">
					<?php echo midtlink_recent_posts_get_block('left'); ?>
					</div>
          <div class="grid-4 alpha">
					<?php echo midtlink_recent_posts_get_block('right'); ?>
					</div>
        </div><!-- /#content -->

            <div id="sidebar" class="grid-4 omega solid">

              <?php if($user->uid > 0) include('includes/sidebar.inc.php'); ?>

              <div class="section">
                
                <div id="about" class="block">  
                  <?php print render($page['front_sidebar_about']); ?>
                </div>
              
              </div>
              
            </div><!--/#sidebar-->
        
      </div><!-- /.grid-12 -->
    <?php /* If the user is NOT logged in */ else: ?>
    
    <div class="grid-6">
      <h1>Sammen st&aring;r vi st&aelig;rkere</h1>
      <p class="large">MidtLink er din genvej til hurtige svar p&aring; dine EPJ-sp&oslash;rgsm&aring;l. F&aring; hj&aelig;lp og sparring fra dine kollegaer her og nu, og giv tilbage af din egen viden n&aring;r du kan.</p>
      <?php print drupal_render(drupal_get_form('midtlink_login_form')); ?>
      <!--<img style="display:block; margin:0 auto;" src="<?php global $base_root; global $theme_path; echo $base_root . $base_path . $theme_path . '/images/process_large.jpg'; ?>" />-->
    </div>
    <?php endif; ?>
  
</div><!-- /#page.container -->

<?php /* If the user is logged in */ if($user->uid > 0): ?>
  <div id="bottom" class="clearfix">
    <?php include('includes/footer.inc.php'); ?>
    <?php include('includes/subfooter.inc.php'); ?>
  </div>
<?php endif; ?>

<?php /* EOF */ ?>
<script type="text/javascript">
/*<![CDATA[*/
(function() {
var sz = document.createElement('script'); sz.type = 'text/javascript'; sz.async = true;
sz.src = '//ssl.siteimprove.com/js/siteanalyze_2642.js';
var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(sz, s);
})();
/*]]>*/
</script>
