    <div class="container main">
      <div class="row">
        <div class="col-md-10">
          <table class="table table-striped table-hover table-responsive">
            <thead>
              <tr>
                <th>№</th>
                <th>Название и состав команды</th>
                <th>Площадка</th>
              </tr>
            </thead>
            <tbody>
            <?
               $idx = 0;
               foreach ($model['participants'] as $participant)
               { 
                 $place = $model['places'][$participant['place']];
                 if (! $place['show_to_all'])
                   continue;
                 $idx += 1;
            ?>
              <tr>
                <td width="50"><?= $idx ?>.</td>
                <td class="team">
                  <div class="team-name">
                    <?= htmlspecialchars($participant['name']) ?>
                  </div>
                  <div class="team-members">
                    <?php
                        $people = [];
                        for ($p = 1; $p <= 4; $p++) {
                            if ($participant['participant'.$p])
                                $people[] = '<nobr>' . htmlspecialchars(trim($participant['participant'.$p])) . '</nobr>';
                        }
                    ?>
                    <?= join(', ', $people) ?>
                  </div>
                  <?php
                    if ($participant['school'])
                    {
                      ?>
                        <div class="team-members">
                          (<?= htmlspecialchars($participant['school']) ?>)
                        </div>
                      <?php
                    }
                  ?>
                </td>
                <td width="400" class="team-place">
                  <?= $place['fullname'] ?>,
                  <?= $place['city'] ?>
                </td>
              </tr>
            <? } ?>
            </tbody>
          </table>
          <? if ($idx == 0) { ?>
              <p>Пока никто не зарегистрировался. <a href="/<?= $model['contest']['shortname'] ?>/registration">Будьте первыми</a>!</p>
          <? } ?>
        </div>
      </div>
    </div>
