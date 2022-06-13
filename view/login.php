<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles/login-register.css" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" type="text/css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</head>

<body>

    <div class="form-container sign-in-container">
        <form method="post">
            <h1>Se connecter</h1>
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
            <button type="submit" class="button-52" name="login_submit">Se connecter</button>
            <p>
                Pas encore de compte ? <a href="?register=true">S'inscrire</a>
            </p>
        </form>
    </div>

</body>

</html>