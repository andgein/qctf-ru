<?php include("_header.php"); ?>

    <title><?= $model['contest']['title'] ?></title>
  </head>

  <body class="with-navbar">
    <?php include("_navbar.php"); ?>
    <?php $jumbotitle = ""; include("_jumbotron.php"); ?>
    
    <div class="container main">
      <div class="row">
        <div class=" col-md-10">
          <?= $model['contest']['index_text'] ?>
        </div>
      </div>


<?php include("_footer.php"); ?>
