<?php

class HomeController
{
    public $model;
    public function indexAction()
    {
        if (isset($_GET['logout'])) {
            unset($_SESSION['user_login_status']);
        }
        if (isset($_POST['login_submit'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $check_user_login = $this->model->checkUserLogin($email, md5($password));
            if ($check_user_login == 1) {
                $_SESSION['user_login_status'] = 1;
            }
        }
        if (isset($_POST['register_submit'])) {
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $user_register = $this->model->userRegister($nom, $prenom, $email, md5($password));
            if ($user_register == 1) {
                $_SESSION['prenom'] = $prenom;
                $_SESSION['user_login_status'] = 1;
                // $_SESSION['email'] = $email;
                // $_SESSION['password'] = $password;
            }
        }
        $this->routeManager();
    }
    public function routeManager()
    {
        if (isset($_SESSION['user_login_status'])) {
            // appeler ici la méthode du carousel
            return require_once('view/dashboard.php');
        }

        if (isset($_GET['register'])) {
            return require_once('view/register.php');
        }

        if (isset($_GET['login']) || isset($_GET['logout'])) {
            return require_once('view/login.php');
        }

        return require_once('view/login.php');
    }

    public function dashboard()
    {
    }
}
