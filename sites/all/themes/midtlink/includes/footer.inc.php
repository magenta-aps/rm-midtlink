<?php
  /**
   * footer.inc.php
   */
?>

<div id="footer" class="clearfix">
  <div class="container">
<!--
      <div class="block grid-4">
				<img src="/sites/all/themes/midtlink/images/auh_support_model.png" alt="" />
			</div>
-->    
			<div id="categories" class="block grid-4">
				<?php /* Block: Categories */ $show_only_global_categories = true; include('block_categories.inc.php'); $show_only_global_categories = false; ?>
			</div>
      <?php print render($page['footer_block_center']); ?>
      <?php print render($page['footer_block_right']); ?>
 
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
