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
  else if (arg(0) == 'obssheet') {
    $activeMainTID = arg(2);
    $activeMainTID = midtlink_get_main_unit_from_subunit($activeMainTID)->tid;
    $activeTermTID = intval($_GET['filter_category']);
  }
  else {
    global $user;
    $activeMainTID = $user->mainUnitTID;
    $activeTermTID = null;
  }
  
  
  