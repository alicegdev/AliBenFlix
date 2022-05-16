<?php

class HomeModel
{
    public $db;
    public $shows_names = [];
    public $shows_pics_urls = [];
    public $shows_synopsis = [];
    public $shows_genres = [];

    /**
     * Checks if user exists in database
     *
     * @param [string] $email
     * @param [string] $password
     * @return [int] the number of users that have the email and password validated by form
     */
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

    public function getUserId($email, $password)
    {
        try {
            $query = "SELECT * FROM alibenflix.user WHERE user.email='{$email}' AND user.user_password='{$password}'";
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            return $stmt->fetchColumn();
        } catch (\PDOException $e) {
            echo $e->getMessage();
            exit;
        }
    }
    /**
     * Inserts a new user into database
     */

    public function userRegister($nom, $prenom, $email, $password)
    {
        try {
            $query = "INSERT INTO user (nom, prenom, email, user_password) VALUES ('" . $nom . "', '" . $prenom . "', '" . $email . "','" . $password . "')";
            $stmt = $this->db->query($query);
            // créer variable de session user_id
            return 1;
        } catch (\PDOException $e) {
            echo $e->getMessage();
            exit;
        }
    }
    /**
     * Query of details for the shows recently added -- 3 months ago or more recent
     *
     */
    public function carrouselNewShows()
    {
        try {
            $new_shows_details_query = "SELECT name, picture, synopsis FROM movie WHERE  movie.show = 1 AND added_at BETWEEN DATE_SUB(NOW(), INTERVAL 3 MONTH) AND NOW() ";
            $new_shows_details_results = $this->db->query($new_shows_details_query);
            while ($row = $new_shows_details_results->fetch(PDO::FETCH_ASSOC)) {
                array_push($this->shows_names, $row['name']);
                array_push($this->shows_pics_urls, $row['picture']);
                array_push($this->shows_synopsis, $row['synopsis']);
            };

            $new_movies_details_query = "SELECT name, picture, synopsis FROM movie WHERE  movie.show = 1 AND added_at BETWEEN DATE_SUB(NOW(), INTERVAL 3 MONTH) AND NOW() ";
            $new_movies_details_results = $this->db->query($new_movies_details_query);
            while ($row = $new_movies_details_results->fetch(PDO::FETCH_ASSOC)) {
                array_push($this->movies_names, $row['name']);
                array_push($this->movies_pics_urls, $row['picture']);
                array_push($this->movies_synopsis, $row['synopsis']);
            };
        } catch (\PDOException $e) {
            echo $e->getMessage();
            exit;
        }
    }

    /* public function carrouselNewMovies()
    {
        try {
            $new_movies_details_query = "SELECT name, picture, synopsis FROM movie WHERE  movie.show = 0 AND added_at BETWEEN DATE_SUB(NOW(), INTERVAL 3 MONTH) AND NOW() ";
            $new_movies_details_results = $this->db->query($new_movies_details_query);
            while ($row = $new_movies_details_results->fetch(PDO::FETCH_ASSOC)) {
                array_push($this->movies_names, $row['name']);
                array_push($this->movies_pics_urls, $row['picture']);
                array_push($this->movies_synopsis, $row['synopsis']);
            };
        } catch (\PDOException $e) {
            echo $e->getMessage();
            exit;
        }
    }*/

    /**
     * Query to fetch the genre of shows and movies
     *
     * 
     */
    public function carrouselShowsGenres()
    {
        $genre_query = "SELECT genre.name FROM genre, movie_genre, movie WHERE movie_genre.movie_fk = movie.id AND movie_genre.genreMovie_fk = genre.id";
        $genre_result = $this->db->query($genre_query);
        while ($row = $genre_result->fetch(PDO::FETCH_ASSOC)) {
            array_push($this->shows_genres, $row['name']);
        };
    }
}
