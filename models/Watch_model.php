<?php

class Watch_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function getTitle()
    {
        $title_from_video = $this->db->query("SELECT title FROM video WHERE id=" .$_GET['v']);
        $title = $title_from_video->row_array();

        return $title['title'];
    }

    public function getFiles()
    {
        $array_files = $this->db->query("SELECT * FROM files_video WHERE video_id =" .$_GET['v']);
        $files = $array_files->result_array();

        foreach ($files as $key => $value) {
            
            $array_video = $this->db->query("SELECT * FROM video WHERE id=" .$files[$key]['video_id']);
            $video = $array_video->row_array();

            $files[$key]['title'] = $video['title'];
            $files[$key]['date'] = $video['date'];
            $files[$key]['description'] = $video['description'];

            $views = ($files[$key]['views'] = $video['views'] + 1);
            $views_update = $this->db->query("UPDATE video SET views='$views' WHERE id=" .$_GET['v']);
        }

        return $files;
    }

    public function getTags()
    {
        $array_tags_id = $this->db->query("SELECT tags_id FROM link_tags WHERE video_id =" .$_GET['v']);
        $tags_id = $array_tags_id->result_array();

        foreach ($tags_id as $key => $value) {

            $array_tags = $this->db->query("SELECT * FROM tags WHERE id=" .$tags_id[$key]['tags_id']);
            $tags = $array_tags->row_array();

            $tags_id[$key]['id'] = $tags['id'];
            $tags_id[$key]['tag'] = $tags['tag'];
        }

        return $tags_id;
    }

    public function getUsers() 
    {
        $array_from_video = $this->db->query("SELECT users_id FROM video WHERE id=" .$_GET['v']);
        $video_users = $array_from_video->result_array();

        foreach ($video_users as $key => $value) {

            $array_users = $this->db->query("SELECT * FROM users WHERE id=" .$video_users[$key]['users_id']);
            $users = $array_users->row_array();

            $video_users[$key]['id'] = $users['id'];
            $video_users[$key]['nickname'] = $users['nickname'];
            $video_users[$key]['avatar'] = $users['avatar'];
        }

        return $video_users;
    }

    public function getSumLinkUsers()
    {
        $array_from_video = $this->db->query("SELECT users_id FROM video WHERE id=" .$_GET['v']);
        $users_id = $array_from_video->result_array();

        foreach ($users_id as $key => $value) {

            $array_from_link_users = $this->db->query("SELECT channel FROM link_users WHERE users_id=" .$users_id[$key]['users_id']);
            $link_users = $array_from_link_users->result_array();
        }

        return count($link_users);
    }

    public function getComments()
    {
        $array_comments = $this->db->query("SELECT * FROM comments WHERE video_id='" .$_GET['v']. "' ORDER BY time DESC");//Почему-то не выдает ошибку, хотя .$_GET['v']. подсвечивается неправильно.
        //И time подсвечивает тоже почему-то, как команду SQL.
        $comments = $array_comments->result_array();

        foreach ($comments as $key => $value) {

            $array_from_users = $this->db->query("SELECT nickname, avatar FROM users WHERE id=" .$comments[$key]['users_id']);
            $users = $array_from_users->row_array();
            
            $comments[$key]['nickname'] = $users['nickname'];
            $comments[$key]['avatar'] = $users['avatar'];

            $array_like_comments = $this->db->query("SELECT COUNT(likes) as quantity FROM like_comments WHERE comments_id=" .$comments[$key]['id']);
            $quantity = $array_like_comments->row_array();

            $comments[$key]['likes'] = $quantity['quantity'];
        }

        return $comments;
    }


    public function getSumLikeComments()
    {
        
    }

    public function getSumComments()
    {
        $array_comments = $this->db->query("SELECT * FROM comments WHERE video_id=" .$_GET['v']);
        $comments = $array_comments->result_array();

        return count($comments);
    }

    public function getRelatedVideo()
    {
        $array_video = $this->db->query("SELECT * FROM video ORDER BY date DESC");//Схожие видео
        $video = $array_video->result_array();
        
        foreach ($video as $key => $value) {

            $array_from_users = $this->db->query("SELECT channel_title  FROM users WHERE id=" .$video[$key]['users_id']);
            $users = $array_from_users->row_array();

            $video[$key]['channel_title'] = $users['channel_title'];
        }

        return $video;
    }
}