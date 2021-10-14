<?php 
require '../config/config.php';


$pdo = new PDO('mysql:host=localhost;dbname=crud', "root", "root", [
  // nous affiche les érreur
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC
]);



if (isset($_GET['id'])) {
  $data =  htmlspecialchars($_GET['id']); 
  $stmt = $pdo->prepare('DELETE  FROM todo WHERE input_id = :id');
  $stmt->execute([":id"=> $data]);
    header('Location: ../index.php?success=Deleted');
    exit();
  } 


  if (isset($_GET['id'])) {
    $data =  htmlspecialchars($_GET['id']); 
    $stmt = $pdo->prepare('ALTER TABLE todo WHERE todo_input = :id');
    $stmt->execute([":id"=> $data]);
      header('Location: ../index.php?success=inserted');
      exit();
    } 
 



; ?>