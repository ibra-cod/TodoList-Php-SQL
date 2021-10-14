<?php 
require_once '../config/config.php';    
    // verifier si l'input bien valider
    if(isset($_POST['register'])) {
      $name = $_POST['username'];
      $email = $_POST['email'];
      $password= $_POST['password'];
      $confirmPassword = $_POST['Confirmpassword']
          
    // verifier si les champs sont vides lancer une erreur
    
      if (empty($name) && empty($password) && empty($confirmPassword) && empty($email)) {
        header('Location: ../register.php?error=FieldsCantBeEmpty');
        exit();
    // verifier si les l'email est mal rempli ou incorect
          
      } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        header('Location: ../register.php?error=emailIsInvalid');
        exit();
    // verifier si les  password et ConfirmPasssword corresponde
          
      } elseif($password != $confirmPassword){
        header('Location: ../register.php?error=PasswordDoesNotMatch');
        exit();
      }   else {
    // iniitialisation de la requette
          
        $stmt = $pdo->prepare('SELECT * FROM user WHERE email = ?');
         $stmt->execute([$email]);
    // verifier si la requette sql est differente de zero alors un utilisateur est déja inscrit
    // if($stmt->rowCount() > 0){
          
         if($stmt->rowCount() != 0){
             header("location: ../register.php?error=WrognEmail=".$name);
              exit();
         } else {
             // hashage du mot de passe
          $hashedPassword = password_hash($password, PASSWORD_ARGON2ID);
            // insertion dans la Bdd
          $sql = 'INSERT INTO `user`(username, email,`password`) VALUES(?,?,?)';
          $stmt = $pdo->prepare($sql);
            // Si $rowcount est different de 0 alors un utilisatuer existe déja .
          if($stmt->rowCount() != 0){
            header("location: ../register.php?error=WrognEmail=".$username);
             exit();
        }
          $stmt->execute([$name, $email,  $hashedPassword]);

          header('Location: ../register.php?success=created');
          exit();
      }


    } 
    }

   
 
