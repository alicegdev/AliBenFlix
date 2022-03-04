<?php
    class User {
        private  int $id;
        private $nom;
        private $prenom;
        private $email;
        private $password;
        private $rating_fk;
        private $lastWatched;

        private function __construct($id, $nom, $prenom, $email,  ) {
        $this->id = $id;
        $this->nom = $nom;
    }

    }