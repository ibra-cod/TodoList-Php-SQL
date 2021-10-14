<?php 
define('SITENAME', "crud en php"); 

$pdo = new PDO('mysql:host=localhost;dbname=crud', "root", "root", [
  // nous affiche les érreur
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC
]);