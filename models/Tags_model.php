<?php

class Tags_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function getTitle()
    {
        $array_tags = $this->db->query("SELECT tag FROM tags WHERE id=" .$_GET['t']);
        $tag = $array_tags->row_array();

        return '#' .$tag['tag'];
    }

    public function getTagsResult()   //Здесь соединила сразу 3 таблицы.
    {
        $array_video_id = $this->db->query("SELECT video_id FROM link_tags WHERE tags_id=" .$_GET['t']);
        $video_id = $array_video_id->result_array();

        foreach ($video_id as $key => $value) {

            $array_video = $this->db->query("SELECT * FROM video WHERE id=" .$video_id[$key]['video_id']);
            $video = $array_video->row_array();

            $video_id[$key]['id'] = $video['id'];
            $video_id[$key]['frame'] = $video['frame'];
            $video_id[$key]['title'] = $video['title'];
            $video_id[$key]['description'] = $video['description'];
            $video_id[$key]['date'] = $video['date'];
            $video_id[$key]['views'] = $video['views'];
            $video_id[$key]['users_id'] = $video['users_id'];

            $array_from_users = $this->db->query("SELECT channel_title FROM users WHERE id=" .$video_id[$key]['users_id']);
            $users = $array_from_users->row_array();
            
            $video_id[$key]['channel_title'] = $users['channel_title'];
        }

        return $video_id;
    }

    public function getSumVideo() 
    {
        $array_video_id = $this->db->query("SELECT video_id FROM link_tags WHERE tags_id=" .$_GET['t']);
        $video = $array_video_id->result_array();

        $sum_video = count($video);

        return $sum_video;
    }
}