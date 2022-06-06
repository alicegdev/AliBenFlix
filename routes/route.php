<?php

if (isset($_GET['action'])) {
    $request = $_GET['action'];
    // $name = $_GET['rating_page_name'];
    // possible d'ajouter un nom de requête par controller, par exemple
    if ($request == 'home') {
        $route = "HomeController@indexAction";
    }
    if ($request == 'preferences') {
        $route = "PreferencesController@getUserPreferences";
    }
    if ($request == 'preferences_set') {
        $route = "PreferencesController@setUserPreferences";
    }
    if ($request == 'episodes') {
        // rajouter la possibilité de passer un get dans les params
        $route = 'MovieController@getEpisodes';
    }
}
