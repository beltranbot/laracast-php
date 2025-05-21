<?php

class Database
{
    private $pdo;
    private $statement;

    public function __construct($config, $username = "laracast", $password = "laracast")
    {
        $dsn = "mysql:" . http_build_query($config, "", ";");
        $this->pdo = new PDO($dsn, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    public function query($query, $params = null)
    {
        try {

            $this->statement = $this->pdo->prepare($query);

            $this->statement->execute($params);
            return $this;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function find()
    {
        return $this->statement->fetch();
    }

    public function findOrFail()
    {
        $result = $this->find();

        if (!$result) {
            abort(Response::FORBIDDEN);
        }

        return $result;
    }

    public function get()
    {
        return $this->statement->fetchAll();
    }
}
