<?php 
  include 'partials/header.php';
  if(!isset($_SESSION['username'])){
    header("Location: /login.php?m=loginrequired");
}else{
  if($_POST['code'] && $_POST['auth']=='T'){
    $id=$_POST['code'];
    $query = "SELECT * FROM blog WHERE id={$id};";
    $result = mysqli_query($conn,$query);
    $row = mysqli_fetch_array($result);
?>
<div class="container form-container">
  <form action="includes/newblog.inc.php?code=<?php echo $id?>&auth=T" method="POST">
    <div class="row">
      <div class="col-25">
        <label for="title">Title</label>
      </div>
      <div class="col-75">
        <input type="text" id="title" name="title" placeholder="Your post's title" value='<?php echo $row["title"]; ?>'>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="image">Image</label>
      </div>
      <div class="col-75">
        <input type="text" id="image" name="image" placeholder="Image URL" value='<?php echo $row["image"]; ?>'>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="description">Description</label>
      </div>
      <div class="col-75">
        <textarea id="description" name="description" placeholder="Description"><?php echo $row["description"]; ?></textarea>
      </div>
    </div>
    <div class="row">
      <input type="submit" name='submit' value="Edit">
    </div>
  </form>
</div>

<?php 
  }
  else{
      header("Location: /index.php");
  }
}
  include 'partials/footer.php'
?>
