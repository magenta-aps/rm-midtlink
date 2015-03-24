	<div id="categories" class="block clearfix" style="margin-bottom:10px;">
		<?php /* Block: Categories */ include('block_categories.inc.php'); ?>
	</div>

    <?php if (drupal_is_front_page()) { print render($page['front_sidebar']); } ?>

	<div id="links" class="block solid">
		<h2>Nyttige links</h2>
		<div class="content">
			<ul class="reset">

      <?php include('block_links.inc.php'); ?>
				
		</div>
	</div>