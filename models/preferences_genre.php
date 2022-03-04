<?php

    class Preferences_genre {
        private int $id;
        private int $genrePref_fk;
        private int $user_fk;

        public function __construct($id, $genrePref_fk, $user_fk) {
            $this->$id = $id;
            $this->$genrePref_fk = $genrePref_fk;
            $this->$user_fk = $user_fk;
        }

        public function getId() {
            return $this->id;
        }

        public function getGenrePref_fk() {
            return $this->genrePref_fk;
        }

        public function setGenrePref_fk($genrePref_fk) {
            $this->genrePref_fk = $genrePref_fk;
        }

        public function getUser_fk() {
            return $this->user_fk;
        }

        public function setUser_fk($user_fk) {
            $this->user_fk = $user_fk;
        }
    }
?>