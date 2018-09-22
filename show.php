<?php 
  include 'partials/header.php'
?>
<?php
    $id=$_GET['code'];
    $query = "SELECT * FROM blog WHERE id={$id};";
    $result = mysqli_query($conn,$query);
    $row = mysqli_fetch_array($result);
?>
<?php if($row['u_id']==$_SESSION['u_id']){
    echo ' <div class="container">
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
?>
    <br>
<div class="show-container">
    <img src="<?php echo $row['image'] ;?>" alt="Image" style="width:100%"/>
    <div class="blog-title show-title">
        <?php echo $row['title']; ?>
    </div>
    <div class="show-description">
        <?php echo nl2br($row['description']); ?>
    </div>
</div>

<?php 
  include 'partials/footer.php';
?>