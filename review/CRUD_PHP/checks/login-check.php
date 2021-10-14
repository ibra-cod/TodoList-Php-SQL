<?php 
require_once '../config/config.php';

    if(isset($_POST['register'])) {
      $name = $_POST['username'];
      $email = $_POST['email'];
      $password= $_POST['password'];

      if (empty($name) && empty($password) && empty($confirmPassword) && empty($email)) {
        header('Location: ../login.php?error=FieldsCantBeEmpty');
        exit();
      } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        header('Location: ../login.php?error=emailIsInvalid');
        exit();
      }  else {
        $stmt = $pdo->prepare('SELECT * FROM user WHERE username = ? AND email = ?');
         $stmt->execute([$name, $email]);
         $data = $stmt->fetch();
         if($stmt->rowCount() > 0){
          if (password_verify($password, $data['password'])) {
            $_SESSION['username'] = $_POST['username'];
            header("location: ../login.php?success=Logged".$name);
             exit();
           }
           else {
             header('Location: ../login.php?passworderror');
             exit();
           }
         
         } else {
           header('Location: ../login.php?error=DoesntMatch');
           exit();
                $message = 'username or email already exist';
        } 
      }


    }
   
 
    //'ibrahim','ibrahim01@gmail.com', 'Trackmania12'