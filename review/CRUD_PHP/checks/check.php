<?php

/* PHP VERIFICATION*/

// BDD DEF

$pdo = new PDO('mysql:host=localhost;dbname=crud', "root", "root", [
  // nous affiche les érreur
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC
]);



$error = null;
// insertion de la data des input dans la BDD

if(isset($_GET['submit'])){
    // récuperation des donner input 
  $todo = htmlspecialchars($_GET['todo']);
        // verification si les ne sont pas vide champs sont vides
  if(!empty($todo)) {
      // insertion dans la DDD les information pour
      $sql = "INSERT INTO `todo` (todo_input) VALUES(?)";
      $stmt= $pdo->prepare($sql);
      $stmt->execute([$todo]);
     // recuperation de la data pour le display à l'utilisateur ; 
  }
  
    
 
}




?>

