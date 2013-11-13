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
			
			<div class="block grid-4">
				<h2>Om MidtLink</h2>
				<p>
					MidtLink er et sted hvor alle brugere kan hjælpe hinanden
					med at blive bedre til at bruge MidtEPJ.
				</p>
				<p>
					Har du spørgsmål vedrørende brugeroprettelse eller mere 
					teknisk eller driftsmæssig karakter, kan du kontakte <a href="http://horapp104.onerm.dk/CAisd/pdmweb2.exe" target="_blank">den 
					elektroniske Service Desk</a> døgnet rundt. I akutte situationer 
					kan du kontakte Service Desken på tlf. 784 12345.
				</p>
				<p>
					Som EPJ-superbruger eller –ansvarlig kan du henvende dig til 
					<a href="http://kas.systemudvikling.it.rm.dk/" target="_blank">KAS (Klinisk Applikations Support)</a>. I akutte situationer kan 
					du ringe direkte til <a href="http://kas.systemudvikling.it.rm.dk/" target="_blank">KAS</a> på tlf. 784 58899 på hverdage 
					mellem kl. 8.00 – 15.30 (fredag dog kun til kl. 15.00).
				</p>
			</div>
			
			
			
		<?php } else { ?>
			<div id="categories" class="block grid-4">
				<?php /* Block: Categories */ include('block_categories.inc.php'); ?>
			</div>

			<div id="documentation" class="block grid-4">
				<h2>Vejledninger</h2>
				<div class="content">
					<p class="description">Se oversigten over tilgængelige EPJ-guides, -manualer og -instruktionsvideoer</p>
					
					<span class="illustration image-replacement">
						<span class="button"><a class="button" href="#">Lad mig se</a></span>
					</span>
					
					
				</div><!-- /.content -->
			</div><!-- /#documentation -->
			
			
			<div id="hotline" class="block grid-4">
				<h2>Service Desk</h2>
				<div class="content">
					<p class="description">
						Regionens Service Desk kan kontaktes døgnet rundt.
						Vi anbefaler, at man henvender sig via 
						<a href="http://horapp104.onerm.dk/CAisd/pdmweb2.exe" target="_blank">den elektroniske Service Desk</a>
						i stedet for at ringe, medmindre situationen er akut.
					</p>
					<div class="phone">
						<div class="image-replacement">Telefon</div>
						784 12345
					</div>
				</div><!-- /.content -->
			</div><!-- /#hotline -->
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
