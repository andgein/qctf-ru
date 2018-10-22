<?php
  require_once 'contest.php';

  $places = array_filter(get_places($contest['shortname']), function ($place) {
      return $place['is_registration_open'] && $place['show_to_all'];
  });
  
  function form_validation($form, $user_data)
  {
    global $places;

    $errors = array();
    $try = false;

    $errors['name'] = 'registration-closed';

    foreach ($form as $form_key => $form_element)
    {
      $type = $form_element['type'];
      if (!array_key_exists($form_key, $user_data) && $type != 'checkbox')
      {
        $errors[$form_key] = array('type' => 'not-filled', 'field' => $form_key);
        continue;
      }
      $field_data = $user_data[$form_key];
      if ($type != 'checkbox' || array_key_exists($form_key, $user_data))
        $try = true;
      if ($form_element['required'])
      {
        if ($type == 'string' && $field_data == '')
        {
          $errors[$form_key] = array('type' => 'not-filled', 'field' => $form_key);
          continue;
        }
      }
      if ($type == 'string' && array_key_exists('maxlength', $form_element) && strlen($field_data) > $form_element['maxlength'])
      {
        $errors[$form_key] = array('type' => 'max-length-exceeded', 'field' => $form_key);
        continue;
      }
      /* TODO add email checks*/
      if ($type == 'string' && array_key_exists('string-check', $form_element) && $form_element['string-check'] == 'email' && false)
      {
        $errors[$form_key] = array('type' => 'not-filled', 'field' => $form_key);
        continue;
      }
      if ($type == 'select' && $form_element['select-from'] == 'place' && ! array_key_exists($field_data, $places))
      {
        $errors[$form_key] = array('type' => 'invalid-value', 'field' => $form_key);
        continue;
      }
      if ($type == 'select' && $form_element['select-from'] == 'place' && ! $places[$field_data]['is_registration_open'])
      {
        $errors[$form_key] = array('type' => 'registration-closed', 'field' => $form_key);
        continue;
      }
      if ($type == 'string' && array_key_exists('string-check', $form_element) && $form_element['string-check'] == 'integer' && ! is_numeric($field_data))
      {
        $errors[$form_key] = array('type' => 'invalid-value', 'field' => $form_key);
        continue;
      }
      if ($type == 'checkbox' && array_key_exists('checkbox-check', $form_element) && $form_element['checkbox-check'] == 'checked' && !array_key_exists($form_key, $user_data))
      {
        $errors[$form_key] = array('type' => 'not-filled', 'field' => $form_key);
        continue;
      }
    }
    if (! $try)
      $errors = array();
    return array('try' => $try, 'errors' => $errors);
  }

  $form = array('name' => array('title' => 'Название команды', 'required' => true, 'type' => 'string', 'maxlength' => 50, 'hint' => 'Хакердом'),
                'city' => array('title' => 'Город', 'required' => true, 'type' => 'string', 'maxlength' => 70, 'hint' => 'Екатеринбург'),
                'school' => array('title' => 'Учебное заведение', 'required' => true, 'type' => 'string', 'maxlength' => 100),
                'place' => array('title' => 'Точка проведения', 'required' => true, 'type' => 'select', 'select-from' => 'place'),
                'participant1' => array('title' => 'Капитан', 'required' => true, 'type' => 'string', 'maxlength' => 100, 'hint' => 'Фамилия и имя'),
                'email1' => array('title' => 'Электронная почта капитана', 'required' => true, 'type' => 'string', 'maxlength' => 100, 'string-check' => 'email', 'hint' => 'qctf@hackerdom.ru'),
                'participant2' => array('title' => 'Участник 2', 'required' => false, 'type' => 'string', 'maxlength' => 100, 'hint' => 'Фамилия и имя'),
                'email2' => array('title' => 'Электронная почта 2', 'required' => false, 'type' => 'string', 'maxlength' => 100, 'string-check' => 'email'),
                'participant3' => array('title' => 'Участник 3', 'required' => false, 'type' => 'string', 'maxlength' => 100, 'hint' => 'Фамилия и имя'),
                'email3' => array('title' => 'Электронная почта 3', 'required' => false, 'type' => 'string', 'maxlength' => 100, 'string-check' => 'email'),
                'participant4' => array('title' => 'Участник 4', 'required' => false, 'type' => 'string', 'maxlength' => 100, 'hint' => 'Фамилия и имя'),
                'email4' => array('title' => 'Электронная почта 4', 'required' => false, 'type' => 'string', 'maxlength' => 100, 'string-check' => 'email'),
                'computers' => array('title' => 'Сколько вам нужно компьютеров от организаторов', 'required' => true, 'type' => 'string', 'string-check' => 'integer', 'hint' => '0, 1 или 2'),
                'persInf' => array('title' => 'Даю согласие на обработку персональных данных в соответствии с 152-ФЗ «О персональных данных»', 'required' => true, 'type' => 'checkbox', 'checkbox-check' => 'checked'),
               );

  $validation = form_validation($form, $_POST);

  if ($validation['try'])
  {
    if (count($validation['errors']) == 0)
    {
      $query = 'INSERT INTO registrations (contest, name, city, school, place, participant1, email1, participant2, email2, participant3, email3, participant4, email4, computers, `persInf`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
      db_query($query, 'ssssdssssssssdd', array($contest['shortname'], $_POST['name'], $_POST['city'],
                                           $_POST['school'], $_POST['place'],
                                           $_POST['participant1'], $_POST['email1'],
                                           $_POST['participant2'], $_POST['email2'],
                                           $_POST['participant3'], $_POST['email3'],
                                           $_POST['participant4'], $_POST['email4'],
                                           $_POST['computers'], array_key_exists('persInf', $_POST) ? 1 : 0
                                          ));
      header('Location: registration.php?success=true');
      exit;
    }
  }

  $success = array_key_exists('success', $_GET);
  if (array_key_exists('place', $_GET))
      $_POST['place'] = (int) $_GET['place'];

  return view('registration-form', array('contest' => $contest, 'places' => $places, 'form' => $form, 'errors' => $validation['errors'], 'success' => $success, 'data' => $_POST));
?>
