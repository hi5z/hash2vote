<nav class="navbar navbar-inverse" role="navigation">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Hash2Vote</a>
        </div>


        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="/"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Админ
                        панель</a></li>
                <li><a href="/admin.php?type=0"><span class="glyphicon glyphicon-list" aria-hidden="true"></span>
                        Добавить голосование</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Редактирование
                        пользователей</a></li>
                <li><a href="/admin.php?type=1"><span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                        Управление категориями</a></li>
                <li><a href="/admin.php?type=3"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span>
                        Написать в блог</a></li>
                <li><a href="/admin.php?type=2"><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span>
                        Статистика</a></li>
                <li><a href="#"><?= $_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING'] ?></a></li>
            </ul>
        </div>
    </div>
</nav>