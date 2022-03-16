<?php

$routeList = [];

class Route
{
    public static function add($routeName, $pointControllerAction)
    {
        $GLOBALS['routeList'][] = ['name' => $routeName, 'action' => $pointControllerAction];
    }
    public static function run()
    {
        // savoir expliquer ça
        $request = $_SERVER['REQUEST_URI'];
        foreach ($GLOBALS['routeList'] as $r) {
            if ($r['name'] == $request) {
                return $r['action'];
            }
        }
    }
}

Route::add("", "HomeController@indexAction");


// if (isset($_GET['action'])) {
//     $rquest = $_GET['action'];
//     if ($rquest = 'login') {
//         $route = 'UserController@login';
//     }
// }

$route = Route::run();


// Premier essai routing
// if (empty($_GET['page'])) {
//     require 'CONNECTION/login.php';
// } else {
//     switch (($_GET['page'])) {
//         case "home":
//             require 'CONNECTION/home.php';
//             break;
//         case "register":
//             require 'CONNECTION/register.php';
//             break;
//         case 'loginAction': {
//                 require('controllers/UserController.php');
//                 $userController = new UserController;
//                 break;
//             }
//     }
// }
