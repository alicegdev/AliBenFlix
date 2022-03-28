<?php

class Controller
{
    public function render($file, $data = "")
    {
        require "view/" . $file . ".php";
    }
}
