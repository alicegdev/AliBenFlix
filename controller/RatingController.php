<?php

class RatingController extends Controller

{
    public $model;

    public function ratingForm()
    {
        if (isset($_POST['show_rating_submit'])) {
            $showName = $_POST['show_name_rating'];
            $id = $this->model->getMovieIdByName($showName);
            $data = [$showName, $id];
            $this->render('rating', $data);
        }
    }

    public function setRating()
    {
        if (isset($_POST['rating_submit'])) {
            $user_id = $_SESSION['user_id'];
            $login = $_POST['login'];
            $stars = $_POST['stars'];
            $comment = $_POST['comment'];
            $film_name = $_POST['film_name'];
            $film_id = intval($this->model->getMovieIdByName($film_name));
            $ratingCount = $this->model->verifyRating($film_id, $user_id);
            if ($ratingCount == 0) {
                $this->model->setRating($film_id, $stars, $comment, $user_id);
                $data = "Votre avis a bien été pris en compte.";
            } else {
                $data = "Vous ne pouvez pas ajouter de deuxième avis sur ce film ou cette série";
            }
            $this->render('rating_confirm', $data);
        }
    }
}
