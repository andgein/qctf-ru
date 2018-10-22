<?php
  require_once 'contest.php';
  require_once 'mvc.php';
  require_once 'common.php';

  return view('contest', array('contest' => $contest));
?>