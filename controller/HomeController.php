<?php

class HomeController extends Controller
{
    public $model;
    public function indexAction()
    {
        $errors = array();
        if (isset($_GET['logout'])) {
            unset($_SESSION['user_login_status']);
        }
        if (isset($_POST['login_submit'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            if (empty($email)) {
                $errors['email_error'] = "Veuillez renseigner votre e-mail";
            }
            if (empty($password)) {
                $errors['password_error'] = "Veuillez renseigner votre mot de passe";
            } else {
                $check_user_login = $this->model->checkUserLogin($email, md5($password));
                if ($check_user_login == 1) {
                    $_SESSION['user_login_status'] = 1;
                    $errors = [];
                }
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
        $this->routeManager($errors);
    }

    public function routeManager($errors)
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

        if (isset($errors)) {
            $this->render('login', $errors);
        } else {
            $this->render('login');
        }
    }
}
