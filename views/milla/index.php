<?php
//session_start();

foreach ($video_trand as $value) {

    echo "<div id='frameDiv'>
            <a href='watch?v=" .$value['id']. "'>
                <img src='" .$value['frame']. "'>
            </a>
            <div id='titleDiv'>
                <a class='frame_title' href='watch?v=" .$value['id']. "' title='" .$value['title']. "'>" .$value['title']. "</a><br>
                <a class='channel_title' href='channel?u=" .$value['users_id']. "'>" .$value['channel_title']. "</a>
            </div>
            <a href='channel?u=" .$value['users_id']. "'>
                <div id='avatarDiv'>
                    <img src='" .$value['avatar']. "' title='" .$value['nickname']. "'>
                </div>
            </a>
        </div>";
}
/*function vardump($var) {
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
  }*/
//vardump($value);
?>