<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles/style.css" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" type="text/css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="header">
        <h2>S'inscrire</h2>
    </div>

    <form method="post" action="">
        <div class="input-group">
            <label>Nom</label>
            <input type="text" name="nom">
        </div>
        <div class="input-group">
            <label>Prénom</label>
            <input type="text" name="prenom">
        </div>
        <div class="input-group">
            <label>Email</label>
            <input type="text" name="email">
        </div>
        <div class="input-group">
            <label>Mot de passe</label>
            <input type="password" name="password">
        </div>
        <div class="input-group">
            <button type="submit" class="btn" name="register_submit">S'inscrire</button>
        </div>
        <p>
            Pas encore de compte ? <a href="?login=true">Déjà inscrit ? Se connecter</a>
        </p>

    </form>
</body>

</html>