<?php
  function field_error_text($error_type)
  {
    if ($error_type == 'not-filled')           
      return 'Поле не заполнено';
    if ($error_type == 'invalid-value')
      return 'Неверное значение';
    if ($error_type == 'registration-closed')
      return 'Регистрация на эту площадку закрыта';
    if ($error_type == 'max-length-exceeded')
      return 'Превышена максимальная длина';
  }

    include("_header.php");
?>

    <title><?= $model['contest']['title'] ?> &bull; Регистрация</title>
  </head>

  <body class="with-navbar">
    <?php include("_navbar.php"); ?>
    <?php $jumbotitle = "Регистрация на"; include("_jumbotron.php"); ?>
    
    <div class="container main">
      <div class="row">
        <? if ($model['success']) { ?>
          <div class="well col-md-10">
            <!--Ваша команда успешно зарегистирована! Мы свяжемся с&nbsp;вами по&nbsp;электронной почте ближе к&nbsp;соревнованию.-->
             К сожалению, регистрация уже закончена.
          </div>
        <? } ?>

        <div class="col-md-12">


          <div class="alert alert-danger">
             Регистрация закрыта
          </div>
          
          <!--
          <div class="col-sm-8 col-sm-offset-4">
             <div class="alert">
                Регистрация открыта до 8 мая
             </div>
          </div>
          
          <form class="form-horizontal" role="form" method="POST">
            <? foreach ($model['form'] as $form_key => $form_element) { ?>
              <div class="form-group">
                <label for="<?= $form_key ?>" class="control-label col-sm-4"><?= $form_element['title'] ?></label>
                <div class="col-sm-8">

                  <?
                    $type = $form_element['type'];
                    $form_value = array_key_exists($form_key, $model['data']) ? $model['data'][$form_key] : ''
                  ?>
                  

                  <? if ($type == 'string') { ?>
                    <input type="text" class="form-control" name="<?= $form_key ?>" placeholder="<?= array_key_exists('hint', $form_element) ? $form_element['hint'] : $form_element['title'] ?>" value="<?= htmlspecialchars($form_value) ?>">
                  <? } elseif ($type == 'select') { ?>
                    <? $select_from = $form_element['select-from']; ?>
                    <? if ($select_from == 'place') $data_source = $model['places']; ?>
                    <select class="form-control" name="<?= $form_key ?>">
                      <? foreach ($data_source as $idx => $value) { ?>
                        <option value="<?= $idx ?>" <?= $idx == $form_value ? 'selected' : '' ?>><?= $value['city'] ?>. <?= $value['fullname'] ?></option>
                      <? } ?>
                    </select>
                  <? } elseif ($type == 'checkbox') {?>
                    <br><input type="checkbox" name="<?= $form_key?>">
                    <?} ?>

                  <? if (array_key_exists($form_key, $model['errors'])) { ?>
                    <span class="help-block has-error">
                      <?= field_error_text($model['errors'][$form_key]['type']) ?>
                    </span>
                  <? } ?>
                </div>
                
              </div>
            <? } ?>
            <button type="submit" class="col-sm-offset-9 col-sm-3 btn btn-success">Зарегистрироваться</button>
          </form>

          -->
        </div>
      </div>
<?php include("_footer.php"); ?>
