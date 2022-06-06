<div id="carousel-1" class="carousel slide" data-ride="carousel">
    <?php
    $shows_names = $data['shows_names'];
    $shows_synopsis = $data['shows_synopsis'];
    $shows_genres = $data['shows_genres'];
    $shows_pics_urls = $data['shows_pics_urls']; ?>
    <ol class="carousel-indicators">
        <?php for ($i = 0; $i < count($shows_names); $i++) : ?>
            <li data-target="carousel-1" data-slide-to="<?php echo $i ?>" class="<?php if ($i == 0) {
                                                                                                                        echo ' active';
                                                                                                                    } ?>"></li>
        <?php endfor ?>
    </ol>

    <div class="carousel-inner" role="listbox">
        <?php
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



</div><!-- e carousel-inner -->

<a class="carousel-control-prev" href="#carousel-1" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">prev</span>
</a>

<a class="carousel-control-next" href="#carousel-1" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">next</span>
</a>

</div><!-- e carousel -->

<!-- ################### carousel 2 -->

    <div id="carousel-2" class="carousel slide" data-ride="carousel">
 <?php
                            $movies_names = $data['movies_names'];
                            $movies_synopsis = $data['movies_synopsis'];
                            $movies_genres = $data['movies_genres'];
                            $movies_pics_urls = $data['movies_pics_urls'];
                            for ($j = 0; $j < count($movies_names); $j++) : ?>

        <ol class="carousel-indicators">
        <?php for ($j = 0; $j < count($movies_names); $j++) : ?>
            <li data-target="carousel-2" data-slide-to="$j" class="<?php if ($j == 0) {
                                                                                                                        echo ' active';
                                                                                                                    } ?>"></li>
        <?php endfor ?>
    </ol>

        <div class="carousel-inner" role="listbox">

            <div class="carousel-item <?php if ($j == 0) { echo ' active'; } ?>">
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

        </div><!-- e carousel-inner -->

        <a class="carousel-control-prev" href="#carousel-2" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">prev</span>
        </a>

        <a class="carousel-control-next" href="#carousel-2" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">next</span>
        </a>

    </div><!-- e carousel -->
</section><!-- e section -->

<section class="bg-info text-light text-center py-5 mb-5">
    <div class="container">
        <div class="row">

            <div class="col">
                <h2>Carousel 3</h2>
            </div><!-- e col -->

        </div><!-- e row -->
    </div><!-- e container -->
</section><!-- e section -->

<!-- ################### carousel 3 -->

<section class="mb-5">
    <div id="carousel-3" class="carousel slide" data-ride="carousel">

        <ol class="carousel-indicators">
            <li data-target="#carousel-3" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-3" data-slide-to="1"></li>
            <li data-target="#carousel-3" data-slide-to="2"></li>
            <li data-target="#carousel-3" data-slide-to="3"></li>
        </ol>

        <div class="carousel-inner" role="listbox">

            <div class="carousel-item active">
                <img class="d-block img-fluid" src="https://picsum.photos/1600/400/?image=234" alt="Slide">
                <div class="carousel-caption d-none d-md-block">
                    <h3>1 Lorem ipsum dolor</h3>
                    <p>Lorem ipsum dolor sit amet, consetetur sadipscing...</p>
                </div>
            </div>

            <div class="carousel-item">
                <img class="d-block img-fluid" src="https://picsum.photos/1600/400/?image=445" alt="Slide">
                <div class="carousel-caption d-none d-md-block">
                    <h3>2 Lorem ipsum dolor</h3>
                    <p>Lorem ipsum dolor sit amet, consetetur sadipscing...</p>
                </div>
            </div>

            <div class="carousel-item">
                <img class="d-block img-fluid" src="https://picsum.photos/1600/400/?image=435" alt="Slide">
                <div class="carousel-caption d-none d-md-block">
                    <h3>3 Lorem ipsum dolor</h3>
                    <p>Lorem ipsum dolor sit amet, consetetur sadipscing...</p>
                </div>
            </div>

            <div class="carousel-item">
                <img class="d-block img-fluid" src="https://picsum.photos/1600/400/?image=425" alt="Slide">
                <div class="carousel-caption d-none d-md-block">
                    <h3>4 Lorem ipsum dolor</h3>
                    <p>Lorem ipsum dolor sit amet, consetetur sadipscing...</p>
                </div>
            </div>

        </div><!-- e carousel-inner -->

        <a class="carousel-control-prev" href="#carousel-3" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">prev</span>
        </a>

        <a class="carousel-control-next" href="#carousel-3" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">next</span>
        </a>

    </div><!-- e carousel -->