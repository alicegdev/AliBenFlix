<?php

class HomeController extends Controller
{
    public $model;
    public function indexAction()
    {
        $errors = array();
        $errors_register = array();
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
                    $_SESSION['user_id'] = $this->model->getUserId($email, md5($password));
                    $errors = [];
                }
            }
        }
        if (isset($_POST['register_submit'])) {

            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            if (empty($nom)) {
                $errors_register['nom_error'] = "Veuillez renseigner votre nom";
            }
            if (empty($prenom)) {
                $errors_register['prenom_error'] = "Veuillez renseigner votre prénom";
            }
            if (empty($email)) {
                $errors_register['email_error'] = "Veuillez renseigner votre email";
            }
            if (empty($password)) {
                $errors_register['password_error'] = "Veuillez renseigner votre mot de passe";
            }

            $user_register = $this->model->userRegister($nom, $prenom, $email, md5($password));
            if ($user_register == 1) {
                $_SESSION['prenom'] = $prenom;
                $_SESSION['user_login_status'] = 1;
                $errors = [];
                // $_SESSION['email'] = $email;
                // $_SESSION['password'] = $password;
            }
        }

        if (isset($_SESSION['user_login_status'])) {
            $this->model->carrouselNewShows();
            $this->model->carrouselShowsGenres();
            $data = array("shows_names" => $this->model->shows_names, "shows_pics_urls" => $this->model->shows_pics_urls, "shows_synopsis" => $this->model->shows_synopsis, "shows_genres" => $this->model->shows_genres);
            $this->render('dashboard', $data);
        } else {
            $this->routeManager($errors, $errors_register);
        }
    }

    public function routeManager($errors, $errors_register)
    {
        if (isset($_GET['register'])) {
            if (isset($errors)) {
                $this->render('register', $errors);
            } else {
                return require_once('view/register.php');
            }
        }

        if (isset($_GET['login']) || isset($_GET['logout'])) {
            return require_once('view/login.php');
        } elseif (isset($errors_register)) {
            $this->render('login', $errors_register);
        } else {
            return require_once('view/login.php');
        }
    }
}
