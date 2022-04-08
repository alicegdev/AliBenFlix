<?php

class HomeModel
{
    public $db;
    public $shows_names = [];
    public $shows_pics_urls = [];
    public $shows_synopsis = [];
    public $shows_genres = [];

    public function checkUserLogin($email, $password)
    {
        // avec PDO
        try {
            $query = "SELECT COUNT(*) FROM alibenflix.user WHERE user.email='{$email}' AND user.user_password='{$password}'";
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            return $stmt->fetchColumn();
        } catch (\PDOException $e) {
            echo $e->getMessage();
            exit;
        }
    }

    public function userRegister($nom, $prenom, $email, $password)
    {
        try {
            $query = "INSERT INTO user (nom, prenom, email, password) VALUES ('" . $nom . "', '" . $prenom . "', '" . $email . "','" . $password . "')";
            $stmt = $this->db->query($query);
            return 1;
        } catch (\PDOException $e) {
            echo $e->getMessage();
            exit;
        }
    }

    public function carrouselNewShows()
    {
        try {
            $new_shows_details_query = "SELECT name, picture, synopsis FROM movie WHERE added_at BETWEEN DATE_SUB(NOW(), INTERVAL 3 MONTH) AND NOW()";
            $new_shows_details_results = $this->db->query($new_shows_details_query);
            while ($row = $new_shows_details_results->fetch(PDO::FETCH_ASSOC)) {
                array_push($this->shows_names, $row['name']);
                array_push($this->shows_pics_urls, $row['picture']);
                array_push($this->shows_synopsis, $row['synopsis']);
            };
        } catch (\PDOException $e) {
            echo $e->getMessage();
            exit;
        }
    }

    public function carrouselShowsGenres()
    {
        // Requête pour avoir les genres des films et des séries
        $genre_query = "SELECT genre.name FROM genre, movie_genre, movie WHERE movie_genre.movie_fk = movie.id AND movie_genre.genreMovie_fk = genre.id";
        $genre_result = $this->db->query($genre_query);
        while ($row = $genre_result->fetch(PDO::FETCH_ASSOC)) {
            array_push($this->shows_genres, $row['name']);
        };
    }
}
