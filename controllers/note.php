<?php

$config = require("config.php");

$db = new Database($config["database"], "laracast", "laracast");

$id = $_GET["id"];

$heading = "Note " . $id;

$note = $db->query("select * from notes where id = :id", ["id" => $id])->fetch();

require "views/note.view.php";
