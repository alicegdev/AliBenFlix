<?php

    class Preferences_realisator {
        private int $id;
        private int $realisatorPref_fk;
        private int $user_fk;

        public function __construct($id, $realisatorPref_fk, $user_fk) {
            $this->$id = $id;
            $this->$realisatorPref_fk = $realisatorPref_fk;
            $this->$user_fk = $user_fk;
        }

        public function getId() {
            return $this->id;
        }

        public function getRealisatorPref_fk() {
            return $this->realisatorPref_fk;
        }

        public function setRealisatorPref_fk($realisatorPref_fk) {
            $this->realisatorPref_fk = $realisatorPref_fk;
        }

        public function getUser_fk() {
            return $this->user_fk;
        }

        public function setUser_fk($user_fk) {
            $this->user_fk = $user_fk;
        }
    }
?>