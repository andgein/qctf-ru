<?php
  set_time_limit(0);

  require_once 'contest.php';
  require_once 'common.php';

  $places = get_places($contest['shortname']);
  $participants = get_participants($contest['shortname']);

  if (array_key_exists('place', $_POST) && array_key_exists('text', $_POST) && array_key_exists('subject', $_POST))
  {
    $place_id = (int) $_POST['place'];
    $subject = $_POST['subject'];
    $text = $_POST['text'];
    $content_type = array_key_exists('is_html', $_POST) ? 'text/html' : 'text/plain';
    if (array_key_exists($place_id, $places) || $place_id = -1)
    {
      /* Change to true for ignoring until user with IGNORE_EMAIL (this user will be ignored too) */
      $ignore = false;
      $IGNORE_EMAIL = 'PurtovDmitry@yandex.ru';

      foreach ($participants as $participant)
      {
        if ($participant['place'] != $place_id && $place_id != -1)
            continue;

        $members = [$participant['email1'] => $participant['participant1'],
                    $participant['email2'] => $participant['participant2'],
                    $participant['email3'] => $participant['participant3'],
                    $participant['email4'] => $participant['participant4'],
                   ];

        if (array_key_exists('', $members))
            unset($members['']);

        foreach ($members as $email => $name)
        {
          if ($email == $IGNORE_EMAIL && $ignore)
          {
            $ignore = false;
            continue;
          }
          if ($ignore)
            continue;

          $to = $email;
          # $to = 'qctf@hackerdom.ru';

          $from = 'QCTF <qctf@hackerdom.ru>';

          $text_for_member = $text;
          $text_for_member = str_replace('%NAME%', $name, $text_for_member);
          $text_for_member = str_replace('%TEAM%', $participant['name'], $text_for_member);

          $headers = 'From: ' . $from . "\r\n" .
                     'Reply-To: ' . $from . "\r\n" .
                     'Content-Type: ' . $content_type . "\r\n" .
                     'X-Mailer: PHP/' . phpversion();

          echo 'Try to send mail to ' . $to . ' <br>';
          echo '<pre>';
          echo htmlspecialchars($text_for_member);
          echo '</pre>';
          echo '<br><br>';

          mb_send_mail($to, $subject, $text_for_member, $headers);

          $logfile = fopen('log.txt', 'a');
          fwrite($logfile, '[INFO] Email has been sent to ' . $to . ":\n");
          fwrite($logfile, $text_for_member . "\n\n");
          fclose($logfile);

        }

        # break;
      }

      exit;
    }
  }

  return view('mail', array('contest' => $contest, 'participants' => $participants, 'places' => $places));
?>
