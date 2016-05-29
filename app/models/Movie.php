<?php

class Movie
{
    protected $_db;

    public function __construct()
    {
        $this->_db = DB::getInstance()->pdo;

    }


    public function getAll()
    {

        $q = "SELECT ml.id, ml.name AS title, ml.year
                FROM movies_list AS ml                   
                ORDER BY title
        ";
        $res = $this->_db->query($q)->fetchAll();

        return $res;
    }

    public function getInputData()
    {
        $res = array();

        $q = "SELECT f.id, f.name 
                FROM formats AS f                   
                
        ";
        $res['formats'] = $this->_db->query($q)->fetchAll();

        $q = "SELECT a.id, a.name 
                FROM actors AS a                   
                
        ";
        $res['actors'] = $this->_db->query($q)->fetchAll();

        return $res;

    }

    public function getOneById($id)
    {

        $q = "SELECT ml.id, ml.name AS title, ml.year, f.name AS format, GROUP_CONCAT(DISTINCT a.name  ORDER BY a.name DESC SEPARATOR ', ') AS staff
                FROM movies_list AS ml
                  JOIN movies_to_actors AS m2a ON ml.id = m2a.m_id
                  JOIN actors AS a ON m2a.a_id = a.id
                  JOIN formats AS f ON ml.f_id = f.id   
                WHERE ml.id = ?
        ";
        $st = $this->_db->prepare($q);
        $st->bindParam(1, $id);
        $st->execute();

        $res = $st->fetchAll();

        return $res;

    }

    public function save($data)
    {


    }

    public function deleteMovieById($id)
    {

        $q = "DELETE FROM movies_list WHERE id =?
              LIMIT 1";
        $st = $this->_db->prepare($q);
        $st->bindParam(1, $id);
        $st->execute();

    }

    public function search()
    {
        $view = '';

        if ($_POST['searchtype'] === 'm') {
            $q = "SELECT ml.id, ml.name AS title, ml.year, f.name AS format, GROUP_CONCAT(DISTINCT a.name  ORDER BY a.name DESC SEPARATOR ', ') AS staff
                FROM movies_list AS ml
                  JOIN movies_to_actors AS m2a ON ml.id = m2a.m_id
                  JOIN actors AS a ON m2a.a_id = a.id
                  JOIN formats AS f ON ml.f_id = f.id   
                WHERE ml.name LIKE ?
        ";
            $view = 'one';
        } else {
            $q = "SELECT ml.id, ml.name AS title, ml.year
                FROM actors AS a
                 JOIN movies_to_actors  AS m2a ON  a.id = m2a.a_id  
                 JOIN movies_list AS ml ON m2a.m_id = ml.id
                 WHERE a.name LIKE ?                
        ";
            $view = 'list';


        }

        $st = $this->_db->prepare($q);
        $st->bindParam(1, $_POST['searchstr']);
        $st->execute();
        $res = $st->fetchAll();
        $fc = FrontController::getInstance();
        $fc->setBody(Renderer::render('/app/views/' . $view . '.php', $res));


    }


}