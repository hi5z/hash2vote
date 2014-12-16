<?
include './config.php';
include './static/header.php'; ?>

<body>

<? include './static/head.php'; ?>

<div class="container">


    <? include './func/golosa_okonchanie.php'; ?>


    <div class="row">
        <div class="col-md-8">
            <h1>Рейтинг пользователей</h1>
            <table class="table borderless">
                <tbody>

                <?
                $i = 0;
                $query = mysql_query("SELECT * FROM users ORDER BY id DESC");
                while ($row = mysql_fetch_array($query)) {
                    $picture = str_replace(array('_normal', ''), '', $row['profilepic']);
                    $i++;?>
                    <tr>
                        <td><?= $i ?></td>
                        <td><img src="<?= $row['profilepic'] ?>"/></td>
                        <td>@<?= $row['username'] ?></td>
                        <td><?= $row['description']; ?></td>
                        <td>Голосов: <STRONG><?= $row['howmuchvotes']; ?></STRONG></td>
                    </tr>

                <? } ?>
                </tbody>
            </table>

        </div>


        <? include './static/right_block.php'; ?>
    </div>


</div>

<? include './static/foot.php'; ?>

</body>
</html>