<?php

/**
 * Created by PhpStorm.
 * User: Andrei
 * Date: 29.05.2016
 * Time: 3:04
 */
//TODO: Reproduce this file!
class MovieFile extends Movie
{

    private function addactors(){}
    private function parseAndSave($cont)
    {
        $MoviesArray = explode("\n\n", $cont);

        foreach ($MoviesArray as $k => $MovieStr) {
            $MovieArr = explode("\n", $MovieStr);
//            
            $title = trim(substr($MovieArr[0], strpos($MovieArr[0], ':') + 1));
            $year = trim(substr($MovieArr[1], strpos($MovieArr[1], ':') + 1));
            $format = trim(substr($MovieArr[2], strpos($MovieArr[2], ':') + 1));
            $actors = trim(substr($MovieArr[3], strpos($MovieArr[3], ':') + 1));
            



//            $MoviesArray[$k]= explode("\n", $value);
        }
        


    }

    private function saveOne()
    {
    }

    public function save($data)
    {
        $file = $_FILES['movies_data']['tmp_name'];
        $FileContent = file_get_contents($file);
        $this->parseAndSave($FileContent);
        echo 123;
    }

}