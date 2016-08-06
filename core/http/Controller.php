<?php 
namespace Core\Http;

use Core\Renderer\Template;

abstract class Controller
{

    /**
     * will include html
     * @param  string $view 
     * @param  array $data values that will pass in the view
     * @return void
     */
    public function view($view, $data = [])
    {
        if(!file_exists(VIEWS_PATH . '/' . $view . '.php')) {
            trigger_error('Error: View ' . $view . ' doesn\'t exist.', E_USER_ERROR);
        }

        extract($data);
        $view = str_replace('.', '/', strtolower($view));
        require_once VIEWS_PATH . '/' . $view . '.php';
    }
}