<?php

class UserController extends Controller
{
    public $model;

    public function setLastWatched()
    {
        $this->model->setLastWatched();
    }
}
