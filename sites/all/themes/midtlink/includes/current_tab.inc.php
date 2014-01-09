<?php
  global $activeMainTID;
  global $activeTermTID;
  
  if (arg(0) == 'forum') {
    $activeMainTID = intval($_GET['tid']);
    $activeTermTID = arg(1);
  }
  else if (arg(0) == 'dokumentation') {
    $activeMainTID = arg(1);
    $activeTermTID = arg(2);
  }
  else {
    global $user;
    $activeMainTID = $user->mainUnitTID;
    $activeTermTID = null;
  }
  
  
  