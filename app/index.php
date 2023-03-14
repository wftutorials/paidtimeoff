<?php
include __DIR__ . "/../bootstrap.php";

render("index.html.twig", ["actions" => getActions()]);
