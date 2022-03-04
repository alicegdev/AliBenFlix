<?php
class User extends dbModel
{
    private int $id;
    private $nom;
    private $prenom;
    private $email;
    private $password;
    private $rating_fk;
    private $lastWatched;

    private function __construct($id, $nom, $prenom, $email, $password, $rating_fk = null, $lastWatched = null)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->password = $password;
        $this->rating_fk = $rating_fk;
        $this->lastWatched = $lastWatched;
    }

    public function getId()
    {
        return $this->id;
    }

    public function login()
    {
        // LOGIN USER
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
                $password = md5($password);
                $query = "SELECT * FROM user WHERE email='$email' AND password='$password'";
                $results = mysqli_query($this->connect(), $query);

                if (mysqli_num_rows($results) == 1) {
                    $_SESSION['email'] = $email;
                    $_SESSION['success'] = "Vous êtes maintenant connecté";
                    $query2 = "SELECT id, prenom FROM user WHERE email='$email' AND password='$password'";
                    $result2 = mysqli_query($this->connect(), $query2);

                    /* enregistrer le prénom et l'id dans deux variables */
                    while ($row = mysqli_fetch_assoc($result2)) {
                        $_SESSION['prenom'] = $row['prenom'];
                        $_SESSION['user_id'] = $row['id'];
                    }
                    header('location: index.php');
                } else {
                    array_push($errors, "Email ou mot de passe incorrect");
                }
            }
        }
    }

    public function register()
    {
    }
}
