<?php

use Core\Database;

$config = require base_path("config.php");

$db = new Database($config["database"], "laracast", "laracast");

$currentUserId = 25;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST["id"];
    $note = $db->query("select * from notes where id = :id", [
        "id" => $id
    ])->findOrFail();

    authorize($note["user_id"] === $currentUserId);

    $db->query("delete from notes where id = :id", ["id" => $id]);

    header("location: /notes");
    exit();


} else {
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

}
