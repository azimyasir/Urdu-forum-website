<?php
//script connect to the database

$servername = "localhost";
$username ="root";
$password ="";
$database = "urduportal";

$conn =mysqli_connect($servername,$username,$password,$database);


mysqli_query($conn,"SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");

mysqli_set_charset($conn,'utf8');
?>