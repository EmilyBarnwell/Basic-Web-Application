<?php

$host       = "sql208.epizy.com";
$username   = "epiz_23685200";
$password   = "9hChrJQ*PQ-r";
$dbname     = "epiz_23685200_snake_tracker";

$conn = mysqli_connect($host, $username, $password, $dbname);

if (!$conn) {
    die("connection failed: ".mysqli_connect_error());
}