<?php
    require_once 'contest.php';
    require_once 'common.php';

    $places = array_filter(get_places($contest['shortname']));

    if (! array_key_exists('place', $_GET) || ! array_key_exists($_GET['place'], $places))
    {
        header('404 Not Found');
        exit;
    }        

    $participants = get_participants_in_place($contest['shortname'], $_GET['place']);

    return view('place', array('contest' => $contest, 'places' => $places, 'place' => $places[$_GET['place']], 'participants' => $participants));
?>