<?php
session_start();

if (!isset($_SESSION['email'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['email']);
    header("location: login.php");
}

include '../CONNECTION/server.php';
// On crée une requête pour sélectionner les préférences 
$user_id = $_SESSION['user_id'];

// Requêtes sur les trois tables des préférences utilisateur
$user_actor_preferences_query = "SELECT * FROM actor INNER JOIN preferences_actor ON actor.id = preferences_actor.actorPref_fk INNER JOIN user ON user.id = preferences_actor.user_fk";
$user_actor_preferences_results = mysqli_query($db, $user_actor_preferences_query);

$user_genre_preferences_query = "SELECT * FROM genre INNER JOIN preferences_genre ON genre.id = preferences_genre.genrePref_fk INNER JOIN user ON user.id = preferences_genre.user_fk";
$user_genre_preferences_results = mysqli_query($db, $user_genre_preferences_query);

$user_director_preferences_query = "SELECT * FROM realisator INNER JOIN preferences_realisator ON realisator.id = preferences_realisator.realisatorPref_fk INNER JOIN user ON user.id = preferences_realisator.user_fk";
$user_director_preferences_results = mysqli_query($db, $user_director_preferences_query);

$genre_query = "SELECT genre.name FROM genre, movie_genre, movie WHERE movie_genre.movie_fk = movie.id AND movie_genre.genreMovie_fk = genre.id";
$genre_result = mysqli_query($db, $genre_query);
while ($row = mysqli_fetch_assoc($genre_result)) {
    array_push($shows_genres, $row['name']);
};

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="../STYLES/style.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <script src="https://use.fontawesome.com/86bd08429f.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>

<body>
    <?php
    include '../ELEMENTS/navbar.php';
    ?>

    <div class="content col-md-12 text-center">
        <h4 class="d-print-flex">
            <p class="welcome">Mes préférences</strong></p>
        </h4>
        <ul class="nav nav-pills nav-fill mb-4" id="pills-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="pill" role="pill" aria-controls="genres" aria-selected="true" aria-current="page" href="#genres">Genres</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="pill" role="pill" aria-controls="acteurs" aria-selected="true" aria-current="page" href="#actors">Acteurs</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="pill" role="pill" aria-controls="realisateurs" aria-selected="true" aria-current="page" href="#directors" href="#">Réalisateurs</a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade" id="genres" aria-labelledby="genres">
                <div class="card">
                    <div class="card-body">
                        <p class="card-text">
                        <ul>
                            <?php while ($row = mysqli_fetch_assoc($user_genre_preferences_results)) : ?>
                                <?php if ($row['user_fk'] == $user_id) : ?>
                                    <li>
                                        <input type="checkbox" name="genre" id="genre-checkbox" checked disabled><?php echo $row['name']; ?>
                                    </li>
                                <?php endif ?>
                            <?php endwhile ?>
                        </ul>
                        </p>
                        <a href="#" class="btn btn-primary" id="genre-update">Modifier les genres</a>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="actors" aria-labelledby="acteurs">
                <div class="card">
                    <div class="card-body">
                        <p class="card-text">
                        <ul>
                            <!-- TODO : mettre une checkbox avant les noms -->
                            <?php while ($row = mysqli_fetch_assoc($user_actor_preferences_results)) : ?>
                                <?php if ($row['user_fk'] != $user_id) : ?>
                                    <li>

                                        <img src="<?php echo $row['picture']; ?>" style="max-width: 150px !important; max-height: 150px !important;" alt="<?php echo $row['firstName'] . ' ' . $row['lastName']; ?>" class="img-thumbnail preferences-thumbnail"><br /><?php echo $row['firstName'] . ' ' . $row['lastName']; ?>
                                    </li>
                                <?php endif ?>
                            <?php endwhile ?>
                        </ul>
                        </p>
                        <a href="#" class="btn btn-primary" id="actor-update" onclick="buttonClick('actor-checkbox')">Modifier mes acteurs préférés</a>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="directors" aria-labelledby="realisateurs">
                <div class="card">
                    <div class="card-body">
                        <p class="card-text">
                        <ul>
                            <?php while ($row = mysqli_fetch_assoc($user_director_preferences_results)) : ?>
                                <?php if ($row['user_fk'] == $user_id) : ?>
                                    <li>
                                        <input type="checkbox" name="director" id="director-checkbox" checked disabled;"><img src=" <?php echo $row['picture']; ?>" style="max-width: 150px !important; max-height:150px !important;" alt="<?php echo $row['firstName'] . ' ' . $row['lastName']; ?>" class="img-thumbnail preferences-thumbnail"><?php echo $row['firstName'] . ' ' . $row['lastName']; ?>
                                    </li>
                                <?php endif ?>
                            <?php endwhile ?>
                        </ul>
                        </p>
                        <a href="#" class="btn btn-primary" id="director-update" onclick="buttonClick('director-checkbox')">Modifier mes réalisateurs préférés</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src=" ../ASSETS/preferences.js"></script>
</body>

</html>