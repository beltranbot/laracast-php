<?php

require "functions.php";

// require "router.php";



$db = new Database();

$posts = $db->query("select * from posts;");

foreach ($posts as $post) {
    echo "<li>" . $post["title"] . "</li>";
}
// connect to our mysql database




