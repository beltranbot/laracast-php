<?php

require "functions.php";

// require "router.php";


// connect to our mysql database

// $dsn = "mysql:host=localhost:port=3306;dbname=laracast;charset=utf8mb4";

// $pdo = new PDO($dsn, "laracast", "laracast");

// $statement = $pdo->prepare("select * from posts");

// $statement->execute();

// $posts = $statement->fetchAll();
// dd($posts);

$laracast = "laracast";
$host = "127.0.0.1";
$username = $laracast;
$password = $laracast;
$database = $laracast;

try {
    $pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    $statement = $pdo->prepare("select * from posts");

    $statement->execute();

    $posts = $statement->fetchAll(PDO::FETCH_ASSOC);
    
    foreach ($posts as $post) {
        echo "<li>" . $post["title"] . "</li>";
    }


    // echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
