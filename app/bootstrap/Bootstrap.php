<?php

namespace app\bootstrap;

use app\controller;
use app\framework\component\View;
use app\framework\database\DB;

/**
 * Class Bootstrap
 * @package bootstrap
 */
class Bootstrap
{
    /**
     * @var bool
     */
    private $is_init;

    /**
     * Init application
     * @return bool
     */
    public function init()
    {

        if ($this->isInit()) {
            return false;
        }
        $constants = parse_ini_file(APP_DIR . '/.env');
        foreach ($constants as $name_const => $val_const) {
            defined($name_const) or define($name_const, $val_const);
        }
        $this->is_init = true;

        $this->initDB();
        $this->route();

        return true;
    }

    /**
     * Routing
     * @return bool
     */
    private function route()
    {
        $uri = $_SERVER['REQUEST_URI'];
        $uri_explode = explode('/', $uri);
        $controller_name = (empty($uri_explode[1]) ? DEFAULT_CONTROLLER : $uri_explode[1]) . 'Controller';
        $method_name = empty($uri_explode[2]) ? 'index' : $uri_explode[2];
        $controller_path = APP_DIR . '/app/controller/' . $controller_name . '.php';
        if (file_exists($controller_path)) {

            require $controller_path;
            $controller_full_name = PATH_CONTROLLER . $controller_name;
            if (class_exists($controller_full_name) &&
                method_exists($controller = new $controller_full_name, $method_name)) {
                $controller->$method_name();
                return true;
            }
        }
        View::render('errors/error404');
        return false;
    }

    private function initDB()
    {
        DB::init();
    }

    /**
     * Is application loaded
     * @return bool
     */
    private function isInit()
    {
        return $this->is_init;
    }
}