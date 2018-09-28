<?php 
  include 'partials/header.php'
?>
<div class='container'>
<?php
$query = "SELECT * FROM blog;";

$result = mysqli_query($conn,$query);
?>

<div class="grid">
<?php
if($result)
{
  while($row = mysqli_fetch_array($result))
  {
?>
  
  <div class="card">
    <a href="/show.php?code=<?php echo $row['id']?>">
      <img src="<?php echo $row['image'] ?>" alt="Image" style="width:100%">
      <div class="card-container">
        <h4 class="blog-title"><b>
            <?php echo $row["title"]?></b></h4>
        <p><?php echo substr($row["description"],0,200)?>...</p>
        <div style='position:absolute;bottom:0'> by <em style="color:#ff2b4e;"><?php echo $row['author']?></em></div>
      </div>
    </a>
  </div>
  
<?php
 }
}
?>
</div>
</div>
<?php 
  include 'partials/footer.php'
?>