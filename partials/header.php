<?php
  include_once(__DIR__.'\..\includes\dbh.inc.php');
  session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel=" stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Blogify</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <header>
    <div class="container">
      <a href="/"><h2 class="logo">Blogify</h2></a>
      <div class="ham">
        <i class="fa fa-bars toggle"></i>
      </div>
      <script type="text/javascript">
      function toggler(){
        document.querySelector('nav').classList.toggle('active');
      }
      document.querySelector('.toggle').addEventListener('click', toggler );
      </script>
      <nav>
        <ul>
        <li><a href="/new.php">Create a blog</a></li>
        <?php
        if(isset($_SESSION['username'])){
            echo '<li><a href="/includes/logout.inc.php">Logout</a></li>';
          }else{
            echo '<li><a href="/signup.php">Sign Up</a></li>
          <li><a href="/login.php">Log In</a></li>';
          }
        ?>
        </ul>
      </nav>
    </div>
  </header>
  <br>
  <br>
  <br>
  <br>