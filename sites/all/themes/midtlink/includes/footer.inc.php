<?php
  /**
   * footer.inc.php
   */
?>

<div id="footer" class="clearfix">
  <div class="container">
    
    <?php 
    global $user;
    if($user->mainUnitTID == 300) {
			?>
			<div id="categories" class="block grid-4">
				<?php /* Block: Categories */ include('block_categories.inc.php'); ?>
			</div>

			<div class="block grid-4">
				<img src="/sites/all/themes/midtlink/images/auh_support_model.png" alt="" />
			</div>
			
    
      <?php print render($page['footer_block_auh']); ?>
			
			
		<?php } else { ?>
			<div id="categories" class="block grid-4">
				<?php /* Block: Categories */ include('block_categories.inc.php'); ?>
			</div>
      <?php print render($page['footer_block']); ?>
		<?php } ?>
  
  </div><!-- /.section -->
</div><!-- /#footer -->

<!-- USERVOICE -->
<script type="text/javascript">
  var uvOptions = {};
  (function() {
    var uv = document.createElement('script'); uv.type = 'text/javascript'; uv.async = true;
    uv.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'widget.uservoice.com/p5KibwCyrHzzsJdnyPfMrA.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(uv, s);
  })();
</script>
<?php /* EOF */ ?>
