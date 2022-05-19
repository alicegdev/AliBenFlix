<?php

    class Movie_realisator {
        private int $id;
        private int $movie_fk;
        private int $realisatorMovie_fk;

        public function __construct($id, $movie_fk, $realisatorMovie_fk) {
            $this->$id = $id;
            $this->$movie_fk = $movie_fk;
            $this->$realisatorMovie_fk = $realisatorMovie_fk;
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

        public function getRealisatorMovie_fk() {
            return $this->realisatorMovie_fk;
        }

        public function setRealisatorMovie_fk($realisatorMovie_fk) {
            $this->realisatorMovie_fk = $realisatorMovie_fk;
        }
    }
?>