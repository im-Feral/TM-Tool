<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title><?=$title?></title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/flatpickr.min.css">
</head>

<body class="<?php if($user==0):?>body-background<?php endif;?>">
<h1 class="visually-hidden">TM Tool</h1>

<div class="page-wrapper">
    <div class="container <?php if($user):?>container--with-sidebar<?php else:?> container--with-sidebar-guest <?php endif;?>">
        <header class="main-header">
            <a href="/">
                <img src="../img/logo.png" class="logo <?php if($user==0):?>logo-guest<?php endif;?>">
            </a>
            <?php if($user):?>
                <div class="main-header__side">
                    <a class="main-header__side-item button button--plus" href="/add_task.php">Добавить задачу</a>

                    <div class="main-header__side-item user-menu">
                        <div class="user-menu__image">
                            <img src="../img/user-square.svg" width="50" height="50" alt="Пользователь">
                        </div>

                        <div class="user-menu__data">
                            <p><?=$user['name']?></p>

                            <a href="/logout.php">Выйти</a>
                        </div>
                    </div>
                </div>
            <?php else:?>
                <div class="main-header__side">
                    <a class="main-header__side-item button" href="login.php">Войти</a>
                </div>
            <?php endif;?>
        </header>

        <div class="content">
            <section class="content__side">
                <?php if($user):?>
                    <h2 class="content__side-heading">Проекты</h2>
                    <nav class="main-navigation">
                        <ul class="main-navigation__list">
                            <li class="main-navigation__list-item <?=!isset($selected_menu_id)?'main-navigation__list-item--active':''?>">
                                <a class="main-navigation__list-item-link" href="?show_all=y">Все задачи</a>
                                <span class="main-navigation__list-item-count"><?=$all_tasks_count?></span>
                            </li>
                            <?php foreach($menu_items as $value):?>
                                <li class="main-navigation__list-item <?=(isset($selected_menu_id) && $selected_menu_id === (int)$value['ID'])?'main-navigation__list-item--active':''?>">
                                    <a class="main-navigation__list-item-link" href="/index.php?project_id=<?=$value['ID']?>"><?=htmlspecialchars($value['NAME'], ENT_QUOTES)?></a>
                                    <span class="main-navigation__list-item-count"><?=$value['TASKS_COUNT']?></span>
                                </li>
                            <?php endforeach;?>
                        </ul>
                    </nav>

                    <a class="button button--transparent button--plus content__side-button open-modal"
                       href="/add_project.php" target="project_add">Добавить проект</a>
                <?php else:?>
                    <!--<p class="content__side-info">Если у вас уже есть аккаунт, авторизуйтесь на сайте</p>

                    <a class="button button--transparent content__side-button" href="/login.php">Войти</a>-->

                <?php endif;?>
            </section>


            <main class="content__main">
                <?=$content?>
            </main>
        </div>
    </div>
</div>
<script src="flatpickr.js"></script>
<script src="script.js"></script>
</body>
</html>
