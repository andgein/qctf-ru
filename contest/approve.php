<?php
  $_GET['contest'] = 'school-2018';

  /* Change this constant after sending emails to last approved teams */
  /* Костыль, да :( */
  $LAST = 0;

  /* Change to true to send emails */
  $SEND_EMAILS = true;

  $subject = 'Регистрация на QCTF School 2018';


  require_once 'contest.php';
  require_once 'common.php';

  $places = get_places($contest['shortname']);
  $participants = get_participants($contest['shortname']);

  $emails_count = 0;

      foreach ($participants as $participant)
      {
        if ($participant['id'] <= $LAST)
            continue;

        if ($participant['approved'])
            continue;

        $members = [$participant['email1'] => $participant['participant1'],
                    $participant['email2'] => $participant['participant2'],
                    $participant['email3'] => $participant['participant3'],
                    $participant['email4'] => $participant['participant4'],
                   ];

        if (array_key_exists('', $members))
            unset($members['']);

        echo 'Team #' . $participant['id'] . '<br>';
        foreach ($members as $email => $name)
        {
          $to = $email;
          # $to = 'andgein@yandex.ru';

          $from = 'QCTF <qctf@hackerdom.ru>';

          $text_for_member = $places[$participant['place']]['email'];
          $text_for_member = str_replace('%NAME%', $name, $text_for_member);
          $text_for_member = str_replace('%TEAM%', $participant['name'], $text_for_member);
          $text_for_member = str_replace('%PLACE%', $participant['place'], $text_for_member);

          $headers = 'From: ' . $from . "\r\n" .
                     'Reply-To: ' . $from . "\r\n" .
                     'X-Mailer: PHP/' . phpversion();

          echo 'Try to send mail to ' . $to . ' <br>';
          echo '<pre>';
          echo htmlspecialchars($text_for_member);
          echo '</pre>';
          echo '<br><br>';

          if ($SEND_EMAILS)
          {
            mb_send_mail($to, $subject, $text_for_member, $headers);
            $emails_count += 1;
            sleep(1);
          }
        }
        if ($SEND_EMAILS)
        {
            db_query('UPDATE registrations SET approved = 1 WHERE id = ?', 'd', array($participant['id']));
        }
      }

   echo '<b>Total sent emails: ' . $emails_count . '</b><br>';
   if ($emails_count == 0)
   {
     echo 'Maybe you forget change `false` to `true` in the source code of approve.php (line 9)?';
   }


?>
