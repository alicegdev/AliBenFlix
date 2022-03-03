<!-- Récupérer toutes les séries - j'ai ajouté un attribut show (booléen) à la table movies  -->
<?php
include '../CONNECTION/server.php';
// On crée une requête pour sélectionner les films publiés 30 jous avant pour les mettre dans "nouveautés"
$new_shows_details_query = "SELECT name, picture, synopsis FROM movie WHERE added_at BETWEEN DATE_SUB(NOW(), INTERVAL 1 MONTH) AND NOW()";
$new_shows_details_results = mysqli_query($db, $new_shows_details_query);

// On crée des tableaux vides pour manipuler les urls, noms et synopsis dans la boucle du carrousel
$shows_pics_urls = [];
$shows_names = [];
$shows_synopsis = [];
$shows_genres = [];

// On transforme les objets de la BDD en strings dans une boucle while et on les pushe dans les 3 tableaux vides qu'on vient de créer
while ($row = mysqli_fetch_assoc($new_shows_details_results)) {
    array_push($shows_names, $row['name']);
    array_push($shows_pics_urls, $row['picture']);
    array_push($shows_synopsis, $row['synopsis']);
};

// Requête pour avoir les genres des films et des séries
$genre_query = "SELECT genre.name FROM genre, movie_genre, movie WHERE movie_genre.movie_fk = movie.id AND movie_genre.genreMovie_fk = genre.id";
$genre_result = mysqli_query($db, $genre_query);
while ($row = mysqli_fetch_assoc($genre_result)) {
    array_push($shows_genres, $row['name']);
};
?>
<div class="tab-pane fade show active" id="shows_new_in" role="tabpanel" aria-labelledby="nouveautes_series">
    <div class="d-flex justify-content-between">
        <div class="col-md-12">
            <div id="carouselExampleControls" class="carousel slide container" data-ride="carousel">

                <div class="carousel-inner role=" listbox" style=" width:100%; height: 500px !important">
                    <?php for ($i = 0; $i < count($shows_names); $i++) : ?>
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
    test onglet nouveautés films
</div>
<div class="tab-pane fade" id="user_favs" role="tabpane3" aria-labelledby="selon_preferences">
    test onglet selon préférences
    <p class="mb-4">Et si vous aimeriez voir autre chose... <i class=" fas fa-hand-point-down"></i></p>
    <p class="lead">
        <a class="btn btn-primary btn-lg" href="../PAGES/preferences.php" role="button">Modifier vos préférences</a>
    </p>
</div>