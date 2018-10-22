<?php include("_header.php"); ?>
    <title><?= $model['contest']['title'] ?> &bull; Расписание</title>
  </head>

  <body class="with-navbar">
    <?php include("_navbar.php"); ?>
    <?php $jumbotitle = "Расписание"; include("_jumbotron.php"); ?>
    
    <div class="container main">
      <div class="row">
        <div class=" col-md-12">
          <?= $model['contest']['schedule'] ?>

          <?php
            foreach ($model['places'] as $place)
            {
              ?>
                <h3 class="well"><?= htmlspecialchars($place['city']) ?>, <?= htmlspecialchars($place['fullname']) ?></h3>
                <?= nl2br($place['schedule']) ?>
              <?php
            }
          ?>
        </div>
      </div>
<?php include("_footer.php"); ?>
