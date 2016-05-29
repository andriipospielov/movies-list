<?php

/**
 * Created by PhpStorm.
 * User: Andrei
 * Date: 29.05.2016
 * Time: 3:04
 */
class MovieForm extends Movie
{
    public function save($data)
    {
        switch ($data['type']) {
            case 'movie':
//                var_dump($_POST);
                $q = "INSERT INTO movies_list(name, f_id, year)
                      VALUES (:name, :format, :year)";
                $st = $this->_db->prepare($q);
                $st->bindParam(':name', $_POST['title']);
                $st->bindParam(':format', $_POST['format']);
                $st->bindParam(':year', $_POST['year']);
                $st->execute();

                $m_id = $this->_db->lastInsertId();
                $q = "INSERT INTO movies_to_actors (m_id, a_id)
                    VALUES (:mid, :aid)";
                $st = $this->_db->prepare($q);
                foreach ($_POST['actors'] as $actor) {
                    $st->bindParam(':mid', $m_id);
                    $st->bindParam(':aid', $actor);
                    $st->execute();

                }


                break;
            case 'format':
                $q = "INSERT INTO formats(name) VALUE (:name)";
                $st = $this->_db->prepare($q);
                $st->bindParam(':name', $_POST['newFormat']);
                $st->execute();

                break;
            case 'actor':
                $q = "INSERT INTO actors(name) VALUE (:name)";
                $st = $this->_db->prepare($q);
                $st->bindParam(':name', $_POST['newActor']);
                $st->execute();
                break;
        }
        $host = $_SERVER['HTTP_HOST'];
        header('Location: http://' . $host . '/movie/create');

    }

}