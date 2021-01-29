<div id='tagsDiv'>
    <p class='sum_video'>Всего <?=$sum_video;?> видео</p>
<?php  
foreach ($tags_video as $value) {
    
    $time = time() - $value['date'];
    $days = floor($time / 86400);

    echo "<div id='backgroundDiv'>
            <div id='tagsFrameDiv'>
                <a target='_blank' href='watch?v=" .$value['id']. "'>
                    <img src='" .$value['frame']. "'>
                </a>
            </div>
            <div id='tagsInfoDiv'>
                <a class='frame_title tag_title' target='_blank' href='watch?v=" .$value['id']. "' title='" .$value['title']. "'>" .$value['title']. "</a><br>
                <a class='channel_title tag_channel' target='_blank' href='channel?u=" .$value['users_id']. "' title='" .$value['channel_title']. "'>" .$value['channel_title']. "</a><br>
                <p class='views tag_views'>Просмотров: " .$value['views']. "
                    <span class='views tag_views tag_days'>Дней назад: " .$days. "</span>
                </p>
                <p class='description tag_description'>" .$value['description']. "</p>
            </div>
        </div>";
}
?>
</div>