<?php

class Login
{

    const SHOW_BY_DEFAULT = 20;

    public static function adminLogin()
    {
        $db = Db::getConnection();
        $users = array();
        $result = $db->query('SELECT * FROM users');
        $users = $result->fetch();


        if ($_POST['Login'] === $users['adminLogin'] && $_POST['adminPassword'] === $users['adminPassword']) {
            header("Location: faSWdsqwetacas/view");
        } else {
            echo 'Не правильный логин или пароль';
        }

        return $users;
    }


}

;
