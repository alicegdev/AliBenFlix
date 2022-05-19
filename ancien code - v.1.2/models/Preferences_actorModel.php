<?php

    class Preferences_actor {
        private int $id;
        private int $actorPref_fk;
        private int $user_fk;

        public function __construct($id, $actorPref_fk, $user_fk) {
            $this->$id = $id;
            $this->$actorPref_fk = $actorPref_fk;
            $this->$user_fk = $user_fk;
        }

        public function getId() {
            return $this->id;
        }

        public function getActorPref_fk() {
            return $this->actorPref_fk;
        }

        public function setActorPref_fk($actorPref_fk) {
            $this->actorPref_fk = $actorPref_fk;
        }

        public function getUser_fk() {
            return $this->user_fk;
        }

        public function setUser_fk($user_fk) {
            $this->user_fk = $user_fk;
        }
    }
