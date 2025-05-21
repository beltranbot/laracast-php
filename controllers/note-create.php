<?php

$heading = "Create note";

// dd($_SERVER);
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    dd($_POST);
}

require "views/note-create.view.php";
