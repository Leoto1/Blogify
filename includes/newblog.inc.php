<?php
    include_once 'dbh.inc.php';
    $title=$_POST['title'];
    $image=$_POST['image'];
    $description=$_POST['description'];

    $sql="INSERT INTO blog (title, image, description) VALUE ('$title','$image','$description');";
    mysqli_query($conn,$sql);

    header("Location: ../index.php?new-blog-added")
?>