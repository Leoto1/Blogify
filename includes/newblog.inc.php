<?php
session_start();
if($_POST['submit']){
    include_once 'dbh.inc.php';
    $title=mysqli_real_escape_string($conn,$_POST['title']);
    $image=mysqli_real_escape_string($conn,$_POST['image']);
    $description=mysqli_real_escape_string($conn,$_POST['description']);
    $u_id=$_SESSION["u_id"];
    $author=$_SESSION['username'];
    if($_POST['submit']=='Submit'){
        if(empty($title) || empty($image) || empty($description)){
            $message =  "Please don't leave any field empty!";
            $_SESSION['error'] = $message;
            header("Location: ../new.php");
        }else{
            $sql="INSERT INTO blog (title, image, description, u_id, author) VALUE ('$title','$image','$description','$u_id','$author');";
            mysqli_query($conn,$sql);
            $message = "New blog created successfully";
            $_SESSION['success'] = $message;
            header("Location: ../");
        }
    }elseif($_POST['submit']=='Edit'&& $_GET['auth']=='T'){
        if(empty($title) || empty($image) || empty($description)){
            $message =  "Please don't leave any field empty!";
            $_SESSION['error'] = $message;
            header("Location: ../edit.php");
        }else{
            $sql="UPDATE blog SET title='$title', image='$image', description='$description' WHERE id={$_GET['code']};";
            mysqli_query($conn,$sql);
            $message = "Your blog is Updated";
            $_SESSION['success'] = $message;
            header("Location: ../show.php?code={$_GET['code']}");
        }
    }
}else{
    header("Location: ../index.php");
}
?>