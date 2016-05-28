<?php

class MovieController implements IController/*, IResourceController*/

{
    public function index()
    {
        $fc = FrontController::getInstance();
        $list_array=Movie::getAll();       

        $RenderResult= Renderer::render('/app/views/list.php', $list_array);
        $fc -> setBody($RenderResult);
    }

    public function show($params)
    {
        $fc = FrontController::getInstance();
        $MovieFullInfo = Movie::getOneById($params['id']);

        $RenderResult= Renderer::render('/app/views/one.php', $MovieFullInfo);
        $fc -> setBody($RenderResult);               
        
    }


}