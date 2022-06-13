<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - Streaming</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="styles/style.css" type="text/css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/86bd08429f.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/carousel.min.js"></script>
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
            <!-- CAROUSEL DES SHOWS STREAMING -->
            <div class="tab-pane fade show active" id="shows_new_in" role="tabpanel" aria-labelledby="nouveautes_series">
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
                                                <img class="img-fluid img-thumbnail" src="<?php echo $shows_pics_urls[$i] ?>" alt="<?php echo $shows_names[$i] ?>">
                                            </div>
                                            <div class="col-md-8">
                                                <div class="card" style=" width:100%; height: 500px !important"">
                                                    <div class=" card-body">
                                                    <h5 class="card-title">
                                                        <p><?php echo $shows_names[$i] ?></p>
                                                    </h5>
                                                    <h6 class="card-subtitle mb-2 text-muted"><?php echo $shows_genres[$i] ?>, rating</h6>
                                                    <hr class="my-4">

                                                    <p class="card-text"><?php echo $shows_synopsis[$i] ?></p>
                                                    <form method="post" action="?action=ratings">
                                                        <input name="show_name_rating" type="hidden" value="<?php echo $shows_names[$i] ?>">
                                                        <button type="submit" name="show_rating_submit" class="button-52" role="button">Donner son avis</button>
                                                    </form>
                                                    <form method="post" action="?action=episodes">
                                                        <input name="show_name" type="hidden" value="<?php echo $shows_names[$i] ?>">
                                                        <button type="submit" name="show_name_submit" class="button-52" role="button">Voir la liste des épisodes</button>
                                                    </form>
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


        <!-- CAROUSEL DES MOVIES STREAMING -->
        <div class="tab-pane fade show active" id="movies_new_in" role="tabpane2" aria-labelledby="nouveautes_films">
            <div class="d-flex justify-content-between">
                <div class="col-md-12">
                    <div class style="width:100%; height:max-content !important;">
                        <div class="container">
                            <?php
                            $movies_names = $data['movies_names'];
                            $movies_synopsis = $data['movies_synopsis'];
                            $movies_genres = $data['movies_genres'];
                            $movies_pics_urls = $data['movies_pics_urls']; ?>
                            <div class="row text-center text-lg-left">
                                <div class="row">
                                    <div class="col-md-4">
                                        <img class="img-fluid img-thumbnail" src="<?php echo $movies_pics_urls[0] ?>" alt="<?php echo $movies_names[0] ?>">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card" style=" width:100%; height:max-content !important"">
                                            <div class=" card-body">
                                            <h5 class="card-title">
                                                <p><?php echo $movies_names[0] ?></p>
                                            </h5>
                                            <h6 class="card-subtitle mb-2 text-muted"><?php echo $movies_genres[0] ?>, rating</h6>
                                            <hr class="my-4">

                                            <p class="card-text"><?php echo $movies_synopsis[0] ?></p>

                                            <form method="post" action="?action=ratings">
                                                <input name="show_name_rating" type="hidden" value="<?php echo $movies_names[0] ?>">
                                                <button type="submit" class="button-52" name="show_rating_submit">Donner son avis</button>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="user_favs" role="tabpane3" aria-labelledby="selon_preferences" id="selon-preferences">
        <div class=" d-flex justify-content-between">
            <div class="col-md-12">

                <div style=" width:100%; height: 500px !important">
                    <div class="container">
                        <?php
                        $suggested_names = $data['suggested_names'];
                        $suggested_synopsis = $data['suggested_synopsis'];
                        // $suggested_genres = $data['suggested_genres'];
                        $suggested_pics_urls = $data['suggested_pics_urls']; ?>
                        <div class="row text-center text-lg-left">
                            <div class="row">
                                <div class="col-md-4">
                                    <img class="img-fluid img-thumbnail" src="<?php echo $suggested_pics_urls[0] ?>" alt="<?php $suggested_pics_urls[0] ?>">
                                </div>
                                <div class="col-md-8">
                                    <div class="card style=" width:100%; height: 500px !important"">
                                        <div class="card-body">
                                            <h5 class="card-title">
                                                <p><?php echo $suggested_names[0] ?></p>
                                            </h5>
                                            <h6 class="card-subtitle mb-2 text-muted"><?php ?>, rating</h6>
                                            <hr class="my-4">

                                            <p class="card-text"><?php $suggested_synopsis[0] ?></p>
                                            <form method="post" action="?action=ratings">
                                                <input name="show_name_rating" type="hidden" value="<?php echo $suggested_names[0] ?>">
                                                <button type="submit" name="show_rating_submit" class="button-52">Donner son avis</button>
                                            </form>
                                            <form method="post" action="?action=episodes">
                                                <input name="show_name" type="hidden" value="<?php echo $suggested_names[0] ?>">
                                                <button type="submit" name="show_name_submit" class="button-52">Voir la liste des épisodes</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <p class="mb-4 text-center">Vous aimeriez voir autre chose ?</p> <i class=" fas fa-hand-point-down"></i></p>
                        <p class="text-center"><button class="button-52"><a href="?action=preferences" role="button">Modifier vos préférences</a></button>

                    </div>
                </div>
            </div>
        </div>

        </p>
    </div>
    </div>
    </div>
</body>

</html>