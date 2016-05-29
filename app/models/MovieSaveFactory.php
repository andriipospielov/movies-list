<?php

/**
 * Created by PhpStorm.
 * User: Andrei
 * Date: 29.05.2016
 * Time: 3:05
 */
class MovieSaveFactory
{
    public static function  SaverFactory($type)
    {
        if ($type == 'file')
            return new MovieFile();
        else
            return new MovieForm();

    }


}