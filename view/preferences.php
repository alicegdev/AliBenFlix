<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="styles/style.css" type="text/css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/86bd08429f.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>

<body>
    <?php include('partials/navbar.php') ?>

    <div class="col-md-12 text-center">
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
                            <?php if (isset($data['user_genre_preferences'])) : ?>
                                <?php foreach ($data['user_genre_preferences'] as $key => $value) : ?>
                                    <ul>
                                        <li>
                                            <input type="checkbox" name="genre" id="genre-checkbox" checked disabled><?php echo $value['name']; ?>
                                        </li>
                                    </ul>
                                <?php endforeach ?>
                            <?php endif ?>
                        </ul>
                        </p>
                        <a href="#" class="btn btn-primary" id="genre-update" onclick="buttonClick('genre-checkbox')">Modifier ou ajouter les genres préférés</a>
                    </div>
                    <form action="" method="POST">
                        <select name="genre" class="hiddenSelect" id="actor-select">
                            <option value="">-- Sélectionner un genre à ajouter --</option>
                            <?php foreach ($data['genre'] as $key => $value) : ?>
                                <option value="<?php echo $value['name'] ?>"><?php echo $value['name']; ?></option>
                            <?php endforeach ?>
                        </select>
                        <button type="submit" name="preferences_submit">Valider</button>
                    </form>
                </div>
            </div>
            <div class=" tab-pane fade" id="actor" aria-labelledby="acteurs">
                <div class="card">
                    <div class="card-body">
                        <p class="card-text">
                            <!-- TODO : mettre une checkbox avant les noms et enlever le style de li-->
                            <?php if (isset($data['user_actor_preferences'])) : ?>
                                <?php
                                foreach ($data['user_actor_preferences'] as $key => $value) : ?>
                        <ul id="actor_preferences">
                            <li>
                                <img src="<?php echo $value['picture']; ?>" style="max-width: 150px !important; max-height: 150px !important;" alt="<?php echo $value['firstName'] . ' ' . $value['lastName']; ?>" class="img-thumbnail preferences-thumbnail"><br /><?php echo $value['firstName'] . ' ' . $value['lastName']; ?>
                            </li>
                        </ul>
                    <?php endforeach ?>
                <?php endif ?>
                </p>
                <a href="#" class="btn btn-primary" id="actor-update" onclick="buttonClick('actor-checkbox')">Modifier ou ajouter des acteurs préférés</a>
                    </div>
                    <form action="" method="POST">
                        <select name="actor" class="hiddenSelect" id="actor-select">
                            <option value="">-- Sélectionner un acteur à ajouter --</option>
                            <?php foreach ($data['actor'] as $key => $value) : ?>
                                <option value="<?php echo $value['firstName'] . ' ' . $value['lastName']; ?>"><?php echo $value['firstName'] . ' ' . $value['lastName']; ?></option>
                            <?php endforeach ?>
                        </select>
                        <button type="submit" name="preferences_submit">Valider</button>
                    </form>
                </div>
            </div>
            <div class=" tab-pane fade" id="directors" aria-labelledby="realisateurs">
                <div class="card">
                    <div class="card-body">
                        <p class="card-text">
                        <ul>
                            <?php if (isset($data['user_realisator_preferences'])) : ?>
                                <?php foreach ($data['user_realisator_preferences'] as $key => $value) : ?>
                                    <li>
                                        <input type="checkbox" name="director" id="director-checkbox" checked disabled;"><img src=" <?php echo $value['picture']; ?>" style="max-width: 150px !important; max-height:150px !important;" alt="<?php echo $value['firstName'] . ' ' . $value['lastName']; ?>" class="img-thumbnail preferences-thumbnail"><?php echo $value['firstName'] . ' ' . $value['lastName']; ?>
                                    </li>
                                <?php endforeach ?>
                            <?php endif ?>
                        </ul>
                        </p>
                        <a href="#" class="btn btn-primary" id="director-update" onclick="buttonClick(' director-checkbox')">Modifier ou ajouter des réalisateurs préférés</a>
                    </div>
                    <form action="?action=preferences_set" method="POST">
                        <select name="realisator" class="hiddenSelect" id="realisator-select">
                            <option value="">-- Sélectionner un réalisateur à ajouter --</option>
                            <?php foreach ($data['realisator'] as $key => $value) : ?>
                                <option value="<?php echo $value['firstName'] . ' ' . $value['lastName']; ?>"><?php echo $value['firstName'] . ' ' . $value['lastName']; ?></option>
                            <?php endforeach ?>
                        </select>
                        <p><?php echo $_POST['realisator'] ?></p>
                        <button type="submit" name="preferences_submit">Valider</button>
                    </form>

                </div>
            </div>
        </div>

    </div>
    <script src=" ../assets/preferences.js"></script>
</body>

</html>