<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donner son avis</title>
    <link rel="stylesheet" href="../styles/style.css" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" type="text/css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
    <script src="../assets/stars.js"></script>
</head>

<body>
    <?php include('partials/navbar.php') ?>
    <div class="jumbotron" style="padding-top:1rem">
        <h4 class="d-print-flex">
            <p class="welcome">Avis</p>
        </h4>

        <form method="post" action="setRating">
            <div class="input-group">

                <label>Votre pseudo</label>
                <input type="text" name="login">
                <p></p>
            </div>
            <p></p>
            <div class="input-group">
                <label>Nom de la série / du film</label>
                <input type="text" name="film_name" value="<?php echo $data[0] ?>" disabled>
                <p>
                </p>
            </div>
            <div class="input-group">
                <input type="hidden" name="film_id" value="<?php echo $data[1] ?>">
                <p>
                </p>
            </div>
            <p>
            </p>
            <div class="input-group">

                <label>Note</label>
                <select name="stars" id="stars">
                    <option value="1">⭐</option>
                    <option value="2">⭐⭐</option>
                    <option value="3">⭐⭐⭐</option>
                    <option value="4">⭐⭐⭐⭐</option>
                    <option value="5">⭐⭐⭐⭐⭐</option>
                </select>

                <p></p>
            </div>
            <p></p>
            <div class="input-group">

                <label>Commentaire</label>
                <input type="textarea" name="comment" style="height:100px; width:350px;">
                <p></p>

            </div>
            <p></p>

            <div class="input-group">
                <button type="submit" class="btn" name="rating_submit">Valider</button>
            </div>

        </form>
    </div>
</body>

</html>