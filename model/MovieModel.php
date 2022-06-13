<?php

class MovieModel
{
    public $id;
    public $name;
    public $synopsis;
    public $genre;
    public $picture;
    public $averageRating;
    public $show;
    public $season_numbers = [];

    public function getIdByName($showName)
    {
        $this->name = $showName;
        $select = $this->db->prepare("SELECT id FROM movie WHERE name = :showName");
        $select->execute(array('showName' => $this->name));
        $result = $select->fetchColumn();
        $this->id = $result;
        return $this->id;
    }

    public function getSeasonsByShowName($showName)
    {
        $select = $this->db->prepare("SELECT season_number FROM season WHERE show_fk = :showId");
        $select->execute(array('showId' => $this->id));
        while ($row = $select->fetch(PDO::FETCH_COLUMN)) {
            array_push($this->season_numbers, $row);
        }
        return $this->season_numbers;
    }

    public function getEpisodesByShowNameAndSeason($seasonNumber)
    {
        $episodes = [];
        $select = $this->db->prepare("SELECT * FROM episode WHERE season_fk = :seasonNumber AND show_fk = :showId");
        $select->execute(array('seasonNumber' => $seasonNumber, 'showId' => $this->id));
        while ($row = $select->fetch(PDO::FETCH_ASSOC)) {
            array_push($episodes, $row);
        }
        return $episodes;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getAll()
    {
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getSynopsis()
    {
        return $this->synopsis;
    }

    public function setSynopsis($synopsis)
    {
        $this->synopsis = $synopsis;
    }

    public function getPicture()
    {
        return $this->picture;
    }

    public function setPicture($picture)
    {
        $this->picture = $picture;
    }

    public function getAverageRating()
    {
        return $this->averageRating;
    }

    public function setAverageRating($averageRating)
    {
        $this->averageRating = $averageRating;
    }

    public function getShow()
    {
        return $this->show;
    }

    public function setShow($show)
    {
        $this->show = $show;
    }
}
