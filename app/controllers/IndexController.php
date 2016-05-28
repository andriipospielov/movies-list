<?php

class IndexController implements IController
{
    public function index()
    {
        $fc = FrontController::getInstance();
        /*Model initializing*/
        $model = new Movie();

//        $model
            


//        $model = new FileModel();
        /*
        *	$model->name = $params['name'];
        */
//        $model->name = "Guest";

//        $output = $model->render(USER_DEFAULT_FILE);

        $output = 'hello';

        $fc->setBody($output);
    }
}
