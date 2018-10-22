<?php include("_header.php"); ?>
    <title><?= $model['contest']['title'] ?> &bull; Участники</title>
    <meta name="robots" content="noindex, nofollow"/>
  </head>

  <body>
    
    <div class="main">
      <div class="row">
        <div class="col-md-10">
          <table class="table table-striped table-hover table-responsive">
            <thead>
              <tr>
                <th>№</th>
                <th>Площадка</th>
                <th>Название</th>
                <th>Капитан</th>
                <th>Почта капитана</th>
                <th>Участник 2</th>
                <th>Почта</th>
                <th>Участник 3</th>
                <th>Почта</th>
                <th>Участник 4</th>
                <th>Почта</th>                
                <th>Количество компьютеров</th>
              </tr>
            </thead>
            <tbody>
            <?
               $idx = 0;
               foreach ($model['participants'] as $participant)
               { 
                 $place = $model['places'][$participant['place']];
                 $idx += 1;
            ?>
              <tr>
                <td width="50"><?= $idx ?>.</td>
                <td width="400" class="team-place">
                  <?= $place['fullname'] ?>
                </td>
                <td class="team-name">
                  <?= htmlspecialchars($participant['name']) ?>
                </td>
                <?php
                    for ($i = 1; $i <= 4; $i++)
                    {
                        ?>
                        <td class="team-name">
                          <?= htmlspecialchars($participant['participant'.$i]) ?>
                        </td>
                        <td class="team-name">
                          <?= htmlspecialchars($participant['email'.$i]) ?>
                        </td>
                        <?php
                    }
                ?>
                <td>
                    <?= htmlspecialchars($participant['computers']) ?>
                </td>
              </tr>
            <? } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

