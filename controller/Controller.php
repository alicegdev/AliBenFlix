<?php

class Controller
{
    public function render($file, $data = "")
    {
        return require_once "view/" . $file . ".php";
    }
}
