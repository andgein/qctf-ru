<?php
  require_once 'contest.php';
  require_once 'common.php';

  $places = get_places($contest['shortname']);
  $participants = get_participants($contest['shortname']);

  return view('participants', array('contest' => $contest, 'participants' => $participants, 'places' => $places));
?>