<?php

class MovieController extends Controller

{
    public $model;

    public function getEpisodes()
    {
        if (isset($_POST['show_name_submit'])) {
            $showName = $_POST['show_name'];
            $id = $this->model->getIdByName($showName);
            $seasons = $this->model->getSeasonsByShowName($showName);
            $episodes = [];
            foreach ($seasons as $seasonNumber) {
                $episode_details = $this->model->getEpisodesByShowNameAndSeason(1);
                array_push($episodes, $episode_details);
            }
            $data = [$id, $showName, $seasons, $episodes];
            $this->render('episodes', $data);
        }
    }

    public function setRating()
    {
    }
}
