<?php
header('Content-type:text/html;charset=utf-8');

use app\bootstrap\Bootstrap;

defined('APP_DIR') or define('APP_DIR', dirname(__DIR__));
defined('APP_ENV') or define('APP_ENV', file_get_contents(APP_DIR . '/.env'));
defined('PATH_CONTROLLER') or define('PATH_CONTROLLER', 'app\controller\\');

require_once(APP_DIR . '/app/framework/component/controller.php');
require_once(APP_DIR . '/app/framework/component/view.php');

require(APP_DIR . '/app/framework/helpers/default.php');
require(APP_DIR . '/app/bootstrap/Bootstrap.php');


$bootstrap = new Bootstrap();
$bootstrap->init();