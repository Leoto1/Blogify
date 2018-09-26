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
            $message =  "Please don't leave any field empty!";
            $_SESSION['error'] = $message;
            header("Location: ../signup.php");
        }
        elseif ($username == trim($username) && strpos($username, ' ') !== false) {
            $message = "Don't use space in the username";
            $_SESSION['error'] = $message;
            header("Location: ../signup.php");
        }
        elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) // Validate email address
        {
            $message =  "Invalid email address please type a valid email!!";        
            $_SESSION['error'] = $message;
            header("Location: ../signup.php");
        }elseif(strlen($password)<8) {
            $message='Password must be atleast 8 characters long!';
            $_SESSION['error'] = $message;
            header("Location: ../signup.php");
        }
        elseif($numResults>=1)
        {
            $message = "Username or Email already exist!!";
            $_SESSION['error'] = $message;
            header("Location: ../signup.php");
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
            $message = "You're logged in Successfully";
            $_SESSION['success'] = $message;
            header("Location: ../");
        }
    }
}else{
    header("Location: ../signup.php");
}
?>
