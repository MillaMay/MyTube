    <div id='themeDiv'>
<?php
foreach ($users as $value) {

    $date = date("d.m.Y", $value['channel_date']);

    echo "<img class='theme' src='" .$value['channel_theme']. "'>
            <p class='theme_title'>" .$value['channel_title']. "</p>
        </div>
        <div id='userDiv'>
            <div id='avaChannelDiv'>
                <img src='" .$value['avatar']. "'>
            </div>
            <div id='nicknameChannelDiv'>
                <span>" .$value['nickname']. "</span>
            </div>
            <button class='button_subscribe channel_subscribe' type='submit'>ПОДПИСАТЬСЯ</button>";
}
?>
            <span class='channel_sum_subscribe'>Подписчиков: <?=$link_users;?></span>
            <p class='date_created'>Дата регистрации: <?=$date;?></p>
    </div>
<?php
foreach ($video as $value) {

    $time = time() - $value['date'];
    $days = floor($time / 86400);
    
    echo "<div id='contentChannelDiv'>
            <a href='watch?v=" .$value['id']. "'>
                <img class='content_frame' src='" .$value['frame']. "'>
            </a>
            <div id='contentInfoDiv'>
                <a href='watch?v=" .$value['id']. "'>
                    <span class='content_title'>" .$value['title']. "</span>
                </a><br><br>
                <p class='content_info'>Просмотров: " .$value['views']. "</p>
                <p class='content_info'>Дней назад: " .$days. "</p>
            </div>
        </div>";
}