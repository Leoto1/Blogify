<?php
session_start();
if(isset($_SESSION['username'])){
    header("Location: ../{$_GET['p']}");
}else{
    header("Location: ../login.php?m=loginrequired");
}
?>