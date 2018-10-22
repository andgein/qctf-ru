<?php
  require_once 'contest.php';
  require_once 'common.php';

  $places = array_filter(get_places($contest['shortname']), function ($place) {
      return $place['show_to_all'];
  });

  if (array_key_exists('id', $_GET))
  {
    return view('place', array('contest' => $contest, 'place' => $places[$_GET['id']]));
  }

  return view('places', array('contest' => $contest, 'places' => $places));
?>