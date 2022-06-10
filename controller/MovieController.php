<?php

class MovieController extends Controller

{
    public $model;

    public function getEpisodes()
    {
        if (isset($_POST['show_name_submit'])) {
            $showName = $_POST['show_name'];
            $seasons = $this->model->getSeasonsByShowName($showName);
            $id = $this->model->getIdByName($showName);
            $episodes = [];
            // foreach ($seasons as $seasonNumber) {
            // @TODO : trouver pourquoi j'ai pas tous les détails de mes épisodes
            $episode_details = $this->model->getEpisodesByShowNameAndSeason(1);
            //     array_push($episodes, $episode_details);
            // }
            $data = [$id, $showName, $seasons, $episode_details];
            // TODO: tester cette fonction en créant une vue episodes et en complétant les requêtes SELECT
            $this->render('episodes', $data);
        }
    }

    public function setRating()
    {
    }
}
