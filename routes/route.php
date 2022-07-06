<?php

// ?action=home

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
        $route = 'MovieController@getEpisodes';
    }
    if ($request == 'ratings') {
        $route = 'RatingController@ratingForm';
    }
    if ($request == 'setRating') {
        $route = 'RatingController@setRating';
    }
    if ($request == 'booking') {
        $route = "BookingController@homebooking";
    }
    if ($request == 'setLastWatched') {
        $route = 'UserController@setLastWatched';
    }
}
