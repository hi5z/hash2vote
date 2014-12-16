<?
include './config.php';
include './static/header.php'; ?>

<body>

<? include './static/head.php'; ?>

<div class="container">


    <? include './func/golosa_okonchanie.php'; ?>

    <?
    if (!empty($_GET['category'])) {
        $category = $_GET['category'];
        $querytitle = mysql_query("SELECT name FROM category WHERE id = $category");
        $rowtitle = mysql_fetch_array($querytitle);
    }

    if (empty($_GET['id'])) { ?>

    <div class="row">
        <div class="col-md-8">


            <div class="panel panel-default">
                <div class="panel-body">
                    <h1><? if (!empty($_GET['category'])) {
                            echo $rowtitle[0];
                        } elseif (!empty($_GET['chosen'])) { ?>Избранное<? } else { ?>Активные голосования <span
                            class="label label-danger">LIVE</span><? } ?></h1>

                    <table class="table table-hover">
                        <tbody data-link="row" class="rowlink">
                        <?
                        if (!empty($_GET['category'])) {
                            $querygo = "SELECT * FROM voting WHERE category = " . $_GET['category'] . " ORDER BY id DESC";
                        } elseif (!empty($_GET['chosen'])) {
                            $querygo = "SELECT * FROM voting WHERE chosen = " . $_GET['chosen'] . " ORDER BY id DESC";
                        } else {
                            $querygo = "SELECT * FROM voting ORDER BY id DESC";
                        }


                        $query = mysql_query("$querygo");
                        while ($row = mysql_fetch_array($query)) {
                            /////// count a littlebit
                            $total = $row['optvotes1'] + $row['optvotes2'];

                            if ($total == '0') {
                                $opt1perc = 50;
                                $opt2perc = 50;
                            } else {
                                $opt1perc = ($row['optvotes1'] * 100) / $total;
                                $opt2perc = ($row['optvotes2'] * 100) / $total;
                            }
                            ///////
                            ?>
                            <tr>
                                <td class="hidden-xs">
                                    <img src="/img/mini/<?= $row['imgname1'] ?>" class="img-thumbnail"/>
                                </td>
                                <td>
                                    <a href="/vote/<?= $row['id'] ?>">
                                        <h4><?= $row['title'] ?>
                                            <small><?= $row['subtitle'] ?></small>
                                        </h4>
                                    </a>

                                    <div class="col-md-12">
                                        <div class="text-center">
                                            <b><?= $row['option1'] ?></b> vs. <b><?= $row['option2'] ?></b>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-success progress-bar-striped active"
                                                 role="progressbar" aria-valuenow="<?= $opt1perc ?>" aria-valuemin="0"
                                                 aria-valuemax="100" style="width: <?= $opt1perc ?>%;">
                                                <strong><?= $row['option1'] ?>
                                                    - <?= $row['optvotes1'] ?> <?= getNumEnding($row['optvotes1'], $array); ?></strong>
                                            </div>

                                            <div class="progress-bar progress-bar-striped active" role="progressbar"
                                                 aria-valuenow="<?= $opt2perc ?>" aria-valuemin="0" aria-valuemax="100"
                                                 style="width: <?= $opt2perc ?>%;">
                                                <strong><?= $row['option2'] ?>
                                                    - <?= $row['optvotes2'] ?> <?= getNumEnding($row['optvotes2'], $array); ?></strong>
                                            </div>

                                        </div>
                                    </div>
                                </td>
                                <td class="hidden-xs">
                                    <img src="/img/mini/<?= $row['imgname2'] ?>" class="img-thumbnail"/>
                                </td>
                            </tr>
                        <? } ?>
                        </tbody>
                    </table>


                </div>
            </div>
        </div>




        <? } else {
        $id = $_GET['id'];
        $query = mysql_query("SELECT * FROM voting WHERE id=$id");
        while ($row = mysql_fetch_array($query))

        {

        /////// count a littlebit
        $total = $row['optvotes1'] + $row['optvotes2'];

        if ($total == '0') {
            $opt1perc = 50;
            $opt2perc = 50;
        } else {
            $opt1perc = ($row['optvotes1'] * 100) / $total;
            $opt2perc = ($row['optvotes2'] * 100) / $total;
        }
        ///////
        ?>



        <div class="row">
            <div class="col-md-8">


                <div class="panel panel-primary">
                    <div class="panel-body">
                        <h2><?= $row['title'] ?>
                            <small><?= $row['subtitle'] ?></small>
                        </h2>

                        <div class="progress">
                            <div class="progress-bar progress-bar-success progress-bar-striped active"
                                 role="progressbar" aria-valuenow="<?= $opt1perc ?>" aria-valuemin="0"
                                 aria-valuemax="100" style="width: <?= $opt1perc ?>%;">
                                <strong><?= $row['optvotes1'] ?> <?= getNumEnding($row['optvotes1'], $array); ?>
                                    (<?= round($opt1perc) ?>%)</strong>
                            </div>

                            <div class="progress-bar progress-bar-striped active" role="progressbar"
                                 aria-valuenow="<?= $opt2perc ?>" aria-valuemin="0" aria-valuemax="100"
                                 style="width: <?= $opt2perc ?>%;">
                                <strong><?= $row['optvotes2'] ?> <?= getNumEnding($row['optvotes2'], $array); ?>
                                    (<?= round($opt2perc) ?>%)</strong>
                            </div>

                        </div>
                        <div class="col-xs-6 center-block">
                            <a href="https://twitter.com/intent/tweet?hashtags=<?= $row['hash1'] ?>,hash2vote&amp;text=В%20голосовании%20<?= urlencode($row['title']) ?>%20я%20проголосовал%20за%20<?= urlencode($row['option1']) ?>%21%20Голосуйте%20здесь%20hash2vote.ru%2Fvote%2F<?= $row['id'] ?>">
                                <img src="/img/<?= $row['imgname1'] ?>"
                                     class="img-responsive img-thumbnail center-block img-rounded"
                                     alt="<?= $row['option1'] ?>"/> </a>

                            <a href="https://twitter.com/intent/tweet?hashtags=<?= $row['hash1'] ?>,hash2vote&amp;text=В%20голосовании%20<?= urlencode($row['title']) ?>%20я%20проголосовал%20за%20<?= urlencode($row['option1']) ?>%21%20Голосуйте%20здесь%20hash2vote.ru%2Fvote%2F<?= $row['id'] ?>"
                               class="btn btn-success btn-lg btn-block">
                                <div class="hidden-xs hidden-sm">Голосовать за</div> <?= $row['option1'] ?></a>

                        </div>


                        <div class="col-xs-6 center-block">
                            <a href="https://twitter.com/intent/tweet?hashtags=<?= $row['hash2'] ?>,hash2vote&amp;text=В%20голосовании%20<?= urlencode($row['title']) ?>%20я%20проголосовал%20за%20<?= urlencode($row['option2']) ?>%21%20Голосуйте%20здесь%20hash2vote.ru%2Fvote%2F<?= $row['id'] ?>">
                                <img src="/img/<?= $row['imgname2'] ?>"
                                     class="img-responsive img-thumbnail center-block img-rounded"
                                     alt="<?= $row['option2'] ?>"/> </a>

                            <a href="https://twitter.com/intent/tweet?hashtags=<?= $row['hash2'] ?>,hash2vote&amp;text=В%20голосовании%20<?= urlencode($row['title']) ?>%20я%20проголосовал%20за%20<?= urlencode($row['option2']) ?>%21%20Голосуйте%20здесь%20hash2vote.ru%2Fvote%2F<?= $row['id'] ?>"
                               class="btn btn-primary btn-lg btn-block">
                                <div class="hidden-xs hidden-sm">Голосовать за</div> <?= $row['option2'] ?></a>

                        </div>

                        <div class="col-xs-12 text-center">
                            <script type="text/javascript" src="//yastatic.net/share/share.js" charset="utf-8"></script>
                            <div class="yashare-auto-init" data-yashareL10n="ru" data-yashareType="small"
                                 data-yashareQuickServices="vkontakte,facebook,twitter,odnoklassniki,moimir,gplus"
                                 data-yashareTheme="counter"></div>
                        </div>


                    </div>
                </div>

                <div class="panel panel-primary">
                    <div class="panel-body">
                        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- Responsive eto zbs 2 -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-2301833805537748"
     data-ad-slot="4806781310"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>

                    </div>
                </div>


                <div class="panel panel-primary">
                    <div class="panel-body">
                        <?
                        $queryv = mysql_query("SELECT * FROM voting ORDER BY RAND() LIMIT 4");
                        while ($rowv = mysql_fetch_array($queryv)) { ?>
                            <div class="col-xs-3 text-center">
                                <a href="/vote/<?= $rowv['id'] ?>"
                                   title="<?= $rowv['title'] ?> - <?= $rowv['subtitle'] ?>"><b><?= $rowv['option1'] ?></b><br/>
                                    против<br/> <b><?= $rowv['option2'] ?></b></a>
                            </div>
                        <? } ?>

                    </div>
                </div>


                <div class="panel panel-default">
                    <div class="panel-heading">Комментарии</div>
                    <div class="panel-body">
                        <div id="vk_comments" class="col-md-12">

                        </div>
                    </div>
                </div>

                <? } ?>

            </div>

            <? } ?>


            <? include './static/right_block.php'; ?>
        </div>


    </div>

    <? include './static/foot.php'; ?>

</body>
</html>