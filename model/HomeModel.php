<?php

class HomeModel
{
    public $db;

    public function checkUserLogin($email, $password)
    {
        // avec mysqli_query
        $mysqli = new mysqli("localhost", "root", "", "alibenflix");

        // Check connection
        if ($mysqli->connect_errno) {
            echo "Failed to connect to MySQL: " . $mysqli->connect_error;
            exit();
        }

        $query = "SELECT * FROM user WHERE email='$email' AND user_password='$password'";
        $results = mysqli_query($mysqli, $query);

        if (mysqli_num_rows($results) == 1) {
            return mysqli_num_rows($results);
        }



        // avec PDO
        // try {
        //     $query = "SELECT if(COUNT(*)>0,'true','false') FROM alibenflix.user WHERE user.email='{$email}' AND user.password='{$password}'";
        //     $stmt = $this->db->prepare($query);
        //     $stmt->execute();
        //     return $stmt;
        // } catch (\PDOException $e) {
        //     echo $e->getMessage();
        //     exit;
        // }
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
