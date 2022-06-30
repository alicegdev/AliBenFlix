<?php

class UserModel
{

    public $id;
    public $firstName;
    public $lastName;
    public $email;
    private $password;
    protected $lastWatched = [];

    public function setLastWatched()
    {

        $insertLastWatched = $this->db->prepare("INSERT INTO lastWatched VALUES (:user_fk, :movie_fk)");
        $insertLastWatched->execute(array('user_fk' => $_SESSION['user_id'], 'movie_fk' => json_decode($_POST['movie_id'])));

        $genreLastWatched = $this->db->prepare("SELECT genreMovie_fk FROM movie_genre WHERE movie_fk = :movie_fk");
        $genreLastWatched->execute(array('movie_fk' => json_decode($_POST['movie_id'])));
        $genreResult = $genreLastWatched->fetchColumn();
        $this->insertGenre(intval($genreResult));

        $favoriteActors = [];
        $actorLastWatched = $this->db->prepare("SELECT actorMovie_fk FROM movie_actor WHERE movie_fk = :movie_fk");
        $actorLastWatched->execute(array('movie_fk' => json_decode($_POST['movie_id'])));
        while ($row = $actorLastWatched->fetch(PDO::FETCH_ASSOC)) {
            if ($row != null) {
                $this->insertActor(intval($row['id']));
            }
        }

        // $realisatorLastWatched = $this->db->prepare("SELECT realisatorMovie_fk FROM movie_realisator WHERE movie_fk = :movie_fk");
        // $realisatorLastWatched->execute(array('movie_fk' => json_decode($_POST['movie_id'])));
        // $realisatorResult = $realisatorLastWatched->fetchColumn();
        // if ($realisatorResult !== null) {
        //     $this->insertRealisator(intval($realisatorResult));
        // }
    }

    public function getLastWatched()
    {
        $select = $this->db->prepare("SELECT * FROM lastWatched WHERE user_fk = :user_fk");
        $select->execute(array('user_fk' => $_SESSION['user_id']));
        while ($row = $select->fetch(PDO::FETCH_ASSOC)) {
            array_push($this->lastWatched, $row);
        }
        return $this->lastWatched;
    }

    public function insertRealisator($result)
    {
        $verify = $this->db->prepare("SELECT COUNT(*) FROM preferences_realisator WHERE realisatorPref_fk = :result");
        $verify->execute(array('result' => $result));
        $count = $verify->fetchColumn();
        if ($count == 0) {
            $insertQuery = 'INSERT INTO preferences_realisator (realisatorPref_fk, user_fk) VALUES (:id_pref, :user_fk)';
            $insert = $this->db->prepare($insertQuery);
            $insert->execute(array('id_pref' => intval($result), 'user_fk' => intval($_SESSION['user_id'])));
        }
    }

    public function insertActor($result)
    {
        $verify = $this->db->prepare("SELECT COUNT(*) FROM preferences_actor WHERE actorPref_fk = :result");
        $verify->execute(array('result' => $result));
        $count = $verify->fetchColumn();
        if ($count == 0) {
            $insertQuery = 'INSERT INTO preferences_actor (actorPref_fk, user_fk) VALUES (:id_pref, :user_fk)';
            // on insère l'id du réalisateur ou de l'acteur + l'id de l'utilisateur dans la table préférence
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
}
