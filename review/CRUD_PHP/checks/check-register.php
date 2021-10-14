<?php 
require_once '../config/config.php';

    if(isset($_POST['register'])) {
      $name = $_POST['username'];
      $email = $_POST['email'];
      $password= $_POST['password'];
      $confirmPassword = $_POST['Confirmpassword'];

      if (empty($name) && empty($password) && empty($confirmPassword) && empty($email)) {
        header('Location: ../register.php?error=FieldsCantBeEmpty');
        exit();
      } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        header('Location: ../register.php?error=emailIsInvalid');
        exit();
      } elseif($password != $confirmPassword){
        header('Location: ../register.php?error=PasswordDoesNotMatch');
        exit();
      }   else {
        $stmt = $pdo->prepare('SELECT * FROM user WHERE email = ?');
         $stmt->execute([$email]);
         if($stmt->rowCount() != 0){
             header("location: ../register.php?error=WrognEmail=".$name);
              exit();
         } else {
          $hashedPassword = password_hash($password, PASSWORD_ARGON2ID);

          $sql = 'INSERT INTO `user`(username, email,`password`) VALUES(?,?,?)';
        
          $stmt = $pdo->prepare($sql);
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

   
 
