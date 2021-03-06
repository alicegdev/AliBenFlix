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

    public function setUserPreferences($datatype, $data)
    {
        try {

            if ($datatype == 'actor') {
                // si c'est une pr??f??rence acteur ou r??alisateur, on ??clate la cha??ne de caract??res re??ue
                // pour pouvoir ins??rer les valeurs individuellement dans la BDD
                $explodedValues = explode(' ', $data);
                $firstName = $explodedValues[0];
                $lastName = $explodedValues[1];
                // PDO ne permet pas de mettre une variable dans les requ??tes pour le nom de la table, on est oblig??s
                // de faire 3 conditions et de r??p??ter du code
                $select = $this->db->prepare("SELECT id FROM actor WHERE firstName = :firstName AND lastName = :lastName ");
                $select->execute(array('firstName' => $firstName, 'lastName' => $lastName));
                $result = $select->fetchColumn();
                // ??viter les doublons
                //insert
                $this->insertActor($result);
            } else if ($datatype == 'realisator') {
                $explodedValues = explode(' ', $data);
                $firstName = $explodedValues[0];
                $lastName = $explodedValues[1];
                $select = $this->db->prepare("SELECT id FROM realisator WHERE firstName = :firstName AND lastName = :lastName ");
                $select->execute(array('firstName' => $firstName, 'lastName' => $lastName));
                $result = $select->fetchColumn();

                // insert
                $this->insertRealisator($result);
            } else if ($datatype == 'genre') {
                $name = $data;
                $select = $this->db->prepare("SELECT id FROM genre WHERE name = :name");
                $select->execute(array('name' => $name));
                $result = $select->fetchColumn();
                //insert
                $this->insertGenre($result);
            }
        } catch (\PDOException $e) {
            echo $e->getMessage();
            exit;
        }
    }

    public function insertActor($result)
    {
        $verify = $this->db->prepare("SELECT COUNT(*) FROM preferences_actor WHERE actorPref_fk = :result");
        $verify->execute(array('result' => $result));
        $count = $verify->fetchColumn();
        if ($count == 0) {
            $insertQuery = 'INSERT INTO preferences_actor (actorPref_fk, user_fk) VALUES (:id_pref, :user_fk)';
            // on ins??re l'id du r??alisateur ou de l'acteur + l'id de l'utilisateur dans la table pr??f??rence
            $insert = $this->db->prepare($insertQuery);
            $insert->execute(array('id_pref' => $result, 'user_fk' => $_SESSION['user_id']));
        }
    }

    public function insertRealisator($result)
    {
        $verify = $this->db->prepare("SELECT COUNT(*) FROM preferences_realisator WHERE realisatorPref_fk = :result");
        $verify->execute(array('result' => $result));
        $count = $verify->fetchColumn();
        if ($count == 0) {
            $insertQuery = 'INSERT INTO preferences_realisator (realisatorPref_fk, user_fk) VALUES (:id_pref, :user_fk)';
            $insert = $this->db->prepare($insertQuery);
            $insert->execute(array('id_pref' => $result, 'user_fk' => $_SESSION['user_id']));
        }
    }

    public function insertGenre($result)
    {
        $verify = $this->db->prepare("SELECT COUNT(*) FROM preferences_genre WHERE genrePref_fk = :result");
        $verify->execute(array('result' => $result));
        $count = $verify->fetchColumn();
        if ($count == 0) {
            $insertQuery = 'INSERT INTO preferences_genre (genrePref_fk, user_fk) VALUES (:id_pref, :user_fk)';
            $insert = $this->db->prepare($insertQuery);
            $insert->execute(array('id_pref' => $result, 'user_fk' => $_SESSION['user_id']));
        }
    }

    // TODO
    public function deletePreference()
    {
    }
}
