<?php 
require_once 'includes/head.php';
; ?>

  <div class="container">
  <h2 class="text-align-center mt-4 mb-4">register</h2>
    <form class="form-control w-80 p-3" action="checks/check-register.php" method="POST">
      <input class="form-control pb-1 align-items mb-2" type="text" class="input" name="username" placeholder="Enter your username" >
      <input class="form-control pb-1 align-items mb-2" type="text" class="input" name="email" placeholder="Enter your Email ">
      <input  class="form-control  mb-2" type="password" class="input" name="password" placeholder="Password">
      <input class="form-control  mb-2" type="password" class="input" name="Confirmpassword" placeholder="Confirm your password">
      <p><a href="login.php">You already have an account ? Click here !</a></p>
      <button  type='submit' class="btn btn-primary" name="register">register</button>
    </form>
  </div>

<?php 
require_once 'includes/footer.php';
; ?>