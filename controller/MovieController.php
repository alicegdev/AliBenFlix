<?php

class MovieController extends Controller

{
    public $model;

    public function getEpisodes()
    {
        if (isset($_POST['show_name_submit'])) {
            $showName = $_POST['show_name'];
            $seasons = $this->model->getSeasonsByShowName($showName);
            $id = $this->model->id;
            $episodes = [];
            foreach ($seasons as $seasonNumber) {
                $episode_details = $this->model->getEpisodesByShowNameAndSeason($showName, $seasonNumber);
                array_push($episodes, $episode_details);
            }
            $data = [$id, $showName, $seasons, $episodes];
            // TODO: tester cette fonction en créant une vue episodes et en complétant les requêtes SELECT
            $this->render('episodes', $data);
        }
    }

    public function setRating()
    {
    }
}
