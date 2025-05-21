<?php

namespace Controllers\Notes;

use Core\Database;

$config = require base_path("config.php");

$db = new Database($config["database"], "laracast", "laracast");

$heading = "Notes";

$notes = $db->query("select * from notes")->get();

view("notes/index.view.php", [
    "heading" => $heading,
    "notes" => $notes
]);
