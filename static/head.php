<div id="vk_api_transport"></div>
<script type="text/javascript">
    window.vkAsyncInit = function () {
        VK.init({apiId: 4648944, onlyWidgets: true});
        VK.Widgets.Group("vk_groups", {
            mode: 0,
            width: "auto",
            height: "400",
            color1: 'FFFFFF',
            color2: '428bca',
            color3: '333'
        }, 81329822);
        VK.Widgets.Comments("vk_comments", {limit: 15, width: "500", attach: "*", autoPublish: "1", mini: "0"});
    };

    setTimeout(function () {
        var el = document.createElement("script");
        el.type = "text/javascript";
        el.src = "//vk.com/js/api/openapi.js";
        el.async = true;
        document.getElementById("vk_api_transport").appendChild(el);
    }, 0);

    window.fbAsyncInit = function () {
        FB.init({
            appId: '444165219069542',
            xfbml: true,
            version: 'v2.2'
        });
    };

    (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {
            return;
        }
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>

<nav class="navbar navbar-inverse" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Открыть меню</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Hash2Vote</a>
        </div>


        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li<? if (strripos($_SERVER['SCRIPT_FILENAME'], 'index')) { ?> class="active"<? } ?>><a href="/"><span
                            class="glyphicon glyphicon-home" aria-hidden="true"></span> Главная</a></li>
                <li<? if (strripos($_SERVER['REQUEST_URI'], 'vote') OR strripos($_SERVER['REQUEST_URI'], 'lenta')) { ?> class="active"<? } ?>>
                    <a href="/lenta/"><span class="glyphicon glyphicon-list" aria-hidden="true"></span> Лента</a></li>
                <li<? if (strripos($_SERVER['REQUEST_URI'], 'chosen')) { ?> class="active"<? } ?>><a
                        href="/chosen/"><span class="glyphicon glyphicon-star" aria-hidden="true"></span> Избранные</a>
                </li>
                <li<? if (strripos($_SERVER['REQUEST_URI'], 'blog')) { ?> class="active"<? } ?>><a href="/blog/"><span
                            class="glyphicon glyphicon-fire" aria-hidden="true"></span> Новости</a></li>
                <!-- <li<? if (strripos($_SERVER['REQUEST_URI'], 'famous')) { ?> class="active"<? } ?>><a href="/famous/"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Известные люди</a></li>
		<li<? if (strripos($_SERVER['REQUEST_URI'], 'casual')) { ?> class="active"<? } ?>><a href="/casual/"><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span> Повседневное</a></li> -->
                <li<? if (strripos($_SERVER['REQUEST_URI'], 'category')) { ?> class="active"<? } ?>><a
                        href="/category/"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Все
                        категории</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <? if (!empty($_COOKIE['sssp'])) {
                    $cusername = mysql_query("SELECT username FROM users WHERE supermegasecret = '$_COOKIE[sssp]'");
                    $rusername = mysql_fetch_array($cusername); ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Добро пожаловать,
                            @<?= $rusername[0] ?>! <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Создать голосование</a></li>
                            <li><a href="#">Редактировать профиль</a></li>
                            <li class="divider"></li>
                            <li><a href="?action=1">Выйти</a></li>
                        </ul>
                    </li>


                <? } else { ?>
                    <!-- <li>
                        <a href="<?= $linktoauth ?>">
                            Войти с помощью Твиттера</a></li> -->
                <? } ?>

            </ul>
        </div>
    </div>
</nav>