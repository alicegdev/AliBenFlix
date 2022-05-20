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
                    $errors_register = [];
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
            } else if (empty($errors_register)) {
                $user_register = $this->model->userRegister($nom, $prenom, $email, md5($password));
                if ($user_register == 1) {
                    $_SESSION['prenom'] = $prenom;
                    $_SESSION['user_login_status'] = 1;
                    $errors = [];
                    $errors_register = [];
                }
            }
        }

        if (isset($_SESSION['user_login_status'])) {
            $this->model->carrouselNewShows();
            $this->model->carrouselShowsGenres();
            // $this->model->suggestByGenre();
            // $this->model->suggestByActor();
            // $this->model->suggestByRealisator();

            $data = array(
                "shows_names" => $this->model->shows_names, "shows_pics_urls" => $this->model->shows_pics_urls, "shows_synopsis" => $this->model->shows_synopsis, "shows_genres" => $this->model->shows_genres,
                "movies_names" => $this->model->movies_names, "movies_pics_urls" => $this->model->movies_pics_urls, "movies_synopsis" => $this->model->movies_synopsis, "movies_genres" => $this->model->shows_genres,
                // "suggested_names" => $this->model->suggest_by_r_names,
                // "suggested_pics_urls" => $this->model->suggest_by_r_pics_urls,
                // "suggested_synopsis" => $this->model->suggest_by_r_synopsis
            );
            $this->render('dashboard', $data);
        } else {
            $this->routeManager($errors, $errors_register);
        }
    }

    public function routeManager($errors, $errors_register)
    {
        if (isset($_GET['register'])) {
            return require_once('view/register.php');
            if (isset($errors)) {
                $this->render('register', $errors);
            } else {
                return require_once('view/register.php');
            }
        }

        if (isset($_GET['login']) || isset($_GET['logout'])) {
            return require_once('view/login.php');
        }

        if (!empty($errors)) {
            $this->render('login', $errors);
        } elseif (!empty($errors_register)) {
            $this->render('login', $errors_register);
        } else {
            return require_once('view/login.php');
        }
    }
}
