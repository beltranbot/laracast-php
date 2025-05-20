<?php

require "functions.php";

require "Database.php";

// require "router.php";

$config = require("config.php");

$db = new Database($config["database"], "laracast", "laracast");

$id = $_GET["id"];

$query = "select * from posts where id = ?;";

$posts = $db->query($query, [$id]);

foreach ($posts as $post) {
    echo "<li>" . $post["title"] . "</li>";
}
// connect to our mysql database
