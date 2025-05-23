<?php

use Core\Database;
use Core\Validator;

require base_path("Core/Validator.php");

$config = require base_path("config.php");

$db = new Database($config["database"]);

$heading = "Create note";

$currentUserId = 1;

$errors = [];

if (!Validator::string($_POST["body"], max: 1000)) {
    $errors["body"] = "A body of no more than 1,000 characters is required.";
}

if (!$errors) {
    return view("notes/create.view.php", [
        "heading" => $heading,
        "errors" => $errors
    ]);
}

$db->query("insert into notes(body, user_id) values (:body, :user_id)", [
    "body" => $_POST["body"],
    "user_id" => $currentUserId,
]);

header("location: /notes");
exit();
