<?php
session_start();
if(!isset($_SESSION['username'])){
    $message = "You need to be loggedin to do that !!";
    $_SESSION['error']= $message;
    header("Location: /login.php");
}else{
    if($_POST['code'] && $_POST['auth']=='T'){
        include_once 'dbh.inc.php';
        $sql="DELETE FROM blog WHERE id={$_POST['code']};";
        mysqli_query($conn,$sql);
        $message = "Your blog has been deleted";
        $_SESSION['error'] = $message;
        header("Location: ../index.php?blog-deleted");     
    }else{
        header("Location: ../index.php");
    }
}
?>