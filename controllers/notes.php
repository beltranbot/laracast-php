<?php

$config = require("config.php");

$db = new Database($config["database"], "laracast", "laracast");

$heading = "Notes";

$notes = $db->query("select * from notes")->fetchAll();

require "views/notes.view.php";
