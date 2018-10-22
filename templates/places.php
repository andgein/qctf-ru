<?php include("_header.php"); ?>
    <title><?= $model['contest']['title'] ?> &bull; Площадки</title>
  </head>

  <body class="with-navbar">
    <?php include("_navbar.php"); ?>
    <?php $jumbotitle = "Площадки"; include("_jumbotron.php"); ?>
    
    <div class="container main">
      <div class="row">
        <? if (! $model['contest']['past']) { ?>
            <div class="well col-md-10">
              Если вы хотите организовать у себя точку проведения <?= $model['contest']['title'] ?>, напишите нам на <a href="mailto:qctf@hackerdom.ru">qctf@hackerdom.ru</a>.
            </div>
        <? } ?>
        <div class="col-md-10">
          <ol>
          <? foreach ($model['places'] as $idx => $place) { ?>
            <li style="margin: 7px 0">
                <a href="/<?= $model['contest']['shortname'] ?>/places/<?= $place['id'] ?>">
                    <?= $place['city'] ?>, <?= $place['fullname'] ?> 
                </a>
                <? if (! $place['is_registration_open']) { ?>
                   <br />Регистрация на площадку закрыта: закончились места
                <? } ?>
            </li>
          <? } ?>
          </ol>
        </div>
      </div>

<?php include("_footer.php"); ?>
