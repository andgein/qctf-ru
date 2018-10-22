<?php include("_header.php"); ?>
    <title><?= $model['contest']['title'] ?> &bull; <?= $model['place']['fullname'] ?></title>
  </head>

  <body class="with-navbar">
    <?php include("_navbar.php"); ?>
    <?php $jumbotitle = ''; include("_jumbotron.php"); ?>
    
    <div class="container main">
      <h2><?= $model['place']['fullname'] ?> на <?= $model['contest']['title'] ?></h2>

      <!--
      <p>
         <? if ($model['place']['is_registration_open']) { ?>
             <a href="/<?= $model['contest']['shortname'] ?>/registration?place=<?= $model['place']['id'] ?>" class="btn btn-primary">
                  Зарегистрировать команду
             </a>
         <? } else { ?>
             <a href="/<?= $model['contest']['shortname'] ?>/registration?place=<?= $model['place']['id'] ?>" class="btn btn-primary" disabled>
                  Зарегистрировать команду
             </a>
             <span class="text-muted">
                &nbsp;Места на&nbsp;площадке закончились, больше регистрироваться нельзя
             </span>
         <? } ?>
      </p>
      -->


      <div class="row">
        <div class="col-md-10">
            <?= nl2br($model['place']['additional_info']) ?> <br />
            <?= $model['place']['url'] != '' ? 'Сайт площадки: <a href="'.$model['place']['url'].'">'.$model['place']['url'].'</a>' : '' ?>
        </div>
      </div>

      <div>
          <? if ($model['place']['address']) { ?>
              Адрес:
              <?= $model['place']['address'] ?>
          <? } ?>
      </div>

      <div>
          <? if ($model['place']['schedule']) { ?>
              <h3>Расписание</h3>
              <?= nl2br($model['place']['schedule']) ?>
          <? } ?>
      </div>

      <div>
          <? if ($model['place']['sponsors']) { ?>
              <h3>Спонсоры и партнёры площадки</h3>
              <?= $model['place']['sponsors'] ?>
          <? } ?>
      </div>

      <h3>Участники на площадке</h3>

      <? include("_participants-list.php") ?>

      <!--
      <p>
         <? if ($model['place']['is_registration_open']) { ?>
             <a href="/<?= $model['contest']['shortname'] ?>/registration?place=<?= $model['place']['id'] ?>" class="btn btn-primary">
                  Зарегистрировать команду
             </a>
         <? } else { ?>
             <a href="/<?= $model['contest']['shortname'] ?>/registration?place=<?= $model['place']['id'] ?>" class="btn btn-primary" disabled>
                  Зарегистрировать команду
             </a>
             <span class="text-muted">
                &nbsp;Места на&nbsp;площадке закончились, больше регистрироваться нельзя
             </span>
         <? } ?>
      </p>
      -->


<?php include("_footer.php"); ?>
