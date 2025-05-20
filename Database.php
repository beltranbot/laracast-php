<?php

class Database
{
    private $pdo;

    public function __construct($config, $username, $password)
    {
        $dsn = "mysql:" . http_build_query($config, "", ";");
        $this->pdo = new PDO($dsn, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    public function query($query, $params)
    {
        try {

            $statement = $this->pdo->prepare($query);

            $statement->execute($params);

            $posts = $statement->fetchAll(PDO::FETCH_ASSOC);

            return $posts;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}
