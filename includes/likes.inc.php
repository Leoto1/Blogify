<?php
session_start();
if(isset($_SESSION['username'])){
    include_once 'dbh.inc.php';
    $query = "SELECT likes FROM users WHERE id={$_SESSION['u_id']};";
    $result = mysqli_query($conn,$query);
    $row = mysqli_fetch_array($result);
    $likes=$row['likes'];
    if($_GET['code'] && $_GET['liked']=='F'){
        
        if(empty($likes)){
            $query = "Update users set likes=".$_GET['code']." where id=".$_SESSION['u_id'].";";
            mysqli_query($conn,$query);
            header('Location: /show.php?code='.$_GET['code']);
        }else{
            $arrlikes = explode(',', $likes);
            array_push($arrlikes,$_GET['code']);
            $likes= implode(',',$arrlikes);
            $query = "UPDATE users SET likes='".$likes."' where id='".$_SESSION['u_id']."';";
            mysqli_query($conn,$query);
            header('Location: /show.php?code='.$_GET['code']);
        }

        $query = "UPDATE blog SET likes=likes+1 where id='".$_GET['code']."';";
        mysqli_query($conn,$query);

    }elseif($_GET['code'] && $_GET['liked']=='T'){
        $arrlikes = explode(',', $likes);
        unset($arrlikes[$_GET['pos']]);
        $likes= implode(',',$arrlikes);
        $query = "UPDATE users SET likes='".$likes."' where id='".$_SESSION['u_id']."';";
        mysqli_query($conn,$query);
        header('Location: /show.php?code='.$_GET['code']);
        $query = "UPDATE blog SET likes=likes-1 where id='".$_GET['code']."';";
        mysqli_query($conn,$query);
    }else{
        header('Location: /index.php');
    }
}else{
    header("Location: /login.php?m=loginrequired");
}
?>