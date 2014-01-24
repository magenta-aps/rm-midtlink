<?php
/**
 * @file
 * midtlink_features.features.fe_block_boxes.inc
 */

/**
 * Implements hook_default_fe_block_boxes().
 */
function midtlink_features_default_fe_block_boxes() {
  $export = array();

  $fe_block_boxes = new stdClass();
  $fe_block_boxes->info = 'Login page - above login form';
  $fe_block_boxes->format = 'html_wysiwyg';
  $fe_block_boxes->machine_name = 'midtlink_above_login_form';
  $fe_block_boxes->body = '<h1>Din support til MidtEPJ</h1><p class="large">I MidtLink kan du stille spørgsmål og søge viden om anvendelsen af MidtEPJ og andre kliniske applikationer. Når du har logget ind i MidtLink, vil du have adgang til kollegers spørgsmål og svar samt vejledninger som kan hjælpe dig videre i dit arbejde med MidtEPJ.</p><p class="large">&nbsp;</p>';

  $export['midtlink_above_login_form'] = $fe_block_boxes;

  $fe_block_boxes = new stdClass();
  $fe_block_boxes->info = 'Login page - below login form';
  $fe_block_boxes->format = 'html_wysiwyg';
  $fe_block_boxes->machine_name = 'midtlink_below_login_form';
  $fe_block_boxes->body = '<p><span style="font-size: x-small;">Alle ansatte i Region Midtjylland er automatisk oprettede i MidtLink.Når du logger ind i MidtLink første gang, vil du blive bedt om at vælge dit hospital og din afdeling.</span></p><p><span style="font-size: x-small;">Hvis du har problemer med at logge ind, er du velkommen til at kontakte <a href="mailto:AUHKAS@rm.dk">auhkas@rm.dk</a></span></p><p class="large"><br /><span style="font-size: x-small;">Læs om MidtLink og se en video på <a href="http://blog.midtlink.dk" target="_blank">blog.midtlink.dk</a></span></p>';

  $export['midtlink_below_login_form'] = $fe_block_boxes;

  $fe_block_boxes = new stdClass();
  $fe_block_boxes->info = 'Brugerbetingelser for MidtLink';
  $fe_block_boxes->format = 'html_wysiwyg';
  $fe_block_boxes->machine_name = 'midtlink_betingelser';
  $fe_block_boxes->body = '<p>Test_MidtLink er en intern social platform som potentielt er tilgængelig for alle ansatte ved Region Midtjyllands sygehuse. Det betyder, at den viden du deler med dine kolleger på MidtLink kun kan tilgås af ansatte ved regionens sygehuse.</p><p>På MidtLink bidrager medarbejdere fra regionens sygehuse frit til en fælles dialog i et lukket socialt netværk ved at stille og besvare spørgsmål. MidtLink stiller desuden en stærk søgemaskine til rådighed som gør det muligt at fremsøge viden fra officielle vejledninger samt fra brugergenererede spørgsmål og svar. For disse aktiviteter gør følgende forhold sig gældende:</p><ul><li>Al deling af data på MidtLink er omfattet af Sundhedslovens § 40, og personfølsomme oplysninger må derfor ikke deles på MidtLink, ligesom der ikke må linkes til sider eller screen dumps fra andre systemer som indeholder personfølsomme oplysninger. Det er dog, ifølge Patientombuddets praksis, tilladt for læger/sundhedspersoner at drøfte patienter med hinanden, når det drejer sig om et forhold som de enten er tvivl om eller finder principielt, men drøftelsen skal foregå uden at nævne navne, cpr. nr. eller andre oplysninger, som gør det muligt at identificere den eller de pågældende personer.</li><li>Viden som udstilles på MidtLink er primært brugergenereret. Administrationen i Region Midtjylland og på regionens sygehuse kan derfor ikke stå til ansvar for kvaliteten af publiceret materiale. Det betyder, at vi i fællesskab må bidrage til at vedligeholde den høje faglige standard, og at det er nødvendigt at navigere i MidtLink med en almindelig kritisk sans.</li></ul><p>MidtLink bakkes op af Hospitalsledelsen på din arbejdsplads som anerkender værdien i, at vi i fællesskab udvikler vores faglighed og kompetencer ved at dele vores viden på MidtLink. Derfor er der ledelsesopbakning til, at du anvender MidtLink når du udfører dit arbejde.</p><p>Vi ønsker dig god fornøjelse med MidtLink!</p><p>Med venlig hilsen<br />MidtLink-teamet<br /><a href="mailto:auhskejby.midtlink@rm.dk">auhskejby.midtlink@rm.dk</a></p>';

  $export['midtlink_betingelser'] = $fe_block_boxes;

  $fe_block_boxes = new stdClass();
  $fe_block_boxes->info = 'Footer - Default - Vejledninger';
  $fe_block_boxes->format = 'html_wysiwyg';
  $fe_block_boxes->machine_name = 'midtlink_footer_block_1';
  $fe_block_boxes->body = '<p class="description">Se oversigten over tilgængelige EPJ-guides, -manualer og -instruktionsvideoer</p><p><span class="illustration image-replacement"> <span class="button"><a class="button" href="#">Lad mig se</a></span> </span></p>';

  $export['midtlink_footer_block_1'] = $fe_block_boxes;

  $fe_block_boxes = new stdClass();
  $fe_block_boxes->info = 'Footer - Default - Service Desk';
  $fe_block_boxes->format = 'html_wysiwyg';
  $fe_block_boxes->machine_name = 'midtlink_footer_block_3';
  $fe_block_boxes->body = '<p class="description">Regionens Service Desk kan kontaktes døgnet rundt. Vi anbefaler, at man henvender sig via <a href="http://horapp104.onerm.dk/CAisd/pdmweb2.exe" target="_blank">den elektroniske Service Desk</a> i stedet for at ringe, medmindre situationen er akut.</p><div class="phone"><div class="image-replacement">Telefon</div>784 12345</div>';

  $export['midtlink_footer_block_3'] = $fe_block_boxes;

  $fe_block_boxes = new stdClass();
  $fe_block_boxes->info = 'Footer - AUH - Support Model';
  $fe_block_boxes->format = 'html_wysiwyg';
  $fe_block_boxes->machine_name = 'midtlink_footer_block_auh_1';
  $fe_block_boxes->body = '<p><img src="/sites/all/themes/midtlink/images/auh_support_model.png" alt="" /></p><p>&nbsp;</p>';

  $export['midtlink_footer_block_auh_1'] = $fe_block_boxes;

  $fe_block_boxes = new stdClass();
  $fe_block_boxes->info = 'Footer - AUH - Om MidtLink';
  $fe_block_boxes->format = 'html_wysiwyg';
  $fe_block_boxes->machine_name = 'midtlink_footer_main_unit_auh';
  $fe_block_boxes->body = '<p><span style="font-size: small;">MidtLink er et sted hvor alle brugere kan hjælpe hinanden med at blive bedre til at bruge MidtEPJ.</span></p><p><span style="font-size: small;">Har du spørgsmål vedrørende brugeroprettelse eller mere teknisk eller driftsmæssig karakter, kan du kontakte <a href="http://horapp104.onerm.dk/CAisd/pdmweb2.exe" target="_blank">den elektroniske Service Desk</a> døgnet rundt. I akutte situationer kan du kontakte Service Desken på tlf. 784 12345.</span></p><p><span style="font-size: small;">Som EPJ-superbruger eller –ansvarlig kan du henvende dig til <a href="http://kas.systemudvikling.it.rm.dk/" target="_blank">KAS (Klinisk Applikations Support)</a>. I akutte situationer kan du ringe direkte til <a href="http://kas.systemudvikling.it.rm.dk/" target="_blank">KAS</a> på tlf. 784 58899 på hverdage mellem kl. 8.00 – 15.30 (fredag dog kun til kl. 15.00).</span></p>';

  $export['midtlink_footer_main_unit_auh'] = $fe_block_boxes;

  $fe_block_boxes = new stdClass();
  $fe_block_boxes->info = 'Frontpage_Main text_HEH';
  $fe_block_boxes->format = 'html_wysiwyg';
  $fe_block_boxes->machine_name = 'midtlink_frontpage_maintext_heh';
  $fe_block_boxes->body = '<p>MidtLink er din genvej til hurtige svar på dine EPJ spørgsmål. Få hjælp og sparring fra dine kollegaer her og nu, og giv tilbage af din egen viden når du kan.</p>';

  $export['midtlink_frontpage_maintext_heh'] = $fe_block_boxes;

  $fe_block_boxes = new stdClass();
  $fe_block_boxes->info = 'Video og Spørgsmål text';
  $fe_block_boxes->format = 'html_wysiwyg';
  $fe_block_boxes->machine_name = 'midtlink_frontpage_sidebar';
  $fe_block_boxes->body = '<p><iframe src="http://player.vimeo.com/video/43164410?title=1&amp;byline=0&amp;portrait=0&amp;color=ffffff" frameborder="0" width="300" height="169"></iframe></p><p><a href="/forum/294?tid=300">Spørgsmål og svar omkring brugen af MidtLink</a></p>';

  $export['midtlink_frontpage_sidebar'] = $fe_block_boxes;

  $fe_block_boxes = new stdClass();
  $fe_block_boxes->info = 'About';
  $fe_block_boxes->format = 'html_wysiwyg';
  $fe_block_boxes->machine_name = 'midtlink_frontpage_sidebar_about';
  $fe_block_boxes->body = '<p>MidtLink er vores fælles supportløsning, hvor alle brugere kan bidrage både med spørgsmål og svar.</p><p>Med MidtLink kan alle MidtEPJ-brugere være med til at dele deres erfaringer og dermed være med til at sikre den optimale brug af MidtEPJ.</p><p>Læs om MidtLink og se en video på <a href="http://blog.midtlink.dk" target="_blank">blog.midtlink.dk</a></p>';

  $export['midtlink_frontpage_sidebar_about'] = $fe_block_boxes;

  $fe_block_boxes = new stdClass();
  $fe_block_boxes->info = 'Frontpage - Main Text - default';
  $fe_block_boxes->format = 'html_wysiwyg';
  $fe_block_boxes->machine_name = 'midtlink_frontpage_text';
  $fe_block_boxes->body = '<p>MidtLink er din genvej til hurtige svar på dine EPJ spørgsmål. Få hjælp og sparring fra dine kollegaer her og nu, og giv tilbage af din egen viden når du kan.</p>';

  $export['midtlink_frontpage_text'] = $fe_block_boxes;

  return $export;
}
