<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="../styles/style.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <script src="https://use.fontawesome.com/86bd08429f.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>

<body>
    <?php include('partials/navbar.php') ?>

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
                            <?php

                            $data['user_genre_preferences'] = $user_genre_preferences_names;
                            foreach ($user_genre_preferences_names as $fav_genre_name) : ?>
                                <li>
                                    <input type="checkbox" name="genre" id="genre-checkbox" checked disabled><?php echo $fav_genre_name; ?>
                                </li>
                            <?php endforeach ?>
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
                            <?php
                            // Refaire la requête dans le model pour pouvoir boucler à la fois sur le nom et l'image dans la vue

                            foreach ($user_actor_preferences as $fav_actor) : ?>
                                <li>

                                    <?php var_dump($fav_actor['firstName']); ?>
                                    <img src="<?php echo $fav_actor['picture']; ?>" style="max-width: 150px !important; max-height: 150px !important;" alt="<?php echo $fav_actor['firstName'] . ' ' . $fav_actor['lastName']; ?>" class="img-thumbnail preferences-thumbnail"><br /><?php echo $fav_actor['firstName'] . ' ' . $fav_actor['lastName']; ?>
                                </li>
                            <?php endforeach ?>
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
                            <?php foreach ($user_actor_preferences as $fav_director) : ?>
                                <li>
                                    <input type="checkbox" name="director" id="director-checkbox" checked disabled;"><img src=" <?php echo $fav_director['picture']; ?>" style="max-width: 150px !important; max-height:150px !important;" alt="<?php echo $fav_director['firstName'] . ' ' . $fav_director['lastName']; ?>" class="img-thumbnail preferences-thumbnail"><?php echo $fav_director['firstName'] . ' ' . $fav_director['lastName']; ?>
                                </li>
                            <?php endforeach ?>
                        </ul>
                        </p>
                        <a href="#" class="btn btn-primary" id="director-update" onclick="buttonClick('director-checkbox')">Modifier mes réalisateurs préférés</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src=" ../assets/preferences.js"></script>
</body>

</html>