<?php

class sp
{
    public static function getTitle($id)
    {
        $db = Db::getConnection();
        $mainTitle = array();
        $query = $db->query('SELECT * FROM mainTitle WHERE title_id =' . $id);
        $mainTitle = $query->fetch();
        return $mainTitle;
    }
}

;