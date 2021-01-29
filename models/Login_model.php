<?php

class Login_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function getLogin($email, $password)
    {
        if (!empty($email && $password)) {

            $array_from_users = $this->db->query("SELECT id, email, `password` FROM users WHERE email=" .$this->db->escape($email). " AND `password`='" .md5($password). "'");

            $count_rows = $array_from_users->num_rows();

            if ($count_rows >= 1) {

                $users_login = $array_from_users->row_array();
                
                $_SESSION['user'] = $users_login['id'];
                
                header("Location: /");
                exit;
                //return true; //тогда редирект
            } else {
                return false;
                //echo "Вы ввели неправильный логин или пароль.";
            }
        } else {
            return false;
            //echo "Пожалуйста, введите логин и пароль";
        }
        return $email;
    }
}
//vadim1
//puzzle2
//history3
//to420
//ivideos5