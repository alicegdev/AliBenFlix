<?php
class RatingModel
{
    public $id;
    public $stars;
    public $comment;
    public $show;
    public $movie_fk;

    public function getMovieIdByName($showName)
    {
        $select = $this->db->prepare("SELECT id FROM movie WHERE name = :showName");
        $select->execute(array('showName' => $showName));
        $result = $select->fetchColumn();
        $this->movie_fk = $result;
        return $this->movie_fk;
    }

    public function  verifyRating($film_id, $user_id)
    {
        $verify = $this->db->prepare("SELECT COUNT(*) FROM rating WHERE movie_fk = :movie_fk AND user_fk = :user_fk");
        $verify->execute(array('movie_fk' => $film_id, 'user_fk' => $user_id));
        $count = $verify->fetchColumn();
        return $count;
    }

    public function setRating($film_id, $stars, $comment, $user_id)
    {
        try {
            $query = $this->db->prepare("INSERT INTO rating (stars, comment, movie_fk, user_fk) VALUES (:stars, :comment, :movie_fk, :user_fk)");
            $query->execute(array('stars' => $stars, 'comment' => $comment, 'movie_fk' => $film_id, 'user_fk' => $user_id));
            $this->calculateAvgOfRatings($film_id, $user_id);
        } catch (\PDOException $e) {
            echo $e->getMessage();
            exit;
        }
    }

    public function calculateAvgOfRatings($film_id, $user_id)
    {
        try {
            // faire une deuxième requête pour calculer la moyenne du film
            $allStars = $this->db->prepare("SELECT * FROM rating WHERE movie_fk = :movie_fk");
            $allStars->execute(array('movie_fk' => $film_id));
            $ratingCount = 0;
            $ratingTotal = 0;
            while ($row = $allStars->fetch(PDO::FETCH_ASSOC)) {
                $ratingCount++;
                $ratingTotal = $ratingTotal + $row['stars'];
            }
            $filmAvg = (float)$ratingTotal / $ratingCount;
            // updater la moyenne dans la table films
            $updateRating = $this->db->prepare("UPDATE movie SET averageRating = :averageRating WHERE id = :movie_id");
            $updateRating->execute(array('averageRating' => $filmAvg, 'movie_id' => $film_id));
        } catch (\PDOException $e) {
            echo $e->getMessage();
            exit;
        }
    }
}
