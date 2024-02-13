<?php
header("Access-Control-Allow-Origin: *");
$serverHost = "localhost";
$user = "root";
$password = "";
$database = "ecf_studi2";

$connectNow = new mysqli($serverHost, $user, $password, $database);