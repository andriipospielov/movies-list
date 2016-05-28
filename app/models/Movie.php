<?php

class Movie
{
    static function getAll()
    {
        $db = DB::getInstance()->pdo;
        $q = "SELECT ml.id, ml.name AS title, ml.year, f.name AS format, GROUP_CONCAT(DISTINCT a.name  ORDER BY a.name DESC SEPARATOR ', ') AS staff
                FROM movies_list AS ml
                  JOIN movies_to_actors AS m2a ON ml.id = m2a.m_id
                  JOIN actors AS a ON m2a.a_id = a.id
                  JOIN formats AS f ON ml.f_id = f.id   
                ORDER BY title
        ";
        $res = $db->query($q)->fetchAll();

        return $res;
    }

    static function getOneById($id)
    {
        $db = DB::getInstance()->pdo;

        $st= "SELECT ml.id, ml.name AS title, ml.year, f.name AS format, GROUP_CONCAT(DISTINCT a.name  ORDER BY a.name DESC SEPARATOR ', ') AS staff
                FROM movies_list AS ml
                  JOIN movies_to_actors AS m2a ON ml.id = m2a.m_id
                  JOIN actors AS a ON m2a.a_id = a.id
                  JOIN formats AS f ON ml.f_id = f.id   
                WHERE ml.id = ?
        ";
        $st = $db ->prepare($st);
        $st->bindParam(1, $id);
        $st->execute();
        
        $res = $st->fetchAll();

        return $res;

    }


}