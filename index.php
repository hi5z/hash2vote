<?
include './config.php';
include './static/header.php'; ?>

<body>

<? include './static/head.php'; ?>

<div class="container">


    <? include './func/golosa_okonchanie.php'; ?>


    <div class="row">
        <div class="col-md-8">

            <div class="panel panel-default">
                <div class="panel-body">
                    <!-- CAROUSEL -->
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            <div class="item active">
                                <img src="/img/rolls/roll1.png" alt="Hash2Vote - ежедневные интересные голосования">
                            </div>
                            <div class="item">
                                <img src="/img/rolls/roll2.png" alt="Hash2Vote - свобода самовыражения">
                            </div>
                            <div class="item">
                                <img src="/img/rolls/roll3.png"
                                     alt="Hash2Vote - голосования с помощью Твиттер аккаунта">
                            </div>
                        </div>

                    </div>
                    <!-- END -->
                </div>
            </div>

            <div class="list-group">
                <? $query = mysql_query("SELECT * FROM voting ORDER BY id DESC");
                while ($row = mysql_fetch_array($query)) { ?>
                    <a href="/vote/<?= $row['id'] ?>" class="list-group-item">
                        <h4 class="list-group-item-heading"><?= $row['title'] ?></h4>

                        <p class="list-group-item-text"><STRONG><?= $row['option1'] ?></STRONG> против
                            <STRONG><?= $row['option2'] ?></STRONG></p>
                    </a> <? } ?>
            </div>

            <div class="panel panel-default">
                <div class="panel-body">
                    <h2>Привет, друг!</h2>

                    <p class="lead">Добро пожаловать на проект Hash2Vote.</p>

                    <p>Hash2Vote - это сайт, где вы можете проголосовать за что-либо или кого-либо используя свой
                        Twitter аккаунт.</p>

                    <p>Наша система обновляет количество голосов за все возможные варианты раз в пять минут, поэтому
                        голоса не высвечиваются моментально и мы просим вас быть немного терпеливее.</p>

                    <p>Проект расчитан на создание определенного социального фактора и взаимодействия между фан-клубами
                        и просто желающими выразить свое мнение по поводу знаменитости, предмета, направления в музыке,
                        музыкального альбома, книги, человека.</p>

                    <p>То, что вы видите сейчас - лишь малая доля из того, что мы задумали.</p>

                </div>
            </div>


        </div>


        <? include './static/right_block.php'; ?>
    </div>


</div>

<? include './static/foot.php'; ?>

</body>
</html>