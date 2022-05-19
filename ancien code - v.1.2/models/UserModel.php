<?php

class UserModel
{
    protected $id;
    protected $nom;
    protected $prenom;
    protected $email;
    protected $password;
    protected $rating_fk;
    protected $lastWatched;
    private $db;

    public function __construct(int $id, string $nom, string $prenom, string $email, string $password, int $rating_fk = null, int $lastWatched = null, $db)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->password = $password;
        $this->rating_fk = $rating_fk;
        $this->lastWatched = $lastWatched;
        $this->dbModel = new DbModel;
    }

    public function getId()
    {
        return $this->id;
    }

    public function login()
    {
        $password = md5($this->password);
        $query = "SELECT * FROM user WHERE email='$this->email' AND password='$password'";
        $results = mysqli_query($this->dbModel->connect(), $query);

        if (mysqli_num_rows($results) == 1) {
            $_SESSION['email'] = $this->email;
            $_SESSION['success'] = "Vous êtes maintenant connecté";
            $query2 = "SELECT id, prenom FROM user WHERE email='$this->email' AND password='$password'";
            $result2 = mysqli_query($this->dbModel->connect(), $query2);

            /* enregistrer le prénom et l'id dans deux variables */
            while ($row = mysqli_fetch_assoc($result2)) {
                $_SESSION['prenom'] = $row['prenom'];
                $_SESSION['user_id'] = $row['id'];
            }
            header('location: home.php');
        } else {
            array_push($errors, "Email ou mot de passe incorrect");
        }
    }

    public function register()
    {
    }
}
