<?php
session_start();
if($_POST['submit'])
    {
        include_once 'dbh.inc.php';
        $email = mysqli_real_escape_string($conn,$_POST['email']);
        $password = mysqli_real_escape_string($conn,$_POST['password']);
        if(empty($email) || empty($password)){
           $message =  "Please don't leave any field empty!";
            $_SESSION['error'] = $message;
            header("Location: ../login.php");
        }else{
            $result = mysqli_query($conn,"SELECT * FROM users where email='".$email."'OR username='".$email."';");
            $row = mysqli_fetch_array($result);
            if(count($row) < 1)
            { 
                $message =  "E-mail/Username is incorrect";
            $_SESSION['error'] = $message;
            header("Location: ../login.php");
            }else{
                if($row){
                    $hashcheck=password_verify($password,$row['password']);
                    if($hashcheck == false){
                       $message =  "Password is incorrect";
                        $_SESSION['error'] = $message;
                        header("Location: ../login.php");
                    }elseif($hashcheck == true){
                        $_SESSION['username']=$row['username'];
                        $_SESSION['email']=$row['email'];
                        $_SESSION['u_id']=$row['id'];
                        $message = "You're logged in Successfully";
                        $_SESSION['success'] = $message;
                        header("Location: ../");
                    }
                }
            }   
        }     
    }else {
        header("Location: ../login.php");
    }
?>