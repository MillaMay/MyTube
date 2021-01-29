<?php

class Channel_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function getTitle()
    {
        $array_title = $this->db->query("SELECT channel_title FROM users WHERE id=" .$_GET['u']);
        $title = $array_title->row_array();

        return $title['channel_title'];
    }

    public function getUsers() 
    {
        $array_users = $this->db->query("SELECT * FROM users WHERE id=" .$_GET['u']);
        $users = $array_users->result_array();

        return $users;
    }

    public function getVideo()
    {
        $array_video = $this->db->query("SELECT * FROM video WHERE users_id=" .$_GET['u']);
        $video = $array_video->result_array();

        return $video;
    }

    public function getSumLinkUsers() 
    {
        $array_link_users = $this->db->query("SELECT channel FROM link_users WHERE users_id=" .$_GET['u']);
        $link_users = $array_link_users->result_array();

        return count($link_users);
    }
}