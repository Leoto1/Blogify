<?php 
  include 'partials/header.php'
?>
<?php
    $id=$_GET['code'];
    $query = "SELECT * FROM blog WHERE id={$id};";
    $result = mysqli_query($conn,$query);
    $row = mysqli_fetch_array($result);
?>
<div class="show-container">
    <img src="<?php echo $row['image'] ?>" alt="Image" style="width:100%"/>
    <div class="blog-title show-title">
        <?php echo $row['title'] ?>
    </div>
    <div class="show-description">
        <?php echo $row['description'] ?>
    </div>
</div>

<?php 
  include 'partials/footer.php'
?>