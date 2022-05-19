<?php

class Controller
{
    public function model($model)
    {
        //Require model file
        require '../models/' . $model . '.php';
        //Instantiate model
        return new $model();
    }

    //Load the view (checks for the file)
    public function view($view, $data = [])
    {
        if (file_exists('../PAGES/' . $view . '.php')) {
            require '../PAGES/' . $view . '.php';
        } else {
            die("View does not exists.");
        }
    }
}
