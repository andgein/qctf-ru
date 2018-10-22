<?php
    include("_header.php");
?>

    <title><?= $model['contest']['title'] ?> &bull; Отправка письма</title>
  </head>

  <body class="with-navbar">
    <?php include("_navbar.php"); ?>
    <?php $jumbotitle = "Отправка письма"; include("_jumbotron.php"); ?>
    
    <div class="container main">
      <div class="row">
        <? if ($model['success']) { ?>
          <div class="well col-md-10">
            Ваша команда успешно зарегистирована! Мы свяжемся с вами по электронной почте в ближайшее время.
          </div>
        <? } ?>

        <div class="col-md-10">
          <form class="form " method="POST">
            <div class="form-group">
                <label>Площадка</label>
                <select name="place" class="form-control">
                    <option value="-1">Все площадки
                    <?php
                        foreach ($model['places'] as $place_id => $place)
                        {
                            ?>
                            <option value="<?= $place_id ?>"><?= htmlspecialchars($place['city']) . ', ' . htmlspecialchars($place['fullname']) ?>
                            <?php
                        }
                    ?>
                </select>
            </div>
            <label>
                <input type="checkbox" name="is_html">
                HTML?
            </label>
            <div class="form-group">
                <label>Тема письма</label>
                <input type="text" name="subject" value="Участие в <?= addslashes($model['contest']['title']) ?>" class="form-control">
            </div>
            <div class="form-group">
                <label>Письмо (можно использовать %NAME% и %TEAM%)</label>
                <textarea name="text" class="form-control" rows=10></textarea>
            </div>
            <button type="submit" class="col-sm-offset-9 col-sm-3 btn btn-success">Отправить</button>
          </form>
        </div>
      </div>
<?php include("_footer.php"); ?>
