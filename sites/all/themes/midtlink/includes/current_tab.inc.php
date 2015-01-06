<?php
  global $activeMainTID;
  global $activeTermTID;
  
  if (arg(0) == 'forum') {
    $activeMainTID = $_GET['tid'];
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
  else if (arg(0) == 'reorder-unit-links') {
    $activeMainTID = arg(1);
    $activeTermTID = null;
  }
  else if (arg(0) == 'taxonomy') {
    $tid = arg(2);
    if (midtlink_is_keyword_local($tid)) {
      $term = midtlink_get_main_unit_from_local_keyword($tid);
      $activeMainTID = $term->tid;
    } else {
      $activeMainTID = $user->mainUnitTID;
    }
    $activeTermTID = null;
  }
  else {
    global $user;
    $activeMainTID = $user->mainUnitTID;
    $activeTermTID = null;
  }
  
  
  