<?php

$config = require("config.php");
$db = new Database($config["database"]);

$heading = "Create note";

$currentUserId = 1;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $errors = [];

    if (strlen(trim($_POST["body"])) === 0) {
        $errors["body"] = "A body is required";
    }
    if (strlen(trim($_POST["body"])) > 1000) {
        $errors["body"] = "The body can not be more than 1,000 characters.";
    }

    if (empty($errors)) {
        $db->query("insert into notes(body, user_id) values (:body, :user_id)", [
            "body" => $_POST["body"],
            "user_id" => $currentUserId,
        ]);
    }
}

require "views/note-create.view.php";
