<?php
  require_once 'contest.php';

  $people = get_people($contest['shortname']);

  return view('team', array('contest' => $contest, 'people' => $people));
?>