<?php
  require_once 'contest.php';

  $places = get_places($contest['shortname']);

  return view('schedule', array('contest' => $contest, 'places' => $places));
?>