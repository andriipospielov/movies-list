<?php

class MovieController implements IController/*, IResourceController*/

{
//    TODO: refactor model usage due to inductuted factory pattern
    private $_fc, $_model;

    public function __construct()
    {
        $this->_fc = FrontController::getInstance();
        $this->_model = new Movie();
    }

    public function index()
    {
        $RenderResult = Renderer::render('/app/views/list.php', $this->_model->getAll());
        $this->_fc->setBody($RenderResult);
    }

    public function show($params)
    {
        $MovieFullInfo = $this->_model->getOneById($params['id']);
        $this->_fc->setBody(Renderer::render('/app/views/one.php', $MovieFullInfo));
    }

    public function create()
    {
        $DataForInput = $this->_model->getInputData();
        $RenderResult = Renderer::render('/app/views/create.php', $DataForInput);
        $this->_fc->setBody($RenderResult);
    }
    
    public function destroy($params)
    {
        $this->_model->deleteMovieById($params['id']);
        $host = $_SERVER['HTTP_HOST'];
        header('Location: http://' . $host . '/movie/create');
    }

    public function store($params)
    {
        $DataType = $_FILES['movies_data'] ? 'file' : 'form';
        $model = MovieSaveFactory::SaverFactory($DataType);
        $model->save($params);

    }


}