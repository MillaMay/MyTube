<div id='watchDiv'>
<?php

//ПРОСМОТРЫ, ПОДПИСКИ, ЛАЙКИ должны обновляться с учетом пользователя - надо будет переделать!!!

foreach ($page_video as $value) {

    $date = date("d.m.Y", $value['date']);
    
    echo "<video class='watch_video' controls autoplay loop>
            <source src='" .$value['file']. "'>
        </video>
        <div id='infoDiv'>
            <div>";

    $array_tags = [];       
    foreach ($tags as $val) {
                    
        $array_tags[] = "<a href='tags?t=" .$val['id']. "' class='tags'>#" .$val['tag']. "</a>";
    }
    $row_tags = implode(' ', $array_tags);

    echo $row_tags. "<br><span class='frame_title'>" .$value['title']. "</span><br>
                <span class='views'>Просмотров: " .$value['views']. "
                    <span class='date_creation'>~ " .$date. "</span>
                </span>
            </div>
            <div id='likeDiv'>
                <button class='button_like' type='submit'><img src='/img/like.png'></button>
                <span class='sum like'>1000</span>
            </div>
            <div id='dislikeDiv'>
                <button class='button_like' type='submit'><img src='/img/dislike.png'></button>
                <span class='sum dislike'>100</span>
            </div>
        </div>";
}//Чтобы нажать лайк или дизлайк, нужно выполнить ВХОД.
?>
    <div id='subscribeDiv'>
<?php
foreach ($info_users as $value) {
    echo "<a href='channel?u=" .$value['id']. "'>
            <div id='avaDiv'>
                <img src='" .$value['avatar']. "'>
            </div>
            <span class='nickname'>" .$value['nickname']. "</span>
        </a><br>";
}
?>
        <span class='sum_subscribe'>Подписчиков: <?=$subscribers;?></span>
        <div id='buttonSubscribeDiv'> 
           <button class='button_subscribe' type='submit'>ПОДПИСАТЬСЯ</button><!--Подписаться должно меняться на - вы подписаны-->
        </div>
<!--Чтобы нажать подписаться, нужно выполнить ВХОД.-->
<?php
//Здесь должны быть две кнопки: показать описание и скрыть.
foreach ($page_video as $value) {

    echo "<div id='descriptionDiv'>
            <p class='description'>" .$value['description']. "</p>
        </div>";
}
?>
    </div>
    <hr><p class='sum_comments'>Комментариев: <?=$comments_sum;?></p>

    <form class='form_comments' action="" method="post">
        <input type="text" class='input_comments' placeholder="Оставьте комментарий" name="comment">
        <button class='button_comments_yes' type="submit">Оставить комментарий</button>
        <button class='button_comments_no' type="reset">Отмена</button>
    </form>
<!--Чтобы нажать "оставить комментарий", нужно выполнить ВХОД.-->
    <div id='commentsDiv'>
<?php
foreach ($comments as $value) {

    if($value['likes'] == 0) {
        $sum_likes = "";
    } else {
        $sum_likes = "<span class='sum_comments_like'>" .$value['likes']. "</span>";
    }

    $time = date("d.m.Y ~ H:i", $value['time']);

    echo "<a href='channel?u=" .$value['users_id']. "'>
            <div id='avaDiv'>
                <img src='" .$value['avatar']. "'>
            </div>
            <span class='nickname'>" .$value['nickname']. "</span>
            <span class='sum_subscribe comments_time'>" .$time. "</span>
        </a><br>
        <p class='text_comments'>" .$value['text']. "</p>
        <div id='like_comments'>
            <button class='comments_like' type='submit'><img src='/img/heart.png'></button>"
            .$sum_likes.
        "</div>
        <br><br>";
}
?>
    </div>
</div>

<div id='relatedDiv'>
<?php
foreach ($related_column as $value) {

    echo "<a href='watch?v=" .$value['id']. "'>
            <img class='related_frame' src='" .$value['frame']. "'>
        </a>
        <div id='relatedInfoDiv'>
            <a class='related_title' href='watch?v=" .$value['id']. "'>" .$value['title']. "</a><br>
            <a class='related_channel' href='channel?u=" .$value['users_id']. "' title='" .$value['channel_title']. "'>" .$value['channel_title']. "</a>
        </div>";
}
?>
</div>