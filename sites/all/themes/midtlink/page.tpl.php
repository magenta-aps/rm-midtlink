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
  
<script type="text/javascript">
var LHCChatOptions = {};
LHCChatOptions.attr = new Array();
//LHCChatOptions.attr.push({'name':'Transaction ID 2','value':'','type':'text','size':12,'show':'on'});
LHCChatOptions.opt = {widget_height:340,widget_width:300,popup_height:520,popup_width:500};
LHCChatOptions.attr_prefill = new Array();
//LHCChatOptions.attr_prefill.push({'name':'email','value':'remdex@gmail.com'});
//LHCChatOptions.attr_prefill.push({'name':'phone','value':'370454654'});
LHCChatOptions.attr_prefill.push({'name':'username','value':'<?php 
global $user;
$user_fields = user_load($user->uid);
echo $user_fields->field_fullname[LANGUAGE_NONE][0]['value'] . ' ('. $user->unitName . ')';
?>'});
  (function() {
var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
var refferer = (document.referrer) ? encodeURIComponent(document.referrer) : '';
var location  = (document.location) ? encodeURIComponent(document.location) : '';
po.src = '//midtlink-live/lhc_web/index.php/chat/getstatus/(click)/internal/(position)/bottom_right/(top)/350/(units)/pixels?r='+refferer+'&l='+location;
var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
})();
</script>

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
