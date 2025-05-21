<?php

$config = require("config.php");

$db = new Database($config["database"], "laracast", "laracast");

$id = $_GET["id"];

$heading = "Note " . $id;

$note = $db->query("select * from notes where id = :id", [
    "id" => $id
])->fetch();

if (!$note) {
    abort();
}

$currentUserId = 1;

if ($note["user_id"] !== $currentUserId) {
    abort(Response::FORBIDDEN);
}

require "views/note.view.php";
