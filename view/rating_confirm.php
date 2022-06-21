<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donner son avis</title>
    <link rel="stylesheet" href="styles/inside-app-form.css" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" type="text/css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
    <script src="../assets/stars.js"></script>
</head>

<body>
    <?php include('partials/navbar.php') ?>
    <div class="jumbotron" style="padding-top:1rem">

        <div class="form-container sign-in-container">
            <h2>Avis</h2>

            <form method="post" action="">
                <br />
                <?php echo $data ?>
                <br />
                Retour sur la page <a href="?action=home">streaming</a>.
            </form>
        </div>
    </div>
</body>

</html>