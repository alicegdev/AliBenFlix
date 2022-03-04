<?php
    class User {
        private $id;
        private $nom;
        private $prenom;
        private $email;
        private $password;
        private $rating_fk;
        private $lastWatched;

        private function __construct(int $id = null, string $name = null) {
        $this->id = $id;
        $this->name = $name;
    }

    }