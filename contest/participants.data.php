<?php
  require_once 'contest.php';
  require_once 'common.php';

  if ($contest['past'])
  {
    echo 'Соревнование '.$contest['title'].' уже завершено';
    exit;
  }

  $places = get_places($contest['shortname']);
  $participants = get_participants($contest['shortname']);

  return view('participants-data', array('contest' => $contest, 'participants' => $participants, 'places' => $places));
?>