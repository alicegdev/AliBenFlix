<?php
class DbModel
{
    private $servername;
    private $username;
    private $password;
    private $dbname;

    protected function connect($servername, $username, $password, $dbname, $db = null, $errors = null)
    {
        $this->servername = "localhost";
        $this->$username = "root";
        $this->$password = "";
        $this->$dbname = "alibenflix";

        $conn = new mysqli($this->servername, $this->$username, $this->$password, $this->$dbname);
    }
}
