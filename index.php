<?php

require "functions.php";

require "Database.php";

// require "router.php";

$config = require("config.php");

$db = new Database($config["database"], "laracast", "laracast");

$posts = $db->query("select * from posts;");

foreach ($posts as $post) {
    echo "<li>" . $post["title"] . "</li>";
}
// connect to our mysql database
