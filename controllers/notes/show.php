<?php

use Core\Database;

$config = require base_path("config.php");

$db = new Database($config["database"], "laracast", "laracast");

$currentUserId = 1;

$id = $_GET["id"];

$heading = "Note $id";

$note = $db->query("select * from notes where id = :id", [
    "id" => $id
])->findOrFail();

authorize($note["user_id"] === $currentUserId);

view("notes/show.view.php", [
    "heading" => $heading,
    "note" => $note
]);
