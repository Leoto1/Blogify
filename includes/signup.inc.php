<?php
session_start();
if(isset($_POST['submit']))
{          
   if($_POST['submit']=="Sign Up")
    {
        include_once 'dbh.inc.php';
        $username   = mysqli_real_escape_string($conn,$_POST['username']);
        $email      = mysqli_real_escape_string($conn,$_POST['email']);
        $password   = mysqli_real_escape_string($conn,$_POST['password']);
        $query = "SELECT email username FROM users where email='".$email."'OR username='".$username."';";
        $result = mysqli_query($conn,$query);
        $numResults = mysqli_num_rows($result);
        if(empty($username) || empty($email) || empty($password)){
            header("Location: ../signup.php?m=empty");
        }
        elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) // Validate email address
        {
            header("Location: ../signup.php?m=invalidemail");
        }
        elseif($numResults>=1)
        {
            header("Location: ../signup.php?m=exists");
        }
        else
        {
            $hashedPwd=password_hash($password,PASSWORD_DEFAULT);
            mysqli_query($conn,"insert into users(username,email,password) values('".$username."','".$email."','".$hashedPwd."');");
            $query = "SELECT * FROM users WHERE email='{$email}';";
            $result = mysqli_query($conn,$query);
            $row = mysqli_fetch_array($result);
            $_SESSION['username']=$row['username'];
            $_SESSION['email']=$row['email'];
            $_SESSION['u_id']=$row['id'];
            header("Location: ../?signup=successfull");
        }
    }
}else{
    header("Location: ../signup.php");
}
?>
