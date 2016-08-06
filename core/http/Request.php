<?php 
namespace Core\Http;

use Core\Utils\Config;

class Request
{
    private $params = array();
    private $url;


    /**
     * Get the controller 
     * return default controller if no controller set on the url.
     * @return  string
     */
    public function getController()
    {   
        if( !empty($this->url) || isset($this->url[0]) ) {
          return str_replace('-', '', $this->url[0]);
        }

        return Config::get('app.default_controller');
    }


    /**
     * Get the controller action
     * return default action if no action set in the url.
     * @return string
     */
    public function getAction()
    {
        if( isset($this->url[1]) ) {
            return str_replace('-', '', $this->url[1]);
        }

        return Config::get('app.default_action');
    }


    /**
     * Get the action parameters.
     * @return array
     */
    public function getParams()
    {
        return array_slice($this->url, 2);
    }


    /**
     * Run the controller
     * will return error 404 if the url doesn't match any of the controller,
     * method and the number of parameter must be equal if any.
     * @return void
     */
    public function run()
    {
        $this->url = isset( $_GET['url'] ) ? explode('/', rtrim($_GET['url'], '/')) : [];
        $controlerPath = CONTROLLERS_PATH . '/' . $this->getController() . '.php';

        if(!file_exists($controlerPath)) {
            trigger_error('Error 404:', E_USER_ERROR);
        }

        $controller = '\App\Controllers\\' . $this->getController();
        $controller = new $controller;
        $action = $this->getAction();
        $params = $this->getParams();

        if(!method_exists($controller, $action)) {
            trigger_error('Error 404:', E_USER_ERROR);
        }
        
        // ReflectionMethod use to count the number of parameters
        $method = new \ReflectionMethod($controller, $action);
        
        if( count($params) !== $method->getNumberOfParameters() ) {
            trigger_error('Error 404:', E_USER_ERROR);
        }

        call_user_func_array([$controller, $action], $params);
    }

}