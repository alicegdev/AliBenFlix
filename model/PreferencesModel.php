<?php

class PreferencesModel
{
    public $db;
    public $user_id;
    public $user_actor_preferences = [];
    public $user_genre_preferences = [];
    public $user_realisator_preferences = [];

    public function getUserPreferences()
    {
        $this->user_id = $_SESSION['user_id'];
        $user_actor_preferences_query = "SELECT * FROM actor INNER JOIN preferences_actor ON actor.id = preferences_actor.actorPref_fk INNER JOIN user ON user.id = preferences_actor.user_fk";
        $user_actor_preferences_results = $this->db->query($user_actor_preferences_query);
        $user_genre_preferences_query = "SELECT * FROM genre INNER JOIN preferences_genre ON genre.id = preferences_genre.genrePref_fk INNER JOIN user ON user.id = preferences_genre.user_fk";
        $user_genre_preferences_results = $this->db->query($user_genre_preferences_query);
        $user_realisator_preferences_query = "SELECT * FROM realisator INNER JOIN preferences_realisator ON realisator.id = preferences_realisator.realisatorPref_fk INNER JOIN user ON user.id = preferences_realisator.user_fk";
        $user_realisator_preferences_results = $this->db->query($user_realisator_preferences_query);
        // créer une condition si null
        if ($user_actor_preferences_results != null) {
            while ($row = $user_actor_preferences_results->fetch(PDO::FETCH_ASSOC)) {
                if ($row['user_fk'] == $this->user_id) {
                    array_push($this->user_actor_preferences, $row);
                }
            }
        }

        if ($user_genre_preferences_results != null) {
            while ($row = $user_genre_preferences_results->fetch(PDO::FETCH_ASSOC)) {
                if ($row['user_fk'] == $this->user_id) {
                    array_push($this->user_genre_preferences, $row);
                }
            }
        }

        if ($user_realisator_preferences_results != null) {
            while ($row = $user_realisator_preferences_results->fetch(PDO::FETCH_ASSOC)) {
                if ($row['user_fk'] == $this->user_id) {
                    array_push($this->user_realisator_preferences, $row);
                }
            }
        }
    }

    public function getAll($table)
    {

        $query = "SELECT * FROM " . $table;
        $results = $this->db->query($query);
        $finalResults = [];
        if (!empty($results)) {
            while ($row = $results->fetch(PDO::FETCH_ASSOC)) { {
                    array_push($finalResults, $row);
                }
            }
            return $finalResults;
        }
    }

    public function setUserPreferences($realisator = null, $actor = null, $genre = null)
    {
        // on créé un tableau avec les trois types de préférences (même si un seul sera rempli)
        $preferences = [$realisator, $actor, $genre];
        $selectQuery = '';
        $selectResults = '';
        // on boucle sur le tableau préférence pour exécuter certaines conditions selon le type de préférence
        foreach ($preferences as $preference => $value) {
            if (!empty($preference) && $preference != null) {
                $id_fk = 0;
                $insertQuery = "";

                if ($preference == $realisator || $preference == $actor) {
                    // si c'est une préférence acteur ou réalisateur, on éclate la chaîne de caractères reçue
                    // pour pouvoir insérer les valeurs individuellement dans la BDD
                    $explodedValues = explode(' ', $value);
                    if ($preference == $realisator) {
                        $selectQuery = "SELECT id FROM realisator WHERE firstName = " .  $explodedValues[0] . " AND lastName = " .  $explodedValues[1];
                        $selectResults = $this->db->query($selectQuery);
                        $id_fk = $selectResults->fetch(PDO::FETCH_ASSOC);
                        $insertQuery = "INSERT INTO preferences_realisator(realisatorPref_fk, user_fk) VALUES (?, ?)";
                    } else if ($preference == $actor) {
                        $selectQuery = "SELECT id FROM actor WHERE firstName = " .  $explodedValues[0] . " AND lastName = " .  $explodedValues[1];
                        $selectResults = $this->db->query($selectQuery);
                        $id_fk = $selectResults->fetch(PDO::FETCH_ASSOC);
                        $insertQuery = "INSERT INTO preferences_actor(actorPref_fk, user_fk) VALUES (?, ?)";
                    }
                    // on insère l'id du réalisateur ou de l'acteur + l'id de l'utilisateur dans la table préférence
                    $stmt = $this->db->prepare($insertQuery);
                    $stmt->execute([$id_fk, $this->user_id]);
                }
            }

            // $this->db->query($insertQuery);
        }
    }
}
