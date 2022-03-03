<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// CONNEXION A LA BASE
$db = mysqli_connect('localhost', 'root', '', 'alibenflix');


// initializing variables
$nom = "";
$prenom = "";
$email = "";

$errors = array();



// REGISTER USER

if (isset($_POST['reg_user'])) {
    // receive all input values from the form
    $nom = mysqli_real_escape_string($db, $_POST['nom']);
    $prenom = mysqli_real_escape_string($db, $_POST['prenom']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($nom)) {
        array_push($errors, "Nom est requis.");
    }
    if (empty($prenom)) {
        array_push($errors, "Prenom est requis.");
    }
    if (empty($email)) {
        array_push($errors, "Email est requis.");
    }
    if (empty($password_1)) {
        array_push($errors, "Le mot de passe est requis.");
    }
    if ($password_1 != $password_2) {
        array_push($errors, "Les mots de passe ne correspondent pas.");
    }

    // first check the database to make sure 
    // a user does not already exist with the same username and/or email
    $user_check_query = "SELECT * FROM user WHERE email='$email' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    // IF USER EXIST
    if ($user) {
        if ($user['email'] === $email) {
            array_push($errors, "email deja utilisé.");
        }
    }

    // Finally, register user if there are no errors in the form
    if (count($errors) == 0) {
        $password = md5($password_1); //encrypt the password before saving in the database

        $query = "INSERT INTO user (nom, prenom, email, password) VALUES('$nom', '$prenom', '$email', '$password')";
        mysqli_query($db, $query);
        $_SESSION['success'] = "Vous êtes connecte";
        header('location: index.php');
    }
}

// LOGIN USER
if (isset($_POST['login_user'])) {
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (empty($email)) {
        array_push($errors, "Email requis");
    }

    if (empty($password)) {
        array_push($errors, "Mot de passe requis");
    }

    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM user WHERE email='$email' AND password='$password'";
        $results = mysqli_query($db, $query);

        if (mysqli_num_rows($results) == 1) {
            $_SESSION['email'] = $email;
            $_SESSION['success'] = "Vous êtes maintenant connecté";
            $query2 = "SELECT id, prenom FROM user WHERE email='$email' AND password='$password'";
            $result2 = mysqli_query($db, $query2);

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
