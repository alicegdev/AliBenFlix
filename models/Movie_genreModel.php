<?php

    class Movie_genre {
        private int $id;
        private int $movie_fk;
        private int $genreMovie_fk;

        public function __construct($id, $movie_fk, $genreMovie_fk) {
            $this->$id = $id;
            $this->$movie_fk = $movie_fk;
            $this->$genreMovie_fk = $genreMovie_fk;
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

        public function getGenreMovie_fk() {
            return $this->genreMovie_fk;
        }

        public function setGenreMovie_fk($genreMovie_fk) {
            $this->genreMovie_fk = $genreMovie_fk;
        }
    }
?>