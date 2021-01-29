<!--header('Content-Type: text/html; charset=utf-8');-->

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width initial-scale=1.0"><!--Чтобы мобильные устройства понимали, что здесь отзывчивый дизайн-->
	<title><?=$title;?></title>
	<link rel="shortcut icon" href="/img/logo_title.png" type="image/x-icon">
	<link rel="stylesheet" href="/css/style.css">
</head>
<body>
<div id = "wrapper">

    <div id="headerDiv">
        <a href="/">
            <div id="logoDiv">
                <div><img src="/img/logo.png" title="Главная страница MyTube"></div>
                <div class="logo">MyTube</div>
            </div>
        </a>
        <div id="searchDiv">
            <form class="search_form" action="search" method="get" name="">
                <input class="search_input" type="text" placeholder="Введите запрос и нажмите Enter" name="q">
                <!--<input class="button_search" type="submit" name="" value="Поиск">-->
            </form>
        </div>
            <div class="search_logo"><img src="/img/search.png"></div>

<!--Ниже список(ul) дя выпадающего меню-->
<?php 
//img/theme5.jpg

if (!isset($login)) {
    foreach ($user as $value) {
        echo "<div id='login_inDiv'>
            <ul class='topmenu'>
                <li>
                    <a href='channel?u=" .$value['id']. "'>
                        <div id='ava_inDiv'>
                        <img src='" .$value['avatar']. "'>
                        </div>
                        <p class='nickname_in'>" .$value['nickname']. "</p>
                    </a>
                    <ul class='submenu'>
                        <li>
                            <a class='out_in' href='/login'>Выход</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>";
    } 
} else {
    echo "<div id='loginDiv'>
            <form action='login'>
                <button class='login_button' type='submit'>Войти</button>
            </form>
        </div>";  
}
?>
    </div>
    <div id="main">