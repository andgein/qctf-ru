<?php include("_header.php"); ?>
    <title><?= $model['contest']['title'] ?> &bull; Команда</title>
  </head>

  <body class="with-navbar">
    <?php include("_navbar.php"); ?>
    <?php $jumbotitle = "Команда"; include("_jumbotron.php"); ?>
    
    <div class="container main">
        
       <?php
       $idx = 0;
       foreach ($model['people'] as $man)
       {
          $idx += 1;
          $photo = $man['photo'];
          if ($photo == '')
              $photo = $man['name'] . '.jpg';

          if ($idx % 2 == 1) echo '<div class="row">';
          ?>           

              <div class="col-xs-12 col-md-6" style="margin-bottom: 30px">
                <div class="media">
                    <div class="pull-left">
                        <img src="/static/people/<?= $photo ?>" class="media-object" alt="<?= htmlspecialchars($man['name']) ?>" width="150">
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading"><?= htmlspecialchars($man['name']) ?></h4>
                        <?= $man['description'] ?>
                    </div>
                </div>
               </div>
          <?php
          if ($idx % 2 == 0) echo '</div>';
      }
      ?>
      </div>
<?php include("_footer.php"); ?>
