<?
include './../config.php';
include './../static/header.php'; ?>

<style>
    h2.title {
        font-weight: normal;
        color: #222222;
    }
</style>
<body>

<? include './../static/head.php'; ?>

<div class="container">


    <? include './../func/golosa_okonchanie.php'; ?>


    <div class="row">
        <div class="col-md-8">
            <?
            function crop_str($string, $limit)
            {
                $substring_limited = substr($string, 0, $limit);
                return substr($substring_limited, 0, strrpos($substring_limited, ' '));
            }

            ?>

            <? $query = mysql_query("SELECT * FROM blog ORDER BY id DESC");
            while ($row = mysql_fetch_array($query)) { ?>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <a href="/blog/<?= $row['id'] ?>"><h2 class="title"><?= $row['post_title'] ?></h2></a>

                        <p>
                            написал <a href="#"><?= $row['post_author'] ?></a>
                            <small><span class="glyphicon glyphicon-time"></span> <?= $row['post_date'] ?></small>
                        </p>
                        <hr>


                        <?

                        if (strlen($row['post_content']) > 600) {
                            $short = crop_str($row['post_content'], 600);
                            echo $short;
                            echo "...";
                        } else {
                            echo $row['post_content'];
                        }


                        ?>
                        <br/>

                        <p><a href="/blog/<?= $row['id'] ?>" class="btn btn-info">Читать дальше...</a></p>
                        <hr>

                        <div class="pull-left text-muted">Категория: Новости | Метки: Важное, Новости проекта, Скандал,
                            Звезды
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