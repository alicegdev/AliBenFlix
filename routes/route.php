<?php

if (isset($_GET['action'])) {
    $request = $_GET['action'];

    if ($request == 'home') {
        $route = "HomeController@indexAction";
    }
    if ($request == 'preferences') {
        $route = "PreferencesController@getUserPreferences";
    }
    if ($request == 'preferences_set') {
        $route = "PreferencesController@setUserPreferences";
    }
}
