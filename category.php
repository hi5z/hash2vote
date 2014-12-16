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
                    <h1>Список всех категорий</h1>

                    <table class="table table-hover">
                        <tbody data-link="row" class="rowlink">

                        <? $query = mysql_query("SELECT * FROM category ORDER BY id");
                        while ($row = mysql_fetch_array($query)) {

                            ?>
                            <tr>
                                <td>
                                    <?
                                    if ($row['id'] == 1) {
                                        $link = '/famous/';
                                    } elseif ($row['id'] == 2) {
                                        $link = '/casual/';
                                    } else {
                                        $link = "/category/$row[id]";
                                    }
                                    ?>
                                    <a href="<?= $link ?>" title="<?= $row['name'] ?>">
                                        <h4><?= $row['name'] ?></h4><?= $row['description'] ?></a>
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
                        lalka
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