<?php
session_start();
if($_POST['submit'])
    {
        include_once 'dbh.inc.php';
        $email = mysqli_real_escape_string($conn,$_POST['email']);
        $password = mysqli_real_escape_string($conn,$_POST['password']);
        if(empty($email) || empty($password)){
            header("Location: ../login.php?m=empty");
        }else{
            $result = mysqli_query($conn,"SELECT * FROM users where email='".$email."'OR username='".$email."';");
            $row = mysqli_fetch_array($result);
            if(count($row) < 1)
            { 
                header("Location: ../login.php?m=invalidname");
            }else{
                if($row){
                    $hashcheck=password_verify($password,$row['password']);
                    if($hashcheck == false){
                        header("Location: ../login.php?m=invalidpass");
                    }elseif($hashcheck == true){
                        $_SESSION['username']=$row['username'];
                        $_SESSION['email']=$row['email'];
                        $_SESSION['u_id']=$row['id'];
                        header("Location: ../index.php?login=successful");
                    }
                }
            }   
        }     
    }else {
        header("Location: ../login.php");
    }
?>