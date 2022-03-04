<?php

require '..\models\user.php';

class UserController extends User
{


    public function loginController()
    {
        // il faut que les variables deviennent des attributs de la classe
        if (isset($_POST['login_user'])) {
            $email = mysqli_real_escape_string($this->connect(), $_POST['email']);
            $password = mysqli_real_escape_string($this->connect(), $_POST['password']);

            if (empty($email)) {
                array_push($errors, "Email requis");
            }

            if (empty($password)) {
                array_push($errors, "Mot de passe requis");
            }

            if (count($errors) == 0) {
                $this->login();
            }
        }
    }

    public function register()
    {
    }
}
