<?php
session_start();
if($_POST['submit']){
    include_once 'dbh.inc.php';
    $title=mysqli_real_escape_string($conn,$_POST['title']);
    $image=mysqli_real_escape_string($conn,$_POST['image']);
    $description=mysqli_real_escape_string($conn,$_POST['description']);
    $u_id=$_SESSION["u_id"];
    if($_POST['submit']=='Submit'){
        if(empty($title) || empty($image) || empty($description)){
            header("Location: ../new.php?m=empty");
        }else{
            $sql="INSERT INTO blog (title, image, description, u_id) VALUE ('$title','$image','$description','$u_id');";
            mysqli_query($conn,$sql);
            header("Location: ../index.php?new-blog-added");
        }
    }elseif($_POST['submit']=='Edit'&& $_GET['auth']=='T'){
        if(empty($title) || empty($image) || empty($description)){
            header("Location: ../show.php?m=empty");
        }else{
            $sql="UPDATE blog SET title='$title', image='$image', description='$description' WHERE id={$_GET['code']};";
            mysqli_query($conn,$sql);
            header("Location: ../show.php?code={$_GET['code']}");
        }
    }
}else{
    header("Location: ../index.php");
}
?>