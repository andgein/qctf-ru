<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron">
  <div class="container">
    <h1><?= $jumbotitle ?> <?= $model['contest']['title'] == "Ural SchoolCTF" && !$jumbotitle ? '<img src="/static/school-2013.png" style="width: 800px;">' : $model['contest']['title'] ?></h1>
    <p>
    <? if ($model['contest']['past']) { ?>
        <span class="label label-warning">
            Соревнование прошло&nbsp;<?= str_replace(' ', '&nbsp;', $model['contest']['date']) ?>
    <? } else { ?>
        <span class="label label-success">
            Соревнование пройдёт&nbsp;<?= str_replace(' ', '&nbsp;', $model['contest']['date']) ?>
    <? } ?>
        </span>
    </p>
    <p class="details"><?= $model['contest']['description'] ?> </p>
  </div>
</div>
