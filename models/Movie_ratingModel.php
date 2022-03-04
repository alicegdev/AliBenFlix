<?php

    class Movie_rating {
        private int $id;
        private int $movie_fk;
        private int $ratingMovie_fk;

        public function __construct($id, $movie_fk, $ratingMovie_fk) {
            $this->$id = $id;
            $this->$movie_fk = $movie_fk;
            $this->$ratingMovie_fk = $ratingMovie_fk;
        }

        public function getId() {
            return $this->id;
        }

        public function getMovie_fk() {
            return $this->movie_fk;
        }

        public function setMovie_fk($movie_fk) {
            $this->movie_fk = $movie_fk;
        }

        public function getRatingMovie_fk() {
            return $this->ratingMovie_fk;
        }

        public function setRatingMovie_fk($ratingMovie_fk) {
            $this->ratingMovie_fk = $ratingMovie_fk;
        }
    }
?>