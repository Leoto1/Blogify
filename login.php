<?php 
  include 'partials/header.php';
  if(!isset($_SESSION['username'])){
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
  }else{
    header("Location: /index.php");
  }
  include 'partials/footer.php'
?>