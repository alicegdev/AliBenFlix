<?php
class RatingModel
{
    public $id;
    public $stars;
    public $comment;
    public $show;
    public $movie_fk;

    public function getMovieIdByName($showName)
    {
        $select = $this->db->prepare("SELECT id FROM movie WHERE name = :showName");
        $select->execute(array('showName' => $showName));
        $result = $select->fetchColumn();
        $this->movie_fk = $result;
        return $this->movie_fk;
    }

    public function setRating($showId)
    {
    }
}
