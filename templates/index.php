<? include("_header.php"); ?>
    <title>QCTF</title>
</head>
<body>
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1>QCTF</h1>
        <p class="details">&mdash; это соревнования по защите информации по правилам Capture the flag (CTF), в которых очно участвуют команды не&nbsp;более, чем из четырёх человек</p>
        <div class="small">
          <p><strong>Никогда не слышали о CTF?</strong> Не страшно!</p>
          <p>Не стоит бояться слов «компьютерная безопасность» (особенно, если вы с ней раньше не сталкивались), на самом деле QCTF больше похож на соревнования, в которых побеждает тот, кто лучше знает компьютеры &mdash; языки программирования, сети, протоколы, файлы, операционные системы и&nbsp;так&nbsp;далее.</p>
        </div>
<!--
        <p><button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#details" >Узнать подробности &raquo;</button></p>
-->
      </div>
    </div>

<!-- Modal -->
<div class="modal fade" id="details" tabindex="-1" role="dialog" aria-labelledby="detailsLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="detailsLabel">Подробности</h4>
      </div>
      <div class="modal-body">
      <p>Чтобы узнать как проводится QCTF, как в нем можно поучаствовать и как его можно организовать самостоятельно &mdash; пишите нам на <a href="mailto:qctf@hackerdom.ru">qctf@hackerdom.ru</a></p>
      </div>
    </div>
  </div>
</div>

    <div class="container">
      <div class="row">
        <div class="col-md-4" style="border: 2px solid #f80; border-radius: 10px">
          <h2><a href="/school-2018" class="white-link">QCTF School</a> <span class="label label-warning" style="font-size: 40%; position: relative; top: -5px;">13 мая</span></h2>
          <p>Соревнования по правилам QCTF для школьников старших классов. Проводится с 2013 года (<a href="/school-2013/">Ural SchoolCTF 2013</a>, <a href="/school-2014/">QCTF School 2014</a>, <a href="/school-2015/">2015</a>, <a href="/school-2016/">2016</a>). С 2014 года проводится в разных городах России. </p>
          <p><a class="btn btn-warning" href="/school-2018/" role="button">Подробнее &raquo;</a></p>
        </div>
        <div class="col-md-4"><!--style="border: 2px solid #f80; border-radius: 10px">-->
          <h2><a href="/starter-2018" class="white-link">QCTF Starter</a> <!--<span class="label label-warning" style="font-size: 40%; position: relative; top: -5px;">25 февраля</span>--></h2>
          <p>
            Соревнования по правилам QCTF для студентов, только начинающих участвовать в подобных мероприятиях.
            Проводится в Екатеринбурге с&nbsp;<a href="/starter-2013/">2013&nbsp;года</a>. В <a href="starter-2014">2014</a> к нам присоединились Томск, Челябинск и МФТИ,
            а в <a href="/starter-2015">2015</a> и <a href="/starter-2016">2016</a> — ещё двадцать площадок.
          </p>
          <!--<p><a class="btn btn-default" href="/starter-2018/" role="button">Подробнее &raquo;</a></p>-->
       </div>
        <div class="col-md-4">
          <h2>The New QCTF</h2>
          <p>Если у вас есть идеи о проведении нового QCTF &mdash; напишите нам на <a href="mailto:qctf@hackerdom.ru">qctf@hackerdom.ru</a>.</p>
        </div>
      </div>

<?php include("_footer.php"); ?>
