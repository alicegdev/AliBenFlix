<?php

    class Realisator {
        private int $id;
        private string $lastName;
        private string $firstName;
        private string $picture;

        public function __construct($id, $lastName, $firstName, $picture) {
            $this->$id = $id;
            $this->$lastName = $lastName;
            $this->$firstName = $firstName;
            $this->$picture = $picture;
        }

        public function getId() {
            return $this->id;
        }

        public function getLastName() {
            return $this->lastName;
        }

        public function setLastName($lastName) {
            $this->lastName = $lastName;
        }

        public function getFirstName() {
            return $this->firstName;
        }

        public function setFirstName($firstName) {
            $this->firstName = $firstName;
        }

        public function getPicture() {
            return $this->picture;
        }

        public function setPicture($picture) {
            $this->picture = $picture;
        }
    }
?>