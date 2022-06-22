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
    if ($request == 'episodes') {
        // rajouter la possibilité de passer un get dans les params
        $route = 'MovieController@getEpisodes';
    }
    if ($request == 'ratings') {
        $route = 'RatingController@ratingForm';
    }
    if ($request == 'setRating') {
        $route = 'RatingController@setRating';
    }
    if ($request == 'setLastWatched') {
        $route = 'UserController@setLastWatched';
    }
}
