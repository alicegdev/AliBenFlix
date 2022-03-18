<?php include('server.php') ?>

<!DOCTYPE html>
<html>

<head>
    <title>Alibenflix/Inscription</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div class="header">
        <h2>S'inscrire</h2>
    </div>

    <form method="post" action="register.php">
        <?php include('errors.php'); ?>

        <div class="input-group">
            <label>Nom</label>
            <input type="nom" name="nom" value="<?php echo $nom; ?>">
        </div>
        <div class="input-group">
            <label>Prenom</label>
            <input type="prenom" name="prenom" value="<?php echo $prenom; ?>">
        </div>
        <div class="input-group">
            <label>Email</label>
            <input type="email" name="email" value="<?php echo $email; ?>">
        </div>
        <div class="input-group">
            <label>Mot de passe</label>
            <input type="password" name="password_1">
        </div>
        <div class="input-group">
            <label>Confirmer mot de passe</label>
            <input type="password" name="password_2">
        </div>
        <div class="input-group">
            <button type="submit" class="btn" name="reg_user">S'incrire</button>
        </div>
        <p>
            Déjà membre ? <a href="login.php">Se connecter</a>
        </p>
    </form>
</body>

</html>