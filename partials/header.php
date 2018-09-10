<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../style.css">
    <link rel=" stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>
</head>
<body>
    <header>
    <div class="container">
      <h2 class="logo">Blogify</h2>
      <div class="ham">
        <i class="fa fa-bars toggle"></i>
      </div>
      <script type="text/javascript">
      function toggler(){
        document.querySelector('nav').classList.toggle('active');
      }
      document.querySelector('.toggle').addEventListener('click', toggler );
      </script>
      <nav class="">
        <ul>
          <li><a href="#">Create a blog</a></li>
          <li><a href="#">Sign Up</a></li>
          <li><a href="#">Log In</a></li>
          <li><a href="#">Logout</a></li>
        </ul>
      </nav>
    </div>
  </header>