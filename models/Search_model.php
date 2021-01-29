<?php

class Search_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function getTitle($q)
    {
        $title_q = 'Поиск - ' .$q;

        return $title_q;
    }

    public function getResultSearch($q)
    {
        $q = trim($q);
        $q = stripslashes($q);
        $q = htmlentities($q);

        if (!empty($q)) {
            
            $array_video = $this->db->query("SELECT * FROM video WHERE title LIKE '%$q%' OR description LIKE '%$q%'");
            $q = $array_video->result_array();

            foreach ($q as $key => $value) {

                $array_from_users = $this->db->query("SELECT channel_title FROM users WHERE id=" .$q[$key]['users_id']);
                $users = $array_from_users->row_array();
            
                $q[$key]['channel_title'] = $users['channel_title'];
            }
        }

        return $q;
    } 
}