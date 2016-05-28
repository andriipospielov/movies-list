<?php

class MoviesList
{
    public $list = array();

    static function getAll()
    {
        $db = DB::getInstance()->pdo;
//        $db = new  PDO();
        $q = "SELECT ml.name AS title, ml.year, f.name AS format, GROUP_CONCAT(DISTINCT a.name  ORDER BY a.name DESC SEPARATOR ', ') AS staff
                FROM movies_list AS ml
                  JOIN movies_to_actors AS m2a ON ml.id = m2a.m_id
                  JOIN actors AS a ON m2a.a_id = a.id
                  JOIN formats AS f ON ml.f_id = f.id   
                ORDER BY title
        ";
        $res = $db->query($q)->fetchAll();
        $str = '';
        foreach ($res as $item) {
            $str .= implode(', ', $item) . PHP_EOL;
        }

        return $str;

    }
}
