<?php

class IndexController implements IController
{
    public function index()
    {
        $fc = FrontController::getInstance();

        $output = 'Try one of the links above';

        $fc->setBody($output);
    }
}
