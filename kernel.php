<?php
session_start();

include_once('config.php');

include_once('Connection.php');

spl_autoload_register(function ($class) {
    if (file_exists('controller/' . $class . '.php')) {
        require('controller/' . $class . '.php');
    }
    if (file_exists('model/' . $class . '.php')) {
        require('model/' . $class . '.php');
    }
});

$db = Connection::connect($config);

include_once(__DIR__ . '/routes/route.php');

if (!empty($route)) {
    $routes = explode('@', $route);
    $controller = ucfirst($routes[0]);
    $model = ucfirst(str_replace("Controller", '', $routes[0])) . 'Model';
    $action = lcfirst($routes[1]);
} else {
    $controller = 'HomeController';
    $model = 'HomeModel';
    $action = 'indexAction';
}

$load_new = new $controller();
$model = new $model();
$load_new->model = $model;
$model->db = $db;
$index = $load_new->$action();

// $load_new = new HomeController();
// $model = new HomeModel();
// $load_new->model = $model;
// $model->db = $db;
// $index = $load_new->indexAction();