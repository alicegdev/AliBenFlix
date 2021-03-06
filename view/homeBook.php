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
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>


        <?php include('partials/navbar.php') ?>
    </nav>
    <div class="jumbotron" style="padding-top:1rem">
        <h4 class="d-print-flex">
            <p class="welcome">Bienvenue</p>
        </h4>
        <hr class="my-4">
        <ul class="nav nav-pills nav-fill mb-4" id="pills-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="pill" role="pill" aria-controls="nouveautes_series" aria-selected="true" aria-current="page" href="#shows_new_in">Nouveautés séries</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="pill" role="pill" aria-controls="nouveautes_films" aria-selected="true" aria-current="page" href="#movies_new_in">Nouveautés films</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="pill" role="pill" aria-controls="selon_preferences" aria-selected="true" aria-current="page" href="#user_favs" href="#">En fonction de vos préférences</a>
            </li>
        </ul>

        <div class="tab-content" id="pills-tabContent">
            <!-- CAROUSEL DES MOVIES STREAMING -->
            <div class="tab-pane fade show active" id="shows_new_in" role="tabpanel" aria-labelledby="nouveautes_films">
                <div class="d-flex justify-content-between">
                    <div class="col-md-12">
                        <div id="carouselExampleControls" class="carousel slide container" data-ride="carousel">

                            <div class="carousel-inner role=" listbox" style=" width:100%; height: 500px !important">
                                <?php
                                $shows_names = $data['shows_names'];
                                $shows_synopsis = $data['shows_synopsis'];
                                $shows_genres = $data['shows_genres'];
                                $shows_pics_urls = $data['shows_pics_urls'];
                                for ($i = 0; $i < count($shows_names); $i++) : ?>
                                    <div class="carousel-item <?php if ($i == 1) {
                                                                    echo ' active';
                                                                } ?> row text-center text-lg-left">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <img class="img-fluid img-thumbnail" src="<?php echo $shows_pics_urls[$i] ?>" alt="<?php echo $shows_names[0] ?>">
                                            </div>
                                            <div class="col-md-8">
                                                <div class="card style=" width:100%; height: 500px !important"">
                                                    <div class="card-body">
                                                        <h5 class="card-title">
                                                            <p><?php echo $shows_names[$i] ?></p>
                                                        </h5>
                                                        <h6 class="card-subtitle mb-2 text-muted"><?php echo $shows_genres[$i] ?>, rating</h6>
                                                        <hr class="my-4">

                                                        <p class="card-text"><?php echo $shows_synopsis[$i] ?></p>
                                                        <p class="card-text"><a href="#" class="card-link">Donner son avis</a></p>
                                                        <p class="card-text"><a href="#" class="card-link">Voir la liste des épisodes</a></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endfor; ?>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Précédent</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Suivant</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="movies_new_in" role="tabpane2" aria-labelledby="nouveautes_films">
                <p class="text-center">test onglet nouveautés films</p>
            </div>
            <div class="tab-pane fade" id="user_favs" role="tabpane3" aria-labelledby="selon_preferences">
                <p class="text-center">test onglet selon préférences</p>
                <p class="mb-4 text-center">Et si vous aimeriez voir autre chose...</p> <i class=" fas fa-hand-point-down"></i></p>
                <p class="text-center"><a class="btn btn-primary btn-lg" href="?action=preferences" role="button">Modifier vos préférences</a>
                </p>
            </div>
        </div>

    </div>
</body>