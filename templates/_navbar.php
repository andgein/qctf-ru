<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/">QCTF</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="/<?= $model['contest']['shortname'] ?>/">О соревновании</a></li>
            <li><a href="/<?= $model['contest']['shortname'] ?>/rules">Правила</a></li>
            <li><a href="/<?= $model['contest']['shortname'] ?>/places">Площадки</a></li>
            <li><a href="/<?= $model['contest']['shortname'] ?>/participants">Участники</a></li>
            <?
                if (sizeof(get_people($model['contest']['shortname'])) > 0)
                {
                    ?>
                    <li><a href="/<?= $model['contest']['shortname'] ?>/team">Организаторы</a></li>
                    <?
                }
            ?>
            <? if (! empty($model['contest']['results'])) { ?>
                <li><a href="/<?= $model['contest']['shortname'] ?>/results">Результаты</a></li>
            <? } ?>
            <? if (! $model['contest']['past']) { ?>
                <li><a href="/<?= $model['contest']['shortname'] ?>/registration">Регистрация</a></li>
                <? if ($model['contest']['show_schedule']) { ?>
                    <li><a href="/<?= $model['contest']['shortname'] ?>/schedule">Расписание</a></li>
                <? } ?>
            <? } ?>
          </ul>
        </div>
      </div>
    </div>
