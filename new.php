<?php 
  include 'partials/header.php';
if(!isset($_SESSION['username'])){
    header("Location: /login.php?m=loginrequired");
}else{
   
?>
<div class="container form-container">
  <form action="includes/newblog.inc.php" method="POST">
    <div class="row">
      <div class="col-25">
        <label for="title">Title</label>
      </div>
      <div class="col-75">
        <input type="text" id="title" name="title" placeholder="Your post's title">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="image">Image</label>
      </div>
      <div class="col-75">
        <input type="text" id="image" name="image" placeholder="Image URL">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="description">Description</label>
      </div>
      <div class="col-75">
        <textarea id="description" name="description" placeholder="Description"></textarea>
      </div>
    </div>
    <div class="row">
      <input type="submit" name='submit' value="Submit">
    </div>
  </form>
</div>

<?php 
}
  include 'partials/footer.php'
?>
