<?php

$host       = "localhost";
$username   = "root";
$password   = "root";
$dbname     = "snake_tracker"; 
$dsn        = "mysql:host=$host;dbname=$dbname"; 
$options    = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
              );
?>