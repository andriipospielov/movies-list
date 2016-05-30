<?php

class FrontController
{
    protected $_controller, $_action, $_params, $_body;
    static $_instance;

    public static function getInstance()
    {
        if (!(self::$_instance instanceof self))
            self::$_instance = new self();
        return self::$_instance;
    }
    /* Роутинг (в конструкторе и роут-методе) работает по принципу:
     * host.name/controller/method/key/value/
     * 
     * */
    private function __construct()
    {
        
        $request = $_SERVER['REQUEST_URI'];
        $splits = explode('/', trim($request, '/'));
        $this->_controller = !empty($splits[0]) ? ucfirst($splits[0]) . 'Controller' : 'IndexController';
        $this->_action = !empty($splits[1]) ? $splits[1]  : 'index';
        if (!empty($splits[2])) {
            $keys = $values = array();
            for ($i = 2, $cnt = count($splits); $i < $cnt; $i++) {
                if ($i % 2 == 0) {
                    $keys[] = $splits[$i];
                } else {
                    $values[] = $splits[$i];
                }            }
            $this->_params = array_combine($keys, $values);
        }
    }

    public function route()
    {
        if (class_exists($this->getController())) {
            $rc = new ReflectionClass($this->getController());
            if ($rc->implementsInterface('IController')) {
                if ($rc->hasMethod($this->getAction())) {
                    $controller = $rc->newInstance();
                    $method = $rc->getMethod($this->getAction());
                    $method->invoke($controller, $this->_params);
                } else {
                    throw new Exception("ActionException");
                }
            } else {
                throw new Exception("InterfaceException");
            }
        } else {
            throw new Exception("ControllerException");
        }
    }

    public function getParams()
    {
        return $this->_params;
    }

    public function getController()
    {
        return $this->_controller;
    }

    public function getAction()
    {
        return $this->_action;
    }

    public function getBody()
    {
        return $this->_body;
    }

    public function setBody($body)
    {
        $this->_body = $body;
    }
}	