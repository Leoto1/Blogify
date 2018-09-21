<?php 
  include 'partials/header.php'
?>
<?php

if($_GET){
  if($_GET['m']=="empty"){
    $message =  "Please don't leave any field empty!";
  }elseif($_GET['m']=="invalidname"){
    $message =  "Please type a valid E-mail/Username !!";

  }elseif($_GET['m']=="invalidpass"){
    $message = "Please type a valid Password !!";
  }
  echo "<div class='container' >".$message."</div>";
}
?>

<div class="login-container">
   <div style="color:#ff2b4e;text-align:center;"> <h1>Login</h1></div>
<form action="includes/login.inc.php" method="post">
    <div class="row">
      <div class="col-25">
        <label for="email">E-mail/Username</label>
      </div>
      <div class="col-75">
        <input type="text" id="email" name="email" placeholder="E-mail or Username">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="password">Password</label>
      </div>
      <div class="col-75">
        <input type="password" id="password" name="password" placeholder="Password">
      </div>
    </div>
    <div class="row" style="display: flex; justify-content: center;margin-top:10px;">
      <input type="submit" name="submit" value="Login">
    </div>
</form>

<p style="text-align:center;">Not Registered?<a href="/signup.php" style="text-decoration:underline;"> Click here</a></p>
</div>

<?php 
  include 'partials/footer.php'
?>