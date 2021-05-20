<?php
$hostname = $_SERVER['HTTP_HOST'];
$URI = $_SERVER['REQUEST_URI'];
$URIs = explode("/", $URI);
$appHostedURI = "http://" . $hostname . implode("/", array_slice($URIs, 0, count($URIs) - 2)) . "/";

?>