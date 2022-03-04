<?php

    class Movie_actor {
        private int $id;
        private int $movie_fk;
        private int $actorMovie_fk;

        public function __construct($id, $movie_fk, $actorMovie_fk) {
            $this->$id = $id;
            $this->$movie_fk = $movie_fk;
            $this->$actorMovie_fk = $actorMovie_fk;
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

        public function getActorMovie_fk() {
            return $this->actorMovie_fk;
        }

        public function setActorMovie_fk($actorMovie_fk) {
            $this->actorMovie_fk = $actorMovie_fk;
        }
    }
?>