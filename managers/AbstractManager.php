<?php

abstract class AbstractManager
{
    protected PDO $db;

    public function __construct()
    {
        $connexion = "mysql:host=localhost;port=3306;charset=utf8;dbname=portfolio";
        $this->db = new PDO(
            $connexion,
            "root",
            "bonjour4628"
        );
    }
}

?>