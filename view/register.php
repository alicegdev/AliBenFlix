<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S'inscrire</title>
    <link rel="stylesheet" href="styles/login-register.css" type="text/css">
    <link rel="stylesheet" href="styles/styles.css" type="text/css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" type="text/css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</head>

<body>

    <div class="form-container sign-in-container">
        <form method="post">
            <h1>S'inscrire</h1>

            <input type="text" placeholder="Nom" name="nom" />
            <p>
                <?php if (isset($errors['nom_error'])) {
                    echo $errors['nom_error'];
                } ?></p>

            <input type="text" placeholder="Prénom" name="prenom" />
            <p>
                <?php if (isset($errors['prenom_error'])) {
                    echo $errors['prenom_error'];
                } ?></p>
            <input type="email" placeholder="Email" name="email" />
            <p>
                <?php if (isset($errors['email_error'])) {
                    echo $errors['email_error'];
                } ?></p>
            <input type="password" placeholder="Password" name="password" />
            <p>
                <?php
                if (isset($errors['password_error'])) {
                    echo $errors['password_error'];
                } ?>
            </p>
            <button type="submit" class="button-52" name="register_submit">S'inscrire</button>
            <p>
                Déjà un compte ? <a href="?login=true">Se connecter</a>
            </p>
        </form>
    </div>

</body>

</html>