<?
include './../config.php';
include './../static/header.php'; ?>

<body>

<? include './../static/head.php'; ?>

<div class="container">


    <? include './../func/golosa_okonchanie.php'; ?>


    <div class="row">
        <div class="col-md-8">

            <? $query = mysql_query("SELECT * FROM blog WHERE id=$_GET[id]");
            while ($row = mysql_fetch_array($query)) { ?>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h2><?= $row['post_title'] ?></h2>

                        <p>
                            написал <a href="http://hash2vote.ru"><?= $row['post_author'] ?></a>
                            <small><span class="glyphicon glyphicon-time"></span> <?= $row['post_date'] ?></small>
                        </p>
                        <hr>

                        <?= $row['post_content'] ?>
                        <hr>

                        <div class="col-md-12">

                            <ul id="myTab" class="nav nav-tabs" role="tablist">
                                <li class="active">
                                    <a href="#default" id="default-tab" role="tab" data-toggle="tab" aria-controls="vk">Комментарии</a>
                                </li>
                                <li>
                                    <a href="#vk" id="vk-tab" role="tab" data-toggle="tab" aria-controls="vk"
                                       aria-expanded="true">ВК</a>
                                </li>
                                <li>
                                    <a href="#fb" id="fb-tab" role="tab" data-toggle="tab" aria-controls="fb"
                                       aria-expanded="true">Facebook</a>
                                </li>
                            </ul>

                            <div id="myTabContent" class="tab-content">
                                <div role="tabpanel" class="tab-pane fade in active" id="default"
                                     aria-labelledBy="default-tab">
                                    <h3>Комментарии</h3>
                                    <hr/>
                                    <!-- КАМИНТАРИИ )))) ЛАЛ)))) -->
                                    <div class="media" style="margin-top: 10px;">
                                        <a class="media-left" href="#">
                                            <img
                                                src="http://pbs.twimg.com/profile_images/416899125087449089/-v6ezA6n_normal.png"
                                                alt="@spat написал">
                                        </a>

                                        <div class="media-body">
                                            <h4 class="media-heading">Alex Novak
                                                <small>@spat</small>
                                            </h4>
                                            Ну эт кароч, збс ваще.<br/>
                                            <small>02.12.2014 в 12:77 |</small>
                                            <small><a href="">Ответить</a></small>
                                            <!-- овтеты -->
                                            <div class="media">
                                                <a class="media-left" href="#">
                                                    <img
                                                        src="http://pbs.twimg.com/profile_images/416899125087449089/-v6ezA6n_normal.png"
                                                        alt="@spat написал">
                                                </a>

                                                <div class="media-body">
                                                    <h4 class="media-heading">Alex Novak
                                                        <small>@spat</small>
                                                    </h4>
                                                    Ну эт кароч, збс ваще. х2<br/>
                                                    <small>02.12.2014 в 12:77 |</small>
                                                    <small><a href="">Ответить</a></small>

                                                    <!-- овтеты -->
                                                    <div class="media">
                                                        <a class="media-left" href="#">
                                                            <img
                                                                src="http://pbs.twimg.com/profile_images/416899125087449089/-v6ezA6n_normal.png"
                                                                alt="@spat написал">
                                                        </a>

                                                        <div class="media-body">
                                                            <h4 class="media-heading">Alex Novak
                                                                <small>@spat</small>
                                                            </h4>
                                                            Ну эт кароч, збс ваще. х2<br/>
                                                            <small>02.12.2014 в 12:77 |</small>
                                                            <small><a href="">Ответить</a></small>
                                                        </div>
                                                    </div>
                                                    <!-- овтеты -->

                                                </div>
                                            </div>
                                            <!-- овтеты -->
                                        </div>
                                    </div>

                                    <!-- КАHEC -->
                                </div>

                                <div role="tabpanel" class="tab-pane fade" id="vk" aria-labelledBy="vk-tab">
                                    <h3>Комментарии из Вконтакте</h3>

                                    <div id="vk_comments" class="col-md-12"
                                         style="margin-top:10px; margin-left: -15px; margin-right: -10px;"></div>
                                </div>

                                <div role="tabpanel" class="tab-pane fade" id="fb" aria-labelledBy="fb-tab">
                                    <h3>Комментарии из Facebook</h3>

                                    <div class="fb-comments col-md-12" style="margin-top:10px; margin-left: -15px;"
                                         data-href="<?= 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>"
                                         data-width="688" data-numposts="15" data-colorscheme="light"></div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            <? } ?>


        </div>


        <? include './../static/right_block.php'; ?>
    </div>


</div>

<? include './../static/foot.php'; ?>

</body>
</html>