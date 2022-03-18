<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" type="text/css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#">ALIBENFLIX</a>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav mt-2 mt-lg-0">
                <div class="nav-main-items">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Accueil <span class="sr-only"></span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">STREAMING</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">RESERVER UNE PLACE</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">CONTACT</a>
                    </li>
                </div>
                <div class="logout">
                    <li class="nav-item">
                        <a class="nav-link" href="?logout=true">SE DECONNECTER</a>
                    </li>

            </ul>
        </div>
        </div>
    </nav>
    <h1>This is user dashboard</h1>
    <p>
        <?php var_dump($_SESSION['user_login_status']);
        var_dump($_SESSION['email']);
        var_dump($_SESSION['password']);
        ?>
    </p>
</body>

</html>