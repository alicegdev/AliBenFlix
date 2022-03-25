<?php

class HomeModel
{
    public $db;

    public function checkUserLogin($email, $password)
    {
        // avec PDO
        try {
            $query = "SELECT COUNT(*) FROM alibenflix.user WHERE user.email='{$email}' AND user.user_password='{$password}'";
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            return $stmt->fetchColumn();
        } catch (\PDOException $e) {
            echo $e->getMessage();
            exit;
        }
    }

    public function userRegister($nom, $prenom, $email, $password)
    {
        try {
            $query = "INSERT INTO user (nom, prenom, email, password) VALUES ('" . $nom . "', '" . $prenom . "', '" . $email . "','" . $password . "')";
            $stmt = $this->db->query($query);
            return 1;
        } catch (\PDOException $e) {
            echo $e->getMessage();
            exit;
        }
    }
}
