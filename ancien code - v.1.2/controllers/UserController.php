<?php

require 'Controller.php';
require '../models/UserModel.php';

class UserController extends Controller
{
    public function __construct()
    {
        $this->dbModel = new dbModel();
    }
    public function login()
    {
        if (isset($_POST['login_user'])) {
            $email = mysqli_real_escape_string($this->dbModel->connect(), $_POST['email']);
            $password = mysqli_real_escape_string($this->dbModel->connect(), $_POST['password']);

            if (empty($email)) {
                array_push($errors, "Email requis");
            }

            if (empty($password)) {
                array_push($errors, "Mot de passe requis");
            }

            if (count($errors) == 0) {
                $this->userModel = new UserModel();
            }
        }
    }

    public function register()
    {
    }
}
