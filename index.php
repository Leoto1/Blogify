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
  <img src="<?php echo $row["image"] ?>" alt="Avatar" style="width:100%">
  <div class="card-container">
    <h4 class="blog-title"><b><?php echo $row["title"]?></b></h4> 
    <p><?php echo substr($row["description"],0,100)?>...</p> 
  </div>
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