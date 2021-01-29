<?php

class Milla_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function getTrandVideo()
    {
        $array_video = $this->db->query("SELECT * FROM video ORDER BY `date` DESC LIMIT 12");//Трендовые видео
        $video = $array_video->result_array();
        
        foreach ($video as $key => $value) {

            $array_from_users = $this->db->query("SELECT nickname, avatar, channel_title FROM users WHERE id=" .$video[$key]['users_id']);
            $users = $array_from_users->row_array();

            $video[$key]['nickname'] = $users['nickname'];
            $video[$key]['avatar'] = $users['avatar'];
            $video[$key]['channel_title'] = $users['channel_title'];
        }
        return $video;  
    }

    public function getUsers()
    {
        $user = [];
        if (isset($_SESSION['user'])) {
            
            $array_from_users = $this->db->query("SELECT id, nickname, avatar FROM users WHERE id='" .$_SESSION['user']. "'");
            $user = $array_from_users->result_array();
        } 
        return $user;
    }
}