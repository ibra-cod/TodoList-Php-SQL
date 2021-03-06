<?php 

require_once '../config/config.php';
// vérification de l'input (si elle existe).
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
          // requette sql
        $stmt = $pdo->prepare('SELECT * FROM user WHERE username = ? AND email = ?');
         $stmt->execute([$name, $email]);
        // fetch la data
         $data = $stmt->fetch();
          // verifier si l'utilisateur est supérieur à zero cela signifique que l'utilisateur c'est déja inscrit
         if($stmt->rowCount() > 0){
             //verif du mot de passe
          if (password_verify($password, $data['password'])) {
                //creation de la session de connection
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
   
