<?php 
  include 'partials/header.php'
?>
<?php
    $id=$_GET['code'];
    $query = "SELECT * FROM blog WHERE id={$id};";
    $result = mysqli_query($conn,$query);
    $row = mysqli_fetch_array($result);
    $arrlikes=null;
    if(isset($_SESSION['username'])){
        $query = "SELECT likes FROM users WHERE id={$_SESSION['u_id']};";
        $result = mysqli_query($conn,$query);
        $likesrow = mysqli_fetch_array($result);
        $arrlikes = explode(',', $likesrow['likes']);
        $liked=array_search($id,$arrlikes);
    }
?>
<?php
if(!empty($liked)||$arrlikes[0]==$id){
    echo
'<a href="/includes/likes.inc.php?code='.$id.'&liked=T&pos='.$liked.'">
<div class="like">
<i class="fa fa-heart" aria-hidden="true"></i>
</div>
</a>';
}else{
echo
'<a href="/includes/likes.inc.php?code='.$id.'&liked=F">
<div class="like">
<i class="fa fa-heart-o" aria-hidden="true"></i>
</div>
</a>';
}

?>


<?php 
if(isset($_SESSION['username'])){
    if($row['u_id']==$_SESSION['u_id']){
        echo '<div class="container">
            <div class="flash warning"> 
            <form action="" method="post">
            It seems you own this blog. Do want to 
            <input type="hidden" name="auth" value="T">
            <input type="hidden" name="code" value="'.$id.'">
            <input type="submit" formaction="/edit.php" value="Update">
            or
            <input type="submit" formaction="/includes/deleteblog.inc.php" value="Delete">
            ?
            </form>
            </div>
            </div>';
    } 
}
?>
    <br>
<div class="show-container">
    <img src="<?php echo $row['image'] ;?>" alt="Image" style="width:100%"/>
    <div class="blog-title show-title">
        <?php echo $row['title']; ?>
    </div>
    <hr>
    <div style="display:inline-block;width:100%;"><div style="float:left;"> by <em style="color:#ff2b4e;"><?php echo $row['author']?></em></div>
    <div style="float:right;"><?php echo $row['likes']?> <em style="color:#ff2b4e;">likes</em></div>
    </div>
    <hr>
    <div class="show-description">
        <?php echo nl2br($row['description']); ?>
    </div>
</div>

<?php 
  include 'partials/footer.php';
?>