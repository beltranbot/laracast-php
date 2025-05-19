<?php

class Database
{
    private $pdo;

    public function __construct()
    {
        $laracast = "laracast";
        $host = "127.0.0.1";
        $username = $laracast;
        $password = $laracast;
        $database = $laracast;
        $this->pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    }

    public function query($query)
    {
        try {

            $statement = $this->pdo->prepare($query);

            $statement->execute();

            $posts = $statement->fetchAll(PDO::FETCH_ASSOC);

            return $posts;

            // echo "Connected successfully";
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}
