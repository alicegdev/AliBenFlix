<?php

class UserModel
{

    public $id;
    public $firstName;
    public $lastName;
    public $email;
    private $password;
    public $lastWatched = [];

    public function setLastWatched()
    {

        $insert = $this->db->prepare("INSERT INTO lastWatched VALUES (:user_fk, :movie_fk)");
        $insert->execute(array('user_fk' => $_SESSION['user_id'], 'movie_fk' => json_decode($_POST['movie_id'])));
    }
}
