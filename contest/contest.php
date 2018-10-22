<?php
  set_include_path('../inc/:../');

  require_once 'mvc.php';
  require_once 'common.php';

  function check_contest_param()
  { 
    global $contest;

    if (! array_key_exists('contest', $_GET))
      return view('error');
    $contest = $_GET['contest'];
    $result = db_query('SELECT * FROM contests WHERE shortname = ? LIMIT 1', 's', array($contest));
    if (count($result) == 0)
      return view('error', array('message' => 'Unknown contest'));

    $contest = $result[0];
  }  

  check_contest_param();

  function get_places($contest_shortname)
  {
    $places = db_query('SELECT * FROM places WHERE contest = ? ORDER BY city', 's', array($contest_shortname));
    $result = array();
    foreach ($places as $place)
      $result[$place['id']] = $place;
    return $result;
  }

  function get_participants($contest_shortname)
  {
    $registrations = db_query('SELECT * FROM registrations WHERE contest = ?', 's', array($contest_shortname));
    $result = array();
    foreach ($registrations as $registration)
      $result[$registration['id']] = $registration;
    return $result;
  }

  function get_participants_in_place($contest_shortname, $place_id)
  {
    $registrations = db_query('SELECT * FROM registrations WHERE contest = ? AND place = ?', 'sd', array($contest_shortname, $place_id));
    $result = array();
    foreach ($registrations as $registration)
      $result[$registration['id']] = $registration;
    return $result;
  }

  function get_people($contest_shortname)
  {
    $people = db_query('SELECT * FROM people WHERE contest = ? ORDER BY `order`, id', 's', array($contest_shortname));
    $result = array();
    foreach ($people as $man)
      $result[$man['id']] = $man;
    return $result;
  }


?>