<?php

class Movie
{
    private int $id;
    private string $name;
    private string $synopsis;
    private string $picture;
    private float $averageRating;
    private bool $show;

    public function __construct($id, $name, $synopsis, $picture, $averageRating, $show)
    {
        $this->$id = $id;
        $this->$name = $name;
        $this->$synopsis = $synopsis;
        $this->$picture = $picture;
        $this->$averageRating = $averageRating;
        $this->$show = $show;
    }

    public function getId()
    {
        return $this->id;
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
