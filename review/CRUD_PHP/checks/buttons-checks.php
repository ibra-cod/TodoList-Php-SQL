<?php 
require '../config/config.php';

// verif si l'id existe bien dans url et on la recupère avec un $_GET
if (isset($_GET['id'])) {
// Si le id à bien été récuperer on peut commencer la suppression 
  $data =  htmlspecialchars($_GET['id']); 
  $stmt = $pdo->prepare('DELETE  FROM todo WHERE input_id = :id');
  $stmt->execute([":id"=> $data]);
    header('Location: ../index.php?success=Deleted');
    exit();
  } 

// verif si l'id existe bien dans url et on la recupère avec un $_GET

  if (isset($_GET['id'])) {
// Si le id à bien été récuperer on peut commencer la modification de la bdd (pas encore fini)
    $data =  htmlspecialchars($_GET['id']); 
    $stmt = $pdo->prepare('ALTER TABLE todo WHERE todo_input = :id');
    $stmt->execute([":id"=> $data]);
      header('Location: ../index.php?success=inserted');
      exit();
    } 
 



; ?>
