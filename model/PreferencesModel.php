<?php

class PreferencesModel
{
    public $db;
    public $user_id;
    public $user_actor_preferences = [];
    public $user_genres_preferences = [];
    public $user_director_preferences = [];

    public function getUserPreferences()
    {
        $user_id = $_SESSION['user_id'];
        $user_actor_preferences_query = "SELECT * FROM actor INNER JOIN preferences_actor ON actor.id = preferences_actor.actorPref_fk INNER JOIN user ON user.id = preferences_actor.user_fk";
        $user_actor_preferences_results = $this->db->query($user_actor_preferences_query);
        $user_genre_preferences_query = "SELECT * FROM genre INNER JOIN preferences_genre ON genre.id = preferences_genre.genrePref_fk INNER JOIN user ON user.id = preferences_genre.user_fk";
        $user_genre_preferences_results = $this->db->query($user_genre_preferences_query);
        $user_director_preferences_query = "SELECT * FROM realisator INNER JOIN preferences_realisator ON realisator.id = preferences_realisator.realisatorPref_fk INNER JOIN user ON user.id = preferences_realisator.user_fk";
        $user_director_preferences_results = $this->db->query($user_director_preferences_query);
        // créer une condition si null
        if ($user_actor_preferences_results !== null) {
            while ($row = $user_actor_preferences_results->fetch(PDO::FETCH_ASSOC)) {
                if ($row['user_fk'] == $user_id) {
                    array_push($this->user_actor_preferences, $row);
                }
            }
        }

        if ($user_genre_preferences_results !== null) {
            while ($row = $user_genre_preferences_results->fetch(PDO::FETCH_ASSOC)) {
                if ($row['user_fk'] == $user_id) {
                    array_push($this->user_genres_preferences, $row);
                }
            }
        }

        if ($user_director_preferences_results !== null) {
            while ($row = $user_director_preferences_results->fetch(PDO::FETCH_ASSOC)) {
                if ($row['user_fk'] == $user_id) {
                    array_push($this->user_director_preferences, $row);
                }
            }
        }
    }
}
