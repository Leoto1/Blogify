<?php
session_start();
if(!isset($_SESSION['username'])){
    header("Location: /login.php?m=loginrequired");
}else{
    if($_POST['code'] && $_POST['auth']=='T'){
        include_once 'dbh.inc.php';
        $sql="DELETE FROM blog WHERE id={$_POST['code']};";
        mysqli_query($conn,$sql);
        header("Location: ../index.php?blog-deleted");     
    }else{
        header("Location: ../index.php");
    }
}
?>