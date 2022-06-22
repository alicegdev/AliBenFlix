<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="styles/style.css" type="text/css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/86bd08429f.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>

<body>
    <?php include('partials/navbar.php') ?>

    <div class="col-md-12 text-center">
        <h4 class="d-print-flex">
            <h2>Episodes</h2>
        </h4>

        <div class="col-md-12">

            <div style=" width:100%; height: 500px !important">
                <div class="container">
                    <div class="row text-center text-lg-left">
                        <?php for ($i = 0; $i < count($data[2]); $i++) : ?>
                            <div class="accordion" id="accordionExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="<?php echo '#collapse' . $i ?>" aria-expanded="true" aria-controls="<?php echo 'collapse' . $i ?>">
                                            Saison <?php echo $i + 1 ?>
                                        </button>
                                    </h2>
                                    <div id="<?php echo 'collapse' . $i ?>" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <?php foreach ($data as $key => $value) : ?>
                                                <?php if ($key == 3) : ?>
                                                    <?php foreach ($value as $val) : ?>
                                                        <?php foreach ($val as $episode) : ?>
                                                            <?php if ($episode['season_fk'] == $i + 1) : ?>
                                                                <div class="row">
                                                                    <div class="col-md-2"><a href="#" id="clicked-thumbnail"><img src="<?php echo $episode['pic'] ?>" class="media-object img-thumbnail" /></a></div>
                                                                    <div class="col-md-10">
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="pull-right"><label class="label label-info">vu</label></div>
                                                                                <input type="hidden" value="<?php echo $episode['show_fk'] ?>" id="movie_id">
                                                                                <span><strong>Episode <?php echo $episode['episode_number'] ?></strong></span> <span class="label label-info"> <?php echo $episode['title'] ?></span><br />
                                                                                Résumé : <?php echo $episode['summary'] ?> <br />
                                                                                <br />
                                                                                <br />
                                                                                <hr class="slash-1">
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            <?php endif ?>
                                                        <?php endforeach ?>
                                                    <?php endforeach ?>
                                                <?php endif ?>
                                            <?php endforeach ?>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endfor ?>
                    </div>
                </div>
            </div>
            <script src="assets/watched.js"></script>
</body>

</html>