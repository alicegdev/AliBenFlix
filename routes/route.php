<?php

if (isset($_GET['action'])) {
    $request = $_GET['action'];
    // possible d'ajouter un nom de requête par controller, par exemple
    if ($request == 'home') {
        $route = "HomeController@indexAction";
    }
    if ($request == 'preferences') {
        $route = "PreferencesController@getUserPreferences";
    }
}
