<?php 
  include 'partials/header.php';
  if(!isset($_SESSION['username'])){
?>

<div class="login-container">
   <div style="color:#ff2b4e;text-align:center;"> <h1>Sign Up</h1></div>
<form action="includes/signup.inc.php" method="post">
    <div class="row">
      <div class="col-25">
        <label for="username">Username</label>
      </div>
      <div class="col-75">
        <input type="text" id="username" name="username" placeholder="Username">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="email">E-mail</label>
      </div>
      <div class="col-75">
        <input type="email" id="email" name="email" placeholder="E-mail">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="password">Password</label>
      </div>
      <div class="col-75">
        <input type="password" id="password" name="password" maxlength="20" placeholder="Password">
      </div>
    </div>
    <div class="row" style="display: flex; justify-content: center;margin-top:10px;">
      <input type="submit" name="submit" value="Sign Up">
    </div>
</form>
</div>

<?php 
  }else{
    header("Location: /index.php");
  }
  include 'partials/footer.php'
?>