<?php

class User extends dbModel
{
    protected int $id;
    protected string $nom;
    protected string $prenom;
    protected string $email;
    protected string $password;
    protected int $rating_fk;
    protected int $lastWatched;

    public function __construct(int $id, string $nom, string $prenom, string $email, string $password, int $rating_fk = null, int $lastWatched = null)
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
        $password = md5($this->password);
        $query = "SELECT * FROM user WHERE email='$this->email' AND password='$password'";
        $results = mysqli_query($this->connect(), $query);

        if (mysqli_num_rows($results) == 1) {
            $_SESSION['email'] = $this->email;
            $_SESSION['success'] = "Vous êtes maintenant connecté";
            $query2 = "SELECT id, prenom FROM user WHERE email='$this->email' AND password='$password'";
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

    public function register()
    {
    }
}
