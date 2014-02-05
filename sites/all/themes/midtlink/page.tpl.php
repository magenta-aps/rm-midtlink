<?php
  /**
   * page.tpl.php
   */
?>
<div id="header">
  <div class="section container">
    <div id="logo" class="grid-2"><a href="<?php global $base_root; print $base_root; ?>" class="image-replacement" alt="MidtLink">MidtLink</a></div>
    <?php include('includes/user_menu.inc.php'); ?>      
  </div><!-- /.section -->
</div><!-- /#header -->
<?php echo midtlink_login_choose_unit(); ?>
<div id="page" class="container clearfix">
    
    <div id="main-navigation-wrapper" class="grid-12">
      <div class="main-navigation grid-8 alpha">
        <?php /* Main navigation */ if($user->uid > 0) include('includes/main_navigation.inc.php'); ?>
      </div>
      
      <div class="search-form grid-4 omega">
        <?php /* Search form */ if($user->uid > 0) include('includes/search.inc.php'); ?>
      </div>
    </div><!-- /.grid-12 -->
  
    <div class="grid-12">
      <div id="content" class="grid-8 alpha">

        <!-- Messages -->
        <?php if ($messages): ?>
          <div id="messages"><div class="section clearfix">
            <?php print $messages; ?>
          </div></div> <!-- /.section, /#messages -->
        <?php endif; ?>

        
        <!-- Page title -->

        
        <!-- Tabs -->
        <?php if ($tabs): ?>
          <div class="tabs">
            <?php print render($tabs); ?>
          </div>
        <?php endif; ?>
      
        <?php print render($action_links); ?>
        
        <?php print render($page['content']); ?>
      </div><!-- /#content -->
      
      <?php
      /* Hide the sidebar on the Obsark page and admin permissions page */
        if($_GET['q'] != 'admin/people/permissions'): ?>
          <div id="sidebar" class="grid-4 omega">
            <div class="section">
							<?php if(arg(0) == 'search') {
								echo render($page['searchfilters']);
							}
							else {
								if($user->uid > 0) { include('includes/sidebar.inc.php'); }
							}
							?>
            </div>
          </div>
      <?php endif; ?>
      
    </div><!-- /.grid-12 -->

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
