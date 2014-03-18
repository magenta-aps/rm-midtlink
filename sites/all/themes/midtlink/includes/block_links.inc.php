<?php
  
  global $activeMainTID;

  if(!empty($activeMainTID)) {
    /* embed view! */
    echo views_embed_view('unit_links','default', $activeMainTID);
  }
  
