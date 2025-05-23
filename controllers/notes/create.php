<?php

$heading = "Create note";

$errors = [];

view("notes/create.view.php", [
    "heading" => $heading,
    "errors" => $errors
]);
