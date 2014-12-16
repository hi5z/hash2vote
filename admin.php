<?php
/////////////////////// ЗАЩИТА ВО ВСЕ ПОЛЯ! ////////////////////////////////////
$pass = 'ENTER YOUR PASSWORD';


if ($_COOKIE["pass"] !== $pass) {
    sleep(1);

    if (isset($_POST["pass"])) {
        setcookie("pass", md5($_POST["pass"]), time() + 3600 * 24 * 14);

        die('<meta http-equiv="refresh" content="1; url=./admin.php">');
    }

    ?>

    <html>
    <head>
        <title>Админ-панель</title>
        <link rel="stylesheet" href="http://hash2vote.ru/css/bootstrap.css">
        <link rel="stylesheet" href="http://hash2vote.ru/css/bootstrap-theme.css">
        <link rel="stylesheet" href="http://hash2vote.ru/css/admin.css">
        <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
        <script src="http://hash2vote.ru/js/bootstrap.min.js"></script>
        <script src="http://hash2vote.ru/js/TweenLite.min.js"></script>
        <script>
            $(document).ready(function () {
                $(document).mousemove(function (event) {
                    TweenLite.to($("body"),
                        .5, {
                            css: {
                                backgroundPosition: "" + parseInt(event.pageX / 8) + "px " + parseInt(event.pageY / '12') + "px, " + parseInt(event.pageX / '15') + "px " + parseInt(event.pageY / '15') + "px, " + parseInt(event.pageX / '30') + "px " + parseInt(event.pageY / '30') + "px",
                                "background-position": parseInt(event.pageX / 8) + "px " + parseInt(event.pageY / 12) + "px, " + parseInt(event.pageX / 15) + "px " + parseInt(event.pageY / 15) + "px, " + parseInt(event.pageX / 30) + "px " + parseInt(event.pageY / 30) + "px"
                            }
                        })
                })
            })
        </script>
    </head>
    <body>
    <div class="container">
        <div class="row vertical-offset-100">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row-fluid user-row">
                            <img src="http://s11.postimg.org/7kzgji28v/logo_sm_2_mr_1.png" class="img-responsive"
                                 alt="Le mew wuz here. Do not try to copy or else I will cut your balls on small pieces"/>
                        </div>
                    </div>
                    <div class="panel-body">
                        <form method="POST" accept-charset="UTF-8" role="form" class="form-signin">
                            <fieldset>
                                <label class="panel-login">
                                    <div class="login_result">&nbsp;</div>
                                </label>
                                <input class="form-control" placeholder="Введите пароль" id="password" name="pass"
                                       type="password">
                                <br />
                                <input class="btn btn-lg btn-success btn-block" type="submit" id="submit"
                                       value="Войти »">
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>

    </html>

    <?php
    exit();
}

//////////////////////// КОНЕЦ ЗАЩИТЫ ////////////////////////////////////////

include './config.php';
include './static/header.php'; ?>



<? include './static/head.admin.php'; ?>

<body>
<div class="container">


    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">

                    <?
                    if (!empty($_GET['type'])) {
                    switch ($_GET['type']) {
                    case 777: ?>
                    <form action="./func/newvote.php" method="post" class="form-horizontal"
                          enctype="multipart/form-data" data-parsley-validate>
                        <div class="row">
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="Title" class="col-sm-3 control-label">Заголовок:<span
                                            style="color: red;">*</span></label>

                                    <div class="col-sm-8">
                                        <input name="Title" type="text" class="form-control" id="Title"
                                               placeholder="Введите заголовок" required/>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="Subtitle" class="col-sm-3 control-label">Подзаголовок:<span
                                            style="color: red;">*</span></label>

                                    <div class="col-sm-8">
                                        <input name="Subtitle" type="text" class="form-control" id="Subtitle"
                                               placeholder="Подаголовок" required/>
                                    </div>
                                </div>
                                <hr/>
                                <div class="form-group">
                                    <label for="Option1" class="col-sm-3 control-label">Опция №1:<span
                                            style="color: red;">*</span></label>

                                    <div class="col-sm-8">
                                        <input name="Option1" type="text" class="form-control" id="Option1"
                                               placeholder="Первый объект голосования" maxlength="20" required/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="Option2" class="col-sm-3 control-label">Опция №2:<span
                                            style="color: red;">*</span></label>

                                    <div class="col-sm-8">
                                        <input name="Option2" type="text" class="form-control" id="Option2"
                                               placeholder="Второй объект голосования" maxlength="20" required/>
                                    </div>
                                </div>
                                <hr/>

                                <div class="form-group">
                                    <label for="Hash1" class="col-sm-3 control-label">Хэштег для голосования за №1:<span
                                            style="color: red;">*</span></label>

                                    <div class="col-sm-8">
                                        <input name="Hash1" type="text" class="form-control" id="Hash1"
                                               placeholder="Введите #хэштег" maxlength="20" required/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="Option2" class="col-sm-3 control-label">Хэштег для голосования за
                                        №2:<span style="color: red;">*</span></label>

                                    <div class="col-sm-8">
                                        <input name="Hash2" type="text" class="form-control" id="Hash2"
                                               placeholder="Введите #хэштег" maxlength="20" required/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="image1" class="col-sm-3 control-label">Картинка для опции №1</label>

                                    <div class="col-sm-8">
                                        <input type="file" name="image1" id="image1">

                                        <p class="help-block">Картинка должна быть <a
                                                href="https://www.google.com.ua/imghp?tbs=isz:ex,iszw:300,iszh:450&tbm=isch&imgdii=_">300х450</a>.
                                        </p>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="image1" class="col-sm-3 control-label">Картинка для опции №2</label>

                                    <div class="col-sm-8">
                                        <input type="file" name="image2" id="image2">

                                        <p class="help-block">Картинка должна быть <a
                                                href="https://www.google.com.ua/imghp?tbs=isz:ex,iszw:300,iszh:450&tbm=isch&imgdii=_">300х450</a>.
                                        </p>
                                    </div>
                                </div>


                            </div>
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="Category" class="col-sm-3 control-label">Категория:<span
                                            style="color: red;">*</span></label>

                                    <div class="col-sm-8">
                                        <select class="form-control" name="Category" id="Category">
                                            <? $query = mysql_query("SELECT * FROM category ORDER BY id");
                                            while ($row = mysql_fetch_array($query)) { ?>
                                                <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
                                            <? } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="sel1" class="col-sm-3 control-label">Статус:<span style="color: red;">*</span></label>

                                    <div class="col-sm-8">

                                        <select class="form-control" id="sel1">

                                            <option value="1">Активно</option>
                                            <option value="0">Неактивно</option>
                                            <option value="3">Заблокировано</option>

                                        </select>
                                    </div>
                                </div>

                            </div>
                        </div>



            <div class="row">
                <div class="col-md-12" align="center">
                    <input type="submit" name="submit"/><br/>&nbsp;
                </div>
            </div>
            </form>

            <?
            break;
            case 1:
                ?>

                <form action="./func/addcat.php" method="post" class="form-horizontal" data-parsley-validate>
                    <div class="row">
                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="Name" class="col-sm-3 control-label">Название категории:<span
                                        style="color: red;">*</span></label>

                                <div class="col-sm-8">
                                    <input name="Name" type="text" class="form-control" id="Name"
                                           placeholder="Название категории" required/>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="Description" class="col-sm-3 control-label">Описание:<span
                                        style="color: red;">*</span></label>

                                <div class="col-sm-8">
                                    <input name="Description" type="text" class="form-control" id="Description"
                                           placeholder="Описание" required/>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12" align="center">
                                    <input type="submit" name="submit"/><br/>&nbsp;
                                </div>
                            </div>
                </form>
                <hr/>
                <div class="col-md-12">
                <? $query = mysql_query("SELECT * FROM category ORDER BY id");
                while ($row = mysql_fetch_array($query)) { ?>

                    <?= $row['id'] ?> - <b><?= $row['name'] ?></b> - <?= $row['description'] ?><br/>

                <? } ?>
                </div>
                <?
                break;
            case 3:?>

            <form action="./func/addblogpost.php" method="post" class="form-horizontal" data-parsley-validate>
                <div class="row">
                    <div class="col-md-6">

                        <div class="form-group">
                            <label for="Title" class="col-sm-3 control-label">Заголовок:<span
                                    style="color: red;">*</span></label>

                            <div class="col-sm-8">
                                <input name="Title" type="text" class="form-control" id="Title"
                                       placeholder="Какой заголовок?" required/>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="PostContent" class="col-sm-3 control-label">Контент (можно использовать
                                HTML):<span style="color: red;">*</span></label>

                            <div class="col-sm-8">
                                <textarea name="PostContent" class="form-control" id="PostContent"
                                          placeholder="Контент поста" rows="10" cols="10" required></textarea>
                            </div>
                        </div>


                    </div>
                </div>


    <div class="row">
        <div class="col-md-12" align="center">
            <input type="submit" name="submit"/><br/>&nbsp;
        </div>
    </div>
    </form>



    <?
    break;
    case 2:
        echo "i equals 2";
        break;
    } } else { echo "Выберите, плиз, категорию";} ?>


</div>
</div>

</div>


</div>


</div>

<? include './static/foot.php'; ?>

</body>

<script type="text/javascript">
    window.twttr = (function (d, s, id) {
        var t, js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {
            return
        }
        js = d.createElement(s);
        js.id = id;
        js.src = "https://platform.twitter.com/widgets.js";
        fjs.parentNode.insertBefore(js, fjs);
        return window.twttr || (t = {
                _e: [], ready: function (f) {
                    t._e.push(f)
                }
            })
    }(document, "script", "twitter-wjs"));
</script>
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="<?= $domain ?>js/bootstrap.min.js"></script>
<script src="<?= $domain ?>js/jasny-bootstrap.min.js"></script>
<script src="<?= $domain ?>holder.js"></script>

<!-- Yandex.Metrika counter -->
<script type="text/javascript">(function (d, w, c) {
        (w[c] = w[c] || []).push(function () {
            try {
                w.yaCounter27034683 = new Ya.Metrika({
                    id: 27034683,
                    webvisor: true,
                    clickmap: true,
                    trackLinks: true,
                    accurateTrackBounce: true
                });
            } catch (e) {
            }
        });
        var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () {
            n.parentNode.insertBefore(s, n);
        };
        s.type = "text/javascript";
        s.async = true;
        s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js";
        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else {
            f();
        }
    })(document, window, "yandex_metrika_callbacks");</script>
<noscript>
    <div><img src="//mc.yandex.ru/watch/27034683" style="position:absolute; left:-9999px;" alt=""/></div>
</noscript><!-- /Yandex.Metrika counter -->
<script>
    (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function () {
            (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date();
        a = s.createElement(o),
            m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

    ga('create', 'UA-56683404-1', 'auto');
    ga('require', 'displayfeatures');
    ga('send', 'pageview');

</script>
</html>
