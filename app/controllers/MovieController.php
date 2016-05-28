<?php

class MovieController implements IController/*, IResourceController*/

{
    public function index()
    {
        $fc = FrontController::getInstance();
        $fc->setBody(MoviesList::getAll());
    }


}